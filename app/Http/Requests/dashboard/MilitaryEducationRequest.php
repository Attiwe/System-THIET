<?php

namespace App\Http\Requests\dashboard;

use Illuminate\Foundation\Http\FormRequest;

class MilitaryEducationRequest extends FormRequest
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
            'description' => 'required|string|min:10|max:5000',
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'description.required' => 'يرجى إدخال وصف التربية العسكرية',
            'description.string' => 'وصف التربية العسكرية يجب أن يكون نص',
            'description.min' => 'وصف التربية العسكرية يجب أن يكون على الأقل 10 أحرف',
            'description.max' => 'وصف التربية العسكرية يجب أن يكون أقل من 5000 حرف',
        ];
    }
}
