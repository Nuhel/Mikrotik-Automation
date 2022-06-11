<?php

namespace App\Console;

use App\Models\Customer;
use App\Mikrotik\Models\Arp;
use App\Mikrotik\Models\QueueSimple;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            $disabledUser = Customer::where('valid_till','<',now())->get()->each(function($value){
                Arp::disable($value->arp_id);
            });
            $enabledUser = Customer::where('valid_till','>=',now())->get()->each(function($value){
                Arp::enable($value->arp_id);
            });
        })->everyMinute();
        // $schedule->command('inspire')->hourly();
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
