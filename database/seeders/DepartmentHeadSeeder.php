<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\DepartmentHead;
use App\Models\FacultyMembers;
use Illuminate\Database\Seeder;

class DepartmentHeadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (Department::query()->count() === 0) {
            $this->command?->warn('No departments found; skipping DepartmentHead seeding.');
            return;
        }

        if (FacultyMembers::query()->count() === 0) {
            $this->command?->warn('No faculty members found; skipping DepartmentHead seeding.');
            return;
        }

        DepartmentHead::factory()->count(10)->create();
    }
}


