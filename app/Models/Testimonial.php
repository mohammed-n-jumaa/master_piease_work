<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    // السماح لملء البيانات
    protected $fillable = ['user_id', 'lawyer_id', 'name', 'profession', 'message'];

    // علاقة مع المستخدم
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // علاقة مع المحامي
    public function lawyer()
    {
        return $this->belongsTo(Lawyer::class);
    }
}
