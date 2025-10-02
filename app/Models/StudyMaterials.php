<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudyMaterials extends Model
{
    protected $fillable = [
        'study_material',
        'department_id',
        'level_id',
    ];
    
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function level()
    {
        return $this->belongsTo(LevelAccadmic::class);
    }
    
}
