<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LevelAccadmic extends Model
{
    protected $table = 'level_accademics'; 
    protected $fillable = [
         'level_name',
    ];

    public function officeStudents()
    {
        return $this->hasMany(OfficeStudent::class);
    }
}
