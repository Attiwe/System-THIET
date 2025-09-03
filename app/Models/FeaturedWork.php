<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FeaturedWork extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'image',
        'title',
        'details',
        'is_active',
    ];

}
