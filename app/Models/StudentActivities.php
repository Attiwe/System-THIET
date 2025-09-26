<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentActivities extends Model
{
    protected $fillable = [
        'activity_id',
        'title',
        'details',
        'image',
    ];

    public function activity()
    {
        return $this->belongsTo(Activities::class);
    }
}
