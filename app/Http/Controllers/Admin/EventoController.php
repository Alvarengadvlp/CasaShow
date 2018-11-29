<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Evento;
use DB;
use App\Models\Funcionario;

class EventoController extends Controller
{
    //

    public function index(){

        $eventos = Evento::paginate(5);
        return view('Portal.Evento.index' , compact('eventos'));
    }

     // filtro da tabela listar
     public function buscar(Request $request){
        $buscar = $request->input('search');
        $eventos = Evento::where('nome', 'like', '%'.$buscar.'%')
        ->orWhere('id', 'like', '%'.$buscar.'%')
        ->orWhere('dataEvento', 'like', '%'.$buscar.'%')
        ->paginate(5);
        return view('Portal.Evento.index' , compact('eventos'));
       
      } 

    public function novo(){
        return view('Portal.Evento.formCad');
    }

    public function create(Request $request){
        //dd($request->all());
        $evento = Evento::create($request->all());

        return  redirect()->route('admin.evento.index');
       // return redirect()->action('UserController@novo')->with('func', $sis_funcionario);
    }

    public function detalhe($id,$mensagem=null){

        $evento = Evento::find($id);
        
      // $funcionarios = $evento->funcionarios()->get(); SEM PAGINAÇAO
      // necessario gravar no funcionario o id do evento sempre que criar uma assoc
       $funcionarios = Funcionario::where('evento_id' , $evento->id)->paginate(5);
      
        $cargos = DB::table('funcionarios')->select('cargo')->distinct()->get();
        //dd($cargos);
       
        return view('Portal.Evento.detalhe' , compact('evento','cargos','funcionarios','mensagem'));
    }  

    
    public function detalhe2($id, $m){
        $mensagem = $m;
        $evento = Evento::find($id);
        
      // $funcionarios = $evento->funcionarios()->get(); SEM PAGINAÇAO
      // necessario gravar no funcionario o id do evento sempre que criar uma assoc
       $funcionarios = Funcionario::where('evento_id' , $evento->id)->paginate(5);
      
        $cargos = DB::table('funcionarios')->select('cargo')->distinct()->get();
        //dd($cargos);
       
        return view('Portal.Evento.detalhe' , compact('evento','cargos','funcionarios','mensagem'));
    }

    public function editar($id){
        $evento = Evento::find($id);
        return view('Portal.Evento.editar')->with('evento',$evento);

    }

    public function update(Request $request,$id){
        $evento = Evento::find($id);
        $evento->update($request->all());
        return  redirect()->route('admin.evento.index');
    }

    public function excluir($id)
    {
        //  deletar

        $evento = Evento::find($id);
       // $paciente = Paciente::find($prontuario);
        $evento->delete();
       //Paciente::destroy($prontuario);

       // DB::delete("delete from sis_paciente where prontuario = $prontuario");
        return back();
        //retornar pra mesma pagina onde esta sendo mostrado a lista de pacientes.
    }


}
