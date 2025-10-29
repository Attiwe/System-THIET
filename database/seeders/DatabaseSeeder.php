<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\DepartmentSeed;
use Database\Seeders\LevelAccadmicSeed;
use Database\Seeders\DepartmentPlanSeed;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            PermissionSeeder::class,
            SuperAdminSeeder::class,
            AdminUserSeeder::class,
            EbrahimUserSeeder::class,
            TestRoleSeeder::class,
            DepartmentSeed::class,
            LevelAccadmicSeed::class,
            DepartmentPlanSeed::class,
            FacultyMembersSeeder::class,
            DepartmentHeadSeeder::class,
            MasterisDoctoralThesesSeeder::class,
        ]);

    }
}
