<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InternalPermanency extends Model
{
    protected $table = 'internal_permanencies';
    protected $fillable = [
        'unit_id',
        'file_path',
    ];

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
}
