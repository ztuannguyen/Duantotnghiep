<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Footer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FooterController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('keyword') == true) {
            $keyword = $request->get('keyword');
            $ListFooter = Footer::where('name', 'LIKE', "%$keyword%")->get();
        } else {
            $ListFooter = Footer::all();
        }
        return view('admin.footers.index',['data' => $ListFooter]);
    }

    public function create()
    {
        return view('admin/footers/create');
    }

    public function store(Request $request)
    {
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(),[
                 'email' => 'required|email',
                 'hotline' => 'required|digits:10|numeric',
                 'description' => 'required',
                 'fanpage' => 'required',
                 'status' => 'required',

            ]);
         if($validator->fails()){
             return redirect()->back()
                     ->withErrors($validator)
                     ->withInput();
         }
         }
        $data =  $request->except('_token');
        $result = Footer::create($data);
        session()->flash('message', 'Thêm thành công !');
        return redirect()->route('admin.footers.index');
    }

    public function edit(Footer $footer)
    {
        $listFooter=Footer::all();
        return view('admin/footers/edit',['footer'=> $footer, 'listFooter'=>$listFooter]);
    }

    public function update(Footer $footer, Request $request)
    {
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(),[
                'email' => 'required|email',
                'hotline' => 'required|digits:10|numeric',
                'description' => 'required',
                'fanpage' => 'required',
                'status' => 'required',
            ]);
         if($validator->fails()){
             return redirect()->back()
                     ->withErrors($validator)
                     ->withInput();
         }
         }
        $data = $request->except('_token');
        $footer->update($data);
        session()->flash('message', 'Sửa thành công !');
        return redirect()->route('admin.footers.index');
    }

    public function delete(Footer $footer){
        $footer->delete($footer);
        session()->flash('message', 'Xóa thành công !');
        return redirect()->route('admin.footers.index');
    }
}
