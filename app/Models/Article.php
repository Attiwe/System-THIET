<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';
    protected $fillable = [
        'title',
        'description',
        'date',
        'image_article',
        'is_active',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }


}
