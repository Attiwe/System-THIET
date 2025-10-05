<?php

namespace App\Http\Requests\dashboard;

use Illuminate\Foundation\Http\FormRequest;

class ResearchProjectRequest extends FormRequest
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
            'doctor_name' => 'bail|required|string|max:255',
            'research_name' => 'bail|required|string|max:255',
            'research_title' => 'bail|required|string|max:255',
            'research_summary' => 'bail|nullable|string',
        ];

        // For create operation, files are optional
        if ($this->isMethod('POST')) {
            $rules['file_path'] = 'bail|nullable|file|mimes:pdf,doc,docx|max:10240'; // 10MB max
            $rules['image'] = 'bail|nullable|image|mimes:jpeg,png,jpg,gif|max:2048'; // 2MB max
        } else {
            // For update operation, files are optional
            $rules['file_path'] = 'bail|nullable|file|mimes:pdf,doc,docx|max:10240';
            $rules['image'] = 'bail|nullable|image|mimes:jpeg,png,jpg,gif|max:2048';
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'department_id.required' => 'القسم مطلوب',
            'department_id.exists' => 'القسم المحدد غير موجود',
            'doctor_name.required' => 'اسم الدكتور مطلوب',
            'doctor_name.string' => 'اسم الدكتور يجب أن يكون نص',
            'doctor_name.max' => 'اسم الدكتور يجب أن يكون أقل من 255 حرف',
            'research_name.required' => 'اسم البحث مطلوب',
            'research_name.string' => 'اسم البحث يجب أن يكون نص',
            'research_name.max' => 'اسم البحث يجب أن يكون أقل من 255 حرف',
            'research_title.required' => 'عنوان البحث مطلوب',
            'research_title.string' => 'عنوان البحث يجب أن يكون نص',
            'research_title.max' => 'عنوان البحث يجب أن يكون أقل من 255 حرف',
            'research_summary.string' => 'ملخص البحث يجب أن يكون نص',
            'file_path.file' => 'ملف البحث يجب أن يكون ملف',
            'file_path.mimes' => 'ملف البحث يجب أن يكون من نوع PDF أو Word',
            'file_path.max' => 'حجم ملف البحث يجب أن يكون أقل من 10 ميجابايت',
            'image.image' => 'الصورة يجب أن تكون صورة',
            'image.mimes' => 'الصورة يجب أن تكون من نوع JPEG أو PNG أو JPG أو GIF',
            'image.max' => 'حجم الصورة يجب أن يكون أقل من 2 ميجابايت',
        ];
    }
}
