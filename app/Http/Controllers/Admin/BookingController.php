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
use App\Models\Cancel_Bookings;
use App\Models\Chair;
use Barryvdh\DomPDF\Facade as PDF;


class BookingController extends Controller
{
    public function index(Request $request)
    {

        $searchData = $request->except('page');
        if (count($request->all()) == 0) {
            $ListBooking = Booking::orderBy('created_at', 'DESC')->get();
        } else {
            $bookings = Booking::orderBy('created_at', 'DESC');
            if ($request->has('status') && $request->status != "") {
                $bookings->where('status', $request->status);
            }
            if ($request->has('date_booking') && $request->date_booking != "") {
                $bookings->where('date_booking', $request->date_booking);
            }
            if ($request->has('salon_id') && $request->salon_id != "") {
                $bookings->where('salon_id', $request->salon_id);
            }
            $ListBooking = $bookings->get();
        }
        $ListBooking->load(['salon']);
        $ListBooking->load(['time']);
        $ListBooking->load(['service']);
        $service = Service::all();
        return view('admin.bookings.index', [
            'data' => $ListBooking,
            'service' => $service,
            'searchData' => $searchData
        ]);
    }

    public function create()
    {

        $booking = Booking::with('service')->get();
        $service = Service::all();
        $cateService = CateService::where('status', 0)->get();
        $cateService->load(['services']);
        $ListSalon = Salon::with('time')->get();
        $ListTime = Time::all();
        return view('admin.bookings.create', compact('service', 'ListSalon', 'ListTime', 'cateService'));
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
        session()->flash('message', 'Thêm đơn thành công !');
        return redirect()->route('admin.bookings.index');
    }
    public function edit($id)
    {
        $booking = Booking::find($id);
        if (!$booking) {
            return redirect()->back();
        }
        $booking->load(['service']);
        $service = Service::all();
        $ListSalon = Salon::all();
        $ListTime = Time::all();
        return view('admin.bookings.edit', compact('booking', 'service', 'ListSalon', 'ListTime'));
    }
    public function update(UpdateRequest $request, $id)
    {

        $booking = booking::find($id);
        if (!$booking) {
            return redirect()->back();
        }
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
        $bookingServices = Booking_Service::where('booking_id', $id)->get();
        $arr = [];
        if (count($bookingServices) > 0 && $request->has('service_id')) {
            foreach ($bookingServices as $key => $value) {
                $arr[] += $value->service_id;
            }
            $check = array_diff($request->service_id, $arr);
            if (count($check) > 0) {
                $booking->status = 1;
            }
        }
        $booking->save();
        if (count($bookingServices) > 0 && $request->has('service_id')) {
            $filter1 = array_diff($arr, $request->service_id);
            $filter2 = array_diff($request->service_id, $arr);
            foreach ($filter1 as $value) {
                Booking_Service::where('service_id', $value)->delete();
            }
            foreach ($filter2 as $value) {
                $booking_services = new Booking_Service();
                $booking_services->service_id = $value;
                $booking_services->booking_id = $booking->id;
                $booking_services->salon_id = $request->salon_id;
                $booking_services->status = 0;
                $booking_services->save();
            }
        } else {
            if ($request->has('service_id')) {
                foreach ($request->service_id as $key => $value) {
                    $booking_services = new Booking_Service();
                    $booking_services->service_id = $request->service_id[$key];
                    $booking_services->booking_id = $booking->id;
                    $booking_services->salon_id = $request->salon_id;
                    $booking_services->status = 0;
                    $booking_services->save();
                }
            }
        }
        if ($booking->status == 1) {
            return redirect()->route('admin.bookings.sortAppointment')->with('message', 'Đã cập nhật lịch hẹn mới');
        } else {
            return redirect()->route('admin.bookings.index')->with('message', 'Cập nhật lịch hẹn thành công');
        }
    }

    public function remove($id)
    {
        $booking = Booking::find($id);
        $service = Booking_Service::where('booking_id', $id)->delete();
        $booking->delete();
        Booking::destroy($id);
        session()->flash('message', 'Xóa thành công !');
        return redirect()->back();
    }
    public function waitingCut()
    {
        $chair = Chair::where('status', 0)->get();
        $bookingServices = Booking_Service::where('status', 1)->orderBy('time_start', 'ASC')->get();
        $bookingServices->load('booking');
        $bookingServices->load('service');
        $bookingServices->load('chair');
        $servicesAll = Service::all();
        return view('admin.bookings.waitingCut', compact('chair', 'bookingServices', 'servicesAll'));
    }
    public function saveWaiting(Request $request)
    {
        $bookingSerivce = Booking_Service::find($request->id);
        $bookingSerivce->status = 4;
        $bookingSerivce->save();
        $bookingSerivce->load('booking');
        $count1 = Booking_Service::where('booking_id', $bookingSerivce->booking->id)->get();
        $count2 = Booking_Service::where('booking_id', $bookingSerivce->booking->id)->where('status', 4)->get();
        if (count($count1) == count($count2)) {
            $bk = Booking::find($bookingSerivce->booking->id);
            $bk->status = 4;
            $bk->save();
        }
    }
    public function invoices($id)
    {
        $booking = Booking::find($id);
        $booking->load(['booking_services', 'service', 'salon']);
        $data = [
            'booking' => $booking
        ];
        $pdf = PDF::loadView('admin.bookings.invoice', compact('data'));
        return $pdf->download('Hoadonthanhtoan.pdf');
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
        return response()->json([
            "msg" => ''
        ]);
    }
    public function listCancel()
    {
        $booking = Booking::where('status', 5)->orderBy('updated_at', 'DESC')->get();
        $booking->load('service');
        return view('admin.bookings.listCancel', compact('booking'));
    }
    public function restore($id)
    {
        $booking = booking::find($id);
        $booking->status = 1;
        $booking->reason = null;
        $booking->save();
        $booking_services = Booking_Service::where('booking_id', $id)->get();
        foreach ($booking_services as $key => $item) {
            $item->status = 0;
            $item->save();
        }
        session()->flash('message', 'Khôi phục đơn thành công !');
        return redirect()->route('admin.bookings.listCancel');
    }
}
