<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Slide;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function show(){
        $slide = Slide::where('status',0)->get();
        $listservice = Service::where('cate_id', 19)->get();
        return view('client.home',compact('slide','listservice'));
    }
    public function detail($id){
        $detail = Service::where('id',$id)->get();
        return view('client.detailService', compact('detail'));
    }
}
