<?php

namespace Modules\Authentication\controller;

use Illuminate\Http\Request;

use Modules\Authentication\Admin;

class AdminAuthController
{
    public function __construct(Admin $user)
    {

       $this->userreg = $user;
    }
    public function login(){
        return view('auth::login');
    }
    public function adminLogin(Request $request){
        
        $user = $this->userreg->where('username',$request->username)->where('password',$request->password)->first();
        return view('auth::create');
    }
}
