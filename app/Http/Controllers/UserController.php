<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Admin;
use App\Models\Team;
use App\Models\Role;


use Mail;
use DB;
use Session;
Use Log;

use App\Jobs\SendEmailJob;

class UserController extends Controller
{
    
    public function __construct(Admin $user)
    {
       $this->userreg = $user;
    
    }

    public function addUser(){
        $getUsers = $this->userreg->get();
        $teamname = Team::all();
        $rolename = Role::all();
        return view('admin.user',compact('teamname','rolename','getUsers'));
    }
    public function createUser(Request $request){
        try{
            $this->validate($request,[
                'username'=>'required',
                'password'=>'required',
                'name'=>'required',
                'email'=>'required',
                'phone'=>'required',
                
             ]);
             $getTeam = $this->userreg->where('username',$request->username)->first();
             
                if(empty($getTeam)){
        $user = $this->userreg->create($request->all());
        

        $details=new SendEmailJob($request->all());
        dispatch($details);
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
    public function editUser($id){
    
        $editUsers = $this->userreg->where('id',$id)->first();
        return view('admin.changeuser',compact('editUsers'));
    }
    public function updateUser(Request $request){
        try{
            $this->validate($request,[
                'username'=>'required',
                'name'=>'required',
                'email'=>'required',
                'phone'=>'required',
                
             ]);
        $this->userreg->where('id',$request->id)->update($request->except(['_token','password']));
        return redirect('/user');
    }
        catch(Throwable $exception){
            return redirect()->route('dashboard')
            ->with('error',$exception->getMessages());
            Log::info('admin login',$exception->getMessages());
        }
    }
    public function deleteUser($id)
    {
    $this->userreg->where('id',$id)->delete();
    return back();
    }

    public function empDashboard(){
        $session_id = Session::get('team_id');
        $getTeam = DB::table('questions')->where('team_id', $session_id)->first();
        return view('employee.employee',compact('getTeam'));
    }

}
