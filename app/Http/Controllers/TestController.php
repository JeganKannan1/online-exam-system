<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Question;
use App\Models\Answer;
use App\Models\Test;
use Illuminate\Support\Facades\Validator;

use Mail;
use DB;
use Session;
Use Log;

use App\Jobs\SendEmailJob;

class TestController extends Controller
{
    public function __construct(Question $question,Answer $answer,Test $test)
    {

       $this->questionreg = $question;
       $this->answer = $answer;
       $this->test = $test;

    }
    public function instruction(){
        $session_id = Session::get('team_id');
        $testName = $this->test->where('team_id', $session_id)->get();
        return view('employee.instructions',compact('testName'));
    }
    public function takeTest(Request $request){
        $session_id = Session::get('team_id');
        $testName = $this->questionreg->where('team_id', $session_id)->where('test_name',$request->test_name)->get();
        Session::put('testName',$testName);
        return redirect()->route('test-name');
    }
    public function testName(){
        $session_id = Session::get('testName');
        return view('employee.questions',compact('session_id'));
    }
    public function checkAnswer(Request $request){
        try{
            $validator = Validator::make($request->all(),[
                'name'=>'required',
                ]);
                if ($validator->fails()) {
                    $error_messages = implode(',', $validator->messages()->all());
                    toastr()->error($error_messages);
                    return back();
                }
        $session_id = Session::get('team_id');
        $session_userid = Session::get('id');
        $session_username = Session::get('username');
        $array = [];
        $total = [];
        $skip = $request->id;
        foreach($request->name as $answer){
            array_push($total,$answer);
            $getTeam =$this->questionreg->where('team_id', $session_id)->where('answer', $answer)->first();
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
        }catch(Throwable $exception){
            return back()
            ->with('error',$exception->getMessages());
            Log::info('admin login',$exception->getMessages());
    }
    }
    public function answerPage(){
        $session_id = Session::get('team_id');
        $session_userid = Session::get('id');
        $user = $this->answer->where('team_id', $session_id)->where('user_id', $session_userid)->orderBy('id', 'DESC')->first();
        return view('employee.answer',compact('user'));
    }

    public function monthlyReport(){
        $session_id = Session::get('team_id');
        $session_userid = Session::get('id');
        $getTeam = $this->answer->where('team_id', $session_id)->where('user_id', $session_userid)->get();
        return view('employee.report',compact('getTeam'));
     }

}