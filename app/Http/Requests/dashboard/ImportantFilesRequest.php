<?php

namespace App\Http\Requests\dashboard;

use Illuminate\Foundation\Http\FormRequest;

class ImportantFilesRequest extends FormRequest
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
            'title' => 'bail|required|string|min:2|max:255',
            'file_path' => ($isUpdate ? 'nullable' : 'required') . '|file|mimes:pdf,doc,docx,png,jpg,jpeg,webp|max:5120',
        ];
    }

    public function messages()
    {
        return [
            'unit_id.required' => 'الوحدة مطلوبة',
            'unit_id.exists' => 'الوحدة غير صحيحة',
            'title.required' => 'العنوان مطلوب',
            'file_path.required' => 'الملف مطلوب',
        ];
    }
}


