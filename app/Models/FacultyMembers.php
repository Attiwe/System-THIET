<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacultyMembers extends Model
{
    use HasFactory;
    protected $table = 'faculty_members';
    protected $fillable = [
        'name',
        'type',
        'roles_id',
        'department_id',
        'faculty_code',
        'email',
        'facebook',
        'phone',
        'username',
        'password',
        'appointment_type',
        'appointment_date',
        'personal_image',
        'resume',
        'researches',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function role()
    {
        return $this->belongsTo(Roles::class, 'roles_id');
    }

    public function hasPermission($key)
    {
        $roles =  $this->role;
        if (!$roles) {
            return false;
        }
        foreach ($roles->permissions as $permission) {
            if ($permission == $key ?? ' ') {
                return true;
            }
        }
    }
}
