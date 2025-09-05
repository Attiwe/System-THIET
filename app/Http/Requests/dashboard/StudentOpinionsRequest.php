<?php

namespace App\Http\Requests\dashboard;

use Illuminate\Foundation\Http\FormRequest;

class StudentOpinionsRequest extends FormRequest
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
            'name' => 'bail|required|string|max:255',
             'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'details' => 'bail|required|string',
            'is_active' => 'bail|required|boolean',
        ];
        if($this->method() == 'PUT' || $this->method() == 'PATCH' ) {
            $data['image'] = 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048';
        }
        return $data;

    }

    public function messages()
    {
        return [
            'name.required' => 'الاسم مطلوب',
            'title.required' => 'العنوان مطلوب',
            'image.required' => 'الصورة مطلوبة',
            'details.required' => 'التفاصيل مطلوبة',
            'is_active.required' => 'الحالة مطلوبة',
            'name.max' => 'الاسم يجب أن يحتوي على 255 حرفًا أقصى',
            'title.max' => 'العنوان يجب أن يحتوي على 255 حرفًا أقصى',
            'image.max' => 'الصورة يجب أن تكون حجمها أقل من 2048 كيلوبايت',
            'image.mimes' => 'الصورة يجب أن تكون من نوع jpeg, png, jpg, gif, svg',
            'details.max' => 'التفاصيل يجب أن يحتوي على 255 حرفًا أقصى',
            'is_active.boolean' => 'الحالة يجب أن تكون من نوع boolean',

        ];
    }
}
