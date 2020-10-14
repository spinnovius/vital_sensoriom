<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use App\Role;
use Mail;
use App\PatientHealthPlan;

class SubscriptionPlan extends Command {

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'CheckPlan:SubscriptionPlan';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Subscription plan will expire soon';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle() {

        //This is for test
        User::whereId(2)
                ->update(['lname' => str_random(10)]);
    }

}
