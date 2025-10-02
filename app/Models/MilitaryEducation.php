<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MilitaryEducation extends Model
{
    protected $table = 'military_education';
    protected $fillable = [
        'description',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the description truncated
     */
    // public function getDescriptionExcerptAttribute()
    // {
    //     return \Str::limit($this->description, 200);
    // }

    /**
     * Get the formatted created date
     */
    public function getFormattedCreatedAtAttribute()
    {
        return $this->created_at->format('Y-m-d H:i');
    }

    /**
     * Scope for searching
     */
    // public function scopeSearch($query, $term)
    // {
    //     return $query->where('description', 'like', "%{$term}%");
    // }
}
