<?php

namespace App\Http\Requests\dashboard;

use Illuminate\Foundation\Http\FormRequest;

class CategoryManagementRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return  true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'dean' => 'bail|required|string',
            'vice_dean_students' => 'bail|required|string',
            'secretary' => 'bail|required|string',
            'account_manager' => 'bail|required|string',
            'hr_manager' => 'bail|required|string',
            'student_affairs_manager' => 'bail|required|string',
            'it_manager' => 'bail|required|string',
            'civil_head' => 'bail|required|string',
        ];
    }


    public function messages(){
        return [
            'dean.required' => 'الرئيس مطلوب',
            'vice_dean_students.required' => 'الรอง رئيس الطلاب مطلوب',
            'secretary.required' => 'السكرتير مطلوب',
            'account_manager.required' => 'مدير الحسابات مطلوب',
            'hr_manager.required' => 'مدير الموارد البشرية مطلوب',
            'student_affairs_manager.required' => 'مدير الشؤون الطلابية مطلوب',
            'it_manager.required' => 'مدير تكنولوجيا المعلومات مطلوب',
            'civil_head.required' => 'رئيس قسم الهندسة المدنية مطلوب',
          ];
    }

}
