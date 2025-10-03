<?php

namespace App\Http\Requests\dashboard;

use Illuminate\Foundation\Http\FormRequest;

class TrainingCourseRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $isUpdate = in_array($this->method(), ['PUT', 'PATCH']);

        return [
            'unit_id' => 'bail|required|exists:units,id',
            'workshop_name' => 'bail|required|string|min:2|max:255',
            'lecturer_name' => 'bail|required|string|min:2|max:255',
            'details' => 'bail|required|string|min:5',
            'image' => ($isUpdate ? 'nullable' : 'required') . '|image|mimes:jpg,jpeg,png,webp|max:5120',
        ];
    }

    public function messages()
    {
        return [
            'unit_id.required' => 'الوحدة مطلوبة',
            'unit_id.exists' => 'الوحدة غير صحيحة',
            'workshop_name.required' => 'اسم الورشة مطلوب',
            'lecturer_name.required' => 'اسم المحاضر مطلوب',
            'details.required' => 'التفاصيل مطلوبة',
            'image.required' => 'الصورة مطلوبة',
            'image.image' => 'يجب رفع صورة صالحة',
            'image.mimes' => 'الامتدادات المسموحة: jpg, jpeg, png, webp',
            'image.max' => 'أقصى حجم للصورة 5 ميغابايت',
        ];
    }
}


