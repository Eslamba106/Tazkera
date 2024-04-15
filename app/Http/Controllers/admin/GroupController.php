<?php

namespace App\Http\Controllers\admin;

use App\Models\Group;
use Illuminate\Support\Str;
use App\Models\Support_Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\admin\AdminRepositoryInterface;

class GroupController extends Controller
{
    public $group;

    public function __construct(AdminRepositoryInterface $group){
        $this->group = $group;
        $this->middleware('auth:admin');

    }
    public function index(){
        $groups = $this->group->get_data(Group::class);
        // $members = [];
        foreach($groups as $group){
        // $members[]    = $group->supportTeam()->pluck(['name' , 'id']);
        $members[]    = $group->supportTeam()->pluck('name' , 'id');
        }
        // dd($members[0]);    
        // dd($members);
        return view('admin.groups.index' , compact(['groups' , 'members']));
    }

    public function create(){
        $team = $this->group->get_data(Support_Team::class);
        return view('admin.groups.create' , compact('team'));
    }
    public function store(Request $request){

        // dd($request);
        $request->validate([
            'name'   => 'required|unique:groups,name',
            // 'support_team_id' =>'required', 
        ]);
        $slug = Str::slug('-' , $request->name);
        $group = Group::create([
            'name'   => $request->name,
            'slug' =>$slug ,            
        ]);
        $team = [];
        foreach($request->support_team_id as $id){
        $team[] = Support_Team::where('id' , $id)->first();
        }
        foreach($team as $item){
            $item_ids[] = $item->id;
        }
        // 'support_team_id' => $request->support_team_id,
        $group->supportTeam()->sync($item_ids);

        return redirect()->route('admin.groups.index')->with(['success' => 'تمت الاضافة' ]);
    }

    public function edit($id){

        $group = Group::findOrFail($id);
        $member    = implode(',',$group->supportTeam()->pluck('name')->toArray());
        $team = Support_Team::all();
        // $team = $this->group->get_data(Support_Team::class);
        return view('admin.groups.edit' , compact(['team' , 'group' , 'member']));
    }
    public function show($id){

        $item = Group::findOrFail($id);
        // $member    = implode(',',$group->supportTeam()->pluck('name')->toArray());
        $team = [];
        $group = $item->supportTeam;
        // dd($group[0]->);//
        for($i=0;$i<count($group) ;$i++){
        $team[] = Support_Team::where('id' ,$group[$i]->id)->first();
        }
        $users = $item->users;
        // dd($team[0]->id);

        // $team = $this->group->get_data(Support_Team::class);
        return view('admin.groups.show' , compact(['team' , 'item' , 'users']));
    }

    public function update(Request $request){

        $request->validate([
            'name'   => 'required',
            'support_team_id' =>'required', 
        ]);
        $group = Group::findOrFail($request->id); 
        $group->update([
            'name'   => $request->name,
            'support_team_id' => $request->support_team_id, 
        ]);

        $team = Support_Team::all();
        foreach($team as $item){
            // $group = $seved_groups->where('slug' , $slug)->first();
            $team_ids[] = $item->id;
        }
        $group->supportTeam()->sync($team_ids);
        return redirect()->route('admin.groups.index')->with(['success' => 'تمت التعديل' ]);
    }

    public function delete($id){
        $group = Group::findOrFail($id);
        $group->delete();
        return redirect()->route('admin.groups.index')->with(['success' => 'تمت الحذف' ]);

    }

}
