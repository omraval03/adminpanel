<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class DemoCategorySelection extends Model
{
    use HasFactory;

    protected $table = 'demo_category_selections'; // Set correct table name

    protected $fillable = ['category_name', 'entries', 'total_price'];
}
