<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ScientificTrip extends Model
{
    protected $table = 'scientific_trips';

    protected $fillable = [
        'department_id',
        'doctor_name',
        'trip_name',
        'description',
        'trip_image',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
