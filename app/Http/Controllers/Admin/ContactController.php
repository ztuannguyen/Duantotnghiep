<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Http\Requests\Admin\Contact\ContactRequest;
use App\Http\Requests\Admin\Contact\UpdateRequest;

class ContactController extends Controller
{
    public function index(Request $request){
        if ($request->has('keyword') == true) {
            $keyword = $request->get('keyword');
            $ListContact = Contact::where('name', 'LIKE', "%$keyword%")->get();
        } else {
            $ListContact = Contact::all();
        }
        return view('admin.contacts.index',['data' => $ListContact]);
    }
    public function create(){
        return view('admin.contacts.create');
    }
    public function store(ContactRequest $request){
        $data =  $request->except('_token');
        $result = Contact::create($data);
        session()->flash('message', 'Thêm thành công !');
        return redirect()->route('admin.contacts.index');
    }
    public function edit(Contact $contact)
    {
        $ListContact = Contact::all();
        return view('admin.contacts.edit', ['contact' => $contact, 'ListContact' => $ListContact]);
    }
    public function update(UpdateRequest $request, Contact $contact)
    {
        $data = $request->except('_token');
        $contact->update($data);
        session()->flash('message', 'Sửa thành công !');
        return redirect()->route('admin.contacts.index');
    }
    public function status($id, $status)
    {
        $flight = Contact::find($id);
        $flight->status = $status;

        if ($status == 0) {
            session()->flash('message', 'Bật thành công');
        } else {
            session()->flash('warning', 'Tắt thành công');
        }
        $flight->save();
        return redirect()->route('admin.contacts.index');
    }
    public function delete(Contact $contact)
    {
        $contact->delete($contact);
        session()->flash('message', 'Xóa thành công !');
        return redirect()->route('admin.contacts.index');
    }
}
