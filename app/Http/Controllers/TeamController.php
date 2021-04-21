<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Team;

use Mail;
use DB;
use Session;
Use Log;

use App\Jobs\SendEmailJob;

class TeamController extends Controller
{
    public function __construct(Team $team)
    {
       $this->teamreg = $team;
    }

    public function addTeam()
     {
        $getTeams = $this->teamreg->get();
        return view('admin.team',compact('getTeams'));
    }


    public function createTeam(Request $request)
    {
        $user = $this->teamreg->create($request->all());
       return back();
    }


    public function delete($id)
    {
        $this->teamreg->where('id',$id)->delete();
        return back();
    }

    
    public function edit($id){
        
        $editTeams = $this->teamreg->where('id',$id)->first();
        return view('admin.changeteam',compact('editTeams'));
    }
    public function updateTeam(Request $request){
        
        $this->teamreg->where('id',$request->id)->update($request->except(['_token']));
        return view('admin.index');
    }
}
