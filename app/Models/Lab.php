<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lab extends Model
{
    protected $table = 'labs';

    protected $fillable = [
        'department_id',
        'lab_name',
        'lab_pdf',
        'lab_image',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
