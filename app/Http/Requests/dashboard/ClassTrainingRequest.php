<?php

namespace App\Http\Requests\dashboard;

use Illuminate\Foundation\Http\FormRequest;

class ClassTrainingRequest extends FormRequest
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
        $classTrainingId = $this->route('classTraining') ?? $this->route('id');
        
        return [
            'department_id' => 'required|exists:departments,id',
            'class_name' => 'required|string|max:255',
            'class_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120', // 5MB max
        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'department_id.required' => 'يرجى اختيار القسم',
            'department_id.exists' => 'القسم المحدد غير صحيح',
            'class_name.required' => 'يرجى إدخال اسم التدريب الصفي',
            'class_name.string' => 'اسم التدريب الصفي يجب أن يكون نص',
            'class_name.max' => 'اسم التدريب الصفي يجب ألا يتجاوز 255 حرف',
            'class_image.image' => 'صورة التدريب الصفي يجب أن تكون صورة',
            'class_image.mimes' => 'صورة التدريب الصفي يجب أن تكون بصيغة: jpeg, png, jpg, gif',
            'class_image.max' => 'حجم صورة التدريب الصفي يجب ألا يتجاوز 5 ميجابايت',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     */
    public function attributes(): array
    {
        return [
            'department_id' => 'القسم',
            'class_name' => 'اسم التدريب الصفي',
            'class_image' => 'صورة التدريب الصفي',
        ];
    }
}
