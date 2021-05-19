<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TeamRequest;
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
        $getTeams = $this->teamreg->get()->except(["id"=>1]);
        return view('admin.team',compact('getTeams'));
    }


    public function createTeam(TeamRequest $request)
    {
        try{
            $validated = $request->validated();

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
    public function updateTeam(TeamRequest $request){
        try{
            $validated = $request->validated();
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
        $teamId = Session::get('team_id');
        $getTeam = DB::table('table_marks')->join('test', 'test.id', '=', 'table_marks.test_title')
              ->select('table_marks.score','test.test_title')
              ->where('table_marks.team_id', $teamId)->get(); 
              
        $result[] = ['month','score'];

       foreach ($getTeam as $key => $value) {
               
            $result[++$key] = [$value->test_title, (int)$value->score];
           }
    
        return view('teamlead.dashboard')->with('visitor',json_encode($result));
    }
    public function teamReport(){
        $teamId = Session::get('team_id');
        $editTeamate = $this->userreg->where('team_id',$teamId)->where('role_id','3')->get();
        return view('teamlead.teamreport',compact('editTeamate'));
    }
    public function userReport($id){
        $session_id = Session::get('team_id');
        $session_userid = Session::get('id');
        // $month = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec','sss','ssw','wws','wwe','hhh'];
        // $getTeam = $this->userscore->where('team_id', $session_id)->where('user_id', $id)->get();
        $getTeam = DB::table('table_marks')->join('test', 'test.id', '=', 'table_marks.test_title')
        ->select('table_marks.score','test.test_title')
        ->where('user_id', $id) 
        ->get();
        $result[] = ['month','score'];

        
       foreach ($getTeam as $key => $value) {
            $result[++$key] = [$value->test_title, (int)$value->score];
    }
        
        return view('teamlead.userreport')
                ->with('visitor',json_encode($result));
    }
}
