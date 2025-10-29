<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Permission;

class EbrahimUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // إنشاء المستخدم إبراهيم مع جميع الصلاحيات
        $ebrahimUser = User::updateOrCreate(
            ['email' => 'ebrahim@gmail.com'],
            [
                'name' => 'إبراهيم',
                'email' => 'ebrahim@gmail.com',
                'password' => 'ebrahim123456',
                'email_verified_at' => now(),
                'is_protected' => true,
            ]
        );

        // إضافة جميع الصلاحيات المتاحة
        $allPermissions = Permission::all();
        if ($allPermissions->count() > 0) {
            $ebrahimUser->permissions()->sync($allPermissions->pluck('id'));
            $this->command->info("تم إنشاء المستخدم إبراهيم مع {$allPermissions->count()} صلاحية");
        } else {
            $this->command->warn("لا توجد صلاحيات متاحة لإضافتها للمستخدم إبراهيم");
        }

        $this->command->info("المستخدم إبراهيم:");
        $this->command->info("- البريد الإلكتروني: ebrahim@gmail.com");
        $this->command->info("- كلمة المرور: ebrahim123456");
        $this->command->info("- عدد الصلاحيات: {$ebrahimUser->permissions->count()}");
        $this->command->info("- محمي من الحذف: نعم");
        $this->command->info("- مدير عام: نعم");
    }
}
