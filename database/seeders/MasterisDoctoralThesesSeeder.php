<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\MasterisDoctoralTheses;
use Illuminate\Database\Seeder;

class MasterisDoctoralThesesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (Department::query()->count() === 0) {
            $this->command?->warn('No departments found; skipping MasterisDoctoralTheses seeding.');
            return;
        }
        MasterisDoctoralTheses::factory()->count(20)->create();
    }
}


