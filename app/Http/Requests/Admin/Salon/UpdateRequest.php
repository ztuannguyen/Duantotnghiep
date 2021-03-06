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
            'name_salon' => 'required|unique:salons|max:255',
            'slot_amount' => 'required|integer',
            'address' => 'required|max:255',
            'image' => 'image',
            'description' => 'required|max:255'
        ];
    }
    public function messages()
    {
        return [
            'name_salon.max' => 'Tên cửa hàng tối đa 255 ký tự',
            'unique' =>':attribute đã tồn tại',
            'slot_amount.integer' => 'Số ghế phải điền là số',
            'image.image' => 'Ảnh không đúng định dạng',
            'address.max' => 'Địa chỉ tối đa 255 ký tự',
            'description.max' => 'Mô tả tổi đa 255 kí tự',
            'required' => ':attribute không được để trống',
        ];
    }
    public function attributes()
    {
        return [
            'name_salon'=>'Tên cửa hàng',
            'slot_amount'=>'Số ghế',
            'address'=>'Địa chỉ',
            'description' => 'Mô tả',
        ];
    }
}
