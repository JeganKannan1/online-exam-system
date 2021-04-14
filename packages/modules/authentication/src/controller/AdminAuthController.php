<?php

namespace Modules\Authentication\controller;

use Illuminate\Http\Request;

use Modules\Authentication\Admin;
use Modules\Authentication\Team;
use Modules\Authentication\Role;

class AdminAuthController
{
    public function __construct(Admin $user,Team $team,Role $role)
    {

       $this->userreg = $user;
       $this->teamreg = $team;
       $this->rolereg = $role;
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
        
        $editTeams = $this->teamreg->where('id',$id)->first();
        return view('auth::changeteam',compact('editTeams'));
    }
    public function updateTeam(Request $request){
        
        $this->teamreg->where('id',$request->id)->update($request->except(['_token']));
        return view('auth::create');
    }
    public function addUser(){
        $teamname = Team::all();
        $rolename = Role::all();
        return view('auth::user',compact('teamname','rolename'));
    }

    public function addRole(){
        $getRoles = $this->rolereg->get();
        return view('auth::role',compact('getRoles'));
        }
        public function createRole(Request $request){
        
        $role = $this->rolereg->create($request->all());
        return back();
        }
        public function editRole($id){
        
        $editRoles = $this->rolereg->where('id',$id)->first();
        return view('auth::changerole',compact('editRoles'));
        }
        public function updateRole(Request $request){
        
        $this->rolereg->where('id',$request->id)->update($request->except(['_token']));
        return view('auth::create');
        }
        public function deleteRole($id)
        {
        $this->rolereg->where('id',$id)->delete();
        return back();
        }

}
