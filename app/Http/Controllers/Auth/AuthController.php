<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Lawyer;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * عرض صفحة تسجيل الدخول
     */
    public function showLoginForm()
    {
        return view('auth.user-lawyer-login');
    }

    /**
     * معالجة تسجيل الدخول
     */
    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        // التحقق من بيانات المستخدم
        $user = \App\Models\User::where('email', $request->email)->first();
        if ($user && \Hash::check($request->password, $user->password)) {
            Auth::guard('web')->login($user, $request->boolean('remember'));
            return redirect()->route('user.home'); // توجيه المستخدم للصفحة الرئيسية
        }
    
        // التحقق من بيانات المحامي
        $lawyer = \App\Models\Lawyer::where('email', $request->email)->first();
        if ($lawyer && \Hash::check($request->password, $lawyer->password)) {
            Auth::guard('lawyer')->login($lawyer, $request->boolean('remember'));
            return redirect()->route('user.home'); // توجيه المحامي للصفحة الرئيسية نفسها
        }
    
        // إذا فشلت جميع المحاولات
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->withInput();
    }

    /**
     * عرض صفحة التسجيل للمستخدم
     */
    public function showUserRegisterForm()
    {
        return view('auth.register-user');
    }

    /**
     * عرض صفحة التسجيل للمحامي
     */
    public function showLawyerRegisterForm()
    {
        return view('auth.register-lawyer');
    }

    /**
     * تسجيل المستخدم
     */
    public function registerUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'date_of_birth' => 'required|date',
            'phone_number' => 'nullable|string|max:15',
            'profile_picture' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $profilePicturePath = $request->file('profile_picture')->store('profile_pictures', 'public');

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'date_of_birth' => $request->date_of_birth,
            'phone_number' => $request->phone_number,
            'profile_picture' => $profilePicturePath,
        ]);

        return redirect()->route('user.lawyer.login.form')->with('success', 'User registered successfully!');
    }

    /**
     * تسجيل المحامي
     */
    public function registerLawyer(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:lawyers',
            'password' => 'required|min:6',
            'phone_number' => 'required|string|max:15',
            'gender' => 'required|in:male,female',
            'specialization' => 'nullable|string|max:255',
            'date_of_birth' => 'required|date',
            'profile_picture' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'syndicate_card' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'lawyer_certificate' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $profilePicturePath = $request->file('profile_picture')->store('profile_pictures', 'public');
        $syndicateCardPath = $request->file('syndicate_card')->store('syndicate_cards', 'public');
        $certificatePath = $request->file('lawyer_certificate')->store('lawyer_certificates', 'public');

        Lawyer::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'phone_number' => $request->phone_number,
            'gender' => $request->gender,
            'specialization' => $request->specialization,
            'date_of_birth' => $request->date_of_birth,
            'profile_picture' => $profilePicturePath,
            'syndicate_card' => $syndicateCardPath,
            'lawyer_certificate' => $certificatePath,
            'lawyer_status' => 'active', // الحالة الافتراضية
        ]);

        return redirect()->route('user.lawyer.login.form')->with('success', 'Lawyer registered successfully!');
    }
}
