<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SendEmailRequest;
use App\Http\Requests\UpdatePasswordRequest;
use App\Models\Admin;
use App\Models\Team;
use App\Models\Answer;
use App\Models\Question;
use Illuminate\Support\Facades\Validator;


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
    /**
     * view forgot password page
     * return view
     */
    public function setEmail(){
        return view('forgot.sendmail');
    }
    /**
     * check the entered mail with db and redirect him to reset password
     * return view
     * @param @request
     */
    public function sendMail(SendEmailRequest $request){
        try{
            $validated = $request->validated();
            $user = $this->userreg->where('email',$request->email)->first();
            if($user->is_verified == 1){
                $update = $this->userreg->where('email',$request->email)->update(['is_verified' => 0]);
            }
            $getId = $this->userreg->where('email',$request->email)->first();
            if($getId){
                $email=new ForgotPassword($getId);
                dispatch($email);
                toastr()->success('Mail sent successfully');
                return redirect('/redirect');
            }else{
                toastr()->error('Entered email not found');
                return back();
            }
        }catch(Throwable $exception){
            // toastr()->error('Entered email not found');
            // return redirect()->route('login')
            // ->with('error',$exception->getMessages());
            Log::info('admin login',$exception->getMessages());
        }
    }
    /**
     * view redirect page
     * return view
     */
    public function reDirect(){
        return view('forgot.redirect');
    }
    /**
     * view reset password page
     * return view
     * @param $id
     */
    public function resetPassword($id){
            $user = $this->userreg->where('id',$id)->first();
            if($user->is_verified == 0){
                $update = $this->userreg->where('id',$id)->update(['is_verified' => 1]);
            }else{
                toastr()->success('Send mail again');
                return redirect('/forgot-password');        
            }
                $editUsers = $this->userreg->where('id',$id)->first();
                return view('forgot.reset-password',compact('editUsers'));
    }
    /**
     * view update password page validate the entered new password
     * return view
     * @param $request
     */
    public function updatePassword(UpdatePasswordRequest $request){  
        try{
            $validated = $request->validated();
            if($request->password == $request->password1){
                $update = $this->userreg->where('id',$request->id)->update(['password' => $request->password]);
                toastr()->success('Password reseted successfully');
                $details = $this->userreg->where('id',$request->id)->get();
                $password=new newPassword($details);
                dispatch($password);
                return redirect('/login');
            }else{
                toastr()->error('Password not match');
                return back();
            }
        }catch(Throwable $exception){
            toastr()->error('Entered email not found');
            return redirect()->route('login')
            ->with('error',$exception->getMessages());
            Log::info('admin login',$exception->getMessages());
        }
    }
}