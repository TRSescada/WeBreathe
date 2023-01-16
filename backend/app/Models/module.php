<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class module extends Model
{
    protected $table = 'modules';
    protected $primaryKey = 'id';
    protected $fillable = ['nom', 'description', 'etat'];

    public function changerEtat($module,$etat){
        $module->etat=$etat;
        return $module;
    }
}
