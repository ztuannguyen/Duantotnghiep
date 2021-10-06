<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Salon;
use App\Models\Service;
use App\Models\Time;
use App\Models\Booking_Service;

class BookingController extends Controller
{
    public function index(Request $request){
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

    public function create(){
  

        $booking = Booking::with('service')->get();
        $service = Service::all();
        $ListSalon = Salon::all();
        $ListTime = Time::all();
        return view('admin.bookings.create', compact('service','ListSalon','ListTime'));
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
        if(isset($_POST['bookings_services'])){
            for ($i = 0; $i < count($_POST['bookings_services']); $i++) {
                $booking_service = new Booking_Service();
                $booking_service->booking_id = $model -> id;
                $booking_service->service_id = $_POST['bookings_services'][$i];
                $booking_service->save();
            }
        }
        return redirect()->route('admin.bookings.index');
    }

  
    public function remove($id)
    {
        $model = Booking::find($id);
        $model->delete();
        Booking::destroy($id);
        return redirect()->back();


    }
}
