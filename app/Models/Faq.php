<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;

    // السماح لملء البيانات
    protected $fillable = ['user_id', 'lawyer_id', 'question', 'answer'];

    // علاقة مع المستخدم (إذا كان السؤال الشائع يتبع المستخدم)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // علاقة مع المحامي (إذا كان السؤال الشائع يتبع المحامي)
    public function lawyer()
    {
        return $this->belongsTo(Lawyer::class);
    }
}
