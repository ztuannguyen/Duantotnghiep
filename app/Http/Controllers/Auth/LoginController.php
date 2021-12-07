<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Nexmo\Laravel\Facade\Nexmo;


class LoginController extends Controller
{
    public function register()
    {
        return view('auth/register');
    }

    public function postRegister(Request $request)
    {
        $otp = rand(1000,9999);

        $user = new User;
        $user->number_phone=$request->number_phone;
        $user->name=$request->name;
        $user->password=$request->password;
        $user->image=$request->image;
        $user->otp=$otp;
        $user->save();
        Nexmo::message()->send([
            'to' => '+84' .$request->number_phone,
            'from' => 'BrotherHoods',
            'text' => 'Using the facade to send a message.' .$otp,
        ]);
        
        return redirect('auth/verify');
    }

    public function verify()
    {
        # code...
    }
}
