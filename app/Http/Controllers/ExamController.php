<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Question;

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

    public function addQuestion(Request $request){
        $question = Question::create($request->all());
       return redirect()->route('employee');
    }
    public function employeeDashboard(){
        return view('employee.employee');
    }
    public function takeTest(){
        $session_id = Session::get('team_id');
        $getTeam = DB::table('questions')->where('team_id', $session_id)->get();
        
        return view('admin.questions',compact('getTeam'));       
     }
     public function checkAnswer(Request $request){
         dd($request);
       return redirect()->route('employee');
    }
    
}
