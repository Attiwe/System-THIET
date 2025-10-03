<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImportantFiles extends Model
{
    protected $table = 'important_files';
    protected $fillable = [
        'unit_id',
        'title',
        'file_path',
    ];

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
}
