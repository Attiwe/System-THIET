<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VideosDepartment extends Model
{
    protected $fillable = ['department_id', 'video'];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
