<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class detailsNews extends Model
{
    public $table = 'details_news';
    protected $fillable = [
        'title',
        'image',
        'description',
    ];
}
