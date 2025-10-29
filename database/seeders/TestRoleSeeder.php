<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Roles;
use App\Models\Permission;

class TestRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // // إنشاء صلاحية محدودة للاختبار
        // $limitedRole = Roles::create([
        //     'role' => 'مدير محدود',
        //     'email' => 'limited@college.edu',
        //     'password' => 'limited123456',
        // ]);

        // // إعطاء صلاحيات محدودة فقط
        // $limitedPermissions = Permission::whereIn('name', [
        //     'roles.read',
        //     'permissions.read',
        //     'users.read',
        //     'faculty.read',
        //     'departments.read',
        //     'articles.read',
        // ])->get();

        // $limitedRole->permissions()->attach($limitedPermissions->pluck('id'));

        // $this->command->info('تم إنشاء صلاحية محدودة بنجاح!');
        // $this->command->info('البريد الإلكتروني: limited@college.edu');
        // $this->command->info('كلمة المرور: limited123456');
        // $this->command->info('الصلاحيات: قراءة الصلاحيات فقط');

        // // إنشاء صلاحية للطلاب
        // $studentRole = Roles::create([
        //     'role' => 'طالب',
        //     'email' => 'student@college.edu',
        //     'password' => 'student123456',
        // ]);

        // // إعطاء صلاحيات للطلاب
        // $studentPermissions = Permission::whereIn('name', [
        //     'students.read',
        //     'student_projects.read',
        //     'student_projects.create',
        //     'student_results.read',
        //     'articles.read',
        //     'library.read',
        // ])->get();

        // $studentRole->permissions()->attach($studentPermissions->pluck('id'));

        // $this->command->info('تم إنشاء صلاحية الطالب بنجاح!');
        // $this->command->info('البريد الإلكتروني: student@college.edu');
        // $this->command->info('كلمة المرور: student123456');
        // $this->command->info('الصلاحيات: صلاحيات الطالب');
    }
}