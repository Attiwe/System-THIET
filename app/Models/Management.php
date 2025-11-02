<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Management extends Model
{
      
     protected $fillable = [
        'name',
        'position',
        'resume',
        'description',
        'facebook',
        'twitter',
        'instagram',
        'linkedin',
        'image',
    ];
}
