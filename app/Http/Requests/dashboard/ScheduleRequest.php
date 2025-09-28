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
            'type' => 'required',
            'level_id' => 'required',
            'department_id' => 'required',
            'academic_year' => 'required',
            'file_path' => 'sometimes|required',
            'class' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'type.required' => 'الرجاء اختيار نوع الجدول',
            'level_id.required' => 'الرجاء اختيار المرحلة',
            'department_id.required' => 'الرجاء اختيار القسم',
            'academic_year.required' => 'الرجاء اختيار السنة الدراسية',
            'file_path.required' => 'الرجاء اختيار ملف الجدول',
            'file_path.sometimes' => 'الرجاء اختيار ملف الجدول',
            'class.required' => 'الرجاء اختيار الترم الدراسي',
        ];
    }
}
