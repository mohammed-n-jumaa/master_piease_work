<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $table = 'notifications';

    protected $fillable = [
        'user_id',
        'message',
        'status',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function lawyer()
{
    return $this->belongsTo(Lawyer::class, 'user_id');
}
}
