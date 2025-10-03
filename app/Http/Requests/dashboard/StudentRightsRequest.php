<?php

namespace App\Http\Requests\dashboard;

use Illuminate\Foundation\Http\FormRequest;

class StudentRightsRequest extends FormRequest
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
            'details' => 'required|string|min:10|max:5000',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'details.required' => 'تفاصيل حقوق الطلاب مطلوبة',
            'details.string' => 'تفاصيل حقوق الطلاب يجب أن تكون نص',
            'details.min' => 'تفاصيل حقوق الطلاب يجب أن تكون على الأقل 10 أحرف',
            'details.max' => 'تفاصيل حقوق الطلاب يجب أن تكون أقل من 5000 حرف',
        ];
    }
}
