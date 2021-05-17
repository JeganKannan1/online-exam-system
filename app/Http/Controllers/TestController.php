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
        $teamId = Session::get('team_id');
        $testName = $this->test->where('team_id', $teamId)->get();
        return view('employee.instructions',compact('testName'));
    }
    public function takeTest(Request $request){
        $teamId = Session::get('team_id');
        $testName = $this->questionreg->where('team_id', $teamId)->where('test_name',$request->test_name)->get();
        Session::put('testName',$testName);
        return redirect()->route('take-exam');
    }
    public function testName(){
        $testName = Session::get('testName');
        return view('employee.questions',compact('testName'));
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
        $teamId = Session::get('team_id');
        $userId = Session::get('id');
        // $session_username = Session::get('username');
        $array = [];
        $total = [];
        $skip = $request->id;
        $title = $request->test_title;
        foreach($request->name as $answer){
            
            foreach($answer as $key){
                array_push($total,$key);
                
            $getTeam =$this->questionreg->where('team_id', $session_id)->where('id', $request->question_id)->where('answer', $key)->first();

            if($getTeam){
                array_push($array,$key);
                }
            }
        }
        $count = count($array);
        $total = count($total);
        $skipped = $skip - $total;
        $user = new Answer();

            $user->user_id = $session_userid;
            $user->test_title = $title;
            $user->score = $count;
            $user->total = $skip;
            $user->skiped = $skipped;
            $user->team_id = $session_id;
            $user->role_id = 3;
        $user->save();
        return redirect()->route('answer');
        }catch(Throwable $exception){
            return back()
            ->with('error',$exception->getMessages());
            Log::info('admin login',$exception->getMessages());
    }
    }
    public function answerPage(){
        $teamId = Session::get('team_id');
        $userId = Session::get('id');
        $user = $this->answer->where('team_id', $teamId)->where('user_id', $userId)->orderBy('id', 'DESC')->first();
        return view('employee.answer',compact('user'));
    }
    public function monthlyReport(){
        $teamId = Session::get('team_id');
        $userId = Session::get('id');
        $month = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec','sss','ssw','wws','wwe','hhh'];
        $getTeam = $this->answer->where('team_id', $teamId)->where('user_id', $userId)->get();
        
        $result[] = ['month','score'];

        
       foreach ($getTeam as $key => $value) {
            $result[++$key] = [$value->test_title, (int)$value->score];
    }
        
        return view('employee.report')
                ->with('visitor',json_encode($result));

}
}