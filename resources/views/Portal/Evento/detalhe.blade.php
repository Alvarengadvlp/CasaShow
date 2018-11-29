@extends('layouts.appDash')

@section('estilos')
<style>
    .save{
        margin-top: 2rem;
        float:right;
        
    }
    .ctt{
      
   -ms-flex-align: center;
     
     }
     .lista{
         margin-top: 2rem;
         text-align: center;
     }
     form{
         margin-left: 15%;
     }
   
</style>
@endsection

@section('tela')

<div class="container">
    <h3 class="aling-center">{{ $evento->nome }}</h3>
    @if ($mensagem !== 0)
        <div class="">
            <span>{{ $mensagem }}</span>
        </div>        
    @endif
    {{--<p><strong> Nome:</strong> <span>{{ $evento->nome }}</span></p> --}}
    <p><strong> Local:</strong><span>
            <strong> cep </strong>- {{ $evento->cep }} | <strong> bairro</strong> - {{ $evento->bairro }} |
            <strong> rua</strong> - {{ $evento->rua }} | <strong> N°</strong> - {{ $evento->numero }} | <strong>Cidade</strong>
            - {{ $evento->cidade }}

        </span></p>
    <p><strong> Data:</strong> <span>{{ $evento->dataEvento }}</span></p>
    <p><strong> Horario:</strong> <span>{{ $evento->horario }}</span></p>


    <hr>
</div>



<div class="container">
        
<form action="{{ route('admin.funcionario.assoc',['assoc/'=> $evento->id]) }}" method="PUT">
    <div class="row justify-content-md-center">
            <div class="form-group col-md-4">
                <label for="planos">Cargo</label>

                <select name="cargos" id="cargos" class="form-control ">
                    <option value="" selected>selecione</option>
                    @if ($cargos)
                        @foreach ($cargos as $c)
                        <option value="{{ $c->cargo }}">{{ $c->cargo }}</option>
                        @endforeach
                    @endif

                </select>
            </div>

            <div class="form-group col-md-5">
                <label for="planos">Funcionario</label>
                <select name="cargosfuncionario" id="cargosfuncionario" class="form-control ">
                    <option value="" selected></option>

                </select>
            </div>
            <div class="col save">
                <button id="Salvar" class="btn btn-outline-primary" type="Submit" data-toggle="tooltip" data-placement="top"
                    title="Salvar"><i class="far fa-save"></i></button>
                <a class="btn btn-outline-secondary" href="{{ route('admin.evento.index') }}" data-toggle="tooltip"
                    data-placement="top" title="Voltar"><i class="fas fa-share"></i></a>

            </div>
        </div>
</form>

</div>





<div class="container lista col-lg-8">

    <h3>Lista de Funcionarios </h3>

    <div class="table table-responsive ">
        <table class="table table-hover ">
            <thead class="thead-dark">
                <tr>
                    <th s># </th>
                    <th>nome </th>
                    <th>cargo </th>
                    <th> Celular </th>
                    <th> RG </th>
                    <th> Opcoes </th>
                </tr>
            </thead>
            <tbody>
                @if (!empty($funcionarios))
                @foreach ($funcionarios as $funcionario )
                <tr>
                    <td>{{ $funcionario->id }}</td>
                    <td>{{ $funcionario->nome }}</td>
                    <td>{{ $funcionario->cargo }}</td>
                    <td>{{ $funcionario->celular }}</td>
                    <td>{{ $funcionario->rg }}</td>
                    <td>
                        <a href="{{ route('admin.funcionario.assoc.excluir',['evento'=> $evento->id, 'funcionario' => $funcionario->id ]) }}"><i
                                class="fas fa-trash"></i></a>
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>


        </table>
        {!!$funcionarios->links()!!}

    </div>





    @endsection

    @section('scripts')
    <script type="text/javascript" src="{{ asset('js/buscaAjax.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js "></script>

    @endsection
