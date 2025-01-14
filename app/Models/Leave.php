<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'leaves';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'userid',
        'type_of_leave',
        'subject',
        'content',
        'file',
    ];

    /**
     * Get the user associated with the leave.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'userid');
    }
}
