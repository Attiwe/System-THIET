<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepartmentHead extends Model
{
    use HasFactory;
    protected $table = 'department_heads';
    protected $fillable = [
        'department_id',
        'faculty_members_id',   
        'scientific_experiences',
        'achievements',
        'name',
    ];
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
    public function facultyMembers()
    {
        return $this->belongsTo(FacultyMembers::class, 'faculty_members_id');
    }
}
