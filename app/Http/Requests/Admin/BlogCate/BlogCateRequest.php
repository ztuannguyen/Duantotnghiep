<?php

namespace App\Http\Requests\Admin\BlogCate;

use Illuminate\Foundation\Http\FormRequest;

class BlogCateRequest extends FormRequest
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
            'name' => 'required|unique:cate_blogs|max:255',
        ];
    }
    public function messages()
    {
        return [
            'name.max' => 'Tên danh mục bài viết tối đa 255 ký tự',
            'unique' =>'Tên danh mục bài viết đã tồn tại',
            'name.required' => 'Tên ghế không được để trống'
        ];
    }
}
