<?php

namespace App\Http\Requests\dashboard;

use Illuminate\Foundation\Http\FormRequest;

class StudyMaterialsRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'study_material' => 'required|array',
            'study_material.*.study_material' => 'required|string',
            'study_material.*.department_id' => 'required|exists:departments,id',
            'study_material.*.level_id' => 'required|exists:level_accademics,id',
        ];
    }

    public function messages()
    {
        return [
            'study_material.*.study_material.required' => 'يرجى إدخال اسم المادة الدراسية',
            'study_material.*.study_material.unique' => 'المادة الدراسية موجودة بالفعل',
            'study_material.*.department_id.required' => 'يرجى اختيار القسم',
            'study_material.*.department_id.exists' => 'القسم غير موجود',
            'study_material.*.level_id.required' => 'يرجى اختيار الفرقة الدراسية',
            'study_material.*.level_id.exists' => 'الفرقة الدراسية غير موجودة',
        ];
    }
}
