<?php

namespace App\Http\Requests\dashboard;

use Illuminate\Foundation\Http\FormRequest;

class UnitInstitutesRequest extends FormRequest
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
            'vision' => 'required|string|max:2000',
            'message' => 'required|string|max:2000',
            'description' => 'required|string|max:2000',
            'status' => 'boolean',
        ];

        // Add image validation only for create or when image is being updated
        if ($this->isMethod('post') || $this->hasFile('image')) {
            $rules['image'] = 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048';
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
            'vision.required' => 'الرؤية مطلوبة',
            'vision.string' => 'الرؤية يجب أن تكون نص',
            'vision.max' => 'الرؤية يجب ألا تتجاوز 2000 حرف',
            'message.required' => 'الرسالة مطلوبة',
            'message.string' => 'الرسالة يجب أن تكون نص',
            'message.max' => 'الرسالة يجب ألا تتجاوز 2000 حرف',
            'description.required' => 'الوصف مطلوب',
            'description.string' => 'الوصف يجب أن يكون نص',
            'description.max' => 'الوصف يجب ألا يتجاوز 2000 حرف',
            'image.required' => 'الصورة مطلوبة',
            'image.image' => 'يجب أن يكون الملف صورة',
            'image.mimes' => 'نوع الصورة يجب أن يكون: jpeg, png, jpg, gif, webp',
            'image.max' => 'حجم الصورة يجب ألا يتجاوز 2 ميجابايت',
            'status.boolean' => 'الحالة يجب أن تكون مفعلة أو غير مفعلة',
        ];
    }
}
