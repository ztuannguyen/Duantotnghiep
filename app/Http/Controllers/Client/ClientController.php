<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CateService;
use App\Models\Salon;
use App\Models\Service;

class ClientController extends Controller
{
    public function index(){
        $salon = Salon::all();
        return view('client.booking', compact('salon'));
    }
}
