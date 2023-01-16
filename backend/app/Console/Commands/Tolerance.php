<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\module;
class Tolerance extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'module:tolerance';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'tolerance automatique des modules';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $modules = module::all();
        for ($i=0;$i<4;$i++){
            if($modules[$i]->etat==0)
            {
                $modules[$i]->etat=1;
                $modules[$i]->save();
                break;
            }
        }
    }
}
