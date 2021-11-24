<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Booking_Service;
use App\Models\CateService;
use App\Models\Salon;
use App\Models\Service;
use App\Models\Time;
use App\Models\Salon_Time;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function show()
    {
        $salon = Salon::where('status', 0)->orderBy('id', 'ASC')->get();
        $cateService = CateService::with('services')->get();
        $service = Service::all();
        $booking = Booking::with('service')->get();
        $time = Time::orderBy('id', 'ASC')->get();
        return view('client/booking', compact('salon', 'service', 'cateService', 'time'));
    }

    public function store(Request $request)
    {

        $model = new Booking();
        $model->fill($request->all());
        $model->save();
        if ($request->has('booking_services')) {
            for ($i = 0; $i < count($request->booking_services); $i++) {
                $booking_service = new Booking_Service();
                $booking_service->booking_id = $model->id;
                $booking_service->service_id = $request->booking_services[$i];
                $booking_service->salon_id = $request->salon_id;
                $booking_service->save();
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
