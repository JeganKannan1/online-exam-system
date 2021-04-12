<?php

namespace Modules\Authentication\controller;

use Illuminate\Http\Request;

// use App\Admin;

class AdminAuthController extends Controller
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
        return view('admin.create');
    }
}
