<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeanSpeech extends Model
{
    protected $table = 'dean_speeches';
    protected $fillable = [
        'title',
        'management_id',
        

    ];

    public function management()
    {
        return $this->belongsTo(Management::class);
    }

}
