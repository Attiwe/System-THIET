<?php

namespace Database\Seeders;

use App\Models\PublishingAwards;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PublishingAwardsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create 20 fake publishing awards using the factory
        PublishingAwards::factory()->count(20)->create();
        
        $this->command->info('تم إنشاء 20 جائزة نشر وهمية بنجاح!');
    }
}

