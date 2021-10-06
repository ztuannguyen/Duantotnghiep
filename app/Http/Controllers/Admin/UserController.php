<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $searchData = $request->except('page'); 
        if (count($request->all()) == 0) {
            // Lấy ra danh sách phòng & phân trang cho nó
            $users = User::paginate(6);
        } else {
            $userQuery = User::where('name', 'like', "%" . $request->keyword . "%");

            if ($request->has('order_by') && $request->order_by > 0) {
                if ($request->order_by == 1) {
                    $userQuery = $userQuery->orderBy('name');
                } else if ($request->order_by == 2) {
                    $userQuery = $userQuery->orderByDesc('name');
                } else if ($request->order_by == 3) {
                    $userQuery = $userQuery->orderBy('role_id');
                } else {
                    $userQuery = $userQuery->orderByDesc('role_id');
                }
            }
            $users = $userQuery->paginate(6)->appends($searchData);
        }
        $roles = Role::all();
        $users->load('roles');

        // trả về cho người dùng 1 giao diện + dữ liệu rooms vừa lấy đc 
        return view('admin.users.index', [
            'users' => $users,
            'roles' => $roles,
            'searchData' => $searchData

        ]);
    }
    public function create(){
        return view('admin/users/create');
    }

    public function store(Request $request){
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(),[
                 'name' => 'required|min:6|max:30|alpha',
                 'number_phone' => 'required',
                 'pass' => 'required|min:6|max:10',
                 'otp' => 'required',
                 'image' => 'required',
                 'ratings' => 'required',
                 'role_id' => 'required',
            ]);
         if($validator->fails()){
             return redirect()->back()
                     ->withErrors($validator)
                     ->withInput();
         }
         }
         $data =  request()->except('_token');
         $model = new User();
        $model->fill($request->all());
        // lưu ảnh
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move(public_path('/uploads'), $filename);
            $model->image = $filename;
        }
        $model->save();
        return redirect()->route('admin.users.index');
        
    }
    public function edit(User $user){
        $roles=Role::all();
        $user->load('roles');
        return view('admin/users/edit',['user'=>$user,'roles'=>$roles]);


    }

    public function update(Request $request, User $user)
    {

        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(),[
                 'name' => 'required|min:6|max:30',
                 'number_phone' => 'required',
                 'pass' => 'required|min:6|max:10',
                 'otp' => 'required',
                 'ratings' => 'required',
                 'role_id' => 'required',
            ]);
         if($validator->fails()){
             return redirect()->back()
                     ->withErrors($validator)
                     ->withInput();
         }
         }
         $users=new User;
         if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move(public_path('/uploads'), $filename);
            $users->image = $filename;
        }else{
            $user->update([
                'name' => $request->name,
                'number_phone' => $request->number_phone,
                'pass' => $request->pass,
                'otp' => $request->otp,
                'ratings' => $request->ratings,
                'role_id' =>  $request->role_id,
            ]);
        }
        return redirect()->route('admin.users.index');
    } 
    public function remove($id)
    {
        $model = User::find($id);
        $model->delete();
        User::destroy($id);
        return redirect()->back();
    }

}
