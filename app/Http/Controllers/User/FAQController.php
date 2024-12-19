<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\FAQ;
use Illuminate\Http\Request;

class FAQController extends Controller
{
    // عرض الأسئلة الشائعة
    public function index()
    {
        $faqs = FAQ::all();
        return view('user.FAQ', compact('faqs'));
    }

    // تخزين سؤال جديد
    public function store(Request $request)
    {
        // التحقق من المدخلات
        $request->validate([
            'question' => 'required|string|max:40',
            'answer' => 'required|string|max:40',
        ]);

        // حفظ البيانات في قاعدة البيانات
        FAQ::create([
            'question' => $request->input('question'),
            'answer' => $request->input('answer'),
        ]);

        // رسالة نجاح وإعادة التوجيه
        return redirect()->back()->with('success', 'Your question has been submitted successfully!');
    }
}
