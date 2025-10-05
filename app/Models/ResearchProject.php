<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResearchProject extends Model
{
    protected $table = 'research_projects';
    protected $fillable = [
        'department_id',
        'doctor_name',
        'research_name',
        'research_title',
        'research_summary',
        'file_path',
        'image',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
