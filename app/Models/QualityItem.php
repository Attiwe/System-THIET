<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QualityItem extends Model
{
    use SoftDeletes;

    protected $table = 'quality_items';
    protected $fillable = [
        'name',
        'quality_form_id',
    ];

    public function qualityForm()
    {
        return $this->belongsTo(QualityForm::class);
    }
    
}
