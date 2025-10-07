<?php

namespace App\Http\Requests\dashboard;

use Illuminate\Foundation\Http\FormRequest;

class AuthorRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
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
            'name.required' => 'اسم المؤلف مطلوب',
            'name.string' => 'اسم المؤلف يجب أن يكون نص',
            'name.max' => 'اسم المؤلف يجب ألا يتجاوز 255 حرف',
            'description.string' => 'وصف المؤلف يجب أن يكون نص',
            'description.max' => 'وصف المؤلف يجب ألا يتجاوز 1000 حرف',
        ];
    }
}
