<?php

namespace App\Http\Requests\dashboard;

use Illuminate\Foundation\Http\FormRequest;

class OrganizationStructureRequest extends FormRequest
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
            'unit_id' => 'required|exists:units,id',
        ];

        // For create requests, file is required
        if ($this->isMethod('POST')) {
            $rules['file_path'] = 'required|file|mimes:pdf,jpg,jpeg,png|max:10240';
        } else {
            // For update requests, file is optional
            $rules['file_path'] = 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10240';
        }

        return $rules;
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'unit_id.required' => 'يرجى اختيار الوحدة',
            'unit_id.exists' => 'الوحدة المختارة غير موجودة',
            'file_path.required' => 'يرجى رفع ملف الهيكل التنظيمي',
            'file_path.file' => 'يجب أن يكون الملف صالح',
            'file_path.mimes' => 'يجب أن يكون الملف من نوع: pdf, jpg, jpeg, png',
            'file_path.max' => 'يجب أن يكون حجم الملف أقل من 10 ميجابايت',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'unit_id' => 'الوحدة',
            'file_path' => 'ملف الهيكل التنظيمي',
        ];
    }
}
