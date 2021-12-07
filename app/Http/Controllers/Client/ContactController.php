<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function contact(){
        return view('client/contact');
    }

    public function postContact(Request $request){
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(),[
                 'name' => 'required',
                 'phone_number' => 'required',
                 'note' => 'required',

            ]);
         if($validator->fails()){
             return redirect()->back()
                     ->withErrors($validator)
                     ->withInput();
         }
         }
         $data =  $request->except('_token');
         $result = Contact::create($data);
         session()->flash('message_contact', 'Thông tin của bạn đã được gửi đi !');
         return redirect()->route('client.contact');
    }
}
