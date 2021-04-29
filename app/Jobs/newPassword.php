<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Mail;
use App\Mail\getPassword;


class newPassword implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $password;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($password)
    {
        //
        $this->password  = $password;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        $new_password = $this->password;
        // $user1=array('username' => $user_data1['username'],'password' => $user_data1['password']);
        $mail = Mail::to($new_password)->send(new getPassword($new_password)); 
    }
}
