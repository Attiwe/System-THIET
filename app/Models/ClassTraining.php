<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassTraining extends Model
{
    protected $table = 'class_trainings';
    protected $fillable = [
        'department_id',
        'class_name',
        'class_image',
    ];
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
