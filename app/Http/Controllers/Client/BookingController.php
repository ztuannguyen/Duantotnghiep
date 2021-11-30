<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Booking_Service;
use App\Models\CateService;
use App\Models\Salon;
use App\Models\Service;
use App\Models\Time;
use Illuminate\Http\Request;

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

    public function store(Request $request)
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
}
