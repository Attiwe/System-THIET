<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LecturesDecisions extends Model
{
    protected $table = 'lectures_decisions';
    protected $fillable = [
        'unit_id',
        'title',
        'file_path',
    ];

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }   
}
