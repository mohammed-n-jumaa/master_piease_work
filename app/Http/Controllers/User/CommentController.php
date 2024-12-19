<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    // تخزين تعليق جديد
    public function store(Request $request)
    {
        // التحقق من صحة البيانات المدخلة
        $validatedData = $request->validate([
            'consultation_id' => 'required|exists:consultations,id',
            'content' => 'required|string|max:1000',
        ]);

        // إنشاء التعليق وحفظه في قاعدة البيانات
        Comment::create([
            'consultation_id' => $validatedData['consultation_id'],
            'user_id' => auth()->id(), // ربط التعليق بالمستخدم الحالي
            'content' => $validatedData['content'],
        ]);

        // إعادة التوجيه مع رسالة نجاح
        return redirect()->back()->with('success', 'Your comment has been added successfully!');
    }

    // تحميل المزيد من التعليقات
    public function loadComments(Request $request, $id)
    {
        $offset = $request->input('offset', 0);

        // جلب التعليقات غير المحذوفة فقط
        $comments = Comment::where('consultation_id', $id)
            ->whereNull('deleted_at') // تجاهل التعليقات المحذوفة ناعماً
            ->with('user') // تضمين بيانات المستخدم
            ->skip($offset)
            ->take(3)
            ->get();

        return response()->json($comments);
    }

    // حذف ناعم للتعليق
    public function softDelete($id)
    {
        // إيجاد التعليق
        $comment = Comment::findOrFail($id);

        // التحقق من ملكية التعليق
        if (auth()->id() !== $comment->user_id) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        // تنفيذ الحذف الناعم
        $comment->delete();

        return response()->json(['success' => true, 'message' => 'Comment deleted successfully!']);
    }
    public function update(Request $request, $id)
{
    // التحقق من صحة البيانات
    $validatedData = $request->validate([
        'content' => 'required|string|max:1000',
    ]);

    // إيجاد التعليق
    $comment = Comment::findOrFail($id);

    // التحقق من صلاحية المستخدم
    if (auth()->id() !== $comment->user_id) {
        return response()->json(['error' => 'Unauthorized'], 403);
    }

    // تحديث محتوى التعليق
    $comment->update([
        'content' => $validatedData['content'],
    ]);

    return response()->json([
        'success' => true,
        'message' => 'Comment updated successfully!',
        'comment' => $comment
    ]);
}

}
