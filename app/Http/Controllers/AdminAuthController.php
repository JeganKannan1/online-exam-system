<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Admin;
use App\Models\Team;
use App\Models\Answer;
use App\Models\Question;

use Mail;
use DB;
use Session;
Use Log;

use App\Jobs\SendEmailJob;


class AdminAuthController extends Controller
{
    public function __construct(Admin $user,Team $team,Answer $answer,Question $question)
    {
       $this->userreg = $user;
       $this->team = $team;
       $this->answer = $answer;
       $this->questionreg = $question;


    }

    /**
     * view admin dashboard page
     * return view
     * @parm id
     */
    public function index(){
        return view('admin.index');
    }

    public function login(){
        return view('admin.login');
    }

    public function createQuestion(){
        $session_id = Session::get('team_id');
        $getTeam = DB::table('admin')->where('team_id', $session_id)->first();
        return view('admin.createquestions',compact('getTeam'));
    }


    public function adminLogin(Request $request){
        try{
            $this->validate($request,[
                'username'=>'required|min:5',
                'password'=>'required|min:5'
             ]);
                
            $user = $this->userreg->where('username',$request->username)->where('password',$request->password)->first();
            if(isset($user))
            {
                Session::put('username',$request->username);
                Session::put('id',$user->id);
                Session::put('role_id',$user->role_id);
                Session::put('team_id',$user->team_id);
                toastr()->info('successfully logged in');
                // Base on role id user will navigate
                    switch ($user->role_id) 
                    {
                        case "1":
                             return redirect()->route('index');
                        break;
                        case "2":                             
                            return redirect()->route('tl-dashboard');
                        break;
                        default:
                        return redirect()->route('dashboard');
                    }
                 } else{
                toastr()->error('username/password is incorrect');
                return back();
            }
        }catch(Throwable $exception){
            return back()->with('error',$exception->getMessages());
            Log::info('admin login',$exception->getMessages());
        }
       
    }

    public function logout(){
        Session::flush();
        return redirect()->route('login');
    }

    public function monthlyReport(){
        $session_roleid = Session::get('role_id');
        $getTeam = $this->team->get();
        return view('admin.reports',compact('getTeam'));
    }
    public function teamReport($id){
        $getTeam = $this->userreg->where('team_id',$id)->where('role_id','3')->get();
        return view('teamlead.userdetail',compact('getTeam'));
    }
    public function teamScore($id){
        $getTeam = $this->answer->where('user_id',$id)->get();
        return view('admin.userscore',compact('getTeam'));
    }
    public function adminQuestion(){
        $session_id = Session::get('team_id');
        $getTeam = DB::table('admin')->where('team_id', $session_id)->first();
        return view('admin.adminquestions',compact('getTeam'));
    }
   
    
    public function listTeam(){
        $session_roleid = Session::get('role_id');
        $getTeam = $this->team->get();
        return view('admin.listTeam',compact('getTeam'));
    }
    public function makeQuestion($id){
        $session_teamid = Session::get('team_id');
        $session_roleid = Session::get('role_id');
        $getTeam = $this->questionreg->where('team_id',$id)->first();
        return view('admin.display',compact('session_roleid','session_teamid'));
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
         if($request->answer == $request->option1||$request->answer == $request->option2||$request->answer == $request->option3||$request->answer == $request->option4){

        $question = Question::create($request->all());
        return redirect('/display-questions');
         }else{
            toastr()->error('please enter an answer from one of the given option');
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
    public function displayQuestion(){
        $session_id = Session::get('team_id');
        $getTeams = $this->questionreg->where('team_id', $session_id)->get();
        return view('admin.showQuestion',compact('getTeams'));
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
