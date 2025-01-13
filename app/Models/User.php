<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // Extend Authenticatable
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable // Extend the Authenticatable class
{
    use HasFactory;

    // Specify the table name if it's not the plural form of the model name
    protected $table = 'users';

    // Fields that are mass assignable
    protected $fillable = [
        'name',
        'email',
        'phone',
        'age',
        'designation',
        'job_id',
        'password',
        'gender',
        'is_admin',
    ];

    // Optionally, specify which attributes should be cast (e.g., for dates)
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Optionally, specify the attributes that should be hidden for arrays (e.g., password)
    protected $hidden = [
        'password',
    ];
}