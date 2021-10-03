<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\CateService;
use App\Models\Salon;
use App\Models\Service;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index(){
       
        $salon = Salon::all();
        $cateService = CateService::with('services')->get()->toArray();
        $service = Service::all();
        return view('client/booking',compact('salon','service','cateService'));
    }
}
