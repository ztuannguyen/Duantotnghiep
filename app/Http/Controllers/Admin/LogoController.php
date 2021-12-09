<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Logo;
use App\Http\Requests\Admin\Logo\LogoRequest;
use App\Http\Requests\Admin\Logo\UpdateRequest;

class LogoController extends Controller
{
    public function index(){
        $Listlogo = Logo::all();
        return view('admin.logos.index',['data' => $Listlogo]);
    }
    public function create(){
        return view('admin.logos.create');
    }
    public function store(LogoRequest $request){
        $data =  $request->except('_token');

        $model = new Logo();
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
        session()->flash('message', 'Thêm thành công !');
        return redirect()->route('admin.logos.index');
    }
    public function edit(Logo $logo){
        return view('admin.logos.edit', ['logo' =>$logo]);
    }
    public function update(UpdateRequest $request,Logo $logo){

        $logos = new Logo;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move(public_path('/uploads'), $filename);
            $logos->image = $filename;
            $logo->update([
                'status' => $request->status,
                'image' => $filename,
            ]);
        }else{
            $logo->update([
                'status' => $request->status,
            ]);
        }
        session()->flash('message', 'Sửa thành công !');
        return redirect()->route('admin.logos.index');
    }
    public function status($id, $status)
    {
        $flight = Logo::find($id);
        $flight->status = $status;

        if ($status == 0) {
            session()->flash('message', 'Bật thành công');
        } else {
            session()->flash('warning', 'Tắt thành công');
        }
        $flight->save();
        return redirect()->route('admin.logos.index');
    }
    public function delete(Logo $logo){
        $logo->delete($logo);
        session()->flash('message', 'Xóa thành công !');
        return redirect()->route('admin.logos.index');
    }
}
