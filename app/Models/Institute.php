<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Institute extends Model
{
    protected $table = 'institutes';

    protected $fillable = [
        'setting_id',
        'unit_id',
        'vidio',
        'word',
        'muhadara',
        'values',
        'plan',
        'goals',
        'number',
        'employees',
        'classrooms',
        'graduates',
        'academic_council',
        'structure',
        'strategy',
    ];

    // Relationships
    public function setting()
    {
        return $this->belongsTo(Setting::class);
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
}
