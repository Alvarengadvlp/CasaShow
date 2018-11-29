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
        <h4>Cadastro <strong>| Funcionario</strong></h4>
   {{-- {!! Form::open(['route' => '','method ' => 'post',]) !!} --}}
   
   <form action="{{ route('admin.funcionario.create') }}" method="post">
     @csrf

     <div class="form-group navegacao">
            <div class="">
              <button id="Cadastrar"  class="btn btn-outline-success" type="Submit"  data-toggle="tooltip" data-placement="top" title="cadastrar"><i class="fas fa-plus-circle"></i></button>
              <a  class="btn btn-outline-secondary"   href="{{route('admin.funcionario.index')}}"   data-toggle="tooltip" data-placement="top" title="pesquisar"><i class="fas fa-search"></i></a>
              <a  class="btn btn-outline-danger"  href="{{route('admin.funcionario.novo')}}"   data-toggle="tooltip" data-placement="top" title="Cancelar"><i class="fas fa-times"></i></a>
              <a  class="btn btn-outline-secondary"   onClick="history.go(-1)"  data-toggle="tooltip" data-placement="top" title="Voltar"><i class="fas fa-share"></i></a>

              <!--<button id="Cancelar" name="Cancelar" class="btn btn-danger" type="button">Cancelar</button>-->
            </div>
        </div>
<div class="centro container-fluid">
    <fieldset class="form-group">
            <legend aling="center">Dados </legend>
<div class="row">

<div class="col-md-6 mb-3">
<div class="form-group">
<label for="nome">Nome*</label>
<input type="text" name="nome" id="nome" required maxlength="30" class="form-control" placeholder="nome">
<small id="nome" class="text-muted">Nome</small>
</div>
</div><!--col nome -->

<div class="col-md-6 mb-3">
    <div class="form-group">
    <label for="nome">RG</label>
    <input type="text" name="rg" id="rg" required maxlength="60" class="form-control" placeholder="nome">
    <small id="RG" class="text-muted">Identidade</small>
    </div>
    </div><!--col nome -->
</div>
<div class="row">
    <div class="col-md-6 mb-3">
        <div class="form-group">
            <label for="cargo">Cargo <h11>*</h11></label>
                <input id="cargo" name="cargo" class="form-control"  required="" type="text" maxlength="13">
               
        </div>
    </div>  <!-- col Telefone-->

    <div class="col-md-6 mb-3">
            <div class="form-group">
                <label for="celular">Celular <h11>*</h11></label>
                    <input id="celular" name="celular" class="form-control"required="" type="text" maxlength="13">
            </div>
        </div>  <!-- col Telefone-->
       
</div><!-- row -->

</fieldset><!--Dados pessoas-->

<hr>


</div>
{{--{!! Form::close() !!} --}}
</form>
</div><!-- container -->



@stop