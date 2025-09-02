<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = 'departments';
    protected $fillable = [
        'name',
        'description',
        'requerd_file',
        'dapart_image',
        'depart_massage',
        'depart_vision',
        'is_active',
    ];

    public function officeStudents()
    {
        return $this->hasMany(OfficeStudent::class);
    }
}
