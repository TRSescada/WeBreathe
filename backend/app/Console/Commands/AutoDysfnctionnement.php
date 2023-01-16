<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;
use App\Models\module;
use App\Events\DysfonctionnementNotification;

class AutoDysfnctionnement extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'module:shutdown';

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
        $random=rand($min,$max);
        $module = module::find($random);
        $module=$this->changerEtat($module,0);
        $module->save();
    }
    private function changerEtat($module,$etat){
        $module->etat=$etat;
        if($etat==0){
            event(new DysfonctionnementNotification($module->nom .' a été désactivé'));
        }
        return $module;
    }
}
