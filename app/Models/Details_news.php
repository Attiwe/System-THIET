<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Details_news extends Model
{
    protected $table = 'details_news';
    protected $fillable = [
        'title',
        'description',
        'publisher',
        'new_element_id',
        'image',
         
    ];
    public function newElement()
    {
        return $this->belongsTo(NewElements::class,'new_element_id');
    }
}
