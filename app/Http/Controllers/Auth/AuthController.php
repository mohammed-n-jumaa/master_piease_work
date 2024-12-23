<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Lawyer;
use App\Models\Category;
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

        $credentials = $request->only('email', 'password');

        // تحقق إذا كان المستخدم العادي
        if (Auth::guard('web')->attempt($credentials)) {
            return redirect()->route('user.home')->with('success', 'Login successful!');
        }

        // تحقق إذا كان المستخدم محامي
        if (Auth::guard('lawyer')->attempt($credentials)) {
            return redirect()->route('user.home')->with('success', 'Login successful!');
        }

        // تحقق إذا كان المستخدم أدمن
        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('admin.dashboard');
        }

        // إذا فشلت جميع المحاولات
        return back()->withErrors([
            'login_error' => 'Invalid email or password.',
        ])->withInput();
    }

    /**
     * تسجيل الخروج
     */
    public function logout(Request $request)
    {
        if (Auth::guard('lawyer')->check()) {
            Auth::guard('lawyer')->logout(); // تسجيل خروج المحامي
        } elseif (Auth::guard('web')->check()) {
            Auth::guard('web')->logout(); // تسجيل خروج المستخدم
        } elseif (Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout(); // تسجيل خروج الأدمن
        }

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('user.lawyer.login.form');
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
        $categories = Category::all(); // جلب جميع التخصصات من جدول categories
        return view('auth.register-lawyer', compact('categories'));
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
        ]);

        $phoneNumber = $request->phone_number;
        if ($phoneNumber && !str_starts_with($phoneNumber, '962')) {
            $phoneNumber = '962' . ltrim($phoneNumber, '0');
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'date_of_birth' => $request->date_of_birth,
            'phone_number' => $phoneNumber,
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
            'phone_number' => 'required|string|regex:/^962[0-9]{9}$/',
            'gender' => 'required|in:male,female',
            'specialization' => 'required|exists:categories,id', // التحقق من أن التخصص موجود في جدول categories
            'date_of_birth' => 'required|date',
            'syndicate_card' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'lawyer_certificate' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $syndicateCardPath = $request->file('syndicate_card')->store('syndicate_cards', 'public');
        $certificatePath = $request->file('lawyer_certificate')->store('lawyer_certificates', 'public');

        Lawyer::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'phone_number' => $request->phone_number,
            'gender' => $request->gender,
            'specialization' => $request->specialization, // تخزين الـ ID الخاص بالتخصص
            'date_of_birth' => $request->date_of_birth,
            'syndicate_card' => $syndicateCardPath,
            'lawyer_certificate' => $certificatePath,
            'lawyer_status' => 'active',
        ]);
        

        return redirect()->route('user.lawyer.login.form')->with('success', 'Lawyer registered successfully!');
    }
}
