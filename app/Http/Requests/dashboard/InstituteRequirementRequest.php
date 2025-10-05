<?php

namespace App\Http\Requests\dashboard;

use Illuminate\Foundation\Http\FormRequest;

class InstituteRequirementRequest extends FormRequest
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
            'department_id' => 'bail|required|exists:departments,id',
        ];

        // For create operation, file is required
        if ($this->isMethod('POST')) {
            $rules['file_path'] = 'bail|required|file|mimes:pdf,doc,docx|max:10240'; // 10MB max
        } else {
            // For update operation, file is optional
            $rules['file_path'] = 'bail|nullable|file|mimes:pdf,doc,docx|max:10240';
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'department_id.required' => 'القسم مطلوب',
            'department_id.exists' => 'القسم المحدد غير موجود',
            'file_path.required' => 'ملف متطلبات المعهد مطلوب',
            'file_path.file' => 'ملف متطلبات المعهد يجب أن يكون ملف',
            'file_path.mimes' => 'ملف متطلبات المعهد يجب أن يكون من نوع PDF أو Word',
            'file_path.max' => 'حجم ملف متطلبات المعهد يجب أن يكون أقل من 10 ميجابايت',
        ];
    }
}
