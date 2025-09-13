<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\FaqCategories;

class FaqAskedQuestions extends Model
{
    protected $fillable = [
        'faq_category_id',
        'question',
        'answer',
    ];

    public function faqCategory()
    {
        return $this->belongsTo(FaqCategories::class);
    }
}
