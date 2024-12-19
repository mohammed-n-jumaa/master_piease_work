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
use App\Http\Controllers\User\CommentController as UserCommentController; // تعديل
use App\Http\Controllers\User\FAQController;
use App\Http\Controllers\User\TestimonialController;
use App\Http\Controllers\User\NotificationController as UserNotificationController;

// Redirect root URL to the login page
Route::get('/', fn() => redirect('/login'));

require __DIR__ . '/auth.php';

Route::middleware(['auth', 'verified'])->group(function () {

    // Dashboard route for regular users
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Profile Management Routes
    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [ProfileController::class, 'destroy'])->name('destroy');
    });

    // Home route for regular users
    Route::get('/user/home', [HomeController::class, 'index'])->name('home');

    // About Us page
    Route::get('/about', fn() => view('user.about'))->name('about');

    // Consultation routes for the user
Route::prefix('consultations')->name('consultations.')->group(function () {
    Route::get('/', [UserConsultationController::class, 'index'])->name('index');
    Route::get('/create', [UserConsultationController::class, 'create'])->name('create'); // تم نقل هذا السطر هنا
    Route::post('/', [UserConsultationController::class, 'store'])->name('store');
    Route::get('/show/{id}', [UserConsultationController::class, 'show'])->name('show');
    Route::get('/category/{category}', [UserConsultationController::class, 'categoryConsultations'])->name('category');
});


    Route::prefix('comments')->name('comments.')->group(function () {
        Route::post('/store', [UserCommentController::class, 'store'])->name('store'); // إضافة تعليق
        Route::post('/load/{id}', [UserCommentController::class, 'loadComments'])->name('load'); // تحميل المزيد
        Route::delete('/{id}', [UserCommentController::class, 'softDelete'])->name('softDelete'); // حذف ناعم للتعليق
        Route::put('/update/{id}', [UserCommentController::class, 'update'])->name('update'); // تحديث التعليق

    });
    
    
    Route::view('/privacy', 'user.Privacy')->name('privacy');

    // FAQ Routes
    Route::get('/faq', [FAQController::class, 'index'])->name('faq');
    Route::post('/faq/store', [FAQController::class, 'store'])->name('faq.store');

    // Client Reviews
    Route::post('/testimonials', [TestimonialController::class, 'store'])->name('testimonials.store');

    // Notifications and Contact Page
    Route::view('/contact', 'user.ContactUs')->name('contact');
    Route::post('/notifications/store', [UserNotificationController::class, 'store'])->name('notifications.store');

    // Legal Library Page
    Route::view('/legal-library', 'user.legal-lib')->name('legal-library');

    // Admin Panel Routes
    Route::middleware(['role.check'])->prefix('admin')->name('admin.')->group(function () {

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

    // Fetch updated counts for statistics
    Route::get('/get-updated-counts', [HomeController::class, 'getUpdatedCounts']);
});
