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
<div class="container corpo-conteudo">
        <h4>Cadastro <strong>| Evento</strong></h4>
   {{--  {!! Form::open(['route' => 'admin.evento.create','method ' => 'post',]) !!}  --}}
  <form action="{{ route('admin.evento.create') }}" method="post">
     @csrf

     <div class="form-group navegacao">
            <div class="col">
              <button id="Cadastrar"  class="btn btn-outline-success" type="Submit"  data-toggle="tooltip" data-placement="top" title="cadastrar"><i class="fas fa-plus-circle"></i></button>
              <a  class="btn btn-outline-secondary"   href="{{route('admin.evento.index')}}"   data-toggle="tooltip" data-placement="top" title="pesquisar"><i class="fas fa-search"></i></a>
             <!-- <a  class="btn btn-outline-danger"  href="{{route('admin.evento.novo')}}"   data-toggle="tooltip" data-placement="top" title="Cancelar"><i class="fas fa-times"></i></a>-->
              <a  class="btn btn-outline-secondary"   onClick="history.go(-1)"  data-toggle="tooltip" data-placement="top" title="Voltar"><i class="fas fa-share"></i></a>


              <!--<button id="Cancelar" name="Cancelar" class="btn btn-danger" type="button">Cancelar</button>-->
            </div>
        </div>

    <fieldset class="form-group">
            <legend aling="center">Dados </legend>
<div class="row">

<div class="col-2">
<div class="form-group">
<label for="nome">Nome*</label>
<input type="text" name="nome" id="nome" required maxlength="30" class="form-control" placeholder="nome">
<small id="nome" class="text-muted">Nome</small>
</div>
</div><!--col nome -->


<div class="col-2">
<div class="form-group">
<label for="data">Data</label>
<input type="date" name="dataEvento"  required  id="dt" class="form-control" placeholder="" OnKeyPress="formatar('##/##/####', this)">
<small id="dt" class="data">Data obrigatoria</small>
</div>
</div><!--col dt Nascimento-->

<div class="col-2">
        <div class="form-group">
        <label for="data">Horario</label>
        <input type="time" name="horario"  required  id="dt" class="form-control" placeholder="" OnKeyPress="formatar('##/##/####', this)">
        <small id="dt" class="data">horario</small>
        </div>
        </div><!--col dt Nascimento-->

<div class="col-4">
    <div class="form-group">
    <label for="nome">Atraçoes*</label>
    <input type="text" name="atracoes" id="nome" required maxlength="60" class="form-control" placeholder="nome">
    <small id="nome" class="text-muted">Atraçoes</small>
    </div>
    </div><!--col nome -->
       
</div><!-- row -->
</fieldset><!--Dados pessoas-->
<hr>

     

<fieldset class="form-group ">
        <legend class = "ttt" aling="center">Endereço</legend>

    <div class="row">
        <div class="col-md-2 mb-3 ">
             <div class="form-group">

                   <span>Cep</span>
                   <input type="text"  required class="form-control input-md {{$errors->has('cep') ? 'is-invalid': '' }}" name="cep" id="cep"
                    placeholder="Apenas numeros" maxlength="15" value =   {{old('cep')}}>
                    @if($errors->has('cep'))
                    <div class="invalid-feedback">
                        {{$errors->first('cep')}}
                        </div>
                        @endif
    
                    </div>

            </div><!-- col cep -->
                             
                    <div class="form-group">
                         <button type="button" class="btn btn-outline-success pesquisar"  onclick="cep.value">pesquisar</button>
                     </div>
                  

            

         <div class="col-md-3 mb-3">
          <span>Rua</span>
              <div class="input-group">
                  <input type="text" name="rua" maxlength="40" required class="form-control {{$errors->has('rua') ? 'is-invalid': '' }}" id="rua"
                  value =   {{old('rua')}}>

                    @if($errors->has('rua'))
                        <div class="invalid-feedback">
                        {{$errors->first('rua')}}
                        </div>
                    @endif

          </div>
      </div><!-- col rua-->

       <div class="col-md-1 mb-3">
        <span >Nº </span>
        <div class="input-group">
          <input id="numero" name="numero" maxlength = '6' class="form-control {{$errors->has('numero') ? 'is-invalid': '' }}"placeholder="" required=""  type="text"
          value =   {{old('numero')}}>

                 @if($errors->has('numero'))
<div class="invalid-feedback">
{{$errors->first('numero')}}
</div>
@endif

        </div>

      </div> <!-- col bumero-->


      <div class="col-md-2 mb-3">

       <span>Bairro</span>
        <div class="input-group">
          <input id="bairro" name="bairro"  required maxlength="15" placeholder="" required=""  class="form-control {{$errors->has('bairro') ? 'is-invalid': '' }}"type="text"
          value =   {{old('bairro')}}>

                  @if($errors->has('bairro'))
<div class="invalid-feedback">
{{$errors->first('bairro')}}
</div>
@endif

        </div>

        </div><!-- col bairro-->

    <div class="col-md-2 mb-3">
       <span>Cidade</span>
        <div class="input-group">

          <input id="cidade" name="cidade"  required maxlength="30" placeholder="" required=""  class="form-control {{$errors->has('cidade') ? 'is-invalid': '' }}" type="text"
          value =   {{ old('cidade') }}>

                   @if($errors->has('cidade'))
<div class="invalid-feedback">
{{$errors->first('cidade')}}
</div>
@endif

        </div>
    </div><!-- col cidade -->

        <div class="col-md-1 mb-3">
        <span>Estado</span>
        <div class="input-group">

            <input id="uf" name="estado"  required maxlength="2" placeholder=""  class="form-control {{$errors->has('estado') ? 'is-invalid': '' }}" type="text"
            value =   {{old('estado')}}>
                           @if($errors->has('estado'))
<div class="invalid-feedback">
{{$errors->first('estado')}}
</div>
@endif

        </div>
    </div>




</div><!-- row endereco -->
<hr>

<fieldset class="form-group">
    <legend aling="center">Contato</legend>
<div class="row"><!-- contato -->

<div class="col-3">
        <div class="form-group">
            <label for="telefone">Telefone <h11>*</h11></label>
                <input id="telefone" name="telefone" class="form-control" placeholder="XX XXXXX-XXXX" required="" type="text" maxlength="13" pattern="\[0-9]{2}\ [0-9]{4,6}-[0-9]{3,4}$"
                OnKeyPress="formatar('## #####-####', this)">
        </div>
    </div>  <!-- col Telefone-->

    <div class="col-3">
            <div class="form-group">
                <label for="celular">Celular <h11>*</h11></label>
                    <input id="celular" name="celular" class="form-control" placeholder="XX XXXXX-XXXX" required="" type="text" maxlength="13" pattern="\[0-9]{2}\ [0-9]{4,6}-[0-9]{3,4}$"
                    OnKeyPress="formatar('## #####-####', this)">
            </div>
        </div>  <!-- col Telefone-->
        
    
    <div class="col-4">
        <div class="form-group">
               <label for="exampleFormControlInput2">Email address</label>
               <input type="email"  name="email" class="form-control" id="exampleFormControlInput2" placeholder="name@example.com">
        </div>
        
        
        </div> <!-- col Email -->

    </fieldset><!--endereço-->

{{--{!! Form::close() !!} --}}
</form>
</div><!-- container -->

@stop