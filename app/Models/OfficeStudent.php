<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Department;
use App\Models\LevelAccadmic;

class OfficeStudent extends Model
{
    protected $table = 'office_students';  
 
    protected $fillable = [
        'department_id',
        'level_id',
        'name',
        'ID',
        'email',
        'phone',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class,'department_id' );
    }

    public function level()
    {
        return $this->belongsTo(LevelAccadmic::class,'level_id');
    }
}
