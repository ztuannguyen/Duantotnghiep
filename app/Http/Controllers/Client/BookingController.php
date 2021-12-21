<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Booking_Service;
use App\Models\CateService;
use App\Models\Salon;
use App\Models\Service;
use App\Models\Time;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Booking\BookingRequest;

class BookingController extends Controller
{
    public function show()
    {
        $salon = Salon::where('status', 0)->orderBy('id', 'ASC')->get();
        $cateService = CateService::with('services')->get();
        $service = Service::all();
        $booking = Booking::with('service')->get();
        $time = Time::orderBy('id', 'ASC')->get();
        return view('client.booking', compact('salon', 'service', 'cateService', 'time'));
    }

    public function store(BookingRequest $request)
    {
        $booking = new Booking();
        $booking->fill($request->all());
        $price = [];
        if ($request->has('service_id')) {
            foreach ($request->service_id as $key => $value) {
                $services = Service::where('id', '=', $request->service_id[$key])->first();
                $price[] = $services->price;
            }
        }
        $sum = array_sum($price);
        $booking->total_price = $sum;
        $booking->status = 1;
        $booking->save();


        if ($request->has('service_id')) {
            foreach ($request->service_id as $key => $value) {
                $booking_services = new Booking_Service();
                $booking_services->service_id = $request->service_id[$key];
                $booking_services->booking_id = $booking->id;
                $booking_services->salon_id = $request->salon_id;
                $booking_services->save();
            }
        }
        return redirect()->route('client.show')->with('message', 'Cảm ơn anh tin tưởng lựa chọn dịch vụ của BrotherHoods.');
    }

    public function getTimeOfSalon(Request $request)
    {
        $salons = Salon::with('time')->get();
        $id_salon = $request->get('salon') ?? $salons[0]->id;
        $p = Salon::where('id', $id_salon)->first();
        $p->load(['time']);
        $times = Time::with('salon')->get(); 
        $todayBookingIds = Booking::where('salon_id', $request->id)
            ->Where('date_booking', $request->date)
            ->pluck('id')->toArray();
        $bookingDetails = Booking_Service::whereIn('booking_id', $todayBookingIds)->get();

        $data = [
            'times' => $times,
            'bookingDetails' => $bookingDetails,
        ];

        return $data;
    }
    public function listBooking(Request $request){
        $booking = Booking::where('add_by_user',Auth::user()->id)->get();
        $booking->load(['service','salon']);
        return view('client.list', compact('booking'));
    }
    public function cancellation(Request $request)
    {
        $booking = Booking::find($request->id);
        $booking->status = 5;
        $booking->reason = $request->reason;
        $booking->save();
        $booking_services = Booking_Service::where('booking_id', $request->id)->get();
        foreach ($booking_services as $key => $item) {
            $item->status = 5;
            $item->chair_id = null;
            $item->time_start = null;
            $item->time_end = null;
            $item->save();
        }
        session()->flash('message_contact', 'Đơn của quý khách đã được hủy !');
    }
}
