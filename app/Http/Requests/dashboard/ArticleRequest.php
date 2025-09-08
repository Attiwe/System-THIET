<?php

namespace App\Http\Requests\dashboard;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
            'description' => 'required|string',
            'date' => 'required|date',
            'image_article' => 'sometimes|required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_active' => 'required|boolean',
        ];
    }


    public function messages()
    {
        return [
            'title.required' => 'العنوان مطلوب',
            'description.required' => 'الوصف مطلوب',
            'date.required' => 'التاريخ مطلوب',
            'image_article.required' => 'الصورة مطلوبة',
            'is_active.required' => 'الحالة مطلوبة',
            'image_article.image' => 'الصورة يجب أن تكون ملف صورة صالح',
            'image_article.mimes' => 'الصورة يجب أن تكون من نوع: jpeg, png, jpg, gif',
            'image_article.max' => 'الصورة يجب أن لا تتجاوز 2048 كيلوبايت',
        ];
    }
}
