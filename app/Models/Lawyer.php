<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lawyer extends Authenticatable
{
    use HasFactory, SoftDeletes;

    // تمكين الحقول القابلة للملء
    protected $fillable = [
        'first_name', 
        'last_name', 
        'email',
        'password', 
        'phone_number',
        'gender', 
        'specialization',
        'date_of_birth',
        'profile_picture', 
        'syndicate_card',
        'lawyer_certificate',
        'lawyer_status',
    ];
    
    // إخفاء كلمة المرور ورمز التذكر
    protected $hidden = ['password', 'remember_token'];

    // تحويل التاريخ إلى نوع "تاريخ"
    protected $casts = [
        'date_of_birth' => 'date',
    ];

    // علاقة مع المواعيد (appointments)
    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    // علاقة مع المراجعات (feedback)
    public function feedback()
    {
        return $this->hasMany(Feedback::class);
    }

    // علاقة مع الاشتراكات (subscriptions)
    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

    // علاقة مع مكتبة القوانين (legalLibrary)
    public function legalLibrary()
    {
        return $this->hasMany(LegalLibrary::class);
    }

    // علاقة مع الشهادات (testimonials)
    public function testimonials()
    {
        return $this->hasMany(Testimonial::class);
    }

    // علاقة مع الأسئلة الشائعة (faqs)
    public function faqs()
    {
        return $this->hasMany(Faq::class);
    }
}
