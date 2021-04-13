<?php

namespace Modules\Authentication\controller;

use Illuminate\Http\Request;

use Modules\Authentication\Admin;
use Modules\Authentication\Team;

class AdminAuthController
{
    public function __construct(Admin $user,Team $team)
    {

       $this->userreg = $user;
       $this->teamreg = $team;
    }
    
    public function login(){
        return view('auth::login');
    }
    public function adminLogin(Request $request){
        
        $user = $this->userreg->where('username',$request->username)->where('password',$request->password)->first();
        return view('auth::create');
    }
    public function addTeam(){
        $getTeams = $this->teamreg->get();
        return view('auth::team',compact('getTeams'));
        }
    public function createTeam(Request $request){
        
        $user = $this->teamreg->create($request->all());
       return back();
    }
    public function delete($id)
    {
        $this->teamreg->where('id',$id)->delete();
        return back();
    }
    public function edit($id){
        
        $editTeams = $this->teamreg->first();
        return view('auth::changeteam',compact('editTeams'));
    }
    public function updateTeam(Request $request){
        
        $this->teamreg->where('id',$request->id)->update($request->except(['_token']));
        return view('auth::create');
    }
}
