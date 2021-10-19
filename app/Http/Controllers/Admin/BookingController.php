<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Salon;
use App\Models\Service;
use App\Models\Time;
use App\Models\CateService;
use App\Models\Booking_Service;
use App\Http\Requests\Admin\Booking\BookingRequest;
use App\Http\Requests\Admin\Booking\UpdateRequest;

class BookingController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('keyword') == true) {
            $keyword = $request->get('keyword');
            $ListBooking = Booking::where('number_phone', 'LIKE', "%$keyword%")->get();
        } else {
            $ListBooking = Booking::all();
        }
        $ListBooking->load(['salon']);
        $ListBooking->load(['time']);
        $ListBooking->load(['service']);
        $service = Service::all();
        return view('admin.bookings.index', [
            'data' => $ListBooking,
            'service' => $service,
        ]);
    }

    public function create()
    {
        $booking = Booking::with('service')->get();
        $service = Service::all();
        $cateService = CateService::with('services')->get();
        $ListSalon = Salon::all();
        $ListTime = Time::all();
        return view('admin.bookings.create', compact('service', 'ListSalon', 'ListTime', 'cateService'));
    }
    public function store(BookingRequest $request)
    {

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
        session()->flash('message', 'Thêm thành công !');
        return redirect()->route('admin.bookings.index');
    }
    public function edit(Booking $booking)
    {
        $service = Service::all();
        $ListSalon = Salon::all();
        $ListTime = Time::all();
        $cateService = CateService::with('services')->get();
        $booking_services = $booking->service->pluck("id")->toArray();

        if(!$booking) return redirect(route('admin.bookings.index'));
        return view('admin.bookings.edit', ['booking' => $booking, 'cateService' => $cateService, 'service' => $service, 'ListSalon' => $ListSalon, 'ListTime' => $ListTime,'booking_services' => $booking_services]);
    }
    public function update(UpdateRequest $request, Booking $booking)
    {
        if(!$booking){
            return redirect()->back();
        }
        $booking->number_phone = $request->number_phone;
        $booking->salon_id = $request->salon_id;
        $booking->time_id = $request->time_id;
        $booking->date_booking = $request->date_booking;
        $booking->note = $request->note;
        $booking->status = $request->status;
        $booking->save();
        $booking_service = Booking_Service::where('booking_id',$booking)->delete();
        if(isset($_POST['booking_services'])){
            for ($i = 0; $i < count($_POST['booking_services']); $i++) {
                $booking_service = new Booking_service();
                $booking_service->booking_id = $booking;
                $booking_service->service_id = $_POST['booking_services'][$i];
                $booking_service->save();
            }
        }
        session()->flash('message', 'Sửa thành công !');
        return redirect()->route('admin.bookings.index');
    }

    public function remove($id)
    {
        $model = Booking::find($id);
        $model->delete();
        Booking::destroy($id);
        session()->flash('message', 'Xóa thành công !');
        return redirect()->back();
    }
}
