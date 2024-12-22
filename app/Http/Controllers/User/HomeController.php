<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Consultation;
use App\Models\Comment;
use App\Models\User; // للمستخدمين
use App\Models\Lawyer; // للمحامين
use App\Models\Testimonial;
use App\Models\Faq;
use Illuminate\Http\JsonResponse;

class HomeController extends Controller
{
    public function index()
    {
        try {
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
            return view('user.index', compact(
                'consultationsCount', 
                'commentsCount', 
                'clientsCount', 
                'lawyersCount', 
                'faqs', 
                'testimonials', 
                'categories'
            ));
        } catch (\Exception $e) {
            // تسجيل الخطأ أو التعامل معه
            return abort(500, 'حدث خطأ أثناء جلب البيانات.');
        }
    }

    // دالة لإرجاع الأعداد المحدثة عبر AJAX
    public function getUpdatedCounts(): JsonResponse
    {
        try {
            // حساب الأعداد
            $consultationsCount = Consultation::count();
            $commentsCount = Comment::count();
            $clientsCount = User::count(); // عدد العملاء
            $lawyersCount = Lawyer::count(); // عدد المحامين

            // إرجاع البيانات بصيغة JSON
            return response()->json([
                'consultationsCount' => $consultationsCount,
                'commentsCount' => $commentsCount,
                'clientsCount' => $clientsCount,
                'lawyersCount' => $lawyersCount,
            ]);
        } catch (\Exception $e) {
            // إرجاع رسالة خطأ في حال حدوث مشكلة
            return response()->json([
                'error' => 'حدث خطأ أثناء جلب البيانات.',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
