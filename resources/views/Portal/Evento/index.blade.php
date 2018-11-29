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
      <a class = "alert alert-success" >Evento cadastrado!!</a>
    </div>
  @endif

            <h3 class="titulopacientes">Eventos Cadastrados</h3>
           <!-- <a  class="btn btn-outline-secondary"   onClick="history.go(-1)"  data-toggle="tooltip" data-placement="top" title="Voltar"><i class="fas fa-share"></i></a>-->

            <a id="Cadastrar"  class="btn btn-outline-success" href= "{{ route('admin.evento.novo') }}"  data-toggle="tooltip" data-placement="top" title="cadastrar">cadastrar</a>
            <a  class="btn btn-outline-danger"  href=""   data-toggle="tooltip" data-placement="top" title="Cancelar"><i class="fas fa-times"></i></a>

            <form class="form-inline my-2 my-lg-0" action="buscar" method="post">
              @csrf
          <input class="form-control mr-sm-2" type="text" name="search" placeholder="Buscar nome, cpf e matricula">
          <button id="btn" class="btn btn-outline-secondary my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>

      </form>
  </div>
  <div class="card-body">
      <div class="table-responsive">
            <table class="table table-hover ">
            <thead class="thead-dark">
              <tr>
                <th  scope="row">#                         </th>
                <th scope="col">nome                       </th>
                <th scope="col">DataEvento                 </th>
                <th scope="col" >Horario                 </th>
                <th scope="col"> atracoes               </th>
                <th scope="col">rua             </th>
                <th scope="col">numero          </th>
                <th scope="col">bairro          </th>
                <th scope="col">cidade          </th>
                <th scope="col">telefone        </th>

                <th scope="col">email           </th>
                 
                <th scope="col">opções</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($eventos as $ev)
                    
              <tr class="Filter-nome">
                 <td>       {{ $ev->id}}                    </td>
                 <td> <a href= "{{ route('admin.evento.detalhe',['detalhe'=> $ev->id ]) }}">{{ $ev->nome}}</a> </td>                    </td>  
                 <td>       {{$ev->dataEvento}}                </td>
                 <td>       {{$ev->horario}}                </td>
                 <td>       {{$ev->atracoes}}                 </td>
                 <td>       {{$ev->rua}}                 </td>
                 <td>       {{$ev->numero}}              </td>
                 <td>       {{$ev->bairro}}              </td>
                 <td>       {{$ev->cidade}}              </td>
                 <td>       {{$ev->telefone}}            </td>
                 <td>       {{$ev->email}}               </td>
                <td>
                    <a href="{{ route('admin.evento.editar',['editar'=> $ev->id ]) }}"><i class="fas fa-edit"></i></a> 
                
                    <a href="{{ route('admin.evento.excluir',['excluir'=> $ev->id ]) }}"><i class="fas fa-trash"></i></a>
                </td>

              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        </div>
          <div class="card-footer">
           <span> {{$eventos->links()}}</span>
          </div>
    
        </div>
</div>
@stop
@section('scripts')
<script  href="{{ asset('js/filtra.js') }}" type="text/javascript"></script>
@endsection