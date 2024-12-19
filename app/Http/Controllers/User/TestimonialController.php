<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonial;

class TestimonialController extends Controller
{
    // حفظ التقييم الجديد
    public function store(Request $request)
    {
        // التحقق من البيانات
        $request->validate([
            'name' => 'required|string|max:40',
            'profession' => 'required|string|max:40',
            'message' => 'required|string|max:200',
        ]);

        // إنشاء التقييم
        Testimonial::create([
            'name' => $request->name,
            'profession' => $request->profession,
            'message' => $request->message,
        ]);

        // إعادة التوجيه مع رسالة نجاح
        return redirect()->back()->with('success', 'Your review has been submitted successfully!');
    }
}
