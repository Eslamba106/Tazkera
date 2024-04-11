<?php

namespace App\Http\Controllers\admin;

use App\Models\Support_Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SupportTeamRequest;
use App\Repositories\admin\AdminRepositoryInterface;

class SupportTeamController extends Controller
{
    public $support_team;

    public function __construct(AdminRepositoryInterface $support_team){
        $this->support_team = $support_team;
    }
    public function index(){
        $team = $this->support_team->get_data(Support_Team::class);
        return view('admin.support_team.index' , compact('team'));
    }

    public function create(){
        return view('admin.support_team.create');
    }
    public function store(SupportTeamRequest $request){
        Support_Team::create([
            'name' => $request->name,
            'email'  => $request->email ,
            'password' => bcrypt($request->password), 
        ]);
        return redirect()->route('admin.support_team.index')->with(['Success' => 'تمت الاضافة' ]);
    }
}
