<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\CateBlog;
use App\Http\Requests\Admin\Blog\BlogRequest;
use App\Http\Requests\Admin\Blog\UpdateRequest;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('keyword') == true) {
            $keyword = $request->get('keyword');
            $listBlog = Blog::where('title', 'LIKE', "%$keyword%")->get();
        } else {
            $listBlog = Blog::all();
        }
        $listBlog->load(['cateBlog']);
        return view('admin/blogs/index', ['data' => $listBlog]);
    }

    public function show()
    {
    }

    public function create()
    {
        $cateBlog = CateBlog::all();
        return view('admin/blogs/create', ['cateBlog' => $cateBlog]);
    }

    public function store(BlogRequest $request)
    {
        $data =  request()->except('_token');

        $model = new Blog();
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
        return redirect()->route('admin.blogs.index');
    }

    public function edit(Blog $blog)
    {
        $cateBlog = CateBlog::all();
        return view('admin/blogs/edit', ['blog' => $blog, 'cateBlog' => $cateBlog]);
    }

    public function update(UpdateRequest $request, Blog $blog)
    {
        
        $blogs = new Blog();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move(public_path('/uploads'), $filename);
            $blogs->image = $filename;
            $blog->update([
                'title' => $request->title,
                'image' => $filename,
                'description' => $request->description,
                'detail' => $request->detail,
                'cate_id' => $request->cate_id,
                'status' => $request->status,
            ]);
        } else {
            $blog->update([
                'title' => $request->title,
                'description' => $request->description,
                'detail' => $request->detail,
                'cate_id' => $request->cate_id,
                'status' => $request->status,
            ]);
        }
        session()->flash('message', 'Sửa thành công !');
        return redirect()->route('admin.blogs.index');
    }
    public function status($id ,$status){
        $flight = Blog::find($id);
        $flight->status = $status;
        if($status == 0){
            session()->flash('message','Bật thành công'); 
          }else{
            session()->flash('warning','Tắt thành công'); 
          }
        $flight->save();

        return redirect()->route('admin.blogs.index'); 
    }
    public function delete(Blog $blog)
    {
        $blog->delete($blog);
        session()->flash('message', 'Xóa thành công !');
        return redirect()->route('admin.blogs.index');
    }
}
