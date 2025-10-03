<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class OrganizationStructure extends Model
{
    protected $fillable = [
        'unit_id',
        'file_path',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the unit that owns the organization structure.
     */
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    /**
     * Get the file URL attribute.
     */
    public function getFileUrlAttribute()
    {
        if ($this->file_path) {
            return route('organization-structure.download', $this->file_path);
        }
        return null;
    }

    /**
     * Get the file name attribute.
     */
    public function getFileNameAttribute()
    {
        if ($this->file_path) {
            return basename($this->file_path);
        }
        return null;
    }

    /**
     * Get the file size attribute.
     */
    public function getFileSizeAttribute()
    {
        if ($this->file_path) {
            $filePath = 'public/organization-structures/' . $this->file_path;
            if (Storage::exists($filePath)) {
                $size = Storage::size($filePath);
                return $this->formatFileSize($size);
            }
        }
        return null;
    }

    /**
     * Check if file exists.
     */
    public function getFileExistsAttribute()
    {
        if ($this->file_path) {
            return Storage::exists('public/organization-structures/' . $this->file_path);
        }
        return false;
    }

    /**
     * Get formatted created at attribute.
     */
    public function getFormattedCreatedAtAttribute()
    {
        return $this->created_at->format('d/m/Y - H:i A');
    }

    /**
     * Format file size in human readable format.
     */
    private function formatFileSize($bytes)
    {
        $units = ['B', 'KB', 'MB', 'GB'];
        
        for ($i = 0; $bytes > 1024 && $i < count($units) - 1; $i++) {
            $bytes /= 1024;
        }
        
        return round($bytes, 2) . ' ' . $units[$i];
    }

    /**
     * Boot method to handle model events.
     */
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($organizationStructure) {
            // Delete file when model is deleted
            if ($organizationStructure->file_path) {
                $filePath = 'public/organization-structures/' . $organizationStructure->file_path;
                if (Storage::exists($filePath)) {
                    Storage::delete($filePath);
                }
            }
        });
    }
}
