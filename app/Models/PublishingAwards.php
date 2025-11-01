<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublishingAwards extends Model
{
    use HasFactory;
    
    protected $table = 'publishing_awards';
    protected $fillable = ['doctor_name', 'award_name', 'award_date', 'project_file'];
}
