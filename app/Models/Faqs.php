<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faqs extends Model
{
     protected $fillable = [
        'department_id',
        'question',
        'answer',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class , 'department_id');
    }

}
