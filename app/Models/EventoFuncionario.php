<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventoFuncionario extends Model
{
    protected $table = 'evento_funcionarios';
    protected $fillable = array(
        'evento_id',
        'funcionario_id',
     
    );
   
}
