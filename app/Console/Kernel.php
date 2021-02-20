<?php

namespace App\Console;

use App\Console\Commands\RemainingTimeCommand;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{

    protected $commands = [
        'App\Console\Commands\RemainingTimeCommand'
    ];

    protected function schedule(Schedule $schedule)
    {
        $schedule->command('notification:testRemainingTime')->everyMinute();
    }

    protected function commands()
    {
        $this->load(__DIR__.'/Commands');
        require base_path('routes/console.php');
    }
}
