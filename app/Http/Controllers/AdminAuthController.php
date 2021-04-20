<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Admin;
use App\Models\Team;
use App\Models\Role;
use App\Models\Question;
use Mail;
use DB;
use Session;
Use Log;

use App\Jobs\SendEmailJob;


class AdminAuthController extends Controller
{
    public function __construct(Admin $user,Team $team,Role $role,Question $question)
    {
       $this->userreg = $user;
       $this->teamreg = $team;
       $this->rolereg = $role;
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
                Session::put('username',$request->username);
                toastr()->info('successfully logged in');
                // Base on role id user will navigate
                    switch ($user->role_id) 
                    {
                        case "1":
                             return view('admin.index');
                        break;
                        case "2":
                             $getTeam = DB::table('admin')->where('team_id', $user->team_id)->first();
                             return view('admin.createquestions',compact('getTeam'));
                        break;
                        default:
                            Session::put('team_id',$user->team_id);
                            $getTeam = DB::table('questions')->where('team_id', $user->team_id)->get();
                            return view('employee.employee',compact('getTeam'));
                    }
            }else{
                toastr()->error('username/password is incorrect');
                return back();
            }
        }catch(Throwable $exception){
            return back()->with('error',$exception->getMessages());
            Log::info('admin login',$exception->getMessages());
        }
       
    }



    public function addTeam()
     {
        $getTeams = $this->teamreg->get();
        return view('admin.team',compact('getTeams'));
    }


    public function createTeam(Request $request)
    {
        $user = $this->teamreg->create($request->all());
       return back();
    }


    public function delete($id)
    {
        $this->teamreg->where('id',$id)->delete();
        return back();
    }

    
    public function edit($id){
        
        $editTeams = $this->teamreg->where('id',$id)->first();
        return view('admin.changeteam',compact('editTeams'));
    }
    public function updateTeam(Request $request){
        
        $this->teamreg->where('id',$request->id)->update($request->except(['_token']));
        return view('admin.index');
    }
    

    public function addRole(){
        $getRoles = $this->rolereg->get();
        return view('admin.role',compact('getRoles'));
        }
        public function createRole(Request $request){
        
        $role = $this->rolereg->create($request->all());
        return back();
        }
        public function editRole($id){
        
        $editRoles = $this->rolereg->where('id',$id)->first();
        return view('admin.changerole',compact('editRoles'));
        }
        public function updateRole(Request $request){
        
        $this->rolereg->where('id',$request->id)->update($request->except(['_token']));
        return view('admin.index');
        }
        public function deleteRole($id)
        {
        $this->rolereg->where('id',$id)->delete();
        return back();
        }
        public function addUser(){
            $getUsers = $this->userreg->get();
            $teamname = Team::all();
            $rolename = Role::all();
            return view('admin.user',compact('teamname','rolename','getUsers'));
        }
        public function createUser(Request $request){
            $user = $this->userreg->create($request->all());
            

            $details=new SendEmailJob($request->all());
  
            dispatch($details);
            return back();
        }
        public function editUser($id){
        
            $editUsers = $this->userreg->where('id',$id)->first();
            return view('admin.changeuser',compact('editUsers'));
        }
        public function updateUser(Request $request){
        
            $this->userreg->where('id',$request->id)->update($request->except(['_token','password']));
            return view('admin.index');
        }
        public function deleteUser($id)
        {
        $this->userreg->where('id',$id)->delete();
        return back();
        }
        public function logout(){
            Session::flush();

            return redirect()->route('login');
        }



        public function addQuestion(Request $request){
            $question = Question::create($request->all());
           return redirect()->route('employee');
        }
        public function employeeDashboard(){
            return view('employee.employee');
        }
        public function takeTest(){
            $session_id = Session::get('team_id');
            $getTeam = DB::table('questions')->where('team_id', $session_id)->get();
            
            return view('admin.questions',compact('getTeam'));       
         }
         public function checkAnswer(Request $request){
             dd($request);
           return redirect()->route('employee');
        }
        

}
