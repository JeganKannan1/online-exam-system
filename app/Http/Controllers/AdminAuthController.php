<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\UserLoginRequest;

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
       $this->user = $user;
       $this->team = $team;
       $this->answer = $answer;
       $this->questionreg = $question;
    }

    /**
     * view admin welcome page
     * return view
     */
    public function welcome(){
        return view('welcome');
    }
    /**
     * shows graph in admin dashboard page
     * return view
     */
    public function index(){
        $teamId = Session::get('team_id');
        $getTeam = $this->team->get()->except(['id'=>1]);
        $overallScore = [];
        foreach($getTeam as $teams){
            
        $getScore = $this->answer->join('test', 'test.id', '=', 'table_marks.test_title')
                    ->select('test.test_title', DB::raw('AVG(table_marks.score) as total_score'))
                    ->groupBy('test.test_title')
                    ->where('table_marks.team_id',$teams->id)
                    ->pluck('total_score','test.test_title')->toArray(); 
            array_push($overallScore,$getScore);
        }
        $fResult =[];
        foreach ($overallScore as $key => $splitScore) {
            # code...
            foreach ($splitScore as $secKey => $singleValue) {
                if ($key == 0) {
                    $fResult[$secKey] = [];
                    array_push($fResult[$secKey],$singleValue);
                } else {
                    array_push($fResult[$secKey],$singleValue);
                }
                
            }
           
        }

        $finalResult = [];
        foreach ($fResult as $key => $resultSingle) {
            $finalResult[] = [$key,$resultSingle[0],$resultSingle[1],$resultSingle[2],$resultSingle[3],$resultSingle[4]];
        }
        return view('admin.index',compact('getTeam'))->with('visitor',json_encode($finalResult));
    }
    /**
     * view admin login page
     * return view
     */
    public function login(){
        return view('admin.login');
    }
    /**
     * check the user credential and redirect to their respective dashboard page
     * case 1 - admin,case 2 - teamlead,default - employee
     * return view
     * @param $request
     */
    public function adminLogin(UserLoginRequest $request){
        try{
            $validated = $request->validated();
            $user = $this->user->where('username',$request->username)->where('password',$request->password)->first();
            if(isset($user))
            {
                session_start();
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
            }else{
                toastr()->error('Username/Password is incorrect');
                return back();
            }
        }catch(Throwable $exception){
            return back();
            Log::info('admin login',$exception->getMessages());
        }
    }
    /**
     * view logout page 
     * return view 
     */
    public function logout(){
        session_start();
        session_destroy();
        toastr()->success('Logout Successfully');
        return redirect()->route('login');
    }
    /**
     * view reports page 
     * return view 
     */
    public function monthlyReport(){
        $getTeam = $this->team->get()->except(["id"=>1]);
        return view('admin.reports',compact('getTeam'));
    }
    /**
     * view userdetails page 
     * return view 
     */
    public function teamReport($id){
        $getTeam = $this->user->where('team_id',$id)->where('role_id','3')->get();
        return view('teamlead.userdetail',compact('getTeam'));
    }
    /**
     * view userscore page 
     * return view 
     */
    public function teamScore($id){
        $getTeam = $this->answer->where('user_id',$id)->get();
        return view('admin.userscore',compact('getTeam'));
    }
}
