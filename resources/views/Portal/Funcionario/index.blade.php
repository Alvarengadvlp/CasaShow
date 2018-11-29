@extends('layouts.appDash')
@section('estilos')
   <style>
      span{
        text-align: center;
    }
    form{
      
     float: right;
    
    }
    .titulopacientes{
      display:ruby-base-container;
    }
    .container-fluid{
        /*margin-top: 1rem; */
    }
    .btn{
        float:right;
    }

    .btm{
        /* margin-top: 0.5rem; */
        float:left;
    }


   </style>
@endsection


@section('tela')
<div class="container-fluid col-lg-12">
  <div class="card text-center mb-3">
  <div class="card-header">
    @if(old('nome'))
    <div class = " btm">
      <a class = "alert alert-success" >Funcionario cadastrado!!</a>
    </div>
  @endif

            <h3 class="titulopacientes">Funcionarios Cadastrados</h3>
            <!--<a  class="btn btn-outline-secondary"   onClick="history.go(-1)"  data-toggle="tooltip" data-placement="top" title="Voltar"><i class="fas fa-share"></i></a>-->

            <a id="Cadastrar"  class="btn btn-outline-success" href= "{{ route('admin.funcionario.novo') }}"  data-toggle="tooltip" data-placement="top" title="cadastrar">cadastrar</a>
            <a  class="btn btn-outline-danger"  href=""   data-toggle="tooltip" data-placement="top" title="Cancelar"><i class="fas fa-times"></i></a>

            <form class="form-inline my-2 my-lg-0" action="buscar" method="post">
              @csrf
          <input class="form-control mr-sm-2" type="text" name="search" placeholder="Buscar nome, cpf e matricula">
          <button id="btn" class="btn btn-outline-secondary my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>

      </form>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
            <thead class="thead-dark">
              <tr>
                <th s>#                         </th>
                <th >nome                       </th>
                <th scope="col">Rg             </th>
                <th scope="col">cargo          </th>
                <th scope="col">celular         </th>
                 
                <th scope="col">opções</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($funcionarios as $ev)
                    
              <tr class="Filter-nome">
                 <td>       {{$ev->id}}          </td>
             <td>       {{$ev->nome}}        </td> 
                 <td>       {{$ev->rg}}                 </td>
                 <td>       {{$ev->cargo}}                 </td>
                 <td>       {{$ev->celular}}             </td>
                <td>
                    <a href="editar/{{$ev->id}}"><i class="fas fa-edit"></i></a> 
                
                    <a href="excluir/{{$ev->id}}"><i class="fas fa-trash"></i></a>
                </td>

              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
          <div class="card-footer">
           <span> {{$funcionarios->links()}}</span>
          </div>
    </div>

</div>
</div>
@stop