<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Time;
use App\Models\Salon;
use App\Http\Requests\Admin\SalonTime\SalonTimeRequest;
use App\Http\Requests\Admin\SalonTime\UpdateRequest;

class SalonTimeController extends Controller
{
    public function index(Request $request){
        if ($request->has('keyword') == true) {
            $keyword = $request->get('keyword');
            // SELECT * FROM users WHERE email LIKE '%keyword%'
            $ListTime = Time::where('salon_id', 'LIKE', "%$keyword%")->get();
        } else {
            $ListTime = Time::paginate(14);
        }
            $ListTime->load(['salon']);
            $ListTime->load(['bookings']);
        return view('admin.times.index',['data'=>$ListTime]);
    }
    public function create(){
        $ListSalon = Salon::all();
        return view('admin.times.create', ['ListSalon' => $ListSalon]);
    }
    public function store(SalonTimeRequest $request){
        $data =  $request->except('_token');
        $result = Time::create($data);
        return redirect()->route('admin.times.index');
    }
    public function edit(Time $time){
        $ListSalon = Salon::all();
        return view('admin.times.edit', ['time' => $time,'ListSalon'=>$ListSalon]);
    }
    public function update(UpdateRequest $request,Time $time){
        $data = $request->except('_token');
        $time->update($data);
        return redirect()->route('admin.times.index');
    }
    public function delete(Time $time){
        $time->delete($time);
        return redirect()->route('admin.times.index');
    }
}
