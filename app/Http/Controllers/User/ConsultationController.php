<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Consultation;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Http\Request;

class ConsultationController extends Controller
{
    // عرض جميع الاستشارات
    public function index(Request $request)
    {
        $categories = Category::all(); // جلب جميع التصنيفات
    
        // تعديل الاستعلام لاختيار الحقول المطلوبة فقط من المستخدم والتصنيف
        $query = Consultation::with([
            'user' => function ($query) {
                $query->select('id', 'name', 'profile_picture'); // تحديد الحقول المطلوبة من المستخدم
            },
            'category' => function ($query) {
                $query->select('id', 'name'); // تحديد الحقول المطلوبة من التصنيف
            }
        ]);
        
        // فلترة حسب التصنيف إذا كان موجودًا في الطلب
        if ($request->has('category') && $request->category != '') {
            $query->where('category_id', $request->category);
        }
    
        // جلب الاستشارات مع التصنيفات والمستخدمين مع الصفحات
        $consultations = $query->paginate(15);
    
        // تمرير البيانات إلى العرض
        return view('user.consultations', compact('consultations', 'categories'));
    }
    

    // عرض صفحة إضافة استشارة جديدة
    public function create()
    {
        $categories = Category::all(); // جلب جميع التصنيفات
        return view('user.add-consultation', compact('categories'));
    }

    // تخزين استشارة جديدة
    public function store(Request $request)
    {
        // التحقق من البيانات
        $validatedData = $request->validate([
            'title'       => 'required|string|max:255',
            'content'     => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        // إنشاء استشارة جديدة
        Consultation::create([
            'title'       => $validatedData['title'],
            'content'     => $validatedData['content'],
            'category_id' => $validatedData['category_id'],
            'user_id'     => auth()->id(),
        ]);

        return redirect()->route('user.consultations.index')->with('success', 'Your consultation has been added successfully!');
    }

    // عرض استشارة محددة مع التعليقات
    public function show($id)
    {
        // جلب الاستشارة مع التعليقات
        $consultation = Consultation::with(['user', 'comments.user', 'category'])->findOrFail($id);

        // جلب أول 3 تعليقات
        $comments = $consultation->comments()->latest()->take(3)->get();

        // حساب عدد التعليقات
        $commentsCount = $consultation->comments()->count();

        return view('user.ConsultationShow', compact('consultation', 'comments', 'commentsCount'));
    }

    // تحميل المزيد من التعليقات عبر AJAX
    public function loadMoreComments(Request $request, $id)
    {
        $offset = $request->input('offset');
        $consultation = Consultation::findOrFail($id);

        // جلب التعليقات الإضافية
        $comments = $consultation->comments()
            ->with('user')
            ->latest()
            ->skip($offset)
            ->take(3)
            ->get();

        return response()->json($comments);
    }
}
