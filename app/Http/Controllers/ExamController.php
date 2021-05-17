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

class ExamController extends Controller
{
    public function __construct(Question $question,Test $test)
    {
        $this->test = $test;
        $this->questionreg = $question;
    }

    public function newQuestion(){
        $session_id = Session::get('team_id');
        $testTitle = $this->test->where('team_id', $session_id)->get();
        return view('employee.created',compact('testTitle'));
    }
    public function showTest($id){
        $session_id = Session::get('team_id');
        $testTitle = $this->test->where('team_id', $session_id)->where('id', $id)->first();
        $questions = $this->questionreg->where('team_id', $session_id)->where('test_name', $id)->get();
        return view('employee.show-questions',compact('questions','testTitle'));
    }
    public function createdQuestion($teamId,$id){
        $testTitle = $this->test->where('team_id', $teamId)->where('id', $id)->first();
        $questions = $this->questionreg->where('team_id', $teamId)->where('test_name', $id)->get();
        return view('exam.questions',compact('questions','testTitle'));
    }
    public function addQuestion(Request $request){
        try{
            if(empty($request->test_name)){
                toastr()->error("Test name field is required");
                return back();
            }
            foreach ($request->users as $data) {
                $validator = Validator::make($data,[
                    'question'=>'required',
                    'option1'=>'required',
                    'option2'=>'required',
                    'option3'=>'required',
                    'option4'=>'required',
                ]);
            }
            if ($validator->fails()) {
                $error_messages = implode(',', $validator->messages()->all());
                toastr()->error($error_messages);
                return back();
            }
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
                if(Session::get('role_id')==1){
                    return redirect()->route('display-questions',['id' => $request->team_id]);
                }else{     
                    return redirect('/created');   
                }
                
           
    
        }catch(Throwable $exception){
            return redirect()->route('dashboard')
            ->with('error',$exception->getMessages());
            Log::info('admin login',$exception->getMessages());
        }
    }
    public function editQuestion($id){
        
        $editTeams = $this->questionreg->where('id',$id)->first();
        return view('teamlead.changequestion',compact('editTeams'));
    }
    public function updateQuestion(Request $request){
        
        try{
            $validator = Validator::make($request->all(),[
                'question'=>'required',
                'option1'=>'required',
                'option2'=>'required',
                'option3'=>'required',
                'option4'=>'required',
                'answer'=>'required'
             ]);
             if ($validator->fails()) {
                $error_messages = implode(',', $validator->messages()->all());
                toastr()->error($error_messages);
                return back();
            }
             
             
                    $this->questionreg->where('id',$request->id)->update($request->except(['_token']));
                    toastr()->success('Question edited successfully');
                    return redirect('/created');
                    toastr()->error('please enter an answer from one of the given option');
                    return back();
             
            }catch(Throwable $exception){
                return redirect()->route('dashboard')
                ->with('error',$exception->getMessages());
                Log::info('admin login',$exception->getMessages());
            }
    }
    public function deleteQuestion($id)
    {
        $this->questionreg->where('id',$id)->delete();
        toastr()->success('Question deleted successfully');
        return back();
    }
    
}
