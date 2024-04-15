<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use App\Models\Group;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Repositories\admin\AdminRepositoryInterface;

class UserController extends Controller
{
    public $user;

    public function __construct(AdminRepositoryInterface $user){
        $this->user = $user;
        $this->middleware('auth:admin');

    }
    public function index(){
        $users = $this->user->get_data(User::class);
        return view('admin.users.index' , compact('users'));
    }

    public function create(){
        $groups = $this->user->get_data(Group::class);
        return view('admin.users.create' , compact('groups'));
    }

    public function store(Request $request){

        $request->validate([
            'name' => 'required|string|min:3|max:100',
            'email'  => 'required|unique:users,email|email|min:3|max:255' ,
            'password' => 'required', 
            'phone' => 'required', 
            'location' => 'required', 
        ]);
        User::create([
            'name' => $request->name,
            'email'  => $request->email ,
            'password' => Hash::make($request->password), 
            'phone' => $request->phone, 
            'location' => $request->location, 
            'group_id' => $request->group_id, 
        ]);
        return redirect()->route('admin.users.index')->with(['success' => 'تمت الاضافة' ]);
    }

    public function edit($id){
        $user = User::findOrFail($id);
        $groups = $this->user->get_data(Group::class);
        return view('admin.users.edit' , compact(['user' , 'groups']));
    }
    
    public function update(Request $request){

        $user = User::findOrFail($request->id);
        $user->update([
            'name' => $request->name,
            'email'  => $request->email ,
            'password' => Hash::make($request->password), 
            'phone' => $request->phone, 
            'location' => $request->location, 
            'group_id' => $request->group_id, 

        ]);
        return redirect()->route('admin.users.index')->with(['success' => 'تمت التعديل' ]);
    }

    public function delete($id){
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.users.index')->with(['success' => 'تمت الحذف' ]);

    }}
