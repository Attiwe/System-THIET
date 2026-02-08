# توثيق API

## الرابط الأساسي
```
http://your-domain.com/api
```

## إصدار API
جميع نقاط النهاية مسبوقة بـ `/v1`

## تنسيق الاستجابة

### استجابة نجاح
```json
{
  "success": true,
  "data": {},
  "message": "رسالة النجاح"
}
```

### استجابة خطأ
```json
{
  "success": false,
  "message": "رسالة الخطأ"
}
```

## رموز حالة HTTP
- `200` - نجاح
- `400` - طلب خاطئ
- `404` - غير موجود
- `500` - خطأ في الخادم

---

## نقاط النهاية

### 1. الشرائح (Sliders)

#### الحصول على جميع الشرائح
**GET** `/api/v1/sliders`

**الوصف:** استرجاع جميع الشرائح النشطة مع التقسيم (4 عناصر لكل صفحة)

**الاستجابة:**
```json
{
  "success": true,
  "data": {
    "data": [
      {
        "id": 1,
        "title": "عنوان الشريحة",
        "image": "http://domain.com/path/to/image.jpg",
        "link": "http://link.com",
        "status": "active"
      }
    ],
    "current_page": 1,
    "per_page": 4,
    "total": 10
  },
  "message": "The sliders fetched successfully"
}
```

---

### 2. معلومات المعهد

#### الحصول على معلومات المعهد
**GET** `/api/v1/about/institute`

**الوصف:** استرجاع معلومات المعهد (الرؤية، الرسالة، الوصف، الصورة)

**الاستجابة:**
```json
{
  "success": true,
  "data": {
    "id": 1,
    "vision": "رؤية المعهد",
    "message": "رسالة المعهد",
    "description": "وصف المعهد",
    "image": "http://domain.com/path/to/image.jpg"
  },
  "message": "The unit institutes fetched successfully"
}
```

---

### 3. الهيكل التنظيمي

#### الحصول على الهيكل التنظيمي
**GET** `/api/v1/organization/structure`

**الوصف:** استرجاع الهيكل التنظيمي للمعهد

---

### 4. أعضاء مجلس المعهد

#### الحصول على أعضاء مجلس المعهد
**GET** `/api/v1/institute/board/members`

**الوصف:** استرجاع جميع أعضاء مجلس المعهد

---

### 5. المجالس الأكاديمية

#### الحصول على المجالس الأكاديمية
**GET** `/api/v1/academic/councils`

**الوصف:** استرجاع جميع المجالس الأكاديمية

---

### 6. الأقسام

#### الحصول على قسم العلوم الأساسية
**GET** `/api/v1/departments/basic-sciences`

**الوصف:** استرجاع معلومات قسم العلوم الأساسية

**الاستجابة:**
```json
{
  "success": true,
  "data": {
    "id": 1,
    "name": "العلوم الأساسية",
    "description": "وصف القسم",
    "image": "http://domain.com/path/to/image.jpg"
  },
  "message": "The Department fetched successfully"
}
```

#### الحصول على قسم هندسة الحاسوب
**GET** `/api/v1/departments/computer-engineering`

**الوصف:** استرجاع معلومات قسم هندسة الحاسوب

#### الحصول على قسم هندسة البناء والإنشاءات
**GET** `/api/v1/departments/construction-and-building-engineering`

**الوصف:** استرجاع معلومات قسم هندسة البناء والإنشاءات

#### الحصول على قسم الهندسة الكيميائية
**GET** `/api/v1/departments/chemical-engineering`

**الوصف:** استرجاع معلومات قسم الهندسة الكيميائية

---

### 7. رؤساء الأقسام

#### الحصول على رئيس قسم العلوم الأساسية
**GET** `/api/v1/department-heads/basic-sciences`

**الوصف:** استرجاع رئيس قسم العلوم الأساسية

#### الحصول على رئيس قسم هندسة الحاسوب
**GET** `/api/v1/department-heads/computer-engineering`

