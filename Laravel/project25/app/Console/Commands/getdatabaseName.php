<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class getdatabaseName extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'getdatabasename';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get name of currently connected database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        $dbname = $this->info(DB::connection()->getDatabaseName());
        echo  "Command Executed Current Database is ".$dbname;
    }
}
