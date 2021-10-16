<?php

namespace App\Http\Requests\Admin\Booking;

use Illuminate\Foundation\Http\FormRequest;

class BookingRequest extends FormRequest
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
            'number_phone' => 'required|numeric|min:11',
            'date_booking' => 'required|date',
        ];
    }
    public function messages()
    {
        return [
            'number_phone.numeric' => 'Bạn đã nhập sai định dạng',
            'number_phone.min' => 'Số điện thoại nhập tối thiểu 11 số',
            'date_booking.date' => 'Bạn đã nhập sai định dạng',
            'required' => ':attribute không được để trống',
        ];
    }
    public function attributes()
    {
        return [
            'number_phone'=>'Số điện thoại ',
            'date_booking'=>'Ngày đặt lịch',
          
        ];
    }
}
