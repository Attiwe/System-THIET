<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class DepartmentPlan extends Model
{
    protected $table = 'department_plans';
    
    protected $fillable = [
        'department_id',      
        'research_plan',
        'law',
        'department_book',
        'council',
        'courses',
    ];

    /**
     * Get the department that owns the plan
     */
    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id', 'id');
    }

    /**
     * Get the full URL for research plan file
     */
    public function getResearchPlanUrlAttribute()
    {
        return $this->research_plan ? asset('storage/department_plans/' . $this->research_plan) : null;
    }

    /**
     * Get the full URL for law file
     */
    public function getLawUrlAttribute()
    {
        return $this->law ? asset('storage/department_plans/' . $this->law) : null;
    }

    /**
     * Get the full URL for department book file
     */
    public function getDepartmentBookUrlAttribute()
    {
        return $this->department_book ? asset('storage/department_plans/' . $this->department_book) : null;
    }

    /**
     * Get the full URL for council file
     */
    public function getCouncilUrlAttribute()
    {
        return $this->council ? asset('storage/department_plans/' . $this->council) : null;
    }

    /**
     * Get the full URL for courses file
     */
    public function getCoursesUrlAttribute()
    {
        return $this->courses ? asset('storage/department_plans/' . $this->courses) : null;
    }

    /**
     * Delete associated files when model is deleted
     */
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($departmentPlan) {
            // Delete files from storage
            if ($departmentPlan->research_plan) {
                Storage::disk('public')->delete('department_plans/' . $departmentPlan->research_plan);
            }
            if ($departmentPlan->law) {
                Storage::disk('public')->delete('department_plans/' . $departmentPlan->law);
            }
            if ($departmentPlan->department_book) {
                Storage::disk('public')->delete('department_plans/' . $departmentPlan->department_book);
            }
            if ($departmentPlan->council) {
                Storage::disk('public')->delete('department_plans/' . $departmentPlan->council);
            }
            if ($departmentPlan->courses) {
                Storage::disk('public')->delete('department_plans/' . $departmentPlan->courses);
            }
        });
    }
}
