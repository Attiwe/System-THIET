<?php

namespace App\Http\Requests\dashboard;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FacultyMembersRequest extends FormRequest
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
      $data =   [
            'name' => 'required|string|max:255',
            'type' => ['required', 'string', Rule::in(['دكتور', 'معيد'])],
            'appointment_date' => 'required|date',
            'department_id' => ['required', 'exists:departments,id'],
            'faculty_code' => ['required', 'string', 'max:255', Rule::unique('faculty_members', 'faculty_code')->ignore($this->route('id'))],
            'appointment_type' => ['required', 'string', Rule::in(['معين', 'منتدب', 'غير ذلك'])],
            'username' => ['required', 'string', 'max:255', Rule::unique('faculty_members', 'username')->ignore($this->route('id'))],
            'email' => ['required', 'email', 'max:255', Rule::unique('faculty_members', 'email')->ignore($this->route('id'))],
            'password' => ['required', 'string', 'min:8'],
            'phone' => ['nullable', 'numeric' ],
            'facebook' => ['nullable', 'string', 'max:255'],
            'personal_image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,png,webp', 'max:2048'],
            'resume' => ['required', 'file', 'mimes:pdf', 'max: 20480'],
            'researches' => ['nullable', 'file', 'mimes:pdf', 'max: 20480'],
        ];

        if($this->isMethod('post') || $this->isMethod('put')){
            $data['faculty_code'] = ['required', 'string', 'max:255'];
            $data['username'] = ['required', 'string', 'max:255'];
            $data['email'] = ['required', 'email', 'max:255'];
            $data['password'] = ['required', 'string', 'min:8'];
            $data['personal_image'] = ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,png,webp', 'max:2048'];
            $data['resume'] = ['required', 'file', 'mimes:pdf,doc,docx', 'max: 20480'];
            $data['researches'] = ['nullable', 'file', 'mimes:pdf,doc,docx', 'max: 20480'];

            
        }

        return $data;     
    }


    public function messages()
    {
        return [
            'name.required' => 'الاسم مطلوب',
            'name.string' => 'الاسم يجب ان يكون حروف فقط',
            'name.max' => 'الحد الاقصى للاسم 255 حرف',
            'type.required' => 'النوع مطلوب',
            'type.in' => 'النوع غير موجود',
            'appointment_date.required' => 'تاريخ التعيين مطلوب',
            'appointment_date.date' => 'تاريخ التعيين غير صحيح',
            'department_id.required' => 'القسم مطلوب',
            'department_id.exists' => 'القسم غير موجود',
            'faculty_code.required' => 'كود الكلية مطلوب',
            'faculty_code.unique' => 'كود الكلية مستخدم من قبل',
            'appointment_type.required' => 'نوع التعيين مطلوب',
            'appointment_type.in' => 'نوع التعيين غير موجود',
            'username.required' => 'اسم المستخدم مطلوب',
            'username.unique' => 'اسم المستخدم مستخدم من قبل',
            'email.required' => 'البريد الالكتروني مطلوب',
            'email.email' => 'البريد الالكتروني غير صحيح',
            'email.unique' => 'البريد الالكتروني مستخدم من قبل',
            'password.required' => 'كلمة المرور مطلوبة',
            'password.min' => 'كلمة المرور يجب ان تكون اكبر من 8 حروف',
            'phone.numeric' => 'الهاتف يجب ان يكون رقم',
            'facebook.string' => 'فيسبوك يجب ان يكون حروف فقط',
            'personal_image.image' => 'الصورة الشخصية يجب ان تكون صورة',
            'personal_image.mimes' => 'الصورة الشخصية يجب ان تكون ملف من نوع jpeg,png,jpg,gif,webp',
            'personal_image.max' => 'الحد الاقصى للصورة الشخصية 20480 ميغابايت',
            'resume.file' => 'السيمة يجب ان تكون ملف',
            'resume.mimes' => 'السيمة يجب ان تكون ملف من نوع pdf,doc,docx,jpg,jpeg,png,gif,webp',
            'resume.max' => 'الحد الاقصى للسيمة 20480 ميغابايت',
            'researches.file' => 'الابحاث يجب ان تكون ملف',
            'researches.mimes' => 'الابحاث يجب ان تكون ملف من نوع pdf,doc,docx,jpg,jpeg,png,gif,webp',
            'researches.max' => 'الحد الاقصى للابحاث 20480 ميغابايت',
        ];
    }

}




