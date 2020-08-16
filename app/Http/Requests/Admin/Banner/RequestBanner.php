<?php

namespace App\Http\Requests\Admin\Banner;

use Illuminate\Foundation\Http\FormRequest;

class RequestBanner extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'image' => 'required|mimes:jpg,png,jpeg'
        ];
    }
    public function messages()
    {
        return [
            'image.required' => 'Bạn chưa upload ảnh!',
            'image.mimes' => 'Upload ảnh không đúng định dạng!'
        ];
    }
}
