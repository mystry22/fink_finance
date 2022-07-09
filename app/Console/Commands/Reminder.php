<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Http\Controllers\Schedule_Ops;

class Reminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'daily_reminder:reminder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Notification to all users due for payment';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
       $new_ops = new Schedule_Ops;
       $new_ops->send_reminder();
       
    }
}
