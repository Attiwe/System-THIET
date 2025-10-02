<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class StudentResult extends Model
{
    protected $table = 'student_results';
    protected $fillable = [
        'department_id',
        'level_id',
        'type',
        'academic_year',
        'example_file',
    ];

    protected $casts = [
        'academic_year' => 'date',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
    
    public function level()
    {
        return $this->belongsTo(LevelAccadmic::class);
    }

    /**
     * Get the file URL
     */
    public function getFileUrlAttribute()
    {
        if ($this->example_file) {
            return route('student-results.download', basename($this->example_file));
        }
        return null;
    }

    /**
     * Get the file name
     */
    public function getFileNameAttribute()
    {
        if ($this->example_file) {
            return basename($this->example_file);
        }
        return null;
    }

    /**
     * Get the file size
     */
    public function getFileSizeAttribute()
    {
        if ($this->example_file && Storage::disk('public')->exists($this->example_file)) {
            $bytes = Storage::disk('public')->size($this->example_file);
            return $this->formatBytes($bytes);
        }
        return null;
    }

    /**
     * Check if file exists
     */
    public function getFileExistsAttribute()
    {
        if ($this->example_file) {
            return Storage::disk('public')->exists($this->example_file);
        }
        return false;
    }

    /**
     * Format bytes to human readable format
     */
    private function formatBytes($bytes, $precision = 2)
    {
        $units = array('B', 'KB', 'MB', 'GB', 'TB');
        
        for ($i = 0; $bytes > 1024 && $i < count($units) - 1; $i++) {
            $bytes /= 1024;
        }
        
        return round($bytes, $precision) . ' ' . $units[$i];
    }

    /**
     * Boot method to handle file deletion
     */
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($studentResult) {
            // Delete the file when the record is deleted
            if ($studentResult->example_file && Storage::disk('public')->exists($studentResult->example_file)) {
                Storage::disk('public')->delete($studentResult->example_file);
            }
        });
    }
}
