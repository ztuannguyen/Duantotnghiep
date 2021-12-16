<?php

namespace App\Http\Controllers;

use App\Models\Cancel_Bookings;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CancelBookingController extends Controller
{
    public function index()
    {
        $listCancelBooking = Cancel_Bookings::all();
        return view('admin/cancel_bookings/index',['data' => $listCancelBooking]);
    }
    public function cancelBooking(Request $request)
    {
        if ($request->isMethod('post')) {
            $validator = Validator::make(
                $request->all(),
                [
                    'reason' => 'required',
                ],
                [
                    'reason.required' => 'Vui lòng chọn lí do hủy đơn',
                ]
            );
            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }
        }
        $model = new Cancel_Bookings();
        $model->save();
        // session()->flash('message', 'Thêm thành công !');
        return redirect()->route('admin.cancelBooking.index');
    }
}
