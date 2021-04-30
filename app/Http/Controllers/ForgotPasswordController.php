<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Admin;
use App\Models\Team;
use App\Models\Answer;
use App\Models\Question;

use Mail;
use DB;
use Session;
Use Log;

use App\Jobs\ForgotPassword;
use App\Jobs\newPassword;


class ForgotPasswordController extends Controller
{
    public function __construct(Admin $user,Team $team,Answer $answer,Question $question)
    {
       $this->userreg = $user;
       $this->team = $team;
       $this->answer = $answer;
       $this->questionreg = $question;
    }


    public function setEmail(){
        return view('forgot.sendmail');
    }


    public function sendMail(Request $request){
        try{
            $this->validate($request,[
                'email'=>'required',
            ]);
            $getId = $this->userreg->where('email',$request->email)->first();
            if($getId){
            $email=new ForgotPassword($getId);
            dispatch($email);
            return redirect('/redirect');
            }else{
                toastr()->error('entered email not found');
                return back();
            }
        }catch(Throwable $exception){
            toastr()->error('entered email not found');
            return redirect()->route('login')
            ->with('error',$exception->getMessages());
            Log::info('admin login',$exception->getMessages());
        }
        
    }


    public function reDirect(){
        return view('forgot.redirect');
    }


    public function resetPassword($id){
        $editUsers = $this->userreg->where('id',$id)->first();
        return view('forgot.reset-password',compact('editUsers'));
    }

    public function updatePassword(Request $request){  
        try{
            $this->validate($request,[
                'password'=>'required',
                'password1'=>'required',
             ]);
             if($request->password == $request->password1){
             $update = $this->userreg->where('id',$request->id)->update(['password' => $request->password]);
             $details = $this->userreg->where('id',$request->id)->get();
             $password=new newPassword($details);
            dispatch($password);
            return redirect('/login');
             }
             else{
                toastr()->error('password not match');
                return back();
             }
        }catch(Throwable $exception){
            toastr()->error('entered email not found');
            return redirect()->route('login')
            ->with('error',$exception->getMessages());
            Log::info('admin login',$exception->getMessages());
        }
        
    }
}