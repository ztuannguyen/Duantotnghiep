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
                'name' => 'required|max:255|unique:services',
                'price' => 'required|digits_between:0,9999999',
                'image' => 'required|image',
                'execution_time' => 'required',
                'discount' => 'required|digits_between:0,9999999|lt:price',
                'description' => 'required|max:65535',
                'detail' => 'required|max:65535',
                'order_by' => 'required',
            ],[
                'name.required' => 'Tên dịch vụ không được để trống',
                'name.max' => 'Tên dịch vụ không vượt quá 255 ký tự',
                'name.unique' => 'Tên dịch vụ đã được sử dụng',
                'price.required' => 'Giá dịch vụ không được bỏ trống',
                'price.digits_between' => 'Giá dịch vụ phải lớn hơn 0',
                'image.required' => 'Ảnh dịch vụ không được bỏ trống',
                'image.image' => 'Ảnh dịch vụ không đúng định dạng',
                'execution_time.required' => 'Thời gian làm  không được bỏ trống',
                'discount.required' => 'Giảm giá không được bỏ trống',
                'discount.digits_between' => 'Giảm giá phải lớn hơn 0',
                'discount.lt' => 'Giảm giá phải nhỏ hơn giá cũ',
                'description.required' => 'Mô tả không được bỏ trống',
                'description.max' => 'Mô tả không vượt quá 65536 ký tự',
                'detail.required' => 'Chi tiết không được bỏ trống',
                'detail.max' => 'Chi tiết không vượt quá 65536 ký tự',
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
                'name' => 'required|max:255',
                'price' => 'required|digits_between:0,9999999',
                'image' => 'image',
                'execution_time' => 'required',
                'discount' => 'required|digits_between:0,9999999|lt:price',
                'description' => 'required|max:65535',
                'detail' => 'required|max:65535',
                'order_by' => 'required',
            ],[
                'name.required' => 'Tên dịch vụ không được để trống',
                'name.max' => 'Tên dịch vụ không vượt quá 255 ký tự',
                'price.required' => 'Giá dịch vụ không được bỏ trống',
                'price.digits_between' => 'Giá dịch vụ phải lớn hơn 0',
                'image.image' => 'Ảnh dịch vụ không đúng định dạng',
                'execution_time.required' => 'Thời gian làm  không được bỏ trống',
                'discount.required' => 'Giảm giá không được bỏ trống',
                'discount.digits_between' => 'Giảm giá phải lớn hơn 0',
                'discount.lt' => 'Giảm giá phải nhỏ hơn giá cũ',
                'description.required' => 'Mô tả không được bỏ trống',
                'description.max' => 'Mô tả không vượt quá 65536 ký tự',
                'detail.required' => 'Chi tiết không được bỏ trống',
                'detail.max' => 'Chi tiết không vượt quá 65536 ký tự',
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
    public function status($id ,$status){
        $flight = Service::find($id);
        $flight->status = $status;
        if($status == 0){
            session()->flash('message','Bật thành công'); 
          }else{
            session()->flash('warning','Tắt thành công'); 
          }
        $flight->save();

        return redirect()->route('admin.services.index'); 
    }
    public function delete(Service $service)
    {
        $service->delete($service);
        session()->flash('message', 'Xóa thành công !');
        return redirect()->route('admin.services.index');
    }
}
