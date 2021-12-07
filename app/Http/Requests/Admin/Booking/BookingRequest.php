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
            'name' => 'required|max:255',
            'number_phone' => 'required|numeric|digits:10',
            'date_booking' => 'required|date',
            'salon_id' => 'required',
            'service_id' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.max' => 'Tên khách hàng không vượt quá 255 ký tự',
            'number_phone.numeric' => 'Quý khách đã nhập sai định dạng',
            'number_phone.digits' => 'Số điện thoại phải là 10 chữ số',
            'date_booking.date' => 'Quý khách đã nhập sai định dạng',
            'salon_id.required' => 'Mời quý khách vui lòng chọn salon cắt',
            'service_id.required' => 'Mời quý khách vui lòng chọn dịch vụ ',
            'required' => ':attribute không được để trống',
        ];
    }
    public function attributes()
    {
        return [
            'name' => 'Tên khách hàng',
            'number_phone'=>'Số điện thoại ',
            'date_booking'=>'Ngày đặt lịch',
        ];
    }
}
