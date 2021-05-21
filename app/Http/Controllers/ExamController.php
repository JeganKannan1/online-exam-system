<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateQuestionRequest;
use App\Http\Requests\UpdateQuestionRequest;
use App\Models\Question;
use App\Models\Answer;
use App\Models\Test;
use App\Models\Admin;
use Illuminate\Support\Facades\Validator;

use Mail;
use DB;
use Session;
Use Log;

use App\Jobs\SendEmailJob;

class ExamController extends Controller
{
    public function __construct(Question $question,Test $test,Admin $user)
    {
        $this->userreg = $user;
        $this->test = $test;
        $this->questionreg = $question;
    }
    /**
     * view create question by teamlead page 
     * return view
     */
    public function createQuestion(){
        $session_id = Session::get('team_id');
        $getTeam = $this->userreg->where('team_id', $session_id)->first();
        return view('teamlead.createquestions',compact('getTeam'));
    }
    /**
     * view test title page 
     * return view
     */
    public function newQuestion(){
        $session_id = Session::get('team_id');
        $testTitle = $this->test->where('team_id', $session_id)->get();
        return view('employee.created',compact('testTitle'));
    }
    /**
     * view show question to teamlead using test title  
     * return view
     * @param test tilte @id
     */
    public function showTest($id){
        $session_id = Session::get('team_id');
        $testTitle = $this->test->where('team_id', $session_id)->where('id', $id)->first();
        $questions = $this->questionreg->where('team_id', $session_id)->where('test_name', $id)->get();
        return view('employee.show-questions',compact('questions','testTitle'));
    }
    /**
     * view show question to admin using test title  
     * return view
     * @param test tilte @id,@teamId
     */
    public function createdQuestion($teamId,$id){
        $testTitle = $this->test->where('team_id', $teamId)->where('id', $id)->first();
        $questions = $this->questionreg->where('team_id', $teamId)->where('test_name', $id)->get();
        return view('exam.questions',compact('questions','testTitle'));
    }
    /**
     * view validate question created by teamlead
     * return view
     * @param test tilte @request
     */
    public function addQuestion(CreateQuestionRequest $request){
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
            return redirect('/created');   
        }catch(Throwable $exception){
            return redirect()->route('dashboard')
            ->with('error',$exception->getMessages());
            Log::info('admin login',$exception->getMessages());
        }
    }
    /**
     * view edit question created by teamlead
     * return view
     * @param @id
     */
    public function editQuestion($id){
        $editTeams = $this->questionreg->where('id',$id)->first();
        return view('teamlead.changequestion',compact('editTeams'));
    }
    /**
     * view update question created by teamlead
     * return view
     * @param @request
     */
    public function updateQuestion(UpdateQuestionRequest $request){
        try{
            $validated = $request->validated();
                $this->questionreg->where('id',$request->id)->update($request->except(['_token']));
                toastr()->success('Question edited successfully');
                return redirect('/created');
        }catch(Throwable $exception){
                return redirect()->route('dashboard')
                ->with('error',$exception->getMessages());
                Log::info('admin login',$exception->getMessages());
        }
    }
    /**
     * view delete question created by teamlead
     * return view
     * @param @id
     */
    public function deleteQuestion($id)
    {
        $this->questionreg->where('id',$id)->delete();
        toastr()->success('Question deleted successfully');
        return back();
    }
    
}
