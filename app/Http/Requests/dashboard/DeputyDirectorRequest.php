<?php

namespace App\Http\Requests\dashboard;

use Illuminate\Foundation\Http\FormRequest;

class DeputyDirectorRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'unit_id' => 'bail|required|exists:units,id',
            'name' => 'bail|required|string|min:2|max:255',
            'deputy_director' => 'bail|required|string|min:2|max:255',
        ];
    }

    public function messages()
    {
        return [
            'unit_id.required' => 'الوحدة مطلوبة',
            'unit_id.exists' => 'الوحدة غير صحيحة',
            'name.required' => 'الاسم مطلوب',
            'deputy_director.required' => 'النائب مطلوب',
        ];
    }
}


