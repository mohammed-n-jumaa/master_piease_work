<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Consultation;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Http\Request;

class ConsultationController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();
    
        $query = Consultation::with([
            'user' => function ($query) {
                $query->select('id', 'name', 'profile_picture'); 
            },
            'category' => function ($query) {
                $query->select('id', 'name'); 
            }
        ]);
        
        if ($request->has('category') && $request->category != '') {
            $query->where('category_id', $request->category);
        }
    
        $consultations = $query->paginate(15);
    
        return view('user.consultations', compact('consultations', 'categories'));
    }
    

    public function create()
    {
        $categories = Category::all(); 
        return view('user.add-consultation', compact('categories'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title'       => 'required|string|max:255',
            'content'     => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        Consultation::create([
            'title'       => $validatedData['title'],
            'content'     => $validatedData['content'],
            'category_id' => $validatedData['category_id'],
            'user_id'     => auth()->id(),
        ]);

        return redirect()->route('user.consultations.index')->with('success', 'Your consultation has been added successfully!');
    }

    public function show($id)
    {
        $consultation = Consultation::with(['user', 'comments.user', 'category'])->findOrFail($id);

        $comments = $consultation->comments()->latest()->take(3)->get();

        $commentsCount = $consultation->comments()->count();

        return view('user.ConsultationShow', compact('consultation', 'comments', 'commentsCount'));
    }

    public function loadMoreComments(Request $request, $id)
    {
        $offset = $request->input('offset');
        $consultation = Consultation::findOrFail($id);

        $comments = $consultation->comments()
            ->with('user')
            ->latest()
            ->skip($offset)
            ->take(3)
            ->get();

        return response()->json($comments);
    }
}
