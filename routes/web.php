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
use App\Http\Controllers\User\LawyerProfileController;
use App\Http\Controllers\User\ReviewController;// Redirect root URL to the login page
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
    Route::get('/show/{id}', [UserConsultationController::class, 'show'])->name('show');
    Route::get('/category/{category}', [UserConsultationController::class, 'categoryConsultations'])->name('category');

    // صفحة إضافة الاستشارة محمية بـ Middleware
    Route::middleware(['user.only'])->group(function () {
        Route::get('/create', [UserConsultationController::class, 'create'])->name('create');
        Route::post('/', [UserConsultationController::class, 'store'])->name('store');
    });
});


    Route::prefix('comments')
    ->name('user.comments.')
    ->middleware(['auth:web,lawyer']) // تحقق من أن المستخدم مسجل الدخول
    ->group(function () {
        Route::post('/store', [UserCommentController::class, 'store'])->name('store');
        Route::post('/load-more', [UserCommentController::class, 'loadMore'])->name('loadMore');
        Route::post('/delete', [UserCommentController::class, 'softDelete'])->name('delete');
        Route::post('/update', [UserCommentController::class, 'update'])->name('update');
    });

    

    // صفحة الخصوصية
    Route::view('/privacy', 'user.Privacy')->name('user.privacy');

    // الأسئلة الشائعة
    Route::get('/faq', [FAQController::class, 'index'])->name('user.faq');
    Route::post('/faq/store', [FAQController::class, 'store'])->name('user.faq.store');

    // المراجعات
    Route::post('/testimonials', [TestimonialController::class, 'store'])->name('user.testimonials.store');
    Route::post('/testimonials/{id}/activate', [TestimonialController::class, 'activate'])->name('testimonials.activate');

    // صفحة "اتصل بنا"
    Route::view('/contact', 'user.ContactUs')->name('user.contact');
    Route::post('/notifications/store', [UserNotificationController::class, 'store'])->name('user.notifications.store');

    // مكتبة القوانين
    Route::view('/legal-library', 'user.legal-lib')->name('user.legal-library');
    
    
});
// Lawyer Profile and Appointments Routes
Route::prefix('lawyer')->middleware('auth:lawyer')->group(function () {
    // Profile Routes
    Route::get('/profile', [LawyerProfileController::class, 'index'])->name('lawyer.profile');
    Route::get('/profile/edit', [LawyerProfileController::class, 'edit'])->name('lawyer.profile.edit');
    Route::post('/profile/update', [LawyerProfileController::class, 'update'])->name('lawyer.profile.update');
    Route::post('/profile/change-password', [LawyerProfileController::class, 'changePassword'])->name('lawyer.profile.change-password');
    
    // Route for canceling an appointment
    Route::put('/appointments/cancel/{id}', [\App\Http\Controllers\User\AppointmentController::class, 'cancelAppointment'])->name('appointments.cancel');

    // Appointment Management by Lawyer
    Route::prefix('appointments')->group(function () {
        // Optional: View for creating appointments
        Route::get('/create', function () {
            return view('lawyer.create-appointment');
        })->name('appointments.create');

        // Route to store available appointment slots
        Route::post('/store', [\App\Http\Controllers\User\AppointmentController::class, 'createAvailableSlots'])->name('appointments.store');
    });
});




// User Profile and Appointments Routes
Route::middleware(['auth:web'])->prefix('user')->group(function () {
    // Profile Routes
    Route::get('/profile', [App\Http\Controllers\User\UserProfileController::class, 'index'])->name('user.profile');
    Route::get('/profile/edit', [App\Http\Controllers\User\UserProfileController::class, 'edit'])->name('user.profile.edit');
    Route::post('/profile/update', [App\Http\Controllers\User\UserProfileController::class, 'update'])->name('user.profile.update');

    // Appointment Booking by User
    Route::prefix('appointments')->group(function () {
        Route::get('/available', [\App\Http\Controllers\User\AppointmentController::class, 'showAvailableAppointments'])->name('user.appointments.available');
        Route::post('/appointments/book', [\App\Http\Controllers\User\AppointmentController::class, 'bookAppointment'])->name('appointments.book');
        Route::post('/reviews/store', [ReviewController::class, 'store'])->name('reviews.store');
    });
});

Route::get('/search', [\App\Http\Controllers\User\SearchController::class, 'search'])->name('search');
// عرض الملف الشخصي لأي مستخدم
Route::get('/user/profile/{id}', [\App\Http\Controllers\User\UserProfileController::class, 'show'])
    ->name('user.profile.show');

// عرض الملف الشخصي لأي محامٍ
Route::get('/lawyer/profile/{id}', [\App\Http\Controllers\User\LawyerProfileController::class, 'show'])
    ->name('lawyer.profile.show');

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
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// تسجيل الدخول للأدمن فقط
Route::get('/admin/login', [AuthenticatedSessionController::class, 'create'])->name('admin.login');
Route::post('/admin/login', [AuthenticatedSessionController::class, 'store'])->name('admin.authenticate');
Route::post('/admin/logout', [AuthenticatedSessionController::class, 'destroy'])->name('admin.logout');
