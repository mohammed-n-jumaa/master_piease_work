<?php

namespace App\Http\Controllers\User;

use App\Models\Review;
use App\Models\Category;
use App\Models\Appointment;
use App\Models\Lawyer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class LawyerProfileController extends Controller
{
    
    public function index()
    {
        $lawyer = Auth::guard('lawyer')->user()->load('category');
        
        $appointments = Appointment::where('lawyer_id', $lawyer->id)
                                    ->orderBy('appointment_date', 'asc')
                                    ->get();
        
        $approvedReviews = Review::where([
            'lawyer_id' => $lawyer->id,
            'status' => 'approved',
        ])
        ->with('user')
        ->orderBy('created_at', 'desc')
        ->get();
        
        return view('user.lawyer-profile', compact('lawyer', 'appointments', 'approvedReviews'));
    }
    
    public function show($id)
    {
        $lawyer = Lawyer::with('category')->findOrFail($id);
    
        $appointments = Appointment::where('lawyer_id', $lawyer->id)
            ->where('status', 'pending') 
            ->orderBy('appointment_date', 'asc')
            ->get();
    
        $approvedReviews = Review::where('lawyer_id', $lawyer->id)
            ->where('status', 'approved') 
            ->orderBy('created_at', 'desc')
            ->get();
    
        return view('user.lawyer-profile', compact('lawyer', 'appointments', 'approvedReviews'));
    }
    
    

    public function edit()
    {
        $lawyer = Auth::guard('lawyer')->user()->load('category');
        $categories = Category::all(); // جلب جميع الفئات
        return view('user.lawyer-profile-edit', compact('lawyer', 'categories'));
    }
    

 
    public function update(Request $request)
    {
        $lawyer = Auth::guard('lawyer')->user();
    
        // التحقق من الحقول
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone_number' => 'nullable|string|max:15|regex:/^962[0-9]{9}$/',  // تحقق من رقم الهاتف
            'specialization' => 'nullable|string|max:255',
            'date_of_birth' => 'nullable|date',
            'profile_picture' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'lawyer_certificate' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'syndicate_card' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);
    
        // تحقق إذا كانت كلمة السر قد تم تحديثها
        if ($request->filled('new_password')) {
            $request->validate([
                'new_password' => 'required|string|min:6|confirmed|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/|regex:/[@$!%*?&]/',
            ]);
    
            $lawyer->password = Hash::make($request->new_password);
        }
    
        // معالجة صورة الملف الشخصي إذا تم رفعها
        if ($request->hasFile('profile_picture')) {
            $fileName = time() . '_' . $request->file('profile_picture')->getClientOriginalName();
            $path = $request->file('profile_picture')->move(public_path('lawyer_profiles'), $fileName);
            $lawyer->profile_picture = 'lawyer_profiles/' . $fileName;
        }
    
        // معالجة شهادة المحامي إذا تم رفعها
        if ($request->hasFile('lawyer_certificate')) {
            if ($lawyer->lawyer_certificate && file_exists(public_path($lawyer->lawyer_certificate))) {
                unlink(public_path($lawyer->lawyer_certificate));
            }
    
            $certificateName = time() . '_certificate_' . $request->file('lawyer_certificate')->getClientOriginalName();
            $lawyer->lawyer_certificate = $request->file('lawyer_certificate')->move('lawyer_certificates', $certificateName);
        }
    
        // معالجة بطاقة النقابة إذا تم رفعها
        if ($request->hasFile('syndicate_card')) {
            if ($lawyer->syndicate_card && file_exists(public_path($lawyer->syndicate_card))) {
                unlink(public_path($lawyer->syndicate_card));
            }
    
            $cardName = time() . '_syndicate_' . $request->file('syndicate_card')->getClientOriginalName();
            $lawyer->syndicate_card = $request->file('syndicate_card')->move('syndicate_cards', $cardName);
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
