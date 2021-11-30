<?php

namespace App\Http\Requests\Admin\Logo;

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
            'image' => 'required|image|max:10000',
        ];
    }
    public function messages()
    {
        return [
            'image.required' => 'Ảnh không được để trống',
            'image.image' => 'Ảnh không đúng định dạng',
            'image.max' => 'Ảnh không vượt quá 10MB'
        ];
    }
}
