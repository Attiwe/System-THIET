<?php

namespace App\Http\Requests\dashboard;

use Illuminate\Foundation\Http\FormRequest;

class ManagementBoardsRequest extends FormRequest
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
        $isUpdate = in_array($this->method(), ['PUT', 'PATCH']);

        return [
            'unit_id' => 'bail|required|exists:units,id',
            'file_path' => ($isUpdate ? 'nullable' : 'required') . '|file|mimes:pdf,doc,docx,png,jpg,jpeg,webp|max:5120',
        ];
    }

    public function messages()
    {
        return [
            'unit_id.required' => 'الوحدة مطلوبة',
            'unit_id.exists' => 'الوحدة غير صحيحة',
            'file_path.required' => 'الملف مطلوب',
            'file_path.file' => 'يجب رفع ملف صالح',
            'file_path.mimes' => 'الامتدادات المسموحة: pdf, doc, docx, png, jpg, jpeg, webp',
            'file_path.max' => 'أقصى حجم للملف 5 ميغابايت',
        ];
    }
}


