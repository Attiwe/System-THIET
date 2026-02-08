<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->delete();
 
        $adminUser = User::create([
            'name' => 'ebrahim',
            'email' => 'ebrahim@gmail.com',
            'password' => 'ebrahim123456', 
            'email_verified_at' => now(),
        ]);
        
        $this->command->info('تم إنشاء مستخدم مدير النظام!');
        $this->command->info('البريد الإلكتروني: ebrahim@gmail.com');
        $this->command->info('كلمة المرور: ebrahim123456');
    }
}
