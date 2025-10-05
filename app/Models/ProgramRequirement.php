<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgramRequirement extends Model
{
    protected $table = 'program_requirements';

    protected $fillable = [
        'department_id',
        'file_path',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
