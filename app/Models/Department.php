<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = 'departments';
    protected $fillable = [
        'name',
        'description',
        'depart_vision',
        'depart_massage',
    ];

    public function officeStudents()
    {
        return $this->hasMany(OfficeStudent::class);
    }
}
