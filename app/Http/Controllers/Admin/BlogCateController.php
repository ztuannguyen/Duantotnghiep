<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CateBlog;
use App\Http\Requests\Admin\BlogCate\BlogCateRequest;
use App\Http\Requests\Admin\BlogCate\UpdateRequest;
use Illuminate\Http\Request;

class BlogCateController extends Controller
{
    public function index(Request $request){
        if ($request->has('keyword') == true) {
            $keyword = $request->get('keyword');
            $listCateBlog = CateBlog::where('name', 'LIKE', "%$keyword%")->get();
        } else {
            $listCateBlog = CateBlog::all();
        }
        $listCateBlog->load(['blog']);
        return view('admin.cateBlogs.index',['data' => $listCateBlog]);
    }

    public function show(){}

    public function create(){
        return view('admin.cateBlogs.create');
    }

    public function store(BlogCateRequest $request){
       
        $data =  $request->except('_token');
        $result = CateBlog::create($data);
        session()->flash('message', 'Thêm thành công !');
        return redirect()->route('admin.cateBlogs.index');
    }

    public function edit(CateBlog $blogCate){
        return view('admin.cateBlogs.edit', ['blogCate'=> $blogCate]);
    }

    public function update(UpdateRequest $request, CateBlog $blogCate)
    {
          $data = $request->except('_token');
          $blogCate->update($data);
          session()->flash('message', 'Sửa thành công !');
          return redirect()->route('admin.cateBlogs.index');
    }
    public function status($id ,$status){
        $flight = CateBlog::find($id);
        $flight->status = $status;
        if($status == 0){
            session()->flash('message','Bật thành công '); 
          }else{
            session()->flash('warning','Tắt thành công'); 
          }
        $flight->save();
        return redirect()->route('admin.cateBlogs.index',['type'=>$flight->type]);
    }
     public function delete(CateBlog $blogCate){
         $blogCate->delete($blogCate);
         session()->flash('message', 'Xóa thành công !');
         return redirect()->route('admin.cateBlogs.index');
     }
}
