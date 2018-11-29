<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    protected $table = 'funcionarios';
    
    //public $timestamps = false;

    protected $fillable = array(
        'nome',
        'cargo',
        'rg',
        'celular',
        
    );


    
       public function eventos()
       {
           return $this->belongsToMany('App\Models\Evento', 'evento_Funcionarios', 'funcionario_id', 'Evento_id');
       }
    
}
