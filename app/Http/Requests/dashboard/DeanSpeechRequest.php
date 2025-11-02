<?php

namespace App\Http\Requests\dashboard;

use Illuminate\Foundation\Http\FormRequest;

class DeanSpeechRequest extends FormRequest
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
            'management_name' => 'required|string|max:255',
            'title' => 'required|string',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:5120', // 5MB max
        ];

        // For update, image is optional
        if ($this->isMethod('PUT') || $this->isMethod('PATCH')) {
            $rules['image'] = 'sometimes|nullable|image|mimes:jpeg,png,jpg,gif|max:5120';
        }

        // Resume can be either text or file
        if ($this->hasFile('resume')) {
            $rules['resume'] = 'file|mimes:pdf,doc,docx,txt|max:10240'; // 10MB max for files
        } else {
            $rules['resume'] = 'nullable|string';
        }

        return $rules;
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'management_name.required' => 'اسم العميد مطلوب',
            'management_name.string' => 'اسم العميد يجب أن يكون نص',
            'title.required' => 'كلمة العميد مطلوبة',
            'title.string' => 'كلمة العميد يجب أن تكون نص',
            'image.required' => 'صورة العميد مطلوبة',
            'image.image' => 'الملف المرفوع يجب أن يكون صورة',
            'image.mimes' => 'نوع الصورة يجب أن يكون: jpeg, png, jpg, gif',
            'image.max' => 'حجم الصورة يجب ألا يتجاوز 5 ميجابايت',
            'resume.file' => 'السيرة الذاتية يجب أن تكون ملف',
            'resume.mimes' => 'نوع ملف السيرة الذاتية يجب أن يكون: pdf, doc, docx, txt',
            'resume.max' => 'حجم ملف السيرة الذاتية يجب ألا يتجاوز 10 ميجابايت',
        ];
    }
}
