<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Roles;
use App\Models\Permission;

class AdminProtectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // البحث عن المدير العام
        $adminRole = Roles::where('email', 'admin@college.edu')->first();
        
        if ($adminRole) {
            // الحصول على جميع الصلاحيات
            $allPermissions = Permission::all();
            
            // إعطاء جميع الصلاحيات للمدير العام
            $adminRole->permissions()->sync($allPermissions->pluck('id'));
            
            $this->command->info('تم تأمين المدير العام بنجاح!');
            $this->command->info('البريد الإلكتروني: admin@college.edu');
            $this->command->info('الصلاحيات: جميع الصلاحيات (' . $allPermissions->count() . ' صلاحية)');
        } else {
            $this->command->error('المدير العام غير موجود! يرجى تشغيل SuperAdminSeeder أولاً.');
        }
    }
}