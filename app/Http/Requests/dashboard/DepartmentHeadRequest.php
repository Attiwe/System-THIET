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
            'scientific_experiences' => 'bail|required|string|max:1000',
            'achievements' => 'bail|required|string|max:1000',
            'name' => 'bail|required|string|max:255',
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
            'scientific_experiences.required' => 'الخبرات العلمية مطلوبة',
            'scientific_experiences.string' => 'الخبرات العلمية يجب أن تكون نص',
            'scientific_experiences.max' => 'الخبرات العلمية يجب ألا تتجاوز 1000 حرف',
            'achievements.required' => 'الإنجازات مطلوبة',
            'achievements.string' => 'الإنجازات يجب أن تكون نص',
            'achievements.max' => 'الإنجازات يجب ألا تتجاوز 1000 حرف',
            'name.required' => 'الاسم مطلوب',
            'name.string' => 'الاسم يجب أن يكون نص',
            'name.max' => 'الاسم يجب ألا يتجاوز 255 حرف',
        ];
    }
}
