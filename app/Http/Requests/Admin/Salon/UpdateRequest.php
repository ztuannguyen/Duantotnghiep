<?php

namespace App\Http\Requests\Admin\Salon;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'name_salon' => 'required|max:50',
            'address' => 'required|max:255',
            'description' => 'required|min:10|max:255'
        ];
    }
    public function messages()
    {
        return [
            'name_salon.max' => 'Tên cửa hàng tối đa 50 ký tự',
            'image.image' => 'Ảnh không đúng định dạng',
            'address.max' => 'Địa chỉ tối đa 255 ký tự',
            'description.min' => 'Mô tả tổi thiểu 50 kí tự',
            'description.max' => 'Mô tả tổi đa 255 kí tự',
            'required' => ':attribute không được để trống',
        ];
    }
    public function attributes()
    {
        return [
            'name_salon'=>'Tên cửa hàng',
            'image'=>'Ảnh',
            'address'=>'Địa chỉ',

            'description' => 'Mô tả',
        ];
    }
}
