<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentProject extends Model
{
    protected $table = 'student_projects';
    protected $fillable = [
        'department_id',
        'doctor_name',
        'project_name',
        'description',
        'image_work',
        'project_pdf',
    ];
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
