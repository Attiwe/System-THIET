<?php

namespace App\Http\Requests\dashboard;

use Illuminate\Foundation\Http\FormRequest;

class MasterisDoctoralThesesRequest extends FormRequest
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
        $thesisId = $this->route('masterisDoctoralThesis') ?? $this->route('id');
        
        return [
            'department_id' => 'required|exists:departments,id',
            'doctor_name' => 'required|string|max:255',
            'title_thesis' => 'required|string|max:500',
            'description' => 'required|string',
            'type' => 'required|in:master,doctoral,other',
            'thesis_pdf' => 'nullable|file|mimes:pdf|max:10240', // 10MB max
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
            'title_thesis.required' => 'يرجى إدخال عنوان الرسالة/الأطروحة',
            'title_thesis.string' => 'عنوان الرسالة/الأطروحة يجب أن يكون نص',
            'title_thesis.max' => 'عنوان الرسالة/الأطروحة يجب ألا يتجاوز 500 حرف',
            'description.required' => 'يرجى إدخال وصف الرسالة/الأطروحة',
            'description.string' => 'الوصف يجب أن يكون نص',
            'type.required' => 'يرجى اختيار نوع الرسالة/الأطروحة',
            'type.in' => 'نوع الرسالة/الأطروحة غير صحيح',
            'thesis_pdf.file' => 'ملف الرسالة/الأطروحة يجب أن يكون ملف',
            'thesis_pdf.mimes' => 'ملف الرسالة/الأطروحة يجب أن يكون بصيغة PDF',
            'thesis_pdf.max' => 'حجم ملف الرسالة/الأطروحة يجب ألا يتجاوز 10 ميجابايت',
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
            'title_thesis' => 'عنوان الرسالة/الأطروحة',
            'description' => 'الوصف',
            'type' => 'النوع',
            'thesis_pdf' => 'ملف الرسالة/الأطروحة',
        ];
    }
}
