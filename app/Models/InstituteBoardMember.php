<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\FacultyMembers;

class InstituteBoardMember extends Model
{
    use SoftDeletes;
    protected $table = 'institute_board_members';

    protected $fillable = [
        'faculty_members_id',
        'type',
        'description',
    ];
    public function facultyMembers()
    {
        return $this->belongsTo(FacultyMembers::class);
    }
}
