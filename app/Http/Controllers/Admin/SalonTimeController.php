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
            $ListTime = Time::where('salon_id', 'LIKE', "%$keyword%")->get();
        } else {
            $ListTime = Time::all();
        }
        $ListTime->load(['bookings']);
        return view('admin.times.index',['data'=>$ListTime]);
    }
    public function create(){
        return view('admin.times.create');
    }
    public function store(SalonTimeRequest $request){
        $data =  $request->except('_token');
        $result = Time::create($data);
        session()->flash('message', 'Thêm thành công !');
        return redirect()->route('admin.times.index');
    }
    public function edit(Time $time)
    {
        return view('admin.times.edit', ['time' => $time]);
    }
    public function update(UpdateRequest $request, Time $time)
    {
        $data = $request->except('_token');
        $time->update($data);
        session()->flash('message', 'Sửa thành công !');
        return redirect()->route('admin.times.index');
    }
    public function delete(Time $time)
    {
        $time->delete($time);
        session()->flash('message', 'Xóa thành công !');
        return redirect()->route('admin.times.index');
    }
}
