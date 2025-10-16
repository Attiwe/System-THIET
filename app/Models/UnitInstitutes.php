<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UnitInstitutes extends Model
{
    protected $table = 'unit_institutes';
    protected $fillable = [
        'vision',
        'message',
        'image',
        'description',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('status', true);
    }

    
}
