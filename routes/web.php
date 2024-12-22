<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{
    DashboardController,
    UserController,
    LawyerController,
    ConsultationController,
    CommentController,
    CategoryController,
    FeedbackController,
    AppointmentController,
    MessageController,
    NotificationController,
    LegalLibraryController,
    SubscriptionController
};
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\ConsultationController as UserConsultationController;
use App\Http\Controllers\User\CommentController as UserCommentController;
use App\Http\Controllers\User\FAQController;
use App\Http\Controllers\User\TestimonialController;
use App\Http\Controllers\User\NotificationController as UserNotificationController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

// Redirect root URL to the login page
Route::get('/', fn() => redirect('/admin/login'));

// Include Laravel Breeze routes
require __DIR__ . '/auth.php';

### **1. مسارات المستخدمين والمحامين فقط**
Route::middleware(['auth:web,lawyer'])->prefix('user')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('user.home');


    // صفحة "من نحن"
    Route::view('/about', 'user.about')->name('user.about');

    // استشارات المستخدم
    Route::prefix('consultations')->name('user.consultations.')->group(function () {
        Route::get('/', [UserConsultationController::class, 'index'])->name('index');
        Route::get('/create', [UserConsultationController::class, 'create'])->name('create');
        Route::post('/', [UserConsultationController::class, 'store'])->name('store');
        Route::get('/show/{id}', [UserConsultationController::class, 'show'])->name('show');
        Route::get('/category/{category}', [UserConsultationController::class, 'categoryConsultations'])->name('category');
    });

    // التعليقات
    Route::prefix('comments')->name('user.comments.')->group(function () {
        Route::post('/store', [UserCommentController::class, 'store'])->name('store');
        Route::post('/load/{id}', [UserCommentController::class, 'loadComments'])->name('load');
        Route::delete('/{id}', [UserCommentController::class, 'softDelete'])->name('softDelete');
        Route::put('/update/{id}', [UserCommentController::class, 'update'])->name('update');
    });

    // صفحة الخصوصية
    Route::view('/privacy', 'user.Privacy')->name('user.privacy');

    // الأسئلة الشائعة
    Route::get('/faq', [FAQController::class, 'index'])->name('user.faq');
    Route::post('/faq/store', [FAQController::class, 'store'])->name('user.faq.store');

    // المراجعات
    Route::post('/testimonials', [TestimonialController::class, 'store'])->name('user.testimonials.store');

    // صفحة "اتصل بنا"
    Route::view('/contact', 'user.ContactUs')->name('user.contact');
    Route::post('/notifications/store', [UserNotificationController::class, 'store'])->name('user.notifications.store');

    // مكتبة القوانين
    Route::view('/legal-library', 'user.legal-lib')->name('user.legal-library');
    
});
Route::get('/get-updated-counts', [HomeController::class, 'getUpdatedCounts'])->name('statistics.update');

### **2. مسارات الأدمن فقط**
Route::middleware(['auth', 'role.check'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile/delete/{id}', [ProfileController::class, 'destroy'])->name('destroy');

    Route::middleware(['auth'])->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
    
    // Dashboard route for Admin
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // User Management
    Route::resource('users', UserController::class);
    Route::post('users/{id}/restore', [UserController::class, 'restore'])->name('users.restore');
    Route::delete('users/{id}/force-delete', [UserController::class, 'forceDelete'])->name('users.forceDelete');

    // Lawyer Management
    Route::resource('lawyers', LawyerController::class);
    Route::post('lawyers/{id}/restore', [LawyerController::class, 'restore'])->name('lawyers.restore');
    Route::delete('lawyers/{id}/force-delete', [LawyerController::class, 'forceDelete'])->name('lawyers.forceDelete');

    // Consultation Management
    Route::resource('consultations', ConsultationController::class);
    Route::post('consultations/{id}/restore', [ConsultationController::class, 'restore'])->name('consultations.restore');
    Route::delete('consultations/{id}/force-delete', [ConsultationController::class, 'forceDelete'])->name('consultations.forceDelete');

    // Comment Management
    Route::prefix('comments')->name('comments.')->group(function () {
        Route::get('/', [CommentController::class, 'index'])->name('index');
        Route::post('/{id}/delete', [CommentController::class, 'softDelete'])->name('softDelete');
        Route::post('/{id}/restore', [CommentController::class, 'restore'])->name('restore');
        Route::post('/{id}/force-delete', [CommentController::class, 'forceDelete'])->name('forceDelete');
    });

    // Category Management
    Route::resource('categories', CategoryController::class);
    Route::post('categories/{id}/restore', [CategoryController::class, 'restore'])->name('categories.restore');
    Route::delete('categories/{id}/force-delete', [CategoryController::class, 'forceDelete'])->name('categories.forceDelete');
    

 
    
    // Feedback Management
    Route::resource('feedback', FeedbackController::class);

    // Appointment Management
    Route::resource('appointments', AppointmentController::class);

    // Message Management
    Route::resource('messages', MessageController::class);

    // Notification Management
    Route::resource('notifications', NotificationController::class);

    // Legal Library Management
    Route::resource('legal-library', LegalLibraryController::class);

    // Subscription Management
    Route::resource('subscriptions', SubscriptionController::class);
});

### **3. تسجيل الدخول والتسجيل**
// تسجيل الدخول للمستخدمين والمحامين
Route::get('/user-lawyer/login', [AuthController::class, 'showLoginForm'])->name('user.lawyer.login.form');
Route::post('/user-lawyer/login', [AuthController::class, 'authenticate'])->name('user.lawyer.login');

// التحقق من المستخدمين والمحامين بعد تسجيل الدخول
Route::middleware(['auth:web,lawyer'])->prefix('user')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('user.home');
});
Route::get('/register/user', [AuthController::class, 'showUserRegisterForm'])->name('register.user');
Route::get('/register/lawyer', [AuthController::class, 'showLawyerRegisterForm'])->name('register.lawyer');

Route::post('/register/user', [AuthController::class, 'registerUser'])->name('register.user.submit');
Route::post('/register/lawyer', [AuthController::class, 'registerLawyer'])->name('register.lawyer.submit');
// تسجيل الدخول للأدمن فقط
Route::get('/admin/login', [AuthenticatedSessionController::class, 'create'])->name('admin.login');
Route::post('/admin/login', [AuthenticatedSessionController::class, 'store'])->name('admin.authenticate');
Route::post('/admin/logout', [AuthenticatedSessionController::class, 'destroy'])->name('admin.logout');