#### الحصول على رئيس قسم هندسة البناء والإنشاءات
**GET** `/api/v1/department-heads/construction-and-building-engineering`

#### الحصول على رئيس قسم الهندسة الكيميائية
**GET** `/api/v1/department-heads/chemical-engineering`

---

### 8. خطط البحث للأقسام

#### الحصول على خطة بحث قسم العلوم الأساسية
**GET** `/api/v1/department-plans/basic-sciences`

**الوصف:** استرجاع خطة البحث لقسم العلوم الأساسية

**الاستجابة:**
```json
{
  "success": true,
  "data": {
    "department_name": "العلوم الأساسية",
    "research_plan": "http://domain.com/storage/department_plans/file.pdf"
  },
  "message": "The department plan fetched successfully"
}
```

#### الحصول على خطة بحث قسم هندسة الحاسوب
**GET** `/api/v1/department-plans/computer-engineering`

#### الحصول على خطة بحث قسم هندسة البناء والإنشاءات
**GET** `/api/v1/department-plans/construction-and-building-engineering`

#### الحصول على خطة بحث قسم الهندسة الكيميائية
**GET** `/api/v1/department-plans/chemical-engineering`

---

### 9. اللوائح الداخلية للأقسام

#### الحصول على اللائحة الداخلية لقسم العلوم الأساسية
**GET** `/api/v1/department-regulations/basic-sciences`

**الوصف:** استرجاع اللائحة الداخلية لقسم العلوم الأساسية

#### الحصول على اللائحة الداخلية لقسم هندسة الحاسوب
**GET** `/api/v1/department-regulations/computer-engineering`

#### الحصول على اللائحة الداخلية لقسم هندسة البناء والإنشاءات
**GET** `/api/v1/department-regulations/construction-and-building-engineering`

#### الحصول على اللائحة الداخلية لقسم الهندسة الكيميائية
**GET** `/api/v1/department-regulations/chemical-engineering`

---

### 10. كتب الأقسام

#### الحصول على كتب قسم العلوم الأساسية
**GET** `/api/v1/department-books/basic-sciences`

**الوصف:** استرجاع كتب قسم العلوم الأساسية

#### الحصول على كتب قسم هندسة الحاسوب
**GET** `/api/v1/department-books/computer-engineering`

#### الحصول على كتب قسم هندسة البناء والإنشاءات
**GET** `/api/v1/department-books/construction-and-building-engineering`

#### الحصول على كتب قسم الهندسة الكيميائية
**GET** `/api/v1/department-books/chemical-engineering`

---

### 11. المقررات الدراسية للأقسام

#### الحصول على مقررات قسم العلوم الأساسية
**GET** `/api/v1/department-courses/basic-sciences`

**الوصف:** استرجاع المقررات الدراسية لقسم العلوم الأساسية

#### الحصول على مقررات قسم هندسة الحاسوب
**GET** `/api/v1/department-courses/computer-engineering`

#### الحصول على مقررات قسم هندسة البناء والإنشاءات
**GET** `/api/v1/department-courses/construction-and-building-engineering`

#### الحصول على مقررات قسم الهندسة الكيميائية
**GET** `/api/v1/department-courses/chemical-engineering`

---

### 12. مجلس القسم

#### الحصول على مجلس قسم العلوم الأساسية
**GET** `/api/v1/department-council/basic-sciences`

**الوصف:** استرجاع أعضاء مجلس قسم العلوم الأساسية

#### الحصول على مجلس قسم هندسة الحاسوب
**GET** `/api/v1/department-council/computer-engineering`

#### الحصول على مجلس قسم هندسة البناء والإنشاءات
**GET** `/api/v1/department-council/construction-and-building-engineering`

#### الحصول على مجلس قسم الهندسة الكيميائية
**GET** `/api/v1/department-council/chemical-engineering`

---

### 13. أعضاء هيئة التدريس

#### الحصول على أعضاء هيئة التدريس - قسم العلوم الأساسية
**GET** `/api/v1/faculty-members/basic-sciences`

