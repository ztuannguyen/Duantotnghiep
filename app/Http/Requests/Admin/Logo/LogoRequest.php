<?php

namespace App\Http\Requests\Admin\Logo;

use Illuminate\Foundation\Http\FormRequest;

class LogoRequest extends FormRequest
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
            'image' => 'image',
        ];
    }
    public function messages()
    {
        return [
            'image.image' => 'Ảnh không đúng định dạng',
        ];
    }
}
