<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // إنشاء مستخدم مدير في جدول users
        $adminUser = User::create([
            'name' => 'مدير النظام',
            'email' => 'admin@college.edu',
            'password' => 'admin123456', 
            'email_verified_at' => now(),
        ]);

        $this->command->info('تم إنشاء مستخدم مدير النظام!');
        $this->command->info('البريد الإلكتروني: admin@college.edu');
        $this->command->info('كلمة المرور: admin123456');
    }
}