**الوصف:** استرجاع أعضاء هيئة التدريس لقسم العلوم الأساسية

#### الحصول على أعضاء هيئة التدريس - قسم هندسة الحاسوب
**GET** `/api/v1/faculty-members/computer-engineering`

#### الحصول على أعضاء هيئة التدريس - قسم هندسة البناء والإنشاءات
**GET** `/api/v1/faculty-members/construction-and-building-engineering`

#### الحصول على أعضاء هيئة التدريس - قسم الهندسة الكيميائية
**GET** `/api/v1/faculty-members/chemical-engineering`

---

### 14. متطلبات المعهد

#### الحصول على متطلبات المعهد - قسم العلوم الأساسية
**GET** `/api/v1/institute-requirements/basic-sciences`

**الوصف:** استرجاع متطلبات المعهد لقسم العلوم الأساسية

#### الحصول على متطلبات المعهد - قسم هندسة الحاسوب
**GET** `/api/v1/institute-requirements/computer-engineering`

#### الحصول على متطلبات المعهد - قسم هندسة البناء والإنشاءات
**GET** `/api/v1/institute-requirements/construction-and-building-engineering`

#### الحصول على متطلبات المعهد - قسم الهندسة الكيميائية
**GET** `/api/v1/institute-requirements/chemical-engineering`

---

### 15. المختبرات

#### الحصول على مختبرات قسم العلوم الأساسية
**GET** `/api/v1/labs/basic-sciences`

**الوصف:** استرجاع المختبرات لقسم العلوم الأساسية

#### الحصول على مختبرات قسم هندسة الحاسوب
**GET** `/api/v1/labs/computer-engineering`

#### الحصول على مختبرات قسم هندسة البناء والإنشاءات
**GET** `/api/v1/labs/construction-and-building-engineering`

#### الحصول على مختبرات قسم الهندسة الكيميائية
**GET** `/api/v1/labs/chemical-engineering`

---

### 16. التدريبات الصفية

#### الحصول على التدريبات الصفية - قسم العلوم الأساسية
**GET** `/api/v1/class-trainings/basic-sciences`

**الوصف:** استرجاع التدريبات الصفية لقسم العلوم الأساسية

#### الحصول على التدريبات الصفية - قسم هندسة الحاسوب
**GET** `/api/v1/class-trainings/computer-engineering`

#### الحصول على التدريبات الصفية - قسم هندسة البناء والإنشاءات
**GET** `/api/v1/class-trainings/construction-and-building-engineering`

#### الحصول على التدريبات الصفية - قسم الهندسة الكيميائية
**GET** `/api/v1/class-trainings/chemical-engineering`

---

### 17. الرحلات العلمية

#### الحصول على الرحلات العلمية - قسم العلوم الأساسية
**GET** `/api/v1/scientific-trips/basic-sciences`

**الوصف:** استرجاع الرحلات العلمية لقسم العلوم الأساسية

#### الحصول على الرحلات العلمية - قسم هندسة الحاسوب
**GET** `/api/v1/scientific-trips/computer-engineering`

#### الحصول على الرحلات العلمية - قسم هندسة البناء والإنشاءات
**GET** `/api/v1/scientific-trips/construction-and-building-engineering`

#### الحصول على الرحلات العلمية - قسم الهندسة الكيميائية
**GET** `/api/v1/scientific-trips/chemical-engineering`

---

### 18. المشاريع البحثية

#### الحصول على المشاريع البحثية - قسم العلوم الأساسية
**GET** `/api/v1/research-projects/basic-sciences`

**الوصف:** استرجاع المشاريع البحثية لقسم العلوم الأساسية

#### الحصول على المشاريع البحثية - قسم هندسة الحاسوب
**GET** `/api/v1/research-projects/computer-engineering`

#### الحصول على المشاريع البحثية - قسم هندسة البناء والإنشاءات
**GET** `/api/v1/research-projects/construction-and-building-engineering`

