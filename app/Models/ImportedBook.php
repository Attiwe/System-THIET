<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImportedBook extends Model
{
    use HasFactory;

    protected $fillable = [
        'issue_date',
        'row_number',
        'book_name',
        'author',
        'general_number',
        'topics',
    ];
}


