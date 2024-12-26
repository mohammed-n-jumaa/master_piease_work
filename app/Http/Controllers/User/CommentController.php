<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        // Ensure the request is POST
        if ($request->method() !== 'POST') {
            abort(405, 'Method Not Allowed');
        }

        // Validate input
        $validatedData = $request->validate([
            'consultation_id' => 'required|exists:consultations,id',
            'content' => 'required|string|max:1000',
        ]);

        // Prepare comment data
        $commentData = [
            'consultation_id' => $validatedData['consultation_id'],
            'content' => $validatedData['content'],
        ];

        // Check user type
        if (auth('lawyer')->check()) {
            $commentData['lawyer_id'] = auth('lawyer')->id();
        } elseif (auth('web')->check()) {
            $commentData['user_id'] = auth('web')->id();
        } else {
            return redirect()->back()->withErrors(['error' => 'Unauthorized user']);
        }

        // Create comment
        Comment::create($commentData);

        // Redirect back with success message
        return redirect()->back()->with('success', 'Your comment has been added successfully!');
    }

    public function softDelete(Request $request)
    {
        $comment = Comment::findOrFail($request->comment_id);

        if (
            (auth('web')->check() && auth('web')->id() !== $comment->user_id) &&
            (auth('lawyer')->check() && auth('lawyer')->id() !== $comment->lawyer_id)
        ) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $comment->delete();
        return response()->json(['message' => 'Comment deleted successfully']);
    }

    public function update(Request $request)
    {
        $comment = Comment::findOrFail($request->comment_id);

        if (
            (auth('web')->check() && auth('web')->id() !== $comment->user_id) &&
            (auth('lawyer')->check() && auth('lawyer')->id() !== $comment->lawyer_id)
        ) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $comment->content = $request->content;
        $comment->save();

        return response()->json(['message' => 'Comment updated successfully', 'content' => $comment->content]);
    }

    public function loadMore(Request $request)
    {
        logger('Load More function called with offset: ' . $request->offset . ', consultation_id: ' . $request->consultation_id);

        $validated = $request->validate([
            'consultation_id' => 'required|exists:consultations,id',
            'offset' => 'required|integer|min:0',
        ]);

        $comments = Comment::where('consultation_id', $validated['consultation_id'])
            ->with(['user', 'lawyer']) // Load user and lawyer relationships
            ->orderBy('created_at', 'desc')
            ->skip($validated['offset'])
            ->take(3)
            ->get();

        if ($comments->isEmpty()) {
            logger('No more comments to load.');
            return response()->json(['comments' => []], 200);
        }

        logger('Comments loaded successfully: ' . $comments->count());
        return response()->json(['comments' => $comments], 200);
    }
}
