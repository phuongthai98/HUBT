<?php

namespace App\Http\Requests\Admin\Product;

use Illuminate\Foundation\Http\FormRequest;

class RequestProduct extends FormRequest
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
            'sale_price' => [function($attribute, $value, $fail){
                if($value >= $this->price){
                    return $fail('Giá khuyến mãi không được lớn hơn giá sản phẩm!');
                }
            }],
            'image' => 'required|mimes:png,jpg,jpeg'
        ];
    }
    public function messages(){
        return [
            'image.required' => 'Bạn chưa thêm ảnh sản phẩm!',
            'image.mimes' => 'Định dạng ảnh không hợp lệ!'
        ];
    }
}
