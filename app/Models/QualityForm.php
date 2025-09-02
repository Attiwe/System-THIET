<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;   

class QualityForm extends Model
{
    use SoftDeletes;
    protected $table = 'quality_forms';
    protected $fillable = ['name', 'description','is_active'];

   public function scopeActive($query)
   {
       return $query->where('is_active', true);
   } 
}
