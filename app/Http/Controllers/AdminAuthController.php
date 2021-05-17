<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Admin;
use App\Models\Team;
use App\Models\Answer;
use App\Models\Question;
use Illuminate\Support\Arr;

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
    public function welcome(){
        return view('welcome');
    }
    public function index(){
        $getUsers = $this->team->get()->except(["id"=>1]);
        return view('admin.index',compact('getUsers'));
    }

    public function login(){
        return view('admin.login');
    }
    public function adminLogin(Request $request){
        try{
            $validator = Validator::make($request->all(),[
                'username'=>'required|min:5',
                'password'=>'required|min:5'
             ]);
             
             if ($validator->fails()) {
                $error_messages = implode(',', $validator->messages()->all());
                toastr()->error($error_messages);
                return back();
            }
            $user = $this->userreg->where('username',$request->username)->where('password',$request->password)->first();
            if(isset($user))
            {
                Session::put('username',$request->username);
                Session::put('id',$user->id);
                Session::put('role_id',$user->role_id);
                Session::put('team_id',$user->team_id);
                toastr()->success('Successfully Logged in');
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
                toastr()->error('Username/Password is incorrect');
                return back();
            }
        }catch(Throwable $exception){
            return back();
            Log::info('admin login',$exception->getMessages());
        }
       
    }

    public function logout(){
        Session::flush();
        toastr()->success('Logout Successfully');
        return redirect()->route('login');
    }

    public function monthlyReport(){
        // $session_roleid = Session::get('role_id');
        $getTeam = $this->team->get()->except(["id"=>1]);
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
}
