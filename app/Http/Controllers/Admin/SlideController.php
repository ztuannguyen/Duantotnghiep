<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slide;
use Illuminate\Http\Request;

class SlideController extends Controller
{
    public function index()
    {
        $listImgSlide = Slide::all();
        return view('admin/slides/index', ['data' => $listImgSlide]);
    }

    public function create(){
        return view('admin.slides.create');
    }
    public function store(Request $request){
        $data =  $request->except('_token');

        $model = new Slide();
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
        return redirect()->route('admin.slides.index');
    }
    public function edit(Slide $slide)
    {
        return view('admin/slides/edit', ['slide' => $slide]);
    }

    public function update(Slide $slide, Request $request)
    {
        $slides = new Slide();
        if ($request->hasFile('image')) 
        {
            // lưu cái image vào cái $file
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            // đặt tên cho file được lưu
            $filename = time() . '.' . $ext;
            // lưu file vào thư mục upload
            $file->move(public_path('/uploads'), $filename);
            $slides->image = $filename;
            $slide->update([
                'image' => $filename,
                'status' => $request->status,
            ]);
        }else{
            $slide->update([
                'status' => $request->status,
            ]);
        }
        session()->flash('message', 'Sửa thành công !');
        return redirect()->route('admin.slides.index');
    }

    public function delete(Slide $slide)
    {
        $slide->delete($slide);
        session()->flash('message', 'Xóa thành công !');
        return redirect()->route('admin.slides.index');
    }
}
