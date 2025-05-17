<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class NotifyInactiveUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:notify-inactive-users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */

    public function handle()
    {
        $inactiveUsers = \App\Models\User::where('last_login', '<=', now()->subDays(30))->get();
    
        foreach ($inactiveUsers as $user) {

            $user->notify(new \App\Notifications\InactiveUserNotification());
            
        }
    }
    
}
