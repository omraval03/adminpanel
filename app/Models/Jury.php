<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jury extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'specialization',
        'password',
        'profile_picture',
    ];
    
    protected $hidden = ['password'];
    
}
