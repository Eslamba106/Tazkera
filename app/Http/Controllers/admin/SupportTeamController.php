<?php

namespace App\Http\Controllers\admin;

use App\Models\Group;
use Illuminate\Support\Str;
use App\Models\Support_Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Admin\SupportTeamRequest;
use App\Repositories\admin\AdminRepositoryInterface;

class SupportTeamController extends Controller
{
    public $support_team;

    public function __construct(AdminRepositoryInterface $support_team){
        $this->support_team = $support_team;
        $this->middleware('auth:admin');

    }
    public function index(){
        $team = Support_Team::paginate();
        $groups = [];
        foreach($team as $member){
        $groups[]    = implode(',',$member->groups()->pluck('name')->toArray());
        }        
        return view('admin.support_team.index' , compact(['team' , 'groups']));
    }

    public function create(){
        return view('admin.support_team.create');
    }

    public function store(SupportTeamRequest $request , Support_team $support_team){
                $support_team->create(([
                    'name' => $request->name,
                    'email'  => $request->email ,
                    'password' => Hash::make($request->password), 
                ]));

                // $support_team->groups()->$support_team_id == $support_team->id;
                // $support_team->groups()->sync($group_ids);
                // $support_team->groups()->sync($support_team->id);
                // return redirect()->route('dashboard.products.index')
                // ->with('success' , 'Product Updated!');
        // Support_Team::create([
        //     'name' => $request->name,
        //     'email'  => $request->email ,
        //     'password' => bcrypt($request->password), 
        // ]);
        return redirect()->route('admin.support_team.index')->with(['success' => 'تمت الاضافة' ]);
    }

    public function edit($id){
        $member = Support_Team::findOrFail($id);
        $groups    = implode(',',$member->groups()->pluck('name')->toArray());
        return view('admin.support_team.edit' , compact(['member' , 'groups']));
    }
    
    public function update(Request $request){

        $member = Support_Team::findOrFail($request->id);
        $groups = json_decode($request->post('groups'));
        $member->update([
            'name' => $request->name,
            'email'  => $request->email ,
            'password' => Hash::make($request->password), 
        ]);
        // $groups = json_decode($request->post('groups'));
        // dd($groups[0]->value);
        $group_ids = [];
        $seved_groups = Group::all();
        foreach($groups as $item){
            $slug = Str::slug($item->value);
            $group = $seved_groups->where('slug' , $slug)->first();
            if(!$group){
                $group =  Group::create([
                    'name' => $item->value,
                    'slug' => $slug
                ]);
            }
            $group_ids[] = $group->id;
        }
        $member->groups()->sync($group_ids);
        return redirect()->route('admin.support_team.index')->with(['success' => 'تمت التعديل' ]);
    }
    public function show($id){

        $item = Support_Team::findOrFail($id);
        $team = [];
        $group = $item->groups;
        for($i=0;$i<count($group) ;$i++){
        $team[] = Group::where('id' ,$group[$i]->id)->first();
        }
        // dd($team[0]->id);

        // $team = $this->group->get_data(Support_Team::class);
        return view('admin.support_team.show' , compact(['team' , 'item']));
    }
    public function delete($id){
        $member = Support_team::findOrFail($id);
        $member->delete();
        return redirect()->route('admin.support_team.index')->with(['success' => 'تمت الحذف' ]);

    }
}
