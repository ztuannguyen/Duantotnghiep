<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SlideController extends Controller
{
    public function index()
    {
        $listImgSlide = Slide::all();
        return view('admin/slides/index', ['data' => $listImgSlide]);
    }

    public function create()
    {
        return view('admin/slides/create');
    }

    public function store(Request $request)
    {
        $data =  $request->except('_token');
        $slide = new Slide();
        if ($request->hasFile('image')) 
         {
            //   lưu cái image vào cái $file
             $file = $request->file('image');
             $ext = $file->getClientOriginalExtension();
            //   đặt tên cho file được lưu
             $filename = time() . '.' . $ext;
            //   lưu file vào thư mục upload
             $file->move(public_path('/uploads'), $filename);
             $slide->image = $filename;
         }
         $slide->save();
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
        return redirect()->route('admin.slides.index');
    }

    public function delete(Slide $slide)
    {
        $slide->delete($slide);
        return redirect()->route('admin.slides.index');
    }
}
