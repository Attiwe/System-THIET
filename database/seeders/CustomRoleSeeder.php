<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Roles;
use App\Models\Permission;

class CustomRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // إنشاء صلاحية محرر المحتوى
        $editorRole = Roles::create([
            'role' => 'محرر المحتوى',
            'email' => 'editor@college.edu',
            'password' => 'editor123456',
        ]);

        // إعطاء صلاحيات المحرر
        $editorPermissions = Permission::whereIn('name', [
            'articles.create',
            'articles.read',
            'articles.update',
            'news.create',
            'news.read',
            'news.update',
            'library.create',
            'library.read',
            'library.update',
        ])->get();

        $editorRole->permissions()->attach($editorPermissions->pluck('id'));

        $this->command->info('تم إنشاء صلاحية محرر المحتوى بنجاح!');
        $this->command->info('البريد الإلكتروني: editor@college.edu');
        $this->command->info('كلمة المرور: editor123456');
        $this->command->info('الصلاحيات: إدارة المحتوى والمقالات');

        // إنشاء صلاحية مشرف المختبرات
        $labSupervisorRole = Roles::create([
            'role' => 'مشرف المختبرات',
            'email' => 'lab@college.edu',
            'password' => 'lab123456',
        ]);

        // إعطاء صلاحيات مشرف المختبرات
        $labSupervisorPermissions = Permission::whereIn('name', [
            'labs.create',
            'labs.read',
            'labs.update',
            'labs.delete',
            'training_courses.create',
            'training_courses.read',
            'training_courses.update',
            'faculty.read',
            'students.read',
        ])->get();

        $labSupervisorRole->permissions()->attach($labSupervisorPermissions->pluck('id'));

        $this->command->info('تم إنشاء صلاحية مشرف المختبرات بنجاح!');
        $this->command->info('البريد الإلكتروني: lab@college.edu');
        $this->command->info('كلمة المرور: lab123456');
        $this->command->info('الصلاحيات: إدارة المختبرات والدورات');

        // إنشاء صلاحية مشرف الأقسام
        $departmentSupervisorRole = Roles::create([
            'role' => 'مشرف الأقسام',
            'email' => 'dept@college.edu',
            'password' => 'dept123456',
        ]);

        // إعطاء صلاحيات مشرف الأقسام
        $departmentSupervisorPermissions = Permission::whereIn('name', [
            'departments.create',
            'departments.read',
            'departments.update',
            'departments.delete',
            'academic_departments.create',
            'academic_departments.read',
            'academic_departments.update',
            'academic_departments.delete',
            'faculty.read',
            'students.read',
            'student_projects.read',
            'student_results.read',
        ])->get();

        $departmentSupervisorRole->permissions()->attach($departmentSupervisorPermissions->pluck('id'));

        $this->command->info('تم إنشاء صلاحية مشرف الأقسام بنجاح!');
        $this->command->info('البريد الإلكتروني: dept@college.edu');
        $this->command->info('كلمة المرور: dept123456');
        $this->command->info('الصلاحيات: إدارة الأقسام والطلاب');
    }
}