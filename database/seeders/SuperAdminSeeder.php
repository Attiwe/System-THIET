<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Roles;
use App\Models\Permission;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       
        $superAdminRole = Roles::create([
            'role' => 'مدير عام',
            'email' => 'ebrahim@gmail.com',
            'password' => 'ebrahim123456',  
        ]);

    
        $allPermissions = Permission::all();
        $superAdminRole->permissions()->attach($allPermissions->pluck('id'));

        $this->command->info('تم إنشاء مدير عام بنجاح!');
        $this->command->info('البريد الإلكتروني: ebrahim@gmail.com');
        $this->command->info('كلمة المرور: ebrahim123456');
        $this->command->info('الصلاحيات: جميع الصلاحيات (' . $allPermissions->count() . ' صلاحية)');
    }
}
