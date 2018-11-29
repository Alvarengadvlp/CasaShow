<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Funcionario;
use App\Models\Evento;
use DB;
use App\Http\Controllers\Admin\EventoController;
use App\Models\EventoFuncionario;

class FuncionarioController extends Controller
{
    public function index(){

        $funcionarios = Funcionario::paginate(10);
        return view('Portal.funcionario.index' , compact('funcionarios'));
    }

    public function novo(){
        return view('Portal.funcionario.formCad');
    }

    public function create(Request $request){
        
        $funcionario = Funcionario::create($request->all());
        return  redirect()->route('admin.funcionario.index');
       // return redirect()->action('UserController@novo')->with('func', $sis_funcionario);
    }

    public function buscar(Request $request){
        $buscar = $request->input('search');
        $funcionarios = Funcionario::where('nome', 'like', '%'.$buscar.'%')
        ->orWhere('id', 'like', '%'.$buscar.'%')
        ->orWhere('rg', 'like', '%'.$buscar.'%')
        ->orWhere('cargo', 'like', '%'.$buscar.'%')
        ->paginate(5);
        return view('Portal.funcionario.index' , compact('funcionarios'));
       
      }

    
    public function editar($id){
        $funcionario = Funcionario::find($id);
        return view('Portal.funcionario.editar')->with('funcionario',$funcionario);

    }

    public function update(Request $request,$id){
        $funcionario = Funcionario::find($id);
        $funcionario->update($request->all());
        return  redirect()->route('admin.funcionario.index');
    }

    public function excluir($id)
    {
        //  deletar

        $funcionario = Funcionario::find($id);
       // $paciente = Paciente::find($prontuario);
        $funcionario->delete();
       //Paciente::destroy($prontuario);

       // DB::delete("delete from sis_paciente where prontuario = $prontuario");
        return back();
        //retornar pra mesma pagina onde esta sendo mostrado a lista de pacientes.
    }


    public function createAssoc( Request $request,$id){
     //dd($request);
        $evento = Evento::find($id);

        $funcionario = Funcionario::find($request['cargosfuncionario']);
        
        
//dd($funcionario);
        //$funcionario = Funcionario::create($request->all());
       // $evento->funcionario()->where('id','=',);
       $assoc = EventoFuncionario::updateOrCreate([
         // if not exists, insert the following RoleUser data
         'evento_id' => $evento->id ,
         'funcionario_id' =>$request['cargosfuncionario'],
         // otherwise, update RoleUser set role_id = ?
       ])->get();
       DB::update('update funcionarios set evento_id = ? where id = ?', [$evento->id ,$request['cargosfuncionario']]);
        //$funcionario = Funcionario::where('id',$request['cargosfuncionario']);
        //$funcionario->update(['evento_id' => $evento->id]);

       //$funcionarios = $evento->funcionarios()->get();
       
       return redirect()->action('Admin\EventoController@detalhe', ['id' => $evento->id]);
    }


    public function assocExcluir($evento_id,$Funcionario_id){
        $assoc = EventoFuncionario::where('evento_id',$evento_id)->where('funcionario_id',$Funcionario_id)->delete();
        //DB::update('update funcionarios set evento_id = ? where id = ?', [$evento->id ,$request['cargosfuncionario']]);
        DB::update('update funcionarios set evento_id = ? where id = ?', [0 ,$Funcionario_id]);
        return redirect()->action('Admin\EventoController@detalhe', ['id' => $evento_id]);    }
     
    
}
