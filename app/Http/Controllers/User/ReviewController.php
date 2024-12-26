<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    
    public function store(Request $request)
{
    $request->validate([
        'lawyer_id' => 'required|exists:lawyers,id',
        'rating' => 'required|integer|min:1|max:5',
        'comment' => 'required|string|max:255',
    ]);

    Review::create([
        'lawyer_id' => $request->lawyer_id,
        'user_id' => auth()->id(),
        'rating' => $request->rating,
        'comment' => $request->comment,
        'status' => 'pending', // التقييم يبدأ بحالة غير مفعلة
    ]);

    return back()->with('success', 'تم إرسال المراجعة بنجاح وهي بانتظار الموافقة.');
}


    public function showApprovedReviews($lawyer_id)
    {
        $reviews = Review::where('lawyer_id', $lawyer_id)
            ->where('status', 'approved')
            ->with('user')
            ->get();

        return view('reviews.index', compact('reviews'));
    }
}
