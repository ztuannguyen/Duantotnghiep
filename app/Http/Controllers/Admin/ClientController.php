<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CateService;
use App\Models\Salon;
use App\Models\Service;

class ClientController extends Controller
{
    
    public function index(){
    
        $salon = Salon::all();
        $cateService = CateService::with('services')->get()->toArray();
        $service =Service::all();
        return view('client/booking',compact('salon','service','cateService'));
    }
}
