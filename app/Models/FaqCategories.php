<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FaqCategories extends Model
{
    protected $table = 'faq_categories';
    protected $fillable = [
        'name',
    ];
    
}
