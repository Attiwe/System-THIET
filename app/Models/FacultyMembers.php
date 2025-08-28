<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FacultyMembers extends Model
{
    protected $table = 'faculty_members';
    protected $fillable = [
        'name',
        'type',
        'department_id',
        'faculty_code',
        'email',
        'facebook',
        'phone',
        'username',
        'password',
        'appointment_type',
        'appointment_date',
        'personal_image',
        'resume',
        'researches',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
