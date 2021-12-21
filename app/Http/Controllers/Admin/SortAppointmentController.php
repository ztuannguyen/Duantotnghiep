<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Models\Chair;
use App\Models\Salon;
use App\Models\Salon_Chair;
use App\Models\Booking_Service;
use App\Models\Service;
use App\Models\Time;
use DateTime;
use Illuminate\Database\Eloquent\Builder;

class SortAppointmentController extends Controller
{
    public function index(Request $request)
    {
        $salons = Salon::with('chair')->get();
        $id_salon = $request->get('salon') ?? $salons[0]->id;
        $p = Salon::where('id', $id_salon)->first();
        $p->load(['chair']);
        $p->load(['time']);
        $salon_chairs = Salon_Chair::where('salon_id', $id_salon)->first();
        $sort_appointments = [];
        $bookingServices = Booking_Service::where('status', 0)->where('salon_id',$id_salon)->orWhere('status', 2)
            ->whereHas('booking', function (Builder $query) use ($request) {
                $query->whereBetween('date_booking', [date('Y-m-d'), date('Y-m-d', strtotime(date('Y-m-d')))]);
            })->get();
        $bookingServices->load(['service']);
        $bookingServices->load(['booking']);

        $chairs = [];
        foreach ($p->chair as  $key => $item) {
            $chairs[$key]['key'] =  $item->id;
            $chairs[$key]['label'] =  $item->name;
        }
        $bookings = Booking::where('salon_id', $id_salon)->where('status', 1)->get();
        $services = Service::all();
        $times = Time::all();
        $booking_services = Booking_Service::where('status', 1)->where('salon_id',$id_salon)->get();
        $booking_services->load(['booking']);
        foreach ($booking_services as $key => $sort_appointment) {

            $sort_appointments[$key]['start_date'] = $sort_appointment->time_start;
            $sort_appointments[$key]['end_date'] = $sort_appointment->time_end;
            $sort_appointments[$key]['text'] = "#" . $sort_appointment->booking->id . "<br>" . $sort_appointment->booking->name . "<br>" . $sort_appointment->booking->number_phone . "<br>" . $sort_appointment->service->name;
            $sort_appointments[$key]['chair_id'] = $sort_appointment->chair_id;
            $sort_appointments[$key]['id'] = $sort_appointment->id;
        }

        return view('admin.bookings.sortAppointment', compact('chairs', 'sort_appointments', 'salon_chairs', 'times', 'services', 'booking_services', 'salons', 'id_salon', 'bookingServices'));
    }

    public function post(Request $request)
    {   

        $booking_services = Booking_Service::find($request->id);
        $booking_services->load('service');
        $booking = Booking::find($booking_services->booking_id);
        $date_start = $booking->date_booking . ' ' . $request->time_start;
        $dateTime = new DateTime($date_start);
        $dateTimeUpdate = date_add($dateTime ,date_interval_create_from_date_string($booking_services->service->execution_time . " minutes"));
        $date_end = $dateTimeUpdate->format('Y-m-d H:i');

        $bookingServices = Booking_Service::all();
        foreach ($bookingServices as $item) {
            if ($request->id != $item->id) {
                if($item->chair_id == $request->chair_id){
                    if ($date_start > $item->time_start && $date_start < $item->time_end
                        || $date_end > $item->time_start && $date_end < $item->time_end
                        ) {
                            echo ' 
                            <p class="mt-1" style="color: red">Thời gian xếp bị trùng !</p>
                            ';
                            die;
                    }
                }
            }
        }
        $bookingCheck = Booking_Service::where('booking_id', $booking_services->booking_id)->get();
        if (count($bookingCheck) > 0) {
            foreach ($bookingCheck as $item) {
                if ($item->time_start != "") {
                    if ($date_start < $item->time_end) {
                        echo '
                            <p class="mt-1" style="color: red">Thời gian xếp lịch phải lớn hơn thời gian kết thúc của dịch vụ trước! '.$item->time_end.'</p>
                            ';
                        die;
                    }
                }
            }
        }
        $booking_services->chair_id = $request->chair_id;
        $booking_services->time_start = $date_start;
        $booking_services->time_end = $date_end;
        $booking_services->status = $request->status;
        $booking_services->salon_id = $request->salon_id;
        $booking_services->save(); 

        
        // chuyển trạng thái khi đã xếp lịch xong
        $booking_services->load('booking');
        $statusServices = Booking_Service::where('booking_id', $booking_services->booking->id)->get();
        $sttServices = Booking_Service::where('booking_id', $booking_services->booking->id)
            ->where('status', 1)
            ->orWhere('booking_id', $booking_services->booking->id)
            ->where('status', 2)
            ->get();
        if (count($statusServices) == count($sttServices)) {
            $bk = Booking::find($booking_services->booking->id);
            $bk->status = 2;
            $bk->save();
        }
    }
    public function update($id, Request $request)
    {
        $booking = Booking_Service::find($id);
        $booking->chair_id = $request->chair_id;
        $booking->time_start = $request->start_date;
        $booking->time_end = $request->end_date;
        $booking->save();
        return response()->json([
            "action" => "updated",
            'tid' => $booking->id
        ]);
    }
    public function destroy($id)
    {
        $bookingServices = Booking_Service::find($id);
        $bookingServices->status = 0;
        $bookingServices->chair_id = null;
        $bookingServices->time_start = null;
        $bookingServices->time_end = null;
        $bookingServices->save();

        $bookingServices->load('booking');
        $bookingServices->booking->status = 1;
        $bookingServices->booking->save();
        return response()->json([
            "action" => "deleted"
        ]);
    }
}
