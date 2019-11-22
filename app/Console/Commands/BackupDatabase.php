<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class BackupDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'backup:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run a MySQL backup';

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
     * @return mixed
     */
    public function handle()
    {
        $db_name = env('DB_DATABASE');
        $username = env('DB_USERNAME');
        $password = env('DB_PASSWORD');
        $filename = $db_name.\Carbon\Carbon::now()->toDateString().'.sql';
        exec('mysqldump -u'.$username.' -p'.$password.' '.$db_name.' > '.$filename);
        $this->info('Your backup is being saved to '.$filename);
    }
}
