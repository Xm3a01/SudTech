<?php

namespace App\Listeners;

use App\Mail\SendJob;
use App\Models\Visitor;
use App\Events\SendEmail;
use Illuminate\Support\Str;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmailNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  SendEmail  $event
     * @return void
     */
    public function handle(SendEmail $event)
    {
        $job = $event->job;
        $mails = Visitor::all();
        
        try{
            foreach($mails as $mail){
             \Mail::to($mail)->send(new SendJob($job));
            }
           return "Done";
           } catch(\Exception $e) {
               return Str::limit($e->getMessage() , 47);
         }
    }
}
