<?php

namespace App\Http\Requests\dashboard;

use Illuminate\Foundation\Http\FormRequest;

class PublishingRequest extends FormRequest
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
            'publishing_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'publishing_description' => 'nullable|string|max:1000',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'publishing_name.required' => 'اسم دار النشر مطلوب',
            'publishing_name.string' => 'اسم دار النشر يجب أن يكون نص',
            'publishing_name.max' => 'اسم دار النشر يجب ألا يتجاوز 255 حرف',
            'phone.required' => 'رقم الهاتف مطلوب',
            'phone.string' => 'رقم الهاتف يجب أن يكون نص',
            'phone.max' => 'رقم الهاتف يجب ألا يتجاوز 20 حرف',
            'publishing_description.string' => 'وصف دار النشر يجب أن يكون نص',
            'publishing_description.max' => 'وصف دار النشر يجب ألا يتجاوز 1000 حرف',
        ];
    }
}
