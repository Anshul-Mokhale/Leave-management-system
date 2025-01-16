<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User; // Ensure the User model is imported

class Leave extends Model
{
    use HasFactory;

    protected $fillable = [
        'leave_type',
        'subject',
        'message',
        'attachment',
        'sended_by',
        'status',
        'user_id'
    ];

    // Optional relationship (if needed)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
