<?php

namespace App\Http\Requests\dashboard;

use Illuminate\Foundation\Http\FormRequest;

class InstituteBoardMemberRequest extends FormRequest
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
            'faculty_members_id' => 'required|exists:faculty_members,id',
            'type' => 'required|in:دكتور,معيد,رئيس مجلس اداره,العميد',
            'description' => 'required|string|max:1000',
        ];

    }

    public function messages()
    {
        return [
            'faculty_members_id.required' => 'العضو الدراسي مطلوب',
            'faculty_members_id.exists' => 'العضو الدراسي غير صحيح',
            'type.required' => 'النوع مطلوب',
            'type.in' => 'النوع غير صحيح',
            'description.required' => 'الوصف مطلوب',
            'description.string' => 'الوصف يجب أن يكون نصاً',
            'description.max' => 'الوصف يجب أن يكون أقل من 1000 حرف',
        ];
    }
}
