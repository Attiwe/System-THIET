<?php

namespace App\Http\Requests\dashboard;

use Illuminate\Foundation\Http\FormRequest;

class UnitObjectivesRequest extends FormRequest
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
            'unit_id' => 'required|exists:units,id',
            'text' => 'required|string|min:10|max:2000',
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
            'unit_id.required' => 'يرجى اختيار الوحدة',
            'unit_id.exists' => 'الوحدة المختارة غير موجودة',
            'text.required' => 'يرجى إدخال نص الأهداف',
            'text.string' => 'يجب أن يكون نص الأهداف نصي',
            'text.min' => 'يجب أن يكون نص الأهداف على الأقل 10 أحرف',
            'text.max' => 'يجب أن يكون نص الأهداف أقل من 2000 حرف',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'unit_id' => 'الوحدة',
            'text' => 'نص الأهداف',
        ];
    }
}
