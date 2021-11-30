<?php

namespace App\Http\Requests\Admin\Blog;

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
            'title' => 'required|max:255|unique:blogs',
            'description' => 'required|max:60000',
            'detail' => 'required|max:60000',
            'image' => 'image|max:10000',
        ];
    }
    public function messages(){
        return [
            'required'=>':attribute không được để trống',
            'max'=>':attribute không được vượt quá :max',
            'unique'=>':attribute đã được sử dụng',
            'max' => ':attribute kích thước không được vượt quá :max',
            'image.max' => 'Kích thước ảnh không được quá 10MB',
            'image.image' => 'Ảnh bài viết không đúng định dạng',
        ];
    }

    public function attributes(){
        return [
            'title' =>'Tiêu đề bài viết',
            'description' =>'Mô tả ngắn',
            'detail' =>'Nội dung bài viết',
        ];
    }
}
