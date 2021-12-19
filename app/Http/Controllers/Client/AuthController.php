<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Nexmo\Client\Credentials\Basic;
use Nexmo\Client;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('client.login');
    }

    /**
     * Continue second
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function continueSecond(Request $request)
    {
        $phone = $request->phone;
        $user = User::where('number_phone',$phone)->first();
        $otp   = random_int(100000, 999999);
        $basic  = new Basic('b167184f', 'vjBOZfH9tAHq2ou3');
        $client = new Client($basic);
        if (is_null($user)) {
            if (!isset($request->reset)) {
                User::create([
                    'role_id' => 3,
                    'number_phone' => $phone,
                    'otp' => $otp
                ]);
            } else {
                return response()->json([
                    'status' => 403,
                ]);
            }
        } else {
            if ($user->verify != 1) {
                User::where('number_phone',$phone)->update(['otp' => $otp]);
            } else {
                if (isset($request->reset)) {
                    User::where('number_phone',$phone)->update(['otp' => $otp]);
                } else {
                    $user = User::where('number_phone',$phone)->where('verify',1)->first();
                    return response()->json([
                        'status' => 200,
                        'data'   =>  view('client.includes.auth.step3',compact('user'))->render(),
                        'verify' => true
                    ]);
                }
            }
        }
        $client->message()->send([
            'to' => '84'.(int)$phone,
            'from' => 'Vonage APIs',
            'text' => $otp
        ]);
        return response()->json([
            'status' => 200,
            'data'   =>  view('client.includes.auth.step2',compact('phone'))->render(),
            'verify' => false
        ]);
    }

    public function resendOTP(Request $request)
    {
        $phone = $request->phone;
        $otp   = random_int(100000, 999999);
        $basic  = new Basic('b167184f', 'vjBOZfH9tAHq2ou3');
        $client = new Client($basic);
        User::where('number_phone',$phone)->update(['otp' => $otp]);
        $client->message()->send([
            'to' => '84'.(int)$phone,
            'from' => 'Vonage APIs',
            'text' => $otp
        ]);
        return response()->json([
            'status' => 200,
        ]);
    }

    /**
     * Continue third
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function continueThird(Request $request)
    {
        $otp = $request->otp;
        $phone = $request->phone;
        $user = User::where('number_phone',$phone)->where('otp',$otp)->first();
        if (!is_null($user)) {
            if (isset($request->reset)) {
                return response()->json([
                    'status' => 200,
                    'data'   => view('client.includes.auth.reset', compact('user'))->render(),
                ]);
            } else {
                User::where('number_phone',$phone)->update(['verify' => 1]);
                return response()->json([
                    'status' => 200,
                    'data'   => view('client.includes.auth.step3', compact('user'))->render(),
                ]);
            }
        } else {
            return response()->json([
                'status' => 403
            ]);
        }
    }

    /**
     * Login
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postLogin(Request $request)
    {
        $user = User::find($request->user_id);
        $user->pass = $request->password;
        $user->name = $request->name;
        $user->save();
        Auth::loginUsingId($request->user_id);
        return redirect()->route('client.show');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('client.login');
    }

    /**
     * Ajax login
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function ajaxLogin(Request $request)
    {
        $user = User::where('id',$request->user_id)->where('pass',$request->password)->first();
        if (!is_null($user)) {
            Auth::loginUsingId($user->id);
            return response()->json([
                'status' => 200,
                'role'   => $user->role_id
            ]);
        } else {
            return response()->json([
                'status' => 403
            ]);
        }
    }

    public function resetPassword()
    {
        return view('client.reset_password');
    }

    /**
     * Reset password
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postReset(Request $request)
    {
        $user = User::find($request->user_id);
        $user->pass = $request->password;
        $user->save();
        Auth::loginUsingId($request->user_id);
        return redirect()->route('client.show');
    }
}
