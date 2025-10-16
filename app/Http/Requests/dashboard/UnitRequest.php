<?php

namespace App\Http\Requests\dashboard;

use Illuminate\Foundation\Http\FormRequest;

class UnitRequest extends FormRequest
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
        $data = [
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,webp,png,jpg,gif,svg|max:2048',
            'vision' => 'required|string',
            'message' => 'required|string',
        ];
        if ($this->method() == 'PUT' || $this->method() == 'PATCH') {
            $data['image'] = 'nullable|image|mimes:jpeg,png,webp,jpg,gif,svg|max:2048';
        }
        return $data;
    }

    public function messages()
    {
        return [
            'name.required' => 'الاسم مطلوب',
            'image.required' => 'الصوره مطلوبه',
            'vision.required' => 'الرؤية مطلوبه',
            'message.required' => 'الرسالة مطلوبه',
            'image.image' => 'الصوره يجب ان تكون صورة',
            'image.max' => 'الصوره يجب ان تكون اقل من 2048 كيلوبايت',
            'image.mimes' => 'الصوره يجب ان تكون من نوع: jpeg, png, webp, jpg, gif, svg',

        ];
    }
}
