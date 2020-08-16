<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;

class RequestFormUser extends FormRequest
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
            'email' => [
                'required',
                'email',
                function($attribute, $value, $fail){
                    if (DB::table('users')->where('email', $value)->whereNull('deleted_at')->exists()){
                        return $fail('Email này đã được sử dụng!');
                    }
                }
            ],
            'password' => 'required|min:6|max:20',
            'image' => 'mimes:jpg,png,jpeg|max:2048'
        ];
    }
    public function messages(){
        return [
            'email.required' => 'Bạn chưa nhập email',
            'email.email' => 'Chưa đúng định dạng email',
            'email.unique' => 'Email đã tồn tại!',
            'password.required' => 'Bạn chưa điền mật khẩu',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự',
            'password.max' => 'Mật khẩu không được quá 10 ký tự',
            'image.mimes' => 'Ảnh tải lên không đúng định dạng!'
            ];
    }
}
