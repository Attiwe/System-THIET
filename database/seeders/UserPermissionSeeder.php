<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Permission;

class UserPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // إعطاء جميع الصلاحيات للمدير العام
        $adminUser = User::where('email', 'admin@college.edu')->first();
        if ($adminUser) {
            $allPermissions = Permission::all();
            $adminUser->permissions()->sync($allPermissions->pluck('id'));
            
            $this->command->info('تم إعطاء جميع الصلاحيات للمدير العام!');
            $this->command->info('المستخدم: ' . $adminUser->email);
            $this->command->info('الصلاحيات: ' . $allPermissions->count() . ' صلاحية');
        }

        // إنشاء مستخدم محرر المحتوى
        $editorUser = User::create([
            'name' => 'محرر المحتوى',
            'email' => 'editor@college.edu',
            'password' => 'editor123456',
            'email_verified_at' => now(),
        ]);

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

        $editorUser->permissions()->sync($editorPermissions->pluck('id'));

        $this->command->info('تم إنشاء مستخدم محرر المحتوى!');
        $this->command->info('البريد الإلكتروني: editor@college.edu');
        $this->command->info('كلمة المرور: editor123456');
        $this->command->info('الصلاحيات: ' . $editorPermissions->count() . ' صلاحية');

        // إنشاء مستخدم مشرف المختبرات
        $labUser = User::create([
            'name' => 'مشرف المختبرات',
            'email' => 'lab@college.edu',
            'password' => 'lab123456',
            'email_verified_at' => now(),
        ]);

        $labPermissions = Permission::whereIn('name', [
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

        $labUser->permissions()->sync($labPermissions->pluck('id'));

        $this->command->info('تم إنشاء مستخدم مشرف المختبرات!');
        $this->command->info('البريد الإلكتروني: lab@college.edu');
        $this->command->info('كلمة المرور: lab123456');
        $this->command->info('الصلاحيات: ' . $labPermissions->count() . ' صلاحية');

        // إنشاء مستخدم طالب
        $studentUser = User::create([
            'name' => 'طالب',
            'email' => 'student@college.edu',
            'password' => 'student123456',
            'email_verified_at' => now(),
        ]);

        $studentPermissions = Permission::whereIn('name', [
            'students.read',
            'student_projects.read',
            'student_projects.create',
            'student_results.read',
            'articles.read',
            'library.read',
        ])->get();

        $studentUser->permissions()->sync($studentPermissions->pluck('id'));

        $this->command->info('تم إنشاء مستخدم طالب!');
        $this->command->info('البريد الإلكتروني: student@college.edu');
        $this->command->info('كلمة المرور: student123456');
        $this->command->info('الصلاحيات: ' . $studentPermissions->count() . ' صلاحية');
    }
}