#### الحصول على المشاريع البحثية - قسم الهندسة الكيميائية
**GET** `/api/v1/research-projects/chemical-engineering`

---

### 19. مشاريع الطلاب

#### الحصول على مشاريع الطلاب - قسم العلوم الأساسية
**GET** `/api/v1/student-projects/basic-sciences`

**الوصف:** استرجاع مشاريع الطلاب لقسم العلوم الأساسية

#### الحصول على مشاريع الطلاب - قسم هندسة الحاسوب
**GET** `/api/v1/student-projects/computer-engineering`

#### الحصول على مشاريع الطلاب - قسم هندسة البناء والإنشاءات
**GET** `/api/v1/student-projects/construction-and-building-engineering`

#### الحصول على مشاريع الطلاب - قسم الهندسة الكيميائية
**GET** `/api/v1/student-projects/chemical-engineering`

---

### 20. رسائل الماجستير والدكتوراه

#### الحصول على جميع رسائل الماجستير والدكتوراه
**GET** `/api/v1/masteris-doctoral-theses`

**الوصف:** استرجاع جميع رسائل الماجستير والدكتوراه

#### الحصول على رسائل الماجستير والدكتوراه - قسم العلوم الأساسية
**GET** `/api/v1/masteris-doctoral-theses/basic-sciences`

**الوصف:** استرجاع رسائل الماجستير والدكتوراه لقسم العلوم الأساسية

#### الحصول على رسائل الماجستير والدكتوراه - قسم هندسة الحاسوب
**GET** `/api/v1/masteris-doctoral-theses/computer-engineering`

#### الحصول على رسائل الماجستير والدكتوراه - قسم هندسة البناء والإنشاءات
**GET** `/api/v1/masteris-doctoral-theses/construction-and-building-engineering`

#### الحصول على رسائل الماجستير والدكتوراه - قسم الهندسة الكيميائية
**GET** `/api/v1/masteris-doctoral-theses/chemical-engineering`

---

### 21. جوائز النشر

#### الحصول على جميع جوائز النشر
**GET** `/api/v1/publishing-awards`

**الوصف:** استرجاع جميع جوائز النشر

---

## مرجع معرفات الأقسام

- **العلوم الأساسية**: المعرف = 1
- **هندسة البناء والإنشاءات**: المعرف = 2
- **الهندسة الكيميائية**: المعرف = 3
- **هندسة الحاسوب**: المعرف = 4

---

## معالجة الأخطاء

### مثال على استجابة خطأ
```json
{
  "success": false,
  "message": "القسم غير موجود"
}
```

### رسائل الخطأ الشائعة
- `"Department not found"` - عندما لا يوجد القسم
- `"Unit institutes not found"` - عندما لا تتوفر بيانات المعهد
- `"Department plan not found data not found"` - عندما لا توجد خطة البحث

---

## ملاحظات

1. جميع نقاط النهاية ترجع استجابات JSON
2. جميع نقاط النهاية تستخدم طريقة GET (API للقراءة فقط)
3. روابط الصور تُرجع كروابط كاملة باستخدام `asset()`
4. روابط الملفات (PDF، المستندات) تُرجع كروابط كاملة تشير إلى التخزين
5. يتم استخدام التقسيم لصفحات الشرائح (4 عناصر لكل صفحة)
6. جميع نقاط النهاية الخاصة بالأقسام تتبع نفس النمط مع معرف القسم في الرابط

---

## أمثلة الاستخدام

### استخدام cURL
```bash
curl -X GET http://your-domain.com/api/v1/sliders
```

### استخدام JavaScript (Fetch)
```javascript
fetch('http://your-domain.com/api/v1/sliders')
  .then(response => response.json())
  .then(data => console.log(data));
```

### استخدام JavaScript (Axios)
```javascript
axios.get('http://your-domain.com/api/v1/sliders')
  .then(response => console.log(response.data))
  .catch(error => console.error(error));
```

---

## آخر تحديث
تم إنشاء التوثيق بناءً على مسارات API في `routes/api.php`

