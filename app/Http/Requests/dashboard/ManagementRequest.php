<?php

namespace App\Http\Requests\dashboard;

use Illuminate\Foundation\Http\FormRequest;

class ManagementRequest extends FormRequest
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
        $data = [
             'name' => 'required|string|max:255',
             'position' => 'required|string|max:255',
             'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
             'resume' => 'required|file|mimes:pdf|max:2048',
             'description' => 'required|string',
             'facebook' => 'nullable|url',
             'twitter' => 'nullable|url',
             'instagram' => 'nullable|url',
             'linkedin' => 'nullable|url',
        ];
        if($this->isMethod('PUT')){
            $data['image'] = 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048';
            $data['resume'] = 'nullable|file|mimes:pdf|max:2048';
        }
        return $data;
    }

    public function messages(): array
    {
        return [
            'name.required' => 'الاسم مطلوب',
            'position.required' => 'الوظيفة مطلوبة',
            'image.required' => 'الصورة مطلوبة',
            'resume.required' => 'السيرة الذاتية مطلوبة',
            'description.required' => 'الوصف مطلوب',
            'facebook.url' => 'رابط فيسبوك غير صحيح',
            'twitter.url' => 'رابط تويتر غير صحيح',
            'instagram.url' => 'رابط انستاجرام غير صحيح',
            'linkedin.url' => 'رابط لينكدان غير صحيح',
        ];

    }
}
