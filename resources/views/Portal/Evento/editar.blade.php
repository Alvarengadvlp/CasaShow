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
        <h4>Atualizar <strong>| {{ $evento->nome }}</strong></h4>
   {{--  {!! Form::open(['route' => 'admin.evento.create','method ' => 'post',]) !!}  --}}
  <form  action="{{ route('admin.evento.update',['id' => $evento->id]) }}" method="post">
     @csrf @method('PUT')


     <div class="form-group navegacao">
            <div class="col">
                    <button id="Salvar"  class="btn btn-outline-primary" type="Submit"  data-toggle="tooltip" data-placement="top" title="Salvar"><i class="far fa-save"></i></button>
                    <!--<a  class="btn btn-outline-secondary"   href="{{route('admin.evento.index')}}"   data-toggle="tooltip" data-placement="top" title="pesquisar"><i class="fas fa-search"></i></a>-->
              <a  class="btn btn-outline-info"   onClick="history.go(0)"  data-toggle="tooltip" data-placement="top" title="Recarregar"><i class="fas fa-redo"></i></a>
              <a  class="btn btn-outline-secondary"   onClick="history.go(-1)"  data-toggle="tooltip" data-placement="top" title="Voltar"><i class="fas fa-share"></i></a>

              <!--<button id="Cancelar" name="Cancelar" class="btn btn-danger" type="button">Cancelar</button>-->
            </div>
        </div>

    <fieldset class="form-group">
            <legend aling="center">Dados </legend>
<div class="row">

<div class="col-4">
<div class="form-group">
<span for="nome">Nome*</span>
<input type="text" name="nome" id="nome" required maxlength="30" class="form-control" placeholder="nome" @if(!empty($evento)) value = "{{ $evento->nome}}" @else value = "" @endif>

</div>
</div><!--col nome -->


<div class="col-3">
<div class="form-group">
<span for="data">Data</span>
<input type="date" name="dataEvento"  required  id="dt" class="form-control" placeholder="" @if(!empty($evento)) value = {{ $evento->dataEvento}} @else value = "" @endif>

</div>
</div><!--col dt Nascimento-->

<div class="col-2">
        <div class="form-group">
        <span for="data">Horario</span>
        <input type="time" name="horario"  required  id="dt" class="form-control" placeholder="" @if(!empty($evento)) value = {{ $evento->horario}} @else value = "" @endif>
       
        </div>
        </div><!--col dt Nascimento-->

<div class="col-7">
    <div class="form-group">
    <span for="nome">Atraçoes*</span>
    <input type="text" name="atracoes" id="nome" required maxlength="60" class="form-control" placeholder="nome" @if(!empty($evento)) value = "{{ $evento->atracoes}}" @else value = "" @endif>
  
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

<fieldset class="form-group">
    <legend aling="center">Contato</legend>
<div class="row"><!-- contato -->

<div class="col-3">
        <div class="form-group">
            <label for="telefone">Telefone <h11>*</h11></label>
                <input id="telefone" name="telefone" class="form-control"  required="" type="text" maxlength="13" @if(!empty($evento)) value = {{ $evento->telefone}} @else value = "" @endif>
        </div>
    </div>  <!-- col Telefone-->

    <div class="col-3">
            <div class="form-group">
                <label for="celular">Celular <h11>*</h11></label>
                    <input id="celular" name="celular" class="form-control" required="" type="text" maxlength="13"  @if(!empty($evento)) value = {{ $evento->celular}} @else value = "" @endif>
            </div>
        </div>  <!-- col Telefone-->
        
    
    <div class="col-4">
        <div class="form-group">
               <label for="exampleFormControlInput2">Email address</label>
               <input type="email"  name="email" class="form-control" id="exampleFormControlInput2" placeholder="name@example.com" @if(!empty($evento)) value = {{ $evento->email}} @else value = "" @endif>
        </div>
        
        
        </div> <!-- col Email -->

    </fieldset><!--endereço-->

{{--{!! Form::close() !!} --}}
</form>
</div><!-- container -->

@stop