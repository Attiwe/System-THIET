<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeanSpeech extends Model
{
    protected $table = 'dean_speeches';
    protected $fillable = [
        'management_name',
        'title',
        'resume',
        'image',
    ];


}
