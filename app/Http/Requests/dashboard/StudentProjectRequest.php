<?php

namespace App\Http\Requests\dashboard;

use Illuminate\Foundation\Http\FormRequest;

class StudentProjectRequest extends FormRequest
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
        $projectId = $this->route('studentProject') ?? $this->route('id');
        
        return [
            'department_id' => 'required|exists:departments,id',
            'doctor_name' => 'required|string|max:255',
            'project_name' => 'required|string|max:500',
            'description' => 'required|string',
            'image_work' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120', // 5MB max
            'project_pdf' => 'nullable|file|mimes:pdf|max:10240', // 10MB max
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
            'doctor_name.required' => 'يرجى إدخال اسم الدكتور',
            'doctor_name.string' => 'اسم الدكتور يجب أن يكون نص',
            'doctor_name.max' => 'اسم الدكتور يجب ألا يتجاوز 255 حرف',
            'project_name.required' => 'يرجى إدخال اسم المشروع',
            'project_name.string' => 'اسم المشروع يجب أن يكون نص',
            'project_name.max' => 'اسم المشروع يجب ألا يتجاوز 500 حرف',
            'description.required' => 'يرجى إدخال وصف المشروع',
            'description.string' => 'الوصف يجب أن يكون نص',
            'image_work.image' => 'صورة العمل يجب أن تكون صورة',
            'image_work.mimes' => 'صورة العمل يجب أن تكون بصيغة: jpeg, png, jpg, gif',
            'image_work.max' => 'حجم صورة العمل يجب ألا يتجاوز 5 ميجابايت',
            'project_pdf.file' => 'ملف المشروع يجب أن يكون ملف',
            'project_pdf.mimes' => 'ملف المشروع يجب أن يكون بصيغة PDF',
            'project_pdf.max' => 'حجم ملف المشروع يجب ألا يتجاوز 10 ميجابايت',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     */
    public function attributes(): array
    {
        return [
            'department_id' => 'القسم',
            'doctor_name' => 'اسم الدكتور',
            'project_name' => 'اسم المشروع',
            'description' => 'الوصف',
            'image_work' => 'صورة العمل',
            'project_pdf' => 'ملف المشروع',
        ];
    }
}
