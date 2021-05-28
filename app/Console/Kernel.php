<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use App\Console\Commands\EmailInactiveUsers;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected $commands = [
        EmailInactiveUsers::class,
    ];

    protected function schedule(Schedule $schedule)
    {
        $schedule->command('email:inactive-users')->dailyAt('01:30');
    }

    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
