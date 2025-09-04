<?php

    namespace App\Http\Requests\dashboard;

    use Illuminate\Foundation\Http\FormRequest;

    class FeaturedWorkRequest extends FormRequest
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
            $data= [
                'name' => 'bail|required|string|max:255',
                'image' => 'bail|required_if:is_active,1|image|mimes:jpeg,png,jpg,gif|max:2048',
                'title' => 'bail|required|string|max:255',
                'details' => 'bail|required|string',
                'is_active' => 'bail|required|boolean|in:0,1',
            ];
            if($this->isMethod('put') || $this->isMethod('patch')) {
                $data['image'] = 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048';
            }
            return $data;
        }

        public function messages()
        {
            return [

                'name.required' => 'الاسم مطلوب',
                'image.required' => 'الصورة مطلوبة',
                'title.required' => 'العنوان مطلوب',
                'details.required' => 'التفاصيل مطلوبة',
                'is_active.required' => 'الحالة مطلوبة',
                'is_active.in' => 'الحالة يجب أن تكون 0 أو 1',
                'image.image' => 'الصورة يجب أن تكون صورة',
                'image.mimes' => 'الصورة يجب أن تكون من نوع jpeg,png,jpg,gif',
                'image.max' => 'الصورة يجب أن لا تتجاوز 2048 كيلوبايت',
                'title.max' => 'العنوان يجب أن لا يتجاوز 255 حرف',
                'details.max' => 'التفاصيل يجب أن لا تتجاوز 255 حرف',
                
            ];
        }
    }
