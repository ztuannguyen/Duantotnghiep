<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function list(){
        $data = Blog::where('status',0)->paginate(5);
        return view('client.blog', compact('data'));
    }

    public function category($id) {
        $data = Blog::where('status',0)->where('cate_id',$id)->paginate(5);
        return view('client.blog', compact('data'));
    }
    public function detail($id){
        $detail = Blog::where('id',$id)->get();//lấy thông tin bài viết
        $cate_id = collect($detail)->first()->cate_id ; // lấy ra cate_id từ mảng $detail
        $relates = Blog::where('cate_id','=', $cate_id)->get(); // Hiển thị các bài viết có cùng cate_id
       
        return view('client.detailBlog', compact('detail', 'relates'));
    }
    public function search(Request $request) {
        unset($request['_token']);
        $data = Blog::where('title', 'like', '%' . $request->title . '%')->paginate(5);
        if($data == []){
           session()->flash('Từ khóa không có kết quả hoặc không hợp lệ, vui lòng thử từ khóa khác nhé ! Thanks');
        }
        return view('client.blog',compact('data'));
    }
}
