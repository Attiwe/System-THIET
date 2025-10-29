<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterisDoctoralTheses extends Model
{
  use HasFactory;
   protected $table = 'masteris_doctoral_theses';
  protected $fillable = [
        'department_id',
        'doctor_name',
        'title_thesis',
        'description',
        'thesis_pdf',
        'type',
    ];
    public function department()
    {
        return $this->belongsTo(Department::class);
    }


    public static array $enumType = [
        ['value' => 'master', 'label' => 'الماجستير'],
        ['value' => 'doctoral', 'label' => 'الدكتوراه'],
        ['value' => 'other', 'label' => 'غير ذلك'],
    ];
   
 }
