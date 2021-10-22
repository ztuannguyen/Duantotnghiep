<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CateService;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller
{

    public function index(Request $request)
    {
        if ($request->has('keyword') == true) {
            $keyword = $request->get('keyword');
            $listService = Service::where('name', 'LIKE', "%$keyword%")->get();
        } else {
            $listService = Service::all();
        }
        $listService->load(['cateservice']);
        return view('admin/services/index', ['data' => $listService]);
    }

    public function show()
    {
    }

    public function create()
    {
        $cateService = CateService::all();
        return view('admin/services/create', ['cateService' => $cateService]);
    }

    public function store(Request $request)
    {

        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'name' => 'required|min:5|max:255',
                'price' => 'required',
                'image' => 'required',
                'execution_time' => 'required',
                'discount' => 'required',
                'description' => 'required',
                'detail' => 'required',
                'status' => 'required',
                'order_by' => 'required',
            ]);
            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }
        }
        $data =  request()->except('_token');

        $model = new Service();
        $model->fill($request->all());
        // save ảnh
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move(public_path('/uploads'), $filename);
            $model->image = $filename;
        }

        $model->save();
        session()->flash('message', 'Thêm thành công !');
        return redirect()->route('admin.services.index');
    }

    public function edit(Service $service)
    {
        $cateService = CateService::all();
        return view('admin/services/edit', ['service' => $service, 'cateService' => $cateService]);
    }

    public function update(Request $request, Service $service)
    {
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'name' => 'required|min:6|max:300',
                'price' => 'required|integer',
                'execution_time' => 'required',
                'discount' => 'required',
                'description' => 'required',
                'detail' => 'required',
                'cate_id' => 'required',
                'status' => 'required',
                'order_by' => 'required',
            ]);
            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }
        }
        $services = new Service();
        if ($request->hasFile('image')) {
            // lưu cái image vào cái $file
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            // đặt tên cho file được lưu
            $filename = time() . '.' . $ext;
            // lưu file vào thư mục upload
            $file->move(public_path('/uploads'), $filename);
            $services->image = $filename;
            $service->update([
                'name' => $request->name,
                'price' => $request->price,
                'image' => $filename,
                'execution_time' => $request->execution_time,
                'discount' => $request->discount,
                'description' => $request->description,
                'detail' => $request->detail,
                'cate_id' => $request->cate_id,
                'status' => $request->status,
                'order_by' => $request->order_by,
            ]);
        } else {
            $service->update([
                'name' => $request->name,
                'price' => $request->price,
                'execution_time' => $request->execution_time,
                'discount' => $request->discount,
                'description' => $request->description,
                'detail' => $request->detail,
                'cate_id' => $request->cate_id,
                'status' => $request->status,
                'order_by' => $request->order_by,
            ]);
        }
        session()->flash('message', 'Sửa thành công !');
        return redirect()->route('admin.services.index');
    }

    public function delete(Service $service)
    {
        $service->delete($service);
        session()->flash('message', 'Xóa thành công !');
        return redirect()->route('admin.services.index');
    }
}
