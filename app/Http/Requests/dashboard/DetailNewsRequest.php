<?php

namespace App\Http\Requests\dashboard;

use Illuminate\Foundation\Http\FormRequest;

class DetailNewsRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,png|max:2048',
            'new_element_id' => 'required|exists:new_elements,id',
            'publisher' => 'required|string|max:255',
        ];

        if ($this->isMethod('put')) {
            $rules['image'] = 'sometimes|nullable|image|mimes:jpeg,png,jpg,gif,png|max:2048';
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'title.required' => 'العنوان مطلوب',
            'description.required' => 'الوصف مطلوب',
            'description.max' => 'الوصف يجب ان يحتوي على 255 حرف',
            'title.max' => 'العنوان يجب ان يحتوي على 255 حرف',
            'image.required' => 'الصورة مطلوبة',
            'image.max' => 'الصورة يجب ان يحتوي على 2048 حرف',
            'image.mimes' => 'الصورة يجب ان تكون من نوع jpeg,png,jpg,gif,png',
            'new_element_id.required' => 'العنصر مطلوب',
            'new_element_id.exists' => 'العنصر غير موجود',
            'publisher.required' => 'الناشر مطلوب',
            'publisher.max' => 'الناشر يجب ان يحتوي على 255 حرف',
            'publisher.string' => 'الناشر يجب ان يكون نص',

        ];
    }
}
