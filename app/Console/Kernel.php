<?php

namespace App\Console;

use Carbon\Carbon;
use App\Models\Job;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $jobs = Job::all();
        $schedule->call(function ($jobs) {
            foreach ($jobs as $key => $value) {
                $v = ''.Carbon::create((String)$value->created_at)->addWeeks(8);
                if( $v ==  $value->older_at){
                    $value->flag = 2;
                    $value->save();
                } else if($v < $value->older_at) {
                    $value->delete();
                }
            }
        })->daily();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
