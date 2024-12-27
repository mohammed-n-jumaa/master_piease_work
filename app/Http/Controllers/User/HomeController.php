<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Consultation;
use App\Models\Comment;
use App\Models\User; 
use App\Models\Lawyer; 
use App\Models\Testimonial;
use App\Models\Faq;
use Illuminate\Http\JsonResponse;

class HomeController extends Controller
{
    public function index()
    {
        try {
            $consultationsCount = Consultation::count();
            $commentsCount = Comment::count();
            $clientsCount = User::count(); 
            $lawyersCount = Lawyer::count(); 
            
            $faqs = Faq::take(6)->get();
            
            $testimonials = Testimonial::all();
            
            $categories = Category::take(6)->get();

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
            return abort(500, 'حدث خطأ أثناء جلب البيانات.');
        }
    }

    public function getUpdatedCounts(): JsonResponse
    {
        try {
            $consultationsCount = Consultation::count();
            $commentsCount = Comment::count();
            $clientsCount = User::count(); 
            $lawyersCount = Lawyer::count();

            return response()->json([
                'consultationsCount' => $consultationsCount,
                'commentsCount' => $commentsCount,
                'clientsCount' => $clientsCount,
                'lawyersCount' => $lawyersCount,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'حدث خطأ أثناء جلب البيانات.',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
