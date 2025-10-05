<?php

namespace App\Http\Requests\dashboard;

use Illuminate\Foundation\Http\FormRequest;

class ScientificTripRequest extends FormRequest
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
            'department_id' => 'bail|required|exists:departments,id',
            'doctor_name' => 'bail|required|string|max:255',
            'trip_name' => 'bail|required|string|max:255',
            'description' => 'bail|required|string',
        ];

        // For create operation, image is required
        if ($this->isMethod('POST')) {
            $rules['trip_image'] = 'bail|required|image|mimes:jpeg,png,jpg,gif|max:2048'; // 2MB max
        } else {
            // For update operation, image is optional
            $rules['trip_image'] = 'bail|nullable|image|mimes:jpeg,png,jpg,gif|max:2048';
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'department_id.required' => 'القسم مطلوب',
            'department_id.exists' => 'القسم المحدد غير موجود',
            'doctor_name.required' => 'اسم الدكتور مطلوب',
            'doctor_name.string' => 'اسم الدكتور يجب أن يكون نص',
            'doctor_name.max' => 'اسم الدكتور يجب أن يكون أقل من 255 حرف',
            'trip_name.required' => 'اسم الرحلة العلمية مطلوب',
            'trip_name.string' => 'اسم الرحلة العلمية يجب أن يكون نص',
            'trip_name.max' => 'اسم الرحلة العلمية يجب أن يكون أقل من 255 حرف',
            'description.required' => 'وصف الرحلة العلمية مطلوب',
            'description.string' => 'وصف الرحلة العلمية يجب أن يكون نص',
            'trip_image.required' => 'صورة الرحلة العلمية مطلوبة',
            'trip_image.image' => 'صورة الرحلة العلمية يجب أن تكون صورة',
            'trip_image.mimes' => 'صورة الرحلة العلمية يجب أن تكون من نوع JPEG أو PNG أو JPG أو GIF',
            'trip_image.max' => 'حجم صورة الرحلة العلمية يجب أن يكون أقل من 2 ميجابايت',
        ];
    }
}
