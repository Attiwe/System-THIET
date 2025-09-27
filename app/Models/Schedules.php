<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedules extends Model
{
    
    protected $fillable = [
        'type',
        'level_id',
        'department_id',
        'academic_year',
        'file_path',
    ];

    public function levelAcademic()
    {
        return $this->belongsTo(LevelAccadmic::class , 'level_id');
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }   
}
