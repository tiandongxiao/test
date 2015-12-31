<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Orangehill\Iseed\Facades\Iseed;
use DB;

class Backup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'db:backup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'ISeed backup';

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
        $this->info('数据库备份工作--Begin');

        $tables = [];
        foreach(DB::select('SHOW TABLES') as $key => $value){
            $table_name =  array_values((array)$value)[0];
            array_push($tables,$table_name);
        }

        if (count($tables)) {
            foreach ($tables as $tableName) {
                Iseed::generateSeed($tableName);
                $this->info($tableName . ' Seeded');
            }
        }

        $this->info('数据库Seed备份工作--End');
    }
}
