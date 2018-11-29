<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $table = 'eventos';
    //public $timestamps = false;

    protected $fillable = array(
        'nome',
        'dataEvento',
        'horario',
        'atracoes',
        'rua',
        'numero',
        'bairro',
        'cep',
        'cidade',
        'estado',
        'telefone',
        'celular',
        'email',
    );


    public function funcionarios()
    {
        return $this->belongsToMany('App\Models\Funcionario', 'evento_Funcionarios', 'evento_id', 'funcionario_id');
    }
}
