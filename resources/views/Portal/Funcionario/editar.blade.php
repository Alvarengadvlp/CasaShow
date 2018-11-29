@extends('layouts.appDash')
@section('estilos')
   <style>
       .pesquisar{
           margin-top: 1.5rem;
       }
       .navegacao{
           float:right;
       }
       h4{
           text-align: center;
       }
    
   </style>
@endsection

@section('tela')
<div class="container-fluid col-lg-8 corpo-conteudo">
        <h4>Atualizar <strong>| {{ $funcionario->nome }}</strong></h4>
   {{-- {!! Form::open(['route' => '','method ' => 'post',]) !!} --}}
   <form action="{{ route('admin.funcionario.update',['id' => $funcionario->id]) }}" method="post">
     @csrf @method('PUT')

     <div class="form-group navegacao">
            <div class="col">
                    
                    <button id="Salvar"  class="btn btn-outline-primary" type="Submit"  data-toggle="tooltip" data-placement="top" title="Salvar"><i class="far fa-save"></i></button>
                    <!--<a  class="btn btn-outline-secondary"   href="{{route('admin.funcionario.index')}}"   data-toggle="tooltip" data-placement="top" title="pesquisar"><i class="fas fa-search"></i></a>-->
              <a  class="btn btn-outline-info"   onClick="history.go(0)"  data-toggle="tooltip" data-placement="top" title="Recarregar"><i class="fas fa-redo"></i></a>
              <a  class="btn btn-outline-secondary"   onClick="history.go(-1)"  data-toggle="tooltip" data-placement="top" title="Voltar"><i class="fas fa-share"></i></a>

              <!--<button id="Cancelar" name="Cancelar" class="btn btn-danger" type="button">Cancelar</button>-->
            </div>
        </div>

    <fieldset class="form-group">
            <legend aling="center">Dados </legend>
<div class="container ">
<div class="row">

<div class="col-5">
<div class="form-group">
<label for="nome">Nome*</label>
<input type="text" name="nome" id="nome" required maxlength="30" class="form-control" placeholder="nome" @if(!empty($funcionario)) value = {{ $funcionario->nome}} @else value = "" @endif>
<small id="nome" class="text-muted">Nome</small>
</div>
</div><!--col nome -->

<div class="col-4">
    <div class="form-group">
    <label for="nome">RG</label>
    <input type="text" name="rg" id="rg" required maxlength="60" class="form-control" placeholder="nome" @if(!empty($funcionario)) value = {{ $funcionario->rg}} @else value = "" @endif>
    <small id="RG" class="text-muted">Identidade</small>
    </div>
    </div><!--col nome -->
</div>
<div class="row">
    <div class="col-5">
        <div class="form-group">
            <label for="cargo">Cargo <h11>*</h11></label>
                <input id="cargo" name="cargo" class="form-control"  required="" type="text" maxlength="13" @if(!empty($funcionario)) value = {{ $funcionario->cargo}} @else value = "" @endif>
               
        </div>
    </div>  <!-- col Telefone-->

    <div class="col-4">
            <div class="form-group">
                <label for="celular">Celular <h11>*</h11></label>
                    <input id="celular" name="celular" class="form-control"required="" type="text" maxlength="13" @if(!empty($funcionario)) value = {{ $funcionario->celular}} @else value = "" @endif>
            </div>
        </div>  <!-- col Telefone-->
    </div>   
</div><!-- row -->
</fieldset><!--Dados pessoas-->

<hr>



{{--{!! Form::close() !!} --}}
</form>
</div><!-- container -->

@stop