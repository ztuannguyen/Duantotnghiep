<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Chair;
use App\Models\Salon;
use App\Http\Requests\Admin\Chair\ChairRequest;
use App\Http\Requests\Admin\Chair\UpdateRequest;

class ChairController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('keyword') == true) {
            $keyword = $request->get('keyword');
            $ListChair = Chair::where('salon_id', 'LIKE', "%$keyword%")->get();
        } else {
            $ListChair = Chair::all();
        }
        return view('admin.chairs.index', ['data' => $ListChair]);
    }
    public function create()
    {
        return view('admin.chairs.create');
    }
    public function store(ChairRequest $request)
    {
        $data =  $request->except('_token');
        $result = Chair::create($data);
        session()->flash('message', 'Thêm thành công !');
        return redirect()->route('admin.chairs.index');
    }
    public function edit(Chair $chair)
    {
        return view('admin.chairs.edit', ['chair' => $chair]);
    }
    public function update(UpdateRequest $request, Chair $chair)
    {
        $data = $request->except('_token');
        $chair->update($data);
        session()->flash('message', 'Sửa thành công !');
        return redirect()->route('admin.chairs.index');
    }
    public function status($id, $status)
    {
        $flight = Chair::find($id);
        $flight->status = $status;

        if ($status == 0) {
            session()->flash('message', 'Bật thành công');
        } else {
            session()->flash('warning', 'Tắt thành công');
        }
        $flight->save();
        return redirect()->route('admin.chairs.index');
    }
    public function delete(Chair $chair)
    {
        $chair->delete($chair);
        session()->flash('message', 'Xóa thành công !');
        return redirect()->route('admin.chairs.index');
    }
}
