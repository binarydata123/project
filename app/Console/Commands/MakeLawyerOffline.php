<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MakeLawyerOffline extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'offline:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        info("Cron Job running at ". now());
        info(getmyuid());
        return auth()->user();
    }
}
