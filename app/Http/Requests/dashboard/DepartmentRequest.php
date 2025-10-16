<?php

namespace App\Http\Requests\dashboard;

use Illuminate\Foundation\Http\FormRequest;

class DepartmentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $data = [
            'name' => 'bail|required|string|max:255',
            'description' => 'bail|required|string|max:255',
            'dapart_image' => 'bail|required|image|mimes:jpeg,webp,png,jpg,gif,svg|max:2048',
            'requerd_file' => 'bail|required|mimes:pdf,doc,docx|max:12048',
            'depart_massage' => 'bail|required|string|max:255',
            'depart_vision' => 'bail|required|string|max:255',
            'is_active' => 'bail|required|in:0,1',
        ];

        if ($this->isMethod('put')) {
            $data['dapart_image'] = 'sometimes|bail|required|image|mimes:jpeg,png,jpg,gif,webp,png,svg|max:2048';
            $data['requerd_file'] = 'sometimes|bail|required|mimes:pdf,doc,docx|max:12048';
        }
        return $data;
    }

    public function messages(): array
    {
        return [
            'name.required' => 'الاسم مطلوب',
            'description.required' => 'الوصف مطلوب',

            'dapart_image.required' => 'الصورة مطلوبة',
            'dapart_image.image' => 'الملف يجب أن يكون صورة',
            'dapart_image.mimes' => 'الصورة يجب أن تكون من نوع: jpeg, png, jpg, gif, svg',
            'dapart_image.max' => 'حجم الصورة يجب أن يكون أقل من 2 ميجابايت',

            'requerd_file.required' => 'الملف مطلوب',
            'requerd_file.mimes' => 'الملف يجب أن يكون من نوع: pdf, doc, docx',
            'requerd_file.max' => 'حجم الملف يجب أن يكون أقل من 12 ميجابايت',

            'depart_massage.required' => 'الرسالة مطلوبة',
            'depart_massage.string' => 'الرسالة يجب أن تكون نص',
            'depart_massage.max' => 'الرسالة يجب ألا تزيد عن 255 حرف',

            'depart_vision.required' => 'الرؤية مطلوبة',
            'depart_vision.string' => 'الرؤية يجب أن تكون نص',
            'depart_vision.max' => 'الرؤية يجب ألا تزيد عن 255 حرف',

            'is_active.required' => 'الحالة مطلوبة',
            'is_active.in' => 'الحالة يجب أن تكون 0 (غير نشط) أو 1 (نشط)',
        ];
    }
}
