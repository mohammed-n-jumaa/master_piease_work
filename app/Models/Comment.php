<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['consultation_id', 'user_id', 'lawyer_id', 'content'];
    protected $dates = ['deleted_at'];

    /**
     * Relation to User
     * This function ensures the correct relationship with the User model.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    /**
     * Relation to Lawyer
     * This function ensures the correct relationship with the Lawyer model.
     */
    public function lawyer()
    {
        return $this->belongsTo(Lawyer::class, 'lawyer_id');
    }

    /**
     * Relation to Consultation
     */
    public function consultation()
    {
        return $this->belongsTo(Consultation::class);
    }
}
