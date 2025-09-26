<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Scholarships extends Model
{
    protected $fillable = [
        'name',
        'details',
        'image_path',
    ];
}
