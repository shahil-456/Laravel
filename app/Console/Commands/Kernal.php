<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected $commands = [
        \App\Console\Commands\NotifyInactiveUsers::class,
    ];

    protected function schedule(Schedule $schedule)
    {
        $schedule->command('app:notify-inactive-users')->dailyAt('00:00');
    }
}
