<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CateService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CateServiceController extends Controller
{
    public function index(Request $request){
        if ($request->has('keyword') == true) {
            $keyword = $request->get('keyword');
            $listCateService = CateService::where('name_cate', 'LIKE', "%$keyword%")->get();
        } else {
            $listCateService = CateService::all();
        }
        $listCateService->load(['services']);
        return view('admin.cateServices.index',['data' => $listCateService]);
    }

    public function show(){}

    public function create(){
        return view('admin.cateServices.create');
    }

    public function store(Request $request){
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(),[
                 'name_cate' => 'required|min:3|max:30',
                 'order_by' => 'required',

            ]);
         if($validator->fails()){
             return redirect()->back()
                     ->withErrors($validator)
                     ->withInput();
         }
         }
        $data =  $request->except('_token');
        $result = CateService::create($data);
        session()->flash('message', 'Thêm thành công !');
        return redirect()->route('admin.cate_services.index');
    }

    public function edit(CateService $cateService){
        return view('admin.cateServices.edit', ['cateService'=> $cateService]);
    }

    public function update(Request $request, CateService $cateService)
    {
        if ($request->isMethod('post')) {
             $validator = Validator::make($request->all(),[
                 'name_cate' => 'required|min:3|max:30',
                 'order_by' => 'required',
             ]);
          if($validator->fails()){
              return redirect()->back()
                      ->withErrors($validator)
                      ->withInput();
          }
          }
          
          $data = $request->except('_token');
          $cateService->update($data);
          session()->flash('message', 'Sửa thành công !');
          return redirect()->route('admin.cate_services.index');
    }
    public function status($id ,$status){
        $flight = CateService::find($id);
        $flight->status = $status;
        if($status == 0){
            session()->flash('message','Bật thành công '); 
          }else{
            session()->flash('warning','Tắt thành công'); 
          }
        $flight->save();
        return redirect()->route('admin.cate_services.index',['type'=>$flight->type]);
    }
     public function delete(cateService $id){
         $id->delete($id);
         session()->flash('message', 'Xóa thành công !');
         return redirect()->route('admin.cate_services.index');
     }
}