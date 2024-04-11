<?php

namespace App\Http\Controllers\admin;

use App\Models\Group;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Support_Team;
use App\Repositories\admin\AdminRepositoryInterface;

class GroupController extends Controller
{
    public $group;

    public function __construct(AdminRepositoryInterface $group){
        $this->group = $group;
    }
    public function index(){
        $groups = $this->group->get_data(Group::class);
        return view('admin.groups.index' , compact('groups'));
    }

    public function create(){
        $team = $this->group->get_data(Support_Team::class);
        return view('admin.groups.create' , compact('team'));
    }
    public function store(Request $request){

        $request->validate([
            'name'   => 'required|unique:groups,name',
            'support_team_id' =>'required', 
        ]);

        Group::create($request->all());
        return redirect()->route('admin.groups.index')->with(['success' => 'تمت الاضافة' ]);
    }

    public function edit($id){

        $group = Group::findOrFail($id);

        $team = $this->group->get_data(Support_Team::class);
        return view('admin.groups.edit' , compact(['team' , 'group' ]));
    }

    public function update(Request $request){

        $request->validate([
            'name'   => 'required|unique:groups,name',
            'support_team_id' =>'required', 
        ]);
        $group = Group::findOrFail($request->id); 
        $group->update($request->all());
        return redirect()->route('admin.groups.index')->with(['success' => 'تمت التعديل' ]);
    }

    public function delete($id){
        $group = Group::findOrFail($id);
        $group->delete();
        return redirect()->route('admin.groups.index')->with(['success' => 'تمت الحذف' ]);

    }

}
