<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\SendEmailTest;
use Mail;


class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $details;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        //
        $this->details  = $details;

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        $user_data1 = $this->details;
        // dd($user_data1);

        
        $user1=array('username' => $user_data1['username'],'password' => $user_data1['password']);
        // dd($user1);
      
        
        Mail::send('admin.mail',$user1,function($message)use($user_data1) {
        $message->to($user_data1['email'])->subject('Testing Email');
        $message->from('rubanshanthi24@gmail.com', 'Testing App');
        });
    }
}
