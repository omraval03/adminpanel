<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Contest extends Model
{
    use HasFactory;

    // Specify the columns that are mass assignable
    protected $fillable = [
        'title',
        'description',
        'start_date',
        'deadline',
    ];
}
