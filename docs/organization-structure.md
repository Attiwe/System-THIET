# نظام إدارة الهيكل التنظيمي

## الوصف

نظام إدارة شامل للهيكل التنظيمي للمعهد، يتيح إدارة الملفات والوثائق التنظيمية لكل وحدة.

## المميزات

-   ✅ إدارة كاملة للهيكل التنظيمي (CRUD)
-   ✅ رفع ملفات متعددة الأنواع (PDF, JPG, JPEG, PNG)
-   ✅ تحميل وعرض الملفات
-   ✅ ربط الهيكل التنظيمي بالوحدات
-   ✅ تصميم متجاوب مع Bootstrap
-   ✅ أيقونات Bootstrap مناسبة
-   ✅ رسائل تأكيد للحذف
-   ✅ معاينة الملفات قبل الرفع
-   ✅ عرض معلومات الملف (الاسم، الحجم، النوع)

## الملفات المنشأة

### Controllers

-   `app/Http/Controllers/Dashboard/OrganizationStructureController.php`

### Requests

-   `app/Http/Requests/dashboard/OrganizationStructureRequest.php`

### Models

-   `app/Models/OrganizationStructure.php` (محدث)

### Views

-   `resources/views/pages/organization-structure/index.blade.php`
-   `resources/views/pages/organization-structure/create.blade.php`
-   `resources/views/pages/organization-structure/edit.blade.php`
-   `resources/views/pages/organization-structure/show.blade.php`
-   `resources/views/pages/organization-structure/_delete.blade.php`

### Routes

-   تم إضافة روتات CRUD كاملة في `routes/web.php`
-   روت تحميل الملفات: `organization-structure.file/{filename}`

## كيفية الاستخدام

### 1. الوصول للنظام

-   انتقل إلى الشريط الجانبي > الإعدادات الإدارية > الهيكل التنظيمي
-   أو مباشرة عبر الرابط: `/organization-structure`

### 2. إضافة هيكل تنظيمي جديد

-   اضغط على "إضافة هيكل تنظيمي جديد" في الصفحة الرئيسية
-   اختر الوحدة من القائمة المنسدلة
-   ارفع ملف الهيكل التنظيمي (PDF, JPG, JPEG, PNG)
-   اضغط "إضافة الهيكل التنظيمي"

### 3. تعديل هيكل تنظيمي موجود

-   اضغط على "تعديل" من القائمة المنسدلة
-   عدّل الوحدة أو ارفع ملف جديد
-   اضغط "حفظ التعديلات"

### 4. عرض وتحميل الملفات

-   اضغط "عرض" لفتح الملف في نافذة جديدة
-   اضغط "تحميل" لتحميل الملف
-   يمكنك رؤية حجم الملف ونوعه

### 5. حذف الهيكل التنظيمي

-   اضغط "حذف" من القائمة المنسدلة
-   أكّد الحذف في النافذة المنبثقة
-   سيتم حذف الملف من الخادم أيضاً

## متطلبات النظام

-   Laravel 8+
-   PHP 7.4+
-   MySQL
-   Bootstrap 5
-   jQuery
-   DataTables
-   SweetAlert2

## ملاحظات مهمة

-   الحد الأقصى لحجم الملف: 10 ميجابايت
-   أنواع الملفات المدعومة: PDF, JPG, JPEG, PNG
-   الملفات تُحفظ في: `storage/app/public/organization-structures/`
-   عند حذف السجل، يتم حذف الملف المرتبط تلقائياً

## الأمان

-   التحقق من صحة البيانات باستخدام Form Request
-   حماية من رفع ملفات ضارة
-   التحقق من وجود الملف قبل التحميل
-   رسائل خطأ واضحة للمستخدم

## التصميم

-   تصميم متجاوب مع جميع الشاشات
-   أيقونات Bootstrap مناسبة لكل إجراء
-   ألوان متدرجة وجذابة
-   رسائل تأكيد تفاعلية
-   معاينة الملفات قبل الرفع
