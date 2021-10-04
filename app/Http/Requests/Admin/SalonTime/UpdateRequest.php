<?php

namespace App\Http\Requests\Admin\SalonTime;

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
            'slot' => 'required|integer',
            'time_start' => 'required',
            'time_end' => 'required|after:time_start',
        ];
    }
    public function messages()
    {
        return [
            'slot.integer' => 'Số ghế phải điền là số nguyên',
            'time_end.after:time_start' => 'Thời gian kết thúc phải lớn hơn thời gian bắt đầu',
            'required' => ':attribute không được để trống',
        ];
    }
    public function attributes()
    {
        return [
            'slot'=>'Số ghế',
            'time_start'=>'Thời gian bắt đầu',
            'time_end'=>'Thời g ian kết thúc',
            
        ];
    }
}
