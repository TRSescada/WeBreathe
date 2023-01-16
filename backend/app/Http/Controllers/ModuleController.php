<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\module;
use App\Models\History;
use DB;
class ModuleController extends Controller
{

    public function index()
    {
        $modules = module::all();
        return view ('modules.index')->with('modules', $modules);
    }

    public function create()
    {
        return view('modules.create');
    }


    public function store(Request $request)
    {
        $input = $request->all();
        module::create($input);
        return redirect('modules')->with('flash_message', 'Module Ajouté!'); 
    }


    public function show($id)
    {
        $module = module::find($id);
        
        // le nombre de données envoyées par le module
        $nombreDeDonneesEnvoyee =DB::table('history')
        ->where('module_id', '=', $id)->selectRaw('count(module_id) as cnt')->pluck('cnt');

        // les données du module pour le graphe
        $moduleData = DB::table('history')
        ->select('valeur','date_et_heure')
        ->where('module_id','=',$id)
        ->orderBy('date_et_heure', 'DESC')
        ->get();
        
        // le dernier enregistrement du module 
        $moduleValue = $moduleData[0];

        return view("modules.show",compact('moduleData'),['modules'=>$module,'nombreDeDonnees'=>$nombreDeDonneesEnvoyee,'time'=>$moduleValue->valeur]);
    }


    public function destroy($id)
    {
        module::destroy($id);
        return redirect('modules')->with('flash_message', 'module supprimé!');  
    }

}
