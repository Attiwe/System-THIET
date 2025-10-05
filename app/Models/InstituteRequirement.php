<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InstituteRequirement extends Model
{
    protected $table = 'institute_requirements';

    protected $fillable = [
        'department_id',
        'file_path',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
