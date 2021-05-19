<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Question;
use App\Models\Answer;
use App\Models\Test;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\TestRequest;

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
        $id = Session::get('id');
        $userId = $this->answer->where('test_title',$request->test_name)->where('user_id', $id)->get();
        if($userId->isEmpty()){
        $testName = $this->questionreg->where('team_id', $teamId)->where('test_name',$request->test_name)->get();
        Session::put('testName',$testName);
        return redirect()->route('take-exam');
        }else{
            toastr()->error('You already taken this test!');
            return redirect()->route('instruction');
        }
    }
    public function testName(){
        $testName = Session::get('testName');
        return view('employee.questions',compact('testName'));
    }
    public function checkAnswer(Request $request){
                try{
                    // $validated = $request->validated();
        $teamId = Session::get('team_id');
        $userId = Session::get('id');
        // $session_username = Session::get('username');
        $array = [];
        $total = [];
        $skip = $request->id;
        $title = $request->test_title;
        // dd($request->all());
        
        foreach($request->name as $answer){
                
                if(isset($answer['answer'])){
                    array_push($total,$answer);
            $getTeam =$this->questionreg->where('team_id', $teamId)->where('id', $answer['question'])->where('answer', $answer['answer'])->first();
            
            if($getTeam){
                array_push($array,$answer);
            }
            }else{
            $count = 0;
            $total1 = 0;
            }
        }
        $count = count($array);
        $total1 = count($total);
        $skipped = $skip - $total1;
    
        $user = new Answer();

            $user->user_id = $userId;
            $user->test_title = $title;
            $user->score = $count;
            $user->total = $skip;
            $user->skiped = $skipped;
            $user->team_id = $teamId;
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
        // $month = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec','sss','ssw','wws','wwe','hhh'];
        // $getTeam = $this->answer->where('team_id', $teamId)->where('user_id', $userId)->get();
        $getTeam = DB::table('table_marks')->join('test', 'test.id', '=', 'table_marks.test_title')
              ->select('table_marks.score','test.test_title')
              ->where('user_id', $userId) 
              ->get();
        $result[] = ['month','score'];

        
       foreach ($getTeam as $key => $value) {
            $result[++$key] = [$value->test_title, (int)$value->score];
    }
        
        return view('employee.report')
                ->with('visitor',json_encode($result));

}
}