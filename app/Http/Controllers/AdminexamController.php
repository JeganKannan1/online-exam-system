<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Question;
use App\Models\Admin;
use App\Models\Team;

use Mail;
use DB;
use Session;
Use Log;

use App\Jobs\SendEmailJob;

class AdminexamController extends Controller
{
    public function __construct(Question $question,Admin $user,Team $team)
    {
        $this->userreg = $user;
        $this->team = $team;
        $this->questionreg = $question;
    }
    // public function adminQuestion(){
    //     $session_id = Session::get('team_id');
    //     $getTeam = $this->userreg->where('team_id', $session_id)->first();
    //     return view('admin.adminquestions',compact('getTeam'));
    // }
    public function createQuestion(){
        $session_id = Session::get('team_id');
        $getTeam = $this->userreg->where('team_id', $session_id)->first();
        return view('admin.createquestions',compact('getTeam'));
    }
    
    public function listTeam(){
        $session_roleid = Session::get('role_id');
        $getTeam = $this->team->get()->except(["id" => 1]);
        return view('admin.listTeam',compact('getTeam'));
    }

    public function listTeam1(){
        $session_roleid = Session::get('role_id');
        $getTeam = $this->team->get()->except(["id" => 1]);
        return view('admin.list-team-question',compact('getTeam'));
    }


    public function makeQuestion($id){
        $session_teamid = Session::get('team_id');
        $session_roleid = Session::get('role_id');
        $team_id = $id;
        $getTeam = $this->questionreg->where('team_id',$id)->first();
        return view('admin.display',compact('session_roleid','session_teamid','team_id'));
    }

    public function setQuestion(Request $request){
        try{
        $this->validate($request,[
            'question'=>'required',
            'option1'=>'required',
            'option2'=>'required',
            'option3'=>'required',
            'option4'=>'required',
            'answer'=>'required',
         ]);
         $getTeam = $this->questionreg->where('question',$request->question)->first();
         if(empty($getTeam)){
             if($request->option1 != $request->option2 && $request->option2 != $request->option3 && $request->option3 != $request->option4 && $request->option1 != $request->option3 && $request->option2 != $request->option4){
                if($request->answer == $request->option1||$request->answer == $request->option2||$request->answer == $request->option3||$request->answer == $request->option4){

        $question = Question::create($request->all());
        toastr()->success('Question created successfully');
        return redirect()->route('display-questions',['id' => $request->team_id]);
        }else{
            toastr()->error('please enter an answer from one of the given option');
            return back();
         }
        }else{
            toastr()->error('options are repeated');
            return back();
        }
        }else{
            toastr()->error('the entered question is already exist please enter a new question');
            return back();
         }
        }catch(Throwable $exception){
            return redirect()->route('index')
            ->with('error',$exception->getMessages());
            Log::info('admin login',$exception->getMessages());
        }
    }
    public function displayQuestion($id){
        $session_id = Session::get('team_id');
        $getTeams = $this->questionreg->where('team_id', $id)->get();
        return view('admin.showquestion',compact('getTeams'));
    }
    public function changeQuestion($id){
        
        $editTeams = $this->questionreg->where('id',$id)->first();
        return view('admin.changequestion',compact('editTeams'));
    }
    public function rewriteQuestion(Request $request){
        try{
            $this->validate($request,[
                'question'=>'required',
                'option1'=>'required',
                'option2'=>'required',
                'option3'=>'required',
                'option4'=>'required',
                'answer'=>'required'
             ]);
             
             if($request->answer == $request->option1||$request->answer == $request->option2||$request->answer == $request->option3||$request->answer == $request->option4)
                {
                    $this->questionreg->where('id',$request->id)->update($request->except(['_token']));
                    toastr()->success('Question edited successfully');
                    return redirect('/display-questions');
                }else{
                    toastr()->error('please enter an answer from one of the given option');
                    return back();
                }
            }catch(Throwable $exception){
            return redirect()->route('dashboard')
            ->with('error',$exception->getMessages());
            Log::info('admin login',$exception->getMessages());
            }
    }
    
}