<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImportantLink extends Model
{
    protected $table = 'important_links';
    protected $fillable = [
        'title',
        'url',
    ];
}
