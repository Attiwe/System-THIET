<?php

namespace App\Http\Requests\dashboard;

use Illuminate\Foundation\Http\FormRequest;

class SilderRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'image_slider' => 'sometimes|required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'is_active' => 'required|boolean|in:0,1',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'حقل العنوان مطلوب.',
            'title.string' => 'حقل العنوان يجب أن يكون نصاً.',
            'title.max' => 'حقل العنوان يجب ألا يزيد عن 255 حرف.',

            'image_slider.required' => 'حقل الصورة مطلوب.',
            'image_slider.image' => 'الملف يجب أن يكون صورة.',
            'image_slider.mimes' => 'الصورة يجب أن تكون من النوع: jpeg, png, jpg, gif, svg.',
            'image_slider.max' => 'حجم الصورة يجب ألا يتجاوز 2 ميجا بايت.',

            'is_active.required' => 'حقل حالة التفعيل مطلوب.',
            'is_active.boolean' => 'حقل حالة التفعيل يجب أن يكون صحيح (true) أو خطأ (false).',
            'is_active.in' => 'حقل حالة التفعيل يجب أن يكون إما 0 (غير مفعل) أو 1 (مفعل).',
        ];
    }
}
