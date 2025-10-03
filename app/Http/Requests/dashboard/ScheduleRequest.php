<?php

namespace App\Http\Requests\dashboard;

use Illuminate\Foundation\Http\FormRequest;

class ScheduleRequest extends FormRequest
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
        return [
            'type' => 'required|in:جداول الامتحانات,جداول الدرسه,غير ذالك',
            'level_id' => 'required|exists:level_accademics,id',
            'department_id' => 'required|exists:departments,id',
            'academic_year' => 'required|date',
            'file_path' => 'sometimes|required|file|mimes:pdf,jpg,jpeg,png|max:10240',
            'class' => 'required|in:الترم الثاني,الترم الاول',
        ];
    }

    public function messages()
    {
        return [
            'type.required' => 'الرجاء اختيار نوع الجدول',
            'type.in' => 'نوع الجدول يجب أن يكون: جداول الامتحانات، جداول الدرسه، أو غير ذالك',
            'level_id.required' => 'الرجاء اختيار المرحلة',
            'level_id.exists' => 'المرحلة المختارة غير صحيحة',
            'department_id.required' => 'الرجاء اختيار القسم',
            'department_id.exists' => 'القسم المختار غير صحيح',
            'academic_year.required' => 'الرجاء اختيار السنة الدراسية',
            'academic_year.date' => 'السنة الدراسية يجب أن تكون تاريخ صحيح',
            'file_path.required' => 'الرجاء اختيار ملف الجدول',
            'file_path.file' => 'يجب أن يكون الملف صحيح',
            'file_path.mimes' => 'نوع الملف يجب أن يكون: PDF, JPG, JPEG, أو PNG',
            'file_path.max' => 'حجم الملف يجب أن يكون أقل من 10 ميجابايت',
            'class.required' => 'الرجاء اختيار الترم الدراسي',
            'class.in' => 'الترم الدراسي يجب أن يكون: الترم الاول أو الترم الثاني',
        ];
    }
}
