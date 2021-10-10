<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\CateService;
use App\Models\Salon;
use App\Models\Service;
use App\Models\Time;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index(){
       
        $salon = Salon::where('status',1)->orderBy('id','ASC')->get();
        $cateService = CateService::with('services')->get();
        $service = Service::all();
        $time = Time::where('salon_id',1)->orderBy('id','ASC')->get();
        return view('client/booking',compact('salon','service','cateService','time'));
    }
}