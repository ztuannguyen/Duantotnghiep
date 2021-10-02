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
        $cateService = CateService::all();
        $sevice = Service::where('cate_id', '18')->get();
        return view('client/booking', ['cateService' => $cateService, 'salon' => $salon, 'service' => $sevice]);
    }
}
