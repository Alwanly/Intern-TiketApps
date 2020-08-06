<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;

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
         $schedule->call(function (){
             DB::table('payments')
                 ->whereRaw("created_at <= DATE_SUB(NOW(),INTERVAL 1 day) AND status_id = 10")
                 ->update(['status_id'=>15]);
             DB::table("transactions")
                 ->whereRaw("created_at <= DATE_SUB(NOW(),INTERVAL 1 day) AND status_id = 4")
                 ->update(['status_id'=>15]);
         })
             ->daily();
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
