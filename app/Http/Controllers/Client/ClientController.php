<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Booking_Service;
use App\Models\CateService;
use App\Models\Salon;
use App\Models\Service;
use App\Models\Time;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function show(){
       
        $salon = Salon::where('status',0)->orderBy('id','ASC')->get();
        $cateService = CateService::with('services')->get();
        $service = Service::all();
        $booking = Booking::with('service')->get();
        $time = Time::where('salon_id',1)->orderBy('id','ASC')->get();
        $todayBookingIds = Booking::where('salon_id',1)->where('date_booking',Carbon::now()->format('Y-m-d'))->pluck('id')->toArray();
        $bookingDetail = Booking_Service::whereIn('booking_id', $todayBookingIds)->get();
        return view('client/booking',compact('salon','service','cateService','time','bookingDetail'));
    }

    public function store(Request $request){
        $model = new Booking();
        $model->number_phone = $request->number_phone;
        $model->salon_id = $request->salon_id;
        $model->time_id = $request->time_id;
        $model->date_booking = $request->date_booking;
        $model->note = $request->note;
        $model->status = $request->status;
        $model->save();
        if (isset($_POST['bookings_services'])) {
            for ($i = 0; $i < count($_POST['bookings_services']); $i++) {
                $booking_service = new Booking_Service();
                $booking_service->booking_id = $model->id;
                $booking_service->service_id = $_POST['bookings_services'][$i];
                $booking_service->save();
            }
        }
        return redirect()->route('client.show')->with('message','Cảm ơn anh tin tưởng lựa chọn dịch vụ của BrotherHoods.');
    }
}