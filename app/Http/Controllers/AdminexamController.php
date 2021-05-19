<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateQuestionRequest;
use App\Http\Requests\UpdateQuestionRequest;
use App\Models\Question;
use App\Models\Admin;
use App\Models\Team;
use App\Models\Test;

use Mail;
use DB;
use Session;
Use Log;

use App\Jobs\SendEmailJob;

class AdminexamController extends Controller
{
    public function __construct(Question $question,Admin $user,Team $team,Test $test)
    {
        $this->userreg = $user;
        $this->team = $team;
        $this->questionreg = $question;
        $this->test = $test;
    }
    public function listTeam(){
        // $session_roleid = Session::get('role_id');
        $getTeam = $this->team->get()->except(["id" => 1]);
        return view('admin.listTeam',compact('getTeam'));
    }
    public function listTeam1(){
        // $session_roleid = Session::get('role_id');
        $getTeam = $this->team->get()->except(["id" => 1]);
        return view('admin.list-team-question',compact('getTeam'));
    }
    public function makeQuestion($id){
        $session_id = Session::get('team_id');
        $team_id  = $id;
        $getTeam = $this->userreg->where('team_id', $session_id)->first();
        return view('exam.newquestion',compact('getTeam','team_id'));
    }
    public function setQuestion(CreateQuestionRequest $request){
        try{
            $validated = $request->validated();
            $test = new Test();
            $test->test_title = $request->test_name;
            $test->team_id = $request->team_id;
            $test->save();
                foreach ($request->users as $data) {
                    
                    $questions = new Question();
                    $questions->team_id     = $request->team_id;
                    $questions->role_id     = $request->role_id;
                    $questions->test_name   = $test->id;
                    $questions->question    = $data['question'];
                    $questions->option1     = $data['option1'];
                    $questions->option2     = $data['option2'];
                    $questions->option3     = $data['option3'];
                    $questions->option4     = $data['option4'];
                    $questions->answer      = $data['check'];
                    $questions->save();
                }
                toastr()->success('Question created successfully');
                 
                return redirect()->route('display-questions',['id' => $request->team_id]);
        }catch(Throwable $exception){
            return redirect()->route('dashboard')
            ->with('error',$exception->getMessages());
            Log::info('admin login',$exception->getMessages());
        }
    }
    public function displayQuestion($id){
        $session_id = Session::get('team_id');
        $team_id  = $id;
        $testTitle = $this->test->where('team_id', $id)->get();
        return view('exam.createdquestions',compact('testTitle','team_id'));
    }
    public function changeQuestion($id){
        
        $editTeams = $this->questionreg->where('id',$id)->first();
        return view('admin.changequestion',compact('editTeams'));
    }
    public function rewriteQuestion(UpdateQuestionRequest $request){
        try{
            $validated = $request->validated();
            $update = $this->questionreg->where('id',$request->id)->update($request->except(['_token']));
                    
                    toastr()->success('Question edited successfully');
                    return redirect()->route('display-questions',['id' => $request->team_id]);
               
            }catch(Throwable $exception){
            return redirect()->route('dashboard')
            ->with('error',$exception->getMessages());
            Log::info('admin login',$exception->getMessages());
            }
    }
    
}