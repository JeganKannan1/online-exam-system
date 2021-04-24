<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Question;
use App\Models\Answer;

use Mail;
use DB;
use Session;
Use Log;

use App\Jobs\SendEmailJob;

class ExamController extends Controller
{
    public function __construct(Question $question)
    {

       $this->questionreg = $question;
    }

    public function newQuestion(){
        $session_id = Session::get('team_id');
        $getTeams = $this->questionreg->where('team_id', $session_id)->get();
        return view('employee.created',compact('getTeams'));
    }
    public function empDashboard(){
        $session_id = Session::get('team_id');
        $getTeam = DB::table('questions')->where('team_id', $session_id)->first();
        return view('employee.employee',compact('getTeam'));
    }
    public function answerPage(){
        $session_id = Session::get('team_id');
        $session_userid = Session::get('id');
        $user = DB::table('table_marks')->where('team_id', $session_id)->where('user_id', $session_userid)->orderBy('id', 'DESC')->first();
        return view('employee.answer',compact('user'));
    }
    public function addQuestion(Request $request){
        try{
        $this->validate($request,[
            'question'=>'required',
            'option1'=>'required',
            'option2'=>'required',
            'option3'=>'required',
            'option4'=>'required',
            'answer'=>'required'
         ]);
         if($request->answer == $request->option1||$request->answer == $request->option2||$request->answer == $request->option3||$request->answer == $request->option4){

        $question = Question::create($request->all());
        return redirect('/created');
         }else{
            toastr()->error('question already exist.please enter a new question');
            return back();

         }
        }catch(Throwable $exception){
            return redirect()->route('dashboard')
            ->with('error',$exception->getMessages());
            Log::info('admin login',$exception->getMessages());
        }
    }
    
    public function takeTest(){
        $session_id = Session::get('team_id');
        $getTeam = DB::table('questions')->where('team_id', $session_id)->get();

        return view('employee.questions',compact('getTeam'));
     }
     public function checkAnswer(Request $request){
        $session_id = Session::get('team_id');
        $session_userid = Session::get('id');
        $session_username = Session::get('username');
        $array = [];
        $total = [];
        $skip = $request->id;
        foreach($request->name as $answer){
            array_push($total,$answer);
            $getTeam =DB::table('questions')->where('team_id', $session_id)->where('answer', $answer)->first();
            if( ($getTeam && $answer)== true ){
                array_push($array,$answer);
            }
           
        }
    
        $count = count($array);
        $total = count($total);
        $skipped = $skip - $total;
        $user = new Answer([
            'user_id' => $session_userid,
            'score' => $count,
            'total' => $skip,
            'skiped' => $skipped,
            'team_id' => $session_id,
            'role_id' => 3
        ]);
        $user->save();
        // dd($count);
        // dd($total);
        return redirect()->route('answer');
    }

    public function monthlyReport(){
        $session_id = Session::get('team_id');
        $session_userid = Session::get('id');
        $getTeam = DB::table('table_marks')->where('team_id', $session_id)->where('user_id', $session_userid)->get();
        return view('employee.report',compact('getTeam'));
     }
     public function deleteQuestion($id)
    {
        $this->questionreg->where('id',$id)->delete();
        return back();
    }
    public function editQuestion($id){
        
        $editTeams = $this->questionreg->where('id',$id)->first();
        return view('teamlead.changequestion',compact('editTeams'));
    }
    public function updateQuestion(Request $request){
        
        $this->questionreg->where('id',$request->id)->update($request->except(['_token']));
        return redirect('/created');
    }

}
