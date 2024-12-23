<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserProfileController extends Controller
{
    // Show user profile
    public function index()
    {
        $user = Auth::user();
        return view('user.profile', compact('user'));
    }
    public function edit()
    {
        $user = Auth::user(); 
        return view('user.user-profile-edit', compact('user'));
    }
    
    // Update user profile
    public function update(Request $request)
    {
        $user = Auth::user();
    
        // تحديث البيانات الشخصية
        if ($request->filled('name') || $request->filled('phone_number') || $request->hasFile('profile_picture')) {
            $request->validate([
                'name' => 'required|string|max:255',
                'phone_number' => 'nullable|string|max:15',
                'profile_picture' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            ]);
    
            if ($request->hasFile('profile_picture')) {
                $path = $request->file('profile_picture')->store('user_profiles', 'public');
                $user->profile_picture = $path;
            }
    
            $user->update($request->only(['name', 'phone_number']));
        }
    
        // تحديث كلمة المرور
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
    


    // Change user password
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
