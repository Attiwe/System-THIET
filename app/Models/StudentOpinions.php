<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentOpinions extends Model
{
    use SoftDeletes;

    protected $table = 'student_opinions';

    protected $fillable = [
        'name',
        'title',
        'image',
        'details',
        'is_active'
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }
 
}
