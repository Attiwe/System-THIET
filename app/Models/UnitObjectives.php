<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class UnitObjectives extends Model
{
    protected $fillable = [
        'unit_id',
        'text',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the unit that owns the unit objectives.
     */
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    /**
     * Get the text excerpt attribute.
     */
    public function getTextExcerptAttribute()
    {
        return Str::limit($this->text, 100);
    }

    /**
     * Get the formatted created at attribute.
     */
    public function getFormattedCreatedAtAttribute()
    {
        return $this->created_at->format('d/m/Y - H:i A');
    }

    /**
     * Get the word count attribute.
     */
    public function getWordCountAttribute()
    {
        return str_word_count($this->text);
    }

    /**
     * Get the character count attribute.
     */
    public function getCharacterCountAttribute()
    {
        return mb_strlen($this->text, 'UTF-8');
    }

    /**
     * Scope to search objectives by text.
     */
    public function scopeSearch($query, $search)
    {
        if ($search) {
            return $query->where('text', 'like', "%{$search}%")
                        ->orWhereHas('unit', function($q) use ($search) {
                            $q->where('name', 'like', "%{$search}%");
                        });
        }
        return $query;
    }
}
