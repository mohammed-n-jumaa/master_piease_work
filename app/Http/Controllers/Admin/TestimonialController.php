<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::all();
        return view('admin.testimonials.manage-testimonials', compact('testimonials'));
    }

    public function updateStatus(Request $request, $id)
    {
        $testimonial = Testimonial::findOrFail($id);
        $testimonial->status = $testimonial->status === 'active' ? 'inactive' : 'active';
        $testimonial->save();

        return redirect()->route('admin.testimonials.index')->with('success', 'Status updated successfully!');
    }
}
