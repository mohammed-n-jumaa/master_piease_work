<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserProfileController extends Controller
{
    /**
     * عرض صفحة الملف الشخصي للمستخدم الحالي.
     */
    public function index()
    {
        $user = Auth::user();
        return view('user.profile', compact('user'));
    }
    public function show($id)
    {
        // البحث عن المستخدم بناءً على ID
        $user = User::findOrFail($id);
    
        // عرض صفحة البروفايل
        return view('user.profile', compact('user'));
    }
    
   
    /**
     * عرض صفحة تعديل الملف الشخصي.
     */
    public function edit()
    {
        $user = Auth::user();
        return view('user.user-profile-edit', compact('user'));
    }

    /**
     * تحديث البيانات الشخصية وكلمة المرور.
     */
    public function update(Request $request)
    {
        $user = Auth::user();
    
        $request->validate([
            'name' => 'required|string|max:255',
            'phone_number' => 'nullable|string|max:15',
            'profile_picture' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);
    
        // تحديث صورة البروفايل
        if ($request->hasFile('profile_picture')) {
            // حذف الصورة القديمة إن وجدت
            if ($user->profile_picture && file_exists(public_path($user->profile_picture))) {
                unlink(public_path($user->profile_picture));
            }
    
            // إنشاء اسم فريد للملف
            $fileName = time() . '_' . $request->file('profile_picture')->getClientOriginalName();
    
            // نقل الملف إلى مجلد user_profiles
            $path = $request->file('profile_picture')->move(public_path('user_profiles'), $fileName);
    
            // حفظ المسار في قاعدة البيانات
            $user->profile_picture = 'user_profiles/' . $fileName;
        }
    
        // تحديث البيانات الشخصية
        $user->update($request->only(['name', 'phone_number']));
    
        // تحديث كلمة المرور (إن وجدت)
        if ($request->filled('current_password') && $request->filled('new_password')) {
            $request->validate([
                'current_password' => 'required|string',
                'new_password' => 'required|string|min:6|confirmed',
            ]);
    
            if (!Hash::check($request->current_password, $user->password)) {
                return back()->withErrors(['current_password' => 'كلمة المرور الحالية غير صحيحة.']);
            }
    
            $user->password = Hash::make($request->new_password);
            $user->save();
        }
    
        return redirect()->route('user.profile')->with('success', 'تم تحديث الملف الشخصي وكلمة المرور بنجاح.');
    }
    

    /**
     * تغيير كلمة المرور فقط.
     */
    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:6|confirmed',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'The current password is incorrect.']);
        }

        $user->update(['password' => Hash::make($request->new_password)]);

        return back()->with('success', 'Password changed successfully.');
    }
}
