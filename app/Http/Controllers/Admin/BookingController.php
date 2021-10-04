<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Salon;
use App\Models\Time;
use App\Models\Service;

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
        $ListBooking->load(['service']);
        $ListBooking->load(['time']);
        return view('admin.bookings.index',['data'=>$ListBooking]);
    }
    public function create(){
        $ListSalon = Salon::all();
        $ListService = Service::all();
        $ListTime = Time::all();
        return view('admin.bookings.create',['ListSalon'=>$ListSalon,'ListService'=>$ListService,'ListTime'=>$ListTime]);
    }
    public function store(Request $request){
        $data =  $request->except('_token');
        $result = Booking::create($data);
        return redirect()->route('admin.bookings.index');
    }
    public function delete(Booking $booking){
        $booking->delete($booking);
        return redirect()->route('admin.bookings.delete');
    }
}
