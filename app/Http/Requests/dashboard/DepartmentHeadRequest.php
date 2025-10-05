<?php

namespace App\Http\Requests\dashboard;

use Illuminate\Foundation\Http\FormRequest;

class DepartmentHeadRequest extends FormRequest
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
            'department_id' => 'bail|required|integer|min:1',
            'faculty_members_id' => 'bail|required|integer|min:1',
        ];
    }

    public function messages()
    {
        return [
            'department_id.required' => 'القسم مطلوب',
            'department_id.integer' => 'القسم يجب أن يكون رقم',
            'department_id.min' => 'القسم يجب أن يكون أكبر من صفر',
            'faculty_members_id.required' => 'عضو هيئة التدريس مطلوب',
            'faculty_members_id.integer' => 'عضو هيئة التدريس يجب أن يكون رقم',
            'faculty_members_id.min' => 'عضو هيئة التدريس يجب أن يكون أكبر من صفر',
        ];
    }
}
