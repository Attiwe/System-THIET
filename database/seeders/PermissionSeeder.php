<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Permission;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('permissions')->delete();

        $permissions = [
            // إدارة المستخدمين
            ['name' => 'users.create', 'display_name' => 'إنشاء المستخدمين', 'description' => 'إضافة مستخدمين جدد', 'group' => 'المستخدمين'],
            ['name' => 'users.read', 'display_name' => 'عرض المستخدمين', 'description' => 'عرض قائمة المستخدمين', 'group' => 'المستخدمين'],
            ['name' => 'users.update', 'display_name' => 'تحديث المستخدمين', 'description' => 'تعديل بيانات المستخدمين', 'group' => 'المستخدمين'],
            ['name' => 'users.delete', 'display_name' => 'حذف المستخدمين', 'description' => 'حذف المستخدمين', 'group' => 'المستخدمين'],

            // إدارة الصلاحيات
            ['name' => 'roles.create', 'display_name' => 'إنشاء الصلاحيات', 'description' => 'إضافة صلاحيات جديدة', 'group' => 'الصلاحيات'],
            ['name' => 'roles.read', 'display_name' => 'عرض الصلاحيات', 'description' => 'عرض قائمة الصلاحيات', 'group' => 'الصلاحيات'],
            ['name' => 'roles.update', 'display_name' => 'تحديث الصلاحيات', 'description' => 'تعديل الصلاحيات', 'group' => 'الصلاحيات'],
            ['name' => 'roles.delete', 'display_name' => 'حذف الصلاحيات', 'description' => 'حذف الصلاحيات', 'group' => 'الصلاحيات'],

            // إدارة أعضاء هيئة التدريس
            ['name' => 'faculty.create', 'display_name' => 'إنشاء أعضاء هيئة التدريس', 'description' => 'إضافة أعضاء هيئة تدريس جدد', 'group' => 'أعضاء هيئة التدريس'],
            ['name' => 'faculty.read', 'display_name' => 'عرض أعضاء هيئة التدريس', 'description' => 'عرض قائمة أعضاء هيئة التدريس', 'group' => 'أعضاء هيئة التدريس'],
            ['name' => 'faculty.update', 'display_name' => 'تحديث أعضاء هيئة التدريس', 'description' => 'تعديل بيانات أعضاء هيئة التدريس', 'group' => 'أعضاء هيئة التدريس'],
            ['name' => 'faculty.delete', 'display_name' => 'حذف أعضاء هيئة التدريس', 'description' => 'حذف أعضاء هيئة التدريس', 'group' => 'أعضاء هيئة التدريس'],

            // إدارة الأقسام
            ['name' => 'departments.create', 'display_name' => 'إنشاء الأقسام', 'description' => 'إضافة أقسام جديدة', 'group' => 'الأقسام'],
            ['name' => 'departments.read', 'display_name' => 'عرض الأقسام', 'description' => 'عرض قائمة الأقسام', 'group' => 'الأقسام'],
            ['name' => 'departments.update', 'display_name' => 'تحديث الأقسام', 'description' => 'تعديل بيانات الأقسام', 'group' => 'الأقسام'],
            ['name' => 'departments.delete', 'display_name' => 'حذف الأقسام', 'description' => 'حذف الأقسام', 'group' => 'الأقسام'],

            // إدارة المعهد
            ['name' => 'institute.create', 'display_name' => 'إنشاء بيانات المعهد', 'description' => 'إضافة بيانات جديدة للمعهد', 'group' => 'المعهد'],
            ['name' => 'institute.read', 'display_name' => 'عرض بيانات المعهد', 'description' => 'عرض بيانات المعهد', 'group' => 'المعهد'],
            ['name' => 'institute.update', 'display_name' => 'تحديث بيانات المعهد', 'description' => 'تعديل بيانات المعهد', 'group' => 'المعهد'],
            ['name' => 'institute.delete', 'display_name' => 'حذف بيانات المعهد', 'description' => 'حذف بيانات المعهد', 'group' => 'المعهد'],

            // إدارة الأخبار
            ['name' => 'news.create', 'display_name' => 'إنشاء الأخبار', 'description' => 'إضافة أخبار جديدة', 'group' => 'الأخبار'],
            ['name' => 'news.read', 'display_name' => 'عرض الأخبار', 'description' => 'عرض قائمة الأخبار', 'group' => 'الأخبار'],
            ['name' => 'news.update', 'display_name' => 'تحديث الأخبار', 'description' => 'تعديل الأخبار', 'group' => 'الأخبار'],
            ['name' => 'news.delete', 'display_name' => 'حذف الأخبار', 'description' => 'حذف الأخبار', 'group' => 'الأخبار'],

            // إدارة المكتبة
            ['name' => 'library.create', 'display_name' => 'إنشاء عناصر المكتبة', 'description' => 'إضافة عناصر جديدة للمكتبة', 'group' => 'المكتبة'],
            ['name' => 'library.read', 'display_name' => 'عرض عناصر المكتبة', 'description' => 'عرض عناصر المكتبة', 'group' => 'المكتبة'],
            ['name' => 'library.update', 'display_name' => 'تحديث عناصر المكتبة', 'description' => 'تعديل عناصر المكتبة', 'group' => 'المكتبة'],
            ['name' => 'library.delete', 'display_name' => 'حذف عناصر المكتبة', 'description' => 'حذف عناصر المكتبة', 'group' => 'المكتبة'],

            // إدارة الطلاب
            ['name' => 'students.create', 'display_name' => 'إنشاء بيانات الطلاب', 'description' => 'إضافة بيانات طلاب جدد', 'group' => 'الطلاب'],
            ['name' => 'students.read', 'display_name' => 'عرض بيانات الطلاب', 'description' => 'عرض قائمة الطلاب', 'group' => 'الطلاب'],
            ['name' => 'students.update', 'display_name' => 'تحديث بيانات الطلاب', 'description' => 'تعديل بيانات الطلاب', 'group' => 'الطلاب'],
            ['name' => 'students.delete', 'display_name' => 'حذف بيانات الطلاب', 'description' => 'حذف بيانات الطلاب', 'group' => 'الطلاب'],

            // إدارة مشاريع الطلاب
            ['name' => 'student_projects.create', 'display_name' => 'إنشاء مشاريع الطلاب', 'description' => 'إضافة مشاريع طلاب جديدة', 'group' => 'مشاريع الطلاب'],
            ['name' => 'student_projects.read', 'display_name' => 'عرض مشاريع الطلاب', 'description' => 'عرض قائمة مشاريع الطلاب', 'group' => 'مشاريع الطلاب'],
            ['name' => 'student_projects.update', 'display_name' => 'تحديث مشاريع الطلاب', 'description' => 'تعديل مشاريع الطلاب', 'group' => 'مشاريع الطلاب'],
            ['name' => 'student_projects.delete', 'display_name' => 'حذف مشاريع الطلاب', 'description' => 'حذف مشاريع الطلاب', 'group' => 'مشاريع الطلاب'],

            // إدارة نتائج الطلاب
            ['name' => 'student_results.create', 'display_name' => 'إنشاء نتائج الطلاب', 'description' => 'إضافة نتائج طلاب جديدة', 'group' => 'نتائج الطلاب'],
            ['name' => 'student_results.read', 'display_name' => 'عرض نتائج الطلاب', 'description' => 'عرض قائمة نتائج الطلاب', 'group' => 'نتائج الطلاب'],
            ['name' => 'student_results.update', 'display_name' => 'تحديث نتائج الطلاب', 'description' => 'تعديل نتائج الطلاب', 'group' => 'نتائج الطلاب'],
            ['name' => 'student_results.delete', 'display_name' => 'حذف نتائج الطلاب', 'description' => 'حذف نتائج الطلاب', 'group' => 'نتائج الطلاب'],

            // إدارة الإعدادات
            ['name' => 'settings.read', 'display_name' => 'عرض الإعدادات', 'description' => 'عرض إعدادات النظام', 'group' => 'الإعدادات'],
            ['name' => 'settings.update', 'display_name' => 'تحديث الإعدادات', 'description' => 'تعديل إعدادات النظام', 'group' => 'الإعدادات'],

            // إدارة المقالات
            ['name' => 'articles.create', 'display_name' => 'إنشاء المقالات', 'description' => 'إضافة مقالات جديدة', 'group' => 'المقالات'],
            ['name' => 'articles.read', 'display_name' => 'عرض المقالات', 'description' => 'عرض قائمة المقالات', 'group' => 'المقالات'],
            ['name' => 'articles.update', 'display_name' => 'تحديث المقالات', 'description' => 'تعديل المقالات', 'group' => 'المقالات'],
            ['name' => 'articles.delete', 'display_name' => 'حذف المقالات', 'description' => 'حذف المقالات', 'group' => 'المقالات'],

            // إدارة الأقسام الأكاديمية
            ['name' => 'academic_departments.create', 'display_name' => 'إنشاء الأقسام الأكاديمية', 'description' => 'إضافة أقسام أكاديمية جديدة', 'group' => 'الأقسام الأكاديمية'],
            ['name' => 'academic_departments.read', 'display_name' => 'عرض الأقسام الأكاديمية', 'description' => 'عرض قائمة الأقسام الأكاديمية', 'group' => 'الأقسام الأكاديمية'],
            ['name' => 'academic_departments.update', 'display_name' => 'تحديث الأقسام الأكاديمية', 'description' => 'تعديل الأقسام الأكاديمية', 'group' => 'الأقسام الأكاديمية'],
            ['name' => 'academic_departments.delete', 'display_name' => 'حذف الأقسام الأكاديمية', 'description' => 'حذف الأقسام الأكاديمية', 'group' => 'الأقسام الأكاديمية'],

            // إدارة المختبرات
            ['name' => 'labs.create', 'display_name' => 'إنشاء المختبرات', 'description' => 'إضافة مختبرات جديدة', 'group' => 'المختبرات'],
            ['name' => 'labs.read', 'display_name' => 'عرض المختبرات', 'description' => 'عرض قائمة المختبرات', 'group' => 'المختبرات'],
            ['name' => 'labs.update', 'display_name' => 'تحديث المختبرات', 'description' => 'تعديل المختبرات', 'group' => 'المختبرات'],
            ['name' => 'labs.delete', 'display_name' => 'حذف المختبرات', 'description' => 'حذف المختبرات', 'group' => 'المختبرات'],

            // إدارة الدورات التدريبية
            ['name' => 'training_courses.create', 'display_name' => 'إنشاء الدورات التدريبية', 'description' => 'إضافة دورات تدريبية جديدة', 'group' => 'الدورات التدريبية'],
            ['name' => 'training_courses.read', 'display_name' => 'عرض الدورات التدريبية', 'description' => 'عرض قائمة الدورات التدريبية', 'group' => 'الدورات التدريبية'],
            ['name' => 'training_courses.update', 'display_name' => 'تحديث الدورات التدريبية', 'description' => 'تعديل الدورات التدريبية', 'group' => 'الدورات التدريبية'],
            ['name' => 'training_courses.delete', 'display_name' => 'حذف الدورات التدريبية', 'description' => 'حذف الدورات التدريبية', 'group' => 'الدورات التدريبية'],

            // صلاحيات خاصة
            ['name' => 'admin.access', 'display_name' => 'الوصول للإدارة', 'description' => 'الوصول لوحة الإدارة', 'group' => 'خاص'],
            ['name' => 'super.admin', 'display_name' => 'مدير عام', 'description' => 'جميع الصلاحيات', 'group' => 'خاص'],
        ];

        foreach ($permissions as $permission) {
            Permission::create($permission);
        }
    }
}
