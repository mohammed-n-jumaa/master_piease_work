<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::with(['user', 'lawyer'])->get(); // جلب بيانات الريفيوز مع العلاقات
        return view('admin.reviews.manage-reviews', compact('reviews'));
    }

    public function updateStatus($id)
    {
        $review = Review::findOrFail($id);
        $review->status = $review->status === 'approved' ? 'pending' : 'approved';
        $review->save();

        return redirect()->route('admin.reviews.index')->with('success', 'Status updated successfully!');
    }
}
