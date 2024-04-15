<?php

namespace App\Http\Controllers\support;

use App\Models\Group;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Support_Team;
use Illuminate\Support\Facades\Auth;

class SupportTeamController extends Controller
{
    // public function __construct(){
    //     $this->middleware('auth:support_team');  
    // }
    public function index(){

        $user= Auth::guard('support_team')->user()->id;
        $member = Support_Team::where('id' , $user)->first();
        // $member    = implode(',',$group->supportTeam()->pluck('name')->toArray());
        $groups = [];
        $group = $member->groups;
        // dd($group);///
        for($i=0;$i<count($group) ;$i++){
        $groups[] = Group::where('id' ,$group[$i]->id)->get();
        }
        return view('support.dashboard' , compact('groups'));
    }

    public function show($id){

        $group = Group::findOrFail($id);
        $users = $group->users;
        return view('support.show' , compact(['users' , 'group' ]));    
    }
}

