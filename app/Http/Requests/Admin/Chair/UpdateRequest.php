<?php

namespace App\Http\Requests\Admin\Chair;

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
        ];
    }
    public function messages()
    {
        return [
            'name.max' => 'Tên ghế tối đa 255 ký tự',
            'name.required' => 'Tên ghế không được để trống'
        ];
    }
}
