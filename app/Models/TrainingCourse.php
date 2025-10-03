<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrainingCourse extends Model
{
    protected $table = 'training_courses';
    protected $fillable = [
        'unit_id',
        'workshop_name',
        'lecturer_name',
        'details',
        'image',
    ];

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
}
