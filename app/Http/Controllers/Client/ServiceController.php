<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\CateService;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function service()
    {
        $category = CateService::with('services')->where('status',0)->get();
        $serviceAll = Service::where('status',0)->orderByDesc('id')->get();
        return view('client.service',compact('category','serviceAll'));
    }
}
