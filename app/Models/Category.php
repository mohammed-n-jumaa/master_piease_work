<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    // تحديد الحقول القابلة للملء
    protected $fillable = ['name', 'icon', 'description'];

    /**
     * العلاقات
     */
    // علاقة الفئة مع الاستشارات
    public function consultations()
    {
        return $this->hasMany(Consultation::class, 'category_id');
    }

    // علاقة الفئة مع المكتبة القانونية
    public function legalLibrary()
    {
        return $this->hasMany(LegalLibrary::class, 'category_id');
    }

    /**
     * Scope لتصفية الفئات النشطة
     */
    public function scopeActive($query)
    {
        return $query->whereNull('deleted_at');
    }

    /**
     * للحصول على حالة الفئة (مفتوحة أو محذوفة)
     */
    public function getStatusAttribute()
    {
        return $this->deleted_at ? 'Deleted' : 'Active';
    }

    /**
     * يمكن إضافة أي توابع أخرى هنا مثل التحقق من الحقول أو التصفية.
     */
}
