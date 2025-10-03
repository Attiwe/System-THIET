<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeputyDirector extends Model
{
    protected $table = 'deputy_directors';
    protected $fillable = [
        'unit_id',
        'name',
        'deputy_director',
       
    ];
    
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
}
