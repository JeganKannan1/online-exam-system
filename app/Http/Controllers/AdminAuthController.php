<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Admin;

use Mail;
use DB;
use Session;
Use Log;

use App\Jobs\SendEmailJob;


class AdminAuthController extends Controller
{
    public function __construct(Admin $user)
    {
       $this->userreg = $user;
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
        $getTeam = DB::table('admin')->where('team_id', $user->team_id)->first();
        return view('admin.createquestions',compact($getTeam));
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
                Session::put('username',$user->role_id);
                toastr()->info('successfully logged in');
                // Base on role id user will navigate
                    switch ($user->role_id) 
                    {
                        case "1":
                             return redirect()->route('index');
                        break;
                        case "2":
                             $getTeam = DB::table('admin')->where('team_id', $user->team_id)->first();
                             return redirect('/index');
                        break;
                        default:
                            Session::put('team_id',$user->team_id);
                            $getTeam = DB::table('questions')->where('team_id', $user->team_id)->get();
                            return view('employee.employee',compact('getTeam'));
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
}
