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
        return [
            'name' => 'bail|required|string|max:255',
            'description' => 'bail|required|string',
            'dapart_image' => 'bail|required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'requerd_file'=>'bail|required|mimes:pdf,doc,docx|max:2048',
            'depart_massage'=>'bail|required|string',
            'depart_vision'=>'bail|required|string',
            'is_active'=>'bail|required|in:0,1',
        ];
    }

    public function massage (){
        return [
            'name.required'=>'الاسم مطلوب',
            'description.required'=>'الوصف مطلوب',
            'dapart_image.required'=>'الصورة مطلوبة',
            'dapart_image.image'=>'الصورة يجب ان تكون صورة',
            'dapart_image.max'=>'الصورة يجب ان تكون اقل من 2048 كيلوبايت',
            'requerd_file.required'=>'الملف مطلوب',
            'depart_massage.required'=>'الرسالة مطلوبة',
            'depart_vision.required'=>'الرؤية مطلوبة',
            'is_active.required'=>'الحالة مطلوبة',
            'is_active.in'=>'الحالة يجب ان تكون 0 أو 1',
            'requerd_file.max'=>'الملف يجب ان تكون اقل من 2048 كيلوبايت',
            'requerd_file.mimes'=>'الملف يجب ان يكون ملف',
            'depart_massage.string'=>'الرسالة يجب ان تكون نص',
            'depart_vision.string'=>'الرؤية يجب ان تكون نص',
            'depart_massage.max'=>'الرسالة يجب ان تكون اقل من 255 حرف',
            'depart_vision.max'=>'الرؤية يجب ان تكون اقل من 255 حرف',
        ];
    }
}
