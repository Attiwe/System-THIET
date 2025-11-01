<?php

namespace App\Http\Requests\dashboard;

use Illuminate\Foundation\Http\FormRequest;

class PublishingAwardsRequest extends FormRequest
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
            'doctor_name' => 'required|string|max:255',
            'award_name' => 'required|string|max:255',
            'award_date' => 'required|date',
            'project_file' => 'nullable|file|mimes:pdf,doc,docx|max:100240', // 10MB max
        ];

        // For update, make file optional
        if ($this->isMethod('put') || $this->isMethod('patch')) {
            $rules['project_file'] = 'nullable|file|mimes:pdf,doc,docx|max:100240';
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
            'doctor_name.required' => 'اسم الدكتور مطلوب',
            'doctor_name.string' => 'اسم الدكتور يجب أن يكون نص',
            'doctor_name.max' => 'اسم الدكتور يجب ألا يتجاوز 255 حرف',
            'award_name.required' => 'اسم الجائزة مطلوب',
            'award_name.string' => 'اسم الجائزة يجب أن يكون نص',
            'award_name.max' => 'اسم الجائزة يجب ألا يتجاوز 255 حرف',
            'award_date.required' => 'تاريخ الجائزة مطلوب',
            'award_date.date' => 'تاريخ الجائزة يجب أن يكون تاريخ صحيح',
            'project_file.file' => 'ملف المشروع يجب أن يكون ملف',
            'project_file.mimes' => 'ملف المشروع يجب أن يكون من نوع: pdf, doc, docx',
            'project_file.max' => 'حجم ملف المشروع يجب ألا يتجاوز 10 ميجابايت',
        ];
    }
}

