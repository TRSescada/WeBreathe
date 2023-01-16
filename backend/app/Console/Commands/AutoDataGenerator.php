<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;

class AutoDataGenerator extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'module:GenerateData';

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
        $min = DB::table('modules')->select('*')->min('id');
        $max = DB::table('modules')->select('*')->max('id');
        $randomModule=rand($min,$max);
        $randomValue=rand(0,60);
        DB::insert('insert into history (module_id,valeur , date_et_heure) values (?, ?,?)', [$randomModule, $randomValue, now()]);
    }
}
