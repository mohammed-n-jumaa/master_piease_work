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
    /**
     * عرض صفحة البروفايل الشخصي للمحامي الحالي.
     */
    public function index()
    {
        $lawyer = Auth::guard('lawyer')->user()->load('category');
        
        // جلب المواعيد المرتبطة بالمحامي
        $appointments = Appointment::where('lawyer_id', $lawyer->id)
                                    ->orderBy('appointment_date', 'asc')
                                    ->get();
        
        // جلب التقييمات الموافق عليها
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
        // جلب بيانات المحامي
        $lawyer = Lawyer::with('category')->findOrFail($id);
    
        // جلب المواعيد المتاحة فقط (الحالة pending)
        $appointments = Appointment::where('lawyer_id', $lawyer->id)
            ->where('status', 'pending') // التأكد من جلب المواعيد المتاحة فقط
            ->orderBy('appointment_date', 'asc')
            ->get();
    
        // جلب المراجعات الموافق عليها فقط
        $approvedReviews = Review::where('lawyer_id', $lawyer->id)
            ->where('status', 'approved') // التأكد من جلب المراجعات الموافق عليها
            ->orderBy('created_at', 'desc')
            ->get();
    
        return view('user.lawyer-profile', compact('lawyer', 'appointments', 'approvedReviews'));
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
        $fileName = time() . '_' . $request->file('profile_picture')->getClientOriginalName();
        $path = $request->file('profile_picture')->move(public_path('lawyer_profiles'), $fileName);
        $lawyer->profile_picture = 'lawyer_profiles/' . $fileName;
    }

    // تحديث صورة الشهادة
if ($request->hasFile('lawyer_certificate')) {
    // حذف الملف القديم إذا كان موجودًا
    if ($lawyer->lawyer_certificate && file_exists(public_path($lawyer->lawyer_certificate))) {
        unlink(public_path($lawyer->lawyer_certificate));
    }

    // حفظ الملف الجديد داخل مجلد "lawyer_certificates"
    $certificateName = time() . '_certificate_' . $request->file('lawyer_certificate')->getClientOriginalName();
    $lawyer->lawyer_certificate = $request->file('lawyer_certificate')->move('lawyer_certificates', $certificateName);
}

// تحديث صورة كرت النقابة
if ($request->hasFile('syndicate_card')) {
    // حذف الملف القديم إذا كان موجودًا
    if ($lawyer->syndicate_card && file_exists(public_path($lawyer->syndicate_card))) {
        unlink(public_path($lawyer->syndicate_card));
    }

    // حفظ الملف الجديد داخل مجلد "syndicate_cards"
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
