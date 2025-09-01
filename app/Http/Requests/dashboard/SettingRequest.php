<?php

 namespace App\Http\Requests\dashboard;

 use Illuminate\Foundation\Http\FormRequest;

 class SettingRequest extends FormRequest
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
             'name' => 'required|string',
             'email' => 'required|email',
             'phone1' => 'required|numeric',
             'phone2' => 'required|numeric',
             'address' => 'required|string',
             'logo' => 'sometimes|required|image|max:2048|mimes:jpeg,png,jpg,gif,svg,jfif,webp,avif,heic,heif',
         ];
     }

     public function messages(): array
     {
         return [
             'name.required' => 'الاسم مطلوب',
             'name.string' => 'الاسم يجب ان يكون نص',

             'email.required' => 'البريد الالكتروني مطلوب',
             'email.email' => 'البريد الالكتروني يجب ان يكون بريد صحيح',

             'phone1.required' => 'رقم الهاتف 1 مطلوب',
             'phone1.numeric' => 'رقم الهاتف 1 يجب ان يكون رقم',

             'phone2.required' => 'رقم الهاتف 2 مطلوب',
             'phone2.numeric' => 'رقم الهاتف 2 يجب ان يكون رقم',

             'address.required' => 'العنوان مطلوب',
             'address.string' => 'العنوان يجب ان يكون نص',

             'logo.required' => 'الشعار مطلوب',
             'logo.image' => 'الشعار يجب ان يكون صورة',
             'logo.max' => 'الشعار يجب ان يكون حجمه اقل من 2 ميجابايت',
             'logo.mimes' => 'الشعار يجب ان يكون من نوع: jpeg, png, jpg, gif, svg, jfif, webp, avif, heic, heif',
         ];
     }
 }
