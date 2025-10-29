<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\FacultyMembers;
use App\Models\Roles;
use Illuminate\Database\Seeder;

class FacultyMembersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (Roles::query()->count() === 0) {
            $this->command?->warn('No roles found; skipping FacultyMembers seeding.');
            return;
        }

        if (Department::query()->count() === 0) {
            $this->command?->warn('No departments found; skipping FacultyMembers seeding.');
            return;
        }

        FacultyMembers::factory()->count(25)->create();
    }
}


