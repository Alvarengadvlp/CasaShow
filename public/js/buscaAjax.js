$('select[name=cargos]').change(function(){
    var nomeCargo = this.value;
    //alert(nomeCargo);
    $.getJSON('/cargos/'+nomeCargo , function(cargos){
       // c = cargos;
        //alert(c);
        $('select[name=cargosfuncionario]').empty();
        $.each(cargos, function(key,value){
            $('select[name=cargosfuncionario]').append('<option value=' + value.id + '>' + value.nome + '</option>')
        })
    })
})