<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Consultation;
use App\Models\Comment;
use App\Models\User; // للمستخدمين
use App\Models\Lawyer; // للمحامين
use App\Models\Testimonial;
use App\Models\faq;

class HomeController extends Controller
{
    public function index()
    {
        // جلب البيانات المطلوبة
        $consultationsCount = Consultation::count();
        $commentsCount = Comment::count();
        $clientsCount = User::count(); // عدد العملاء (المستخدمين)
        $lawyersCount = Lawyer::count(); // عدد المحامين
        
        // جلب أول 6 أسئلة من FAQs
        $faqs = Faq::take(6)->get();
        
        // جلب كل التوصيات
        $testimonials = Testimonial::all();
        
        // جلب أول 6 فئات من الكاتيجوريات
        $categories = Category::take(6)->get();

        // إرجاع view لعرض البيانات
        return view('user.index', compact('consultationsCount', 'commentsCount', 'clientsCount', 'lawyersCount', 'faqs', 'testimonials', 'categories'));
    }

    // دالة لإرجاع الأعداد المحدثة عبر AJAX
    public function getUpdatedCounts()
    {
        $consultationsCount = Consultation::count();
        $commentsCount = Comment::count();
        $clientsCount = User::count(); // عدد العملاء
        $lawyersCount = Lawyer::count(); // عدد المحامين

        return response()->json([
            'consultationsCount' => $consultationsCount,
            'commentsCount' => $commentsCount,
            'clientsCount' => $clientsCount,
            'lawyersCount' => $lawyersCount,
        ]);
    }
}
