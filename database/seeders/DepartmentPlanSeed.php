<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DepartmentPlan;
use App\Models\Department;

class DepartmentPlanSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get all departments
        $departments = Department::where('is_active', true)->get();
        
        if ($departments->isEmpty()) {
            $this->command->info('No active departments found. Please run DepartmentSeed first.');
            return;
        }
        
        // Create department plans for each department
        foreach ($departments as $department) {
            DepartmentPlan::create([
                'department_id' => $department->id,
                'research_plan' => 'research_plan_' . $department->id . '.pdf',
                'law' => 'law_' . $department->id . '.pdf',
                'department_book' => 'department_book_' . $department->id . '.pdf',
                'council' => 'council_' . $department->id . '.pdf',
                'courses' => 'courses_' . $department->id . '.pdf',
            ]);
        }
        
        // Create additional plans to test pagination
        for ($i = 1; $i <= 5; $i++) {
            DepartmentPlan::create([
                'department_id' => $departments->random()->id,
                'research_plan' => 'additional_research_' . $i . '.pdf',
                'law' => 'additional_law_' . $i . '.pdf',
                'department_book' => 'additional_book_' . $i . '.pdf',
                'council' => 'additional_council_' . $i . '.pdf',
                'courses' => 'additional_courses_' . $i . '.pdf',
            ]);
        }
        
        $this->command->info('Department plans seeded successfully!');
    }
}
