<?php

namespace App\Http\Requests\Admin\Contact;

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
            'name' => 'required|max:255',
            'phone_number' => 'required|numeric|min:11',
            'note' => 'required|max:255'
        ];
    }
    public function messages()
    {
        return [
            'name.max' => 'Tên khách hàng tối đa 255 ký tự',
            'phone_number.numeric' => 'Bạn đã nhập sai định dạng',
            'phone_number.min' => 'Số điện thoại tối thiểu 11 số ',
            'note.max' => 'Mô tả tổi đa 255 kí tự',
            'required' => ':attribute không được để trống',
        ];
    }
    public function attributes()
    {
        return [
            'name'=>'Tên cửa hàng',
            'phone_number'=>'Số điện thoại',
            'note' => 'Mô tả',
        ];
    }
}
