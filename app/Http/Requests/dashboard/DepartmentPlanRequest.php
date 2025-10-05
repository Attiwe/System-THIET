<?php

namespace App\Http\Requests\dashboard;

use Illuminate\Foundation\Http\FormRequest;

class DepartmentPlanRequest extends FormRequest
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

        // For create operation, files are optional
        if ($this->isMethod('POST')) {
            $rules['research_plan'] = 'bail|nullable|file|mimes:pdf,doc,docx|max:10240'; // 10MB max
            $rules['law'] = 'bail|nullable|file|mimes:pdf,doc,docx|max:10240';
            $rules['department_book'] = 'bail|nullable|file|mimes:pdf,doc,docx|max:10240';
            $rules['council'] = 'bail|nullable|file|mimes:pdf,doc,docx|max:10240';
            $rules['courses'] = 'bail|nullable|file|mimes:pdf,doc,docx|max:10240';
        } else {
            // For update operation, files are optional
            $rules['research_plan'] = 'bail|nullable|file|mimes:pdf,doc,docx|max:10240';
            $rules['law'] = 'bail|nullable|file|mimes:pdf,doc,docx|max:10240';
            $rules['department_book'] = 'bail|nullable|file|mimes:pdf,doc,docx|max:10240';
            $rules['council'] = 'bail|nullable|file|mimes:pdf,doc,docx|max:10240';
            $rules['courses'] = 'bail|nullable|file|mimes:pdf,doc,docx|max:10240';
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'department_id.required' => 'القسم مطلوب',
            'department_id.exists' => 'القسم المحدد غير موجود',
            'research_plan.file' => 'خطة البحث يجب أن تكون ملف',
            'research_plan.mimes' => 'خطة البحث يجب أن تكون من نوع PDF أو Word',
            'research_plan.max' => 'حجم ملف خطة البحث يجب أن يكون أقل من 10 ميجابايت',
            'law.file' => 'اللائحة الداخلية يجب أن تكون ملف',
            'law.mimes' => 'اللائحة الداخلية يجب أن تكون من نوع PDF أو Word',
            'law.max' => 'حجم ملف اللائحة الداخلية يجب أن يكون أقل من 10 ميجابايت',
            'department_book.file' => 'كتاب القسم يجب أن يكون ملف',
            'department_book.mimes' => 'كتاب القسم يجب أن يكون من نوع PDF أو Word',
            'department_book.max' => 'حجم ملف كتاب القسم يجب أن يكون أقل من 10 ميجابايت',
            'council.file' => 'المجلس يجب أن يكون ملف',
            'council.mimes' => 'المجلس يجب أن يكون من نوع PDF أو Word',
            'council.max' => 'حجم ملف المجلس يجب أن يكون أقل من 10 ميجابايت',
            'courses.file' => 'المقررات الدراسية يجب أن تكون ملف',
            'courses.mimes' => 'المقررات الدراسية يجب أن تكون من نوع PDF أو Word',
            'courses.max' => 'حجم ملف المقررات الدراسية يجب أن يكون أقل من 10 ميجابايت',
        ];
    }
}
