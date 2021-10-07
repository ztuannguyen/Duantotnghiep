<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Salon;
use App\Models\Booking;
use App\Http\Requests\Admin\Salon\SalonRequest;
use App\Http\Requests\Admin\Salon\UpdateRequest;

class SalonController extends Controller
{
    public function index(Request $request){
        if ($request->has('keyword') == true) {
            $keyword = $request->get('keyword');
            $ListSalon = Salon::where('name_salon', 'LIKE', "%$keyword%")->get();
        } else {
            $ListSalon = Salon::all();
        }
        $ListSalon->load(['times']);
        $ListSalon->load(['bookings']);
        return view('admin/salons/index', ['data' => $ListSalon]);
    }
    public function create(){
        return view('admin.salons.create');
    }
    public function store(SalonRequest $request){
        $data =  $request->except('_token');

        $model = new Salon();
        $model->fill($request->all());
        // lưu ảnh
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move(public_path('/uploads'), $filename);
            $model->image = $filename;
        }
        $model->save();
        return redirect()->route('admin.salons.index');
    }
    public function edit(Salon $salon){
        return view('admin.salons.edit', ['salon' =>$salon]);
    }
    public function update(UpdateRequest $request,Salon $salon){

        $salons = new Salon;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move(public_path('/uploads'), $filename);
            $salons->image = $filename;
            $salon->update([
                'name_salon' => $request->name_salon,
                'address' => $request->address,
                'status' => $request->status,
                'image' => $filename,
                'description' => $request->description,
            ]);
        }else{
            $salon->update([
                'name_salon' => $request->name_salon,
                'address' => $request->address,
                'status' => $request->status,
                'description' => $request->description,
            ]);
        }
        return redirect()->route('admin.salons.index');
    }
    public function delete(Salon $salon){
        $salon->delete($salon);
        return redirect()->route('admin.salons.index');
    }
}
