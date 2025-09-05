<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LibraryOpinion extends Model
{
    protected $table = 'library_opinions';
    protected $fillable = [
        'number_library',
        'number_prizes',
        'image_student',
        'image_library',
    ];
}
