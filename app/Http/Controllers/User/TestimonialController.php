<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonial;

class TestimonialController extends Controller
{
    // save new rating
    public function store(Request $request)
    {
      
        $request->validate([
            'name' => 'required|string|max:40',
            'profession' => 'required|string|max:40',
            'message' => 'required|string|max:200',
        ]);

     
        Testimonial::create([
            'name' => $request->name,
            'profession' => $request->profession,
            'message' => $request->message,
            'status' => 'inactive', // الحالة الافتراضية
        ]);

        // إعادة التوجيه مع رسالة نجاح
        return redirect()->back()->with('success', 'Your review has been submitted successfully but is inactive.');
    }
}
