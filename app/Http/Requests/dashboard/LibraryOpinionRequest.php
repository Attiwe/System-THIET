<?php

namespace App\Http\Requests\dashboard;

use Illuminate\Foundation\Http\FormRequest;

class LibraryOpinionRequest extends FormRequest
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
        return [
            'number_library' => 'required',
            'number_prizes' => 'required',
            'image_student' => 'sometimes|required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_library' => 'sometimes|required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'number_library.required' => 'رقم القاعات والمدرجات مطلوب',
            'number_prizes.required' => 'رقم الجوائز مطلوب',
            'image_student.image' => 'صورة آراء الطلاب يجب أن تكون ملف صورة صالح',
            'image_library.image' => 'صورة المكتبة يجب أن تكون ملف صورة صالح',
            'image_student.mimes' => 'صورة آراء الطلاب يجب أن تكون من نوع: jpeg, png, jpg, gif',
            'image_library.mimes' => 'صورة المكتبة يجب أن تكون من نوع: jpeg, png, jpg, gif',
            'image_student.max' => 'حجم صورة آراء الطلاب يجب ألا يزيد عن 2MB',
            'image_library.max' => 'حجم صورة المكتبة يجب ألا يزيد عن 2MB',
        ];
    }

}
