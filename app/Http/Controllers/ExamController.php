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
         $getTeam = $this->questionreg->where('question',$request->question)->first();
         if(empty($getTeam)){
         if($request->answer == $request->option1||$request->answer == $request->option2||$request->answer == $request->option3||$request->answer == $request->option4)
            {

            $question = Question::create($request->all());
            return redirect('/created');
            }else{
                toastr()->error('please enter an answer from one of the given option');
                return back();
         }
         }else{
            toastr()->error('the entered question is already exist please enter a new question');
            return back();
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
                    return redirect('/created');
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
    public function deleteQuestion($id)
    {
        $this->questionreg->where('id',$id)->delete();
        return back();
    }
    
}
