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

}
