<?php

namespace App\Http\Requests\dashboard;

use Illuminate\Foundation\Http\FormRequest;

class QualityItemRequest extends FormRequest
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
             'quality_form_id' => 'required|exists:quality_forms,id',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'اسم العنصر مطلوب',
            'quality_form_id.required' => 'النموذج مطلوب',
            'quality_form_id.exists' => 'النموذج غير صحيح',
            'name.max' => 'اسم العنصر يجب ان لا يتجاوز 255 حرف',
        ];
    }
}
