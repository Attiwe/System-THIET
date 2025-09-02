<?php

namespace App\Http\Requests\dashboard;

use Illuminate\Foundation\Http\FormRequest;

class OfficeStudentRequest extends FormRequest
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
             'department_id' => 'required|exists:departments,id',
             'level_id' => 'required|exists:level_accademics,id',
             'name' => 'required',
             'number_id' => 'required|numeric',
             'email' => 'required|email',
             'phone' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'department_id.required' => 'القسم مطلوب',
            'level_id.required' => 'المرحلة مطلوبة',
            'name.required' => 'الاسم مطلوب',
            'number_id.required' => 'الرقم مطلوب',
            'email.required' => 'البريد الالكتروني مطلوب',
            'email.email' => 'البريد الالكتروني غير صحيح',
            'number_id.numeric' => 'الرقم يجب ان يكون رقم',
            'phone.numeric' => 'الهاتف يجب ان يكون رقم',
            'phone.required' => 'الهاتف مطلوب',
        ];
    }

}
