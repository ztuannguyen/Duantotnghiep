<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Slide;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function show(){
        $slide = Slide::where('status',0)->get();
        return view('client.home',compact('slide'));
    }
}
