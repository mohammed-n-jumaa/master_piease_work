<?php

namespace App\Http\Controllers\User;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class LawyerProfileController extends Controller
{
    /**
     * عرض صفحة البروفايل.
     */
    public function index()
    {
        $lawyer = Auth::guard('lawyer')->user()->load('category');
        return view('user.lawyer-profile', compact('lawyer'));
    }
    

    /**
     * عرض صفحة التعديل.
     */
    public function edit()
    {
        $lawyer = Auth::guard('lawyer')->user()->load('category');
        $categories = Category::all(); // جلب جميع الفئات
        return view('user.lawyer-profile-edit', compact('lawyer', 'categories'));
    }
    

    /**
     * معالجة طلب التعديل.
     */
    public function update(Request $request)
    {
        $lawyer = Auth::guard('lawyer')->user();

        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone_number' => 'nullable|string|max:15',
            'specialization' => 'nullable|string|max:255',
            'date_of_birth' => 'nullable|date',
            'profile_picture' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'lawyer_certificate' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'syndicate_card' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // تحديث صورة الملف الشخصي
        if ($request->hasFile('profile_picture')) {
            if ($lawyer->profile_picture && Storage::exists('public/' . $lawyer->profile_picture)) {
                Storage::delete('public/' . $lawyer->profile_picture);
            }
            $lawyer->profile_picture = $request->file('profile_picture')->store('profile_pictures', 'public');
        }

        // تحديث صورة الشهادة
        if ($request->hasFile('lawyer_certificate')) {
            if ($lawyer->lawyer_certificate && Storage::exists('public/' . $lawyer->lawyer_certificate)) {
                Storage::delete('public/' . $lawyer->lawyer_certificate);
            }
            $lawyer->lawyer_certificate = $request->file('lawyer_certificate')->store('lawyer_certificates', 'public');
        }

        // تحديث صورة كرت النقابة
        if ($request->hasFile('syndicate_card')) {
            if ($lawyer->syndicate_card && Storage::exists('public/' . $lawyer->syndicate_card)) {
                Storage::delete('public/' . $lawyer->syndicate_card);
            }
            $lawyer->syndicate_card = $request->file('syndicate_card')->store('syndicate_cards', 'public');
        }

        // تحديث باقي الحقول
        $lawyer->update($request->only([
            'first_name',
            'last_name',
            'phone_number',
            'specialization',
            'date_of_birth',
        ]));

        return redirect()->route('lawyer.profile')->with('success', 'Profile updated successfully.');
    }

    /**
     * معالجة طلب تغيير كلمة المرور.
     */
    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:6|confirmed',
        ]);

        $lawyer = Auth::guard('lawyer')->user();

        if (!Hash::check($request->current_password, $lawyer->password)) {
            return back()->withErrors(['current_password' => 'The current password is incorrect.']);
        }

        $lawyer->update(['password' => Hash::make($request->new_password)]);

        return back()->with('success', 'Password changed successfully.');
    }
}
