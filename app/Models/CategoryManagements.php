<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryManagements extends Model
{
    protected $table = 'category_managements';
    protected $fillable = [
        'dean',
        'vice_dean_students',
        'secretary',
        'account_manager',
        'hr_manager',
        'student_affairs_manager',
        'it_manager',
        'civil_head',
    ];
}
