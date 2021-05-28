<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Console\Command;
use App\Notifications\NotifyInactiveUsers;

class EmailInactiveUsers extends Command
{

    protected $signature = 'email:inactive-users';

    protected $description = 'Email Inactive Users';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $sevenDaysAgo = Carbon::now()->subDay(7);
        // $this->info($sevenDaysAgo);
        // $this->info(Carbon::now());
        // $this->info(Carbon::now() > $sevenDaysAgo);

        $inactiveUsers = User::where('last_login','<',$sevenDaysAgo)->get();
        foreach ($inactiveUsers as $user) {
            $user->notify(new NotifyInactiveUsers());
            $this->info('Mail sent to '.$user->email);
        }
        $this->info($inactiveUsers->count());

        return $inactiveUsers->count();
        
    }
}
