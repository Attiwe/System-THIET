<?php

namespace App\Http\Requests\dashboard;

use Illuminate\Foundation\Http\FormRequest;

class StudentResultRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'department_id' => 'required|exists:departments,id',
            'level_id' => 'required|exists:level_accademics,id',
            'type' => 'required|in:سمر,الترم الثاني,الترم الاول',
            'academic_year' => 'required|date',
        ];

        // For create, file is required
        if ($this->isMethod('POST')) {
            $rules['example_file'] = 'required|file|mimes:pdf,doc,docx,xls,xlsx,jpg,jpeg,png|max:10240'; // 10MB max
        }
        
        // For update, file is optional
        if ($this->isMethod('PUT') || $this->isMethod('PATCH')) {
            $rules['example_file'] = 'nullable|file|mimes:pdf,doc,docx,xls,xlsx,jpg,jpeg,png|max:10240';
        }

        return $rules;
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'department_id.required' => 'يرجى اختيار القسم',
            'department_id.exists' => 'القسم المختار غير صحيح',
            'level_id.required' => 'يرجى اختيار الفرقة الدراسية',
            'level_id.exists' => 'الفرقة الدراسية المختارة غير صحيحة',
            'type.required' => 'يرجى اختيار نوع النتيجة',
            'type.in' => 'نوع النتيجة غير صحيح',
            'academic_year.required' => 'يرجى إدخال السنة الأكاديمية',
            'academic_year.date' => 'يرجى إدخال تاريخ صحيح للسنة الأكاديمية',
            'example_file.required' => 'يرجى رفع ملف المثال',
            'example_file.file' => 'الملف المرفوع غير صحيح',
            'example_file.mimes' => 'نوع الملف غير مدعوم. الأنواع المدعومة: pdf, doc, docx, xls, xlsx, jpg, jpeg, png',
            'example_file.max' => 'حجم الملف يجب أن يكون أقل من 10 ميجابايت',
        ];
    }
}
