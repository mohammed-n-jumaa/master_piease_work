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
     * view profile for current user
     */
  public function index()
{
    $user = Auth::user();
    $appointments = $user->appointments()->with('lawyer')->get();
    $consultations = $user->consultations()->with('category')->get();

    return view('user.profile', compact('user', 'appointments', 'consultations'));
}
    public function show($id)
{
    $user = User::findOrFail($id);
    
    // Fetch the appointments and consultations for the user
    $appointments = $user->appointments()->with('lawyer')->get();
    $consultations = $user->consultations()->with('category')->get();

    // Pass all variables to the view
    return view('user.profile', compact('user', 'appointments', 'consultations'));
}

    
   
    /**
     * view edit page
     */
    public function edit()
    {
        $user = Auth::user();
        return view('user.user-profile-edit', compact('user'));
    }

    /**
     * update password and person information
     */
    public function update(Request $request)
    {
        $user = Auth::user();
    
        if ($request->has('current_password')) {
            $request->validate([
                'current_password' => 'required|string',
                'new_password' => 'required|string|min:6|confirmed',
            ]);
    
            if (!Hash::check($request->current_password, $user->password)) {
                return back()->withErrors(['current_password' => 'The current password is incorrect.']);
            }
    
            $user->password = Hash::make($request->new_password);
            $user->save();
    
            return redirect()->route('user.profile')->with('success', 'Password updated successfully.');
        }
    
        // validation
        $request->validate([
            'name' => 'required|string|max:255',
            'phone_number' => 'nullable|string|max:15',
            'profile_picture' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);
    
        // user profile edit
        if ($request->hasFile('profile_picture')) {
            if ($user->profile_picture && file_exists(public_path($user->profile_picture))) {
                unlink(public_path($user->profile_picture));
            }
    
            $fileName = time() . '_' . $request->file('profile_picture')->getClientOriginalName();
            $path = $request->file('profile_picture')->move(public_path('user_profiles'), $fileName);
            $user->profile_picture = 'user_profiles/' . $fileName;
        }
    
        $user->update($request->only(['name', 'phone_number']));
    
        return redirect()->route('user.profile')->with('success', 'Profile updated successfully.');
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
