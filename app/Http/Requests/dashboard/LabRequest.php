<?php

namespace App\Http\Requests\dashboard;

use Illuminate\Foundation\Http\FormRequest;

class LabRequest extends FormRequest
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
            'lab_name' => 'bail|required|string|max:255',
        ];

        // For create operation, file is required
        if ($this->isMethod('POST')) {
            $rules['lab_pdf'] = 'bail|required|file|mimes:pdf,doc,docx|max:10240'; // 10MB max
        } else {
            // For update operation, file is optional
            $rules['lab_pdf'] = 'bail|nullable|file|mimes:pdf,doc,docx|max:10240';
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'department_id.required' => 'القسم مطلوب',
            'department_id.exists' => 'القسم المحدد غير موجود',
            'lab_name.required' => 'اسم المختبر مطلوب',
            'lab_name.string' => 'اسم المختبر يجب أن يكون نص',
            'lab_name.max' => 'اسم المختبر يجب أن يكون أقل من 255 حرف',
            'lab_pdf.required' => 'ملف المختبر مطلوب',
            'lab_pdf.file' => 'ملف المختبر يجب أن يكون ملف',
            'lab_pdf.mimes' => 'ملف المختبر يجب أن يكون من نوع PDF أو Word',
            'lab_pdf.max' => 'حجم ملف المختبر يجب أن يكون أقل من 10 ميجابايت',
        ];
    }
}
