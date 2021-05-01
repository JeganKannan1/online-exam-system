<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Team;
use App\Models\Admin;
use App\Models\Answer;
use Illuminate\Support\Facades\Validator;


use Mail;
use DB;
use Session;
Use Log;

use App\Jobs\SendEmailJob;

class TeamController extends Controller
{
    public function __construct(Team $team,Admin $admin,Answer $answer)
    {
       $this->teamreg = $team;
       $this->userreg = $admin;
       $this->userscore = $answer;

    }

    public function addTeam()
     {
        $getTeams = $this->teamreg->get();
        return view('admin.team',compact('getTeams'));
    }


    public function createTeam(Request $request)
    {
        try{
            $validator = Validator::make($request->all(),[
            'team_name'=>'required',
         ]);
         if ($validator->fails()) {
            $error_messages = implode(',', $validator->messages()->all());
            toastr()->error($error_messages);
            return back();
        }
         $getTeam = $this->teamreg->where('team_name',$request->team_name)->first();
                if(empty($getTeam)){
                $user = $this->teamreg->create($request->all());
                toastr()->success('Team created successfully');
                return back();
                 }else{
                    toastr()->error('entered team already exists');
                    return back();
                 }
        }catch(Throwable $exception){
                    return redirect()->route('dashboard')
                    ->with('error',$exception->getMessages());
                    Log::info('admin login',$exception->getMessages());
        }
    }


    public function delete($id)
    {
        $this->teamreg->where('id',$id)->delete();
        toastr()->success('Team deleted successfully');
        return back();
    }

    
    public function edit($id){
        
        $editTeams = $this->teamreg->where('id',$id)->first();
        return view('admin.changeteam',compact('editTeams'));
    }
    public function updateTeam(Request $request){
        try{
            $validator = Validator::make($request->all(),[
                'team_name'=>'required',
             ]);
             if ($validator->fails()) {
                $error_messages = implode(',', $validator->messages()->all());
                toastr()->error($error_messages);
                return back();
            }
        $this->teamreg->where('id',$request->id)->update($request->except(['_token']));
        toastr()->success('Team edited successfully');
        return redirect('/team');
        }catch(Throwable $exception){
            return redirect()->route('dashboard')
            ->with('error',$exception->getMessages());
            Log::info('admin login',$exception->getMessages());
        }
    }
    public function tlDashboard(){
        return view('teamlead.dashboard');
    }
    public function teamReport(){
        $session_teamid = Session::get('team_id');
        $session_roleid = Session::get('role_id');
        $editTeamate = $this->userreg->where('team_id',$session_teamid)->where('role_id','3')->get();
        return view('teamlead.teamreport',compact('editTeamate'));
    }
    public function userReport($id){
        $userReport = $this->userscore->where('user_id',$id)->get();
        return view('teamlead.userreport',compact('userReport'));
    }
}
