jQuery(function($){ 
    $("#data").mask("99/99/9999",{placeholder:"dd/mm/aaaa"});
    $("#celular").mask("(99) 99999-9999", {placeholder:"(00) 00000-0000"}); 
     $("#telefone").mask("(99) 9999-9999", {placeholder:"(00) 00000-0000"});
     $("#cpf").mask("999.999.999-99",{placeholder:"000.000.000-00"});
      $("#cep").mask("99999-999", {placeholder:"00000-000"});
     $("#rg").mask("99.999.999-9", {placeholder:"00.000.000-0"});
    
    });