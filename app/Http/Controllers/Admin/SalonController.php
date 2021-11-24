<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Salon;
use App\Models\Chair;
use App\Models\Salon_Chair;
use App\Models\Salon_Time;
use App\Http\Requests\Admin\Salon\SalonRequest;
use App\Http\Requests\Admin\Salon\UpdateRequest;
use App\Models\Time;

class SalonController extends Controller
{
    public function index(Request $request){
        if ($request->has('keyword') == true) {
            $keyword = $request->get('keyword');
            $ListSalon = Salon::where('name_salon', 'LIKE', "%$keyword%")->get();
        } else {
            $ListSalon = Salon::all();
        }
        // $ListSalon->load(['times']);
        $ListSalon->load(['bookings']);
        $ListSalon->load(['chair']);
        $ListSalon->load(['time']);
        return view('admin/salons/index', ['data' => $ListSalon]);
    }
    public function create(){
        $salon = Salon::with('chair')->with('time')->get();
        $chair = Chair::all();
        $time = Time::all();
        return view('admin.salons.create', compact('salon','chair','time'));
    }
    public function store(SalonRequest $request){
        $data =  $request->except('_token');

        $model = new Salon();
        $model->fill($request->all());
        $model->save();
        // lưu ảnh
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move(public_path('/uploads'), $filename);
            $model->image = $filename;
        }
        $model->save();
        if ($request->has('salon_chairs')) {
            for ($i = 0; $i < count($request->salon_chairs); $i++) {
                $salon_chair = new Salon_Chair();
                $salon_chair->salon_id = $model->id;
                $salon_chair->chair_id = $request->salon_chairs[$i];
                $salon_chair->save();
            }
        }
        if ($request->has('salon_times')) {
            for ($i = 0; $i < count($request->salon_times); $i++) {
                $salon_time = new Salon_Time();
                $salon_time->salon_id = $model->id;
                $salon_time->time_id = $request->salon_times[$i];
                $salon_time->save();
            }
        }
     
        session()->flash('message', 'Thêm thành công !');
        return redirect()->route('admin.salons.index');
    }
    public function edit($id){
        $chair = Chair::all();
        $time = Time::all();
        $salon = Salon::find($id);
        $salon_chairs = $salon->chair->pluck("id")->toArray();
        $salon_times = $salon->time->pluck("id")->toArray();
        if(!$salon) return redirect(route('admin.salons.index'));
        return view('admin.salons.edit', ['salon' =>$salon,'chair'=>$chair,'time'=>$time,'salon_chairs' =>$salon_chairs,'salon_times' =>$salon_times]);
    }
    public function update(UpdateRequest $request,$id){
        if(!$id){
            return redirect()->back();
        }
        $salon = Salon::find($id);
        $salon->fill($request->all());
        $salon->save();
        $salon_chair = Salon_Chair::where('salon_id',$id)->delete();
        $salon_time = Salon_Time::where('salon_id',$id)->delete();
        if(isset($_POST['salon_chairs'])){
            for ($i = 0; $i < count($_POST['salon_chairs']); $i++) {
                $salon_chair = new Salon_Chair();
                $salon_chair->salon_id = $id;
                $salon_chair->chair_id = $_POST['salon_chairs'][$i];
                $salon_chair->save();
            }
        }
        if(isset($_POST['salon_times'])){
            for ($i = 0; $i < count($_POST['salon_times']); $i++) {
                $salon_time = new Salon_Time();
                $salon_time->salon_id = $id;
                $salon_time->time_id = $_POST['salon_times'][$i];
                $salon_time->save();
            }
        }
        $salons = new Salon;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move(public_path('/uploads'), $filename);
            $salons->image = $filename;
            $salon->update([
                'name_salon' => $request->name_salon,
                'slot_amount' => $request->slot_amount,
                'address' => $request->address,
                'status' => $request->status,
                'image' => $filename,
                'description' => $request->description,
            ]);
            
        }else{
            $salon->update([
                'name_salon' => $request->name_salon,
                'slot_amount' => $request->slot_amount,
                'address' => $request->address,
                'status' => $request->status,
                'description' => $request->description,
            ]);
            
        }
        session()->flash('message', 'Sửa thành công !');
        return redirect()->route('admin.salons.index');
    }
    public function status($id, $status)
    {
        $flight = Salon::find($id);
        $flight->status = $status;

        if ($status == 0) {
            session()->flash('message', 'Bật thành công');
        } else {
            session()->flash('warning', 'Tắt thành công');
        }
        $flight->save();
        return redirect()->route('admin.salons.index');
    }
    public function delete(Salon $salon){
        $salon->delete($salon);
        session()->flash('message', 'Xóa thành công !');
        return redirect()->route('admin.salons.index');
    }
}
