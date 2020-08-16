<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class LoginAdminRequest extends FormRequest
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
            'email' => 'email|required|exists:users',
            'password' => 'required|min:6'
        ];
    }
    public function messages()
    {
        return [
            'email.email' => 'Email không đúng định dạng',
            'email.required' => 'Email chưa nhập',
            'email.exists' => 'Email không tồn tại!',
            'password.required' => 'Bạn chưa nhập password',
            'password.min' => 'Password phải có ít nhất 6 ký tự'
        ];
    }
}
