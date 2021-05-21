<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\UserRequest;
use App\Models\Admin;
use App\Models\Team;
use App\Models\Role;
use App\Models\Test;
use App\Models\Query;
use App\Models\Question;

use Mail;
use DB;
use Session;
Use Log;
use App\Jobs\SendEmailJob;

class UserController extends Controller
{
    
    public function __construct(Admin $user,Test $test,Query $query,Question $question)
    {
       $this->userreg = $user;
       $this->test = $test;
       $this->query = $query;
       $this->question = $question;
    }
    /**
     * view create user page 
     * return view
     */
    public function addUser(){
        $getUsers = $this->userreg->with('Team')->with('Role')->get()->except(["id"=>1]);
        $teamname = Team::all()->except(["id"=>1]);
        $rolename = Role::all()->except(["id"=>1]);
        return view('admin.user',compact('teamname','rolename','getUsers'));
    }
    /**
     * create user 
     * return view
     * @param $reqest
     */
    public function createUser(UserRequest $request){
        try{
            $validated = $request->validated();
            $getTeam = $this->userreg->where('username',$request->username)->first();
            if(empty($getTeam)){
                $user = $this->userreg->create($request->all());
                $details=new SendEmailJob($request->all());
                dispatch($details);
                toastr()->success('User created successfully');
                return back();
            }else{
                toastr()->error('entered user already exists');
                return back();
            }
        }catch(Throwable $exception){
            return redirect()->route('dashboard')
            ->with('error',$exception->getMessages());
            Log::info('admin login',$exception->getMessages());
        }
    }
    /**
     * edit user 
     * return view
     * @param $id
     */
    public function editUser($id){  
        $editUsers = $this->userreg->where('id',$id)->first();
        return view('admin.changeuser',compact('editUsers'));
    }
    /**
     * update user 
     * return view
     * @param $request
     */
    public function updateUser(UserRequest $request){
        try{
            $validated = $request->validated();
            $this->userreg->where('id',$request->id)->update($request->except(['_token','password']));
            toastr()->success('User edited successfully');
            return redirect('/user');
        }catch(Throwable $exception){
            return redirect()->route('dashboard')
            ->with('error',$exception->getMessages());
            Log::info('admin login',$exception->getMessages());
        }
    }
    /**
     * delete user 
     * return view
     * @param $id
     */
    public function deleteUser($id)
    {
        $this->userreg->where('id',$id)->delete();
        toastr()->success('User deleted successfully');
        return back();
    }
    /**
     * view employee dashboard page 
     * return view
     */
    public function empDashboard(){
        $teamId = Session::get('team_id');
        $getTeam = $this->question->where('team_id', $teamId)->first();
        return view('employee.employee',compact('getTeam'));
    }

}
