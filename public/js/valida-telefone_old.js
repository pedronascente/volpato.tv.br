function telefone_validation(telefone){
    //retira todos os caracteres menos os numeros
    telefone = telefone.replace(/\D/g,'');
    
    //verifica se tem a qtde de numero correto
    if(!(telefone.length >= 10 && telefone.length <= 11)) return false;
    
    //Se tiver 11 caracteres, verificar se começa com 9 o celular
    if (telefone.length == 11 && parseInt(telefone.substring(2, 3)) != 9) return false;
      
    //verifica se não é nenhum numero digitado errado (propositalmente)
    for(var n = 0; n < 10; n++){
      //um for de 0 a 9.
      //estou utilizando o metodo Array(q+1).join(n) onde "q" é a quantidade e n é o    
      //caractere a ser repetido
      if(telefone == new Array(11).join(n) || telefone == new Array(12).join(n)) return false;
      }
      //DDDs validos
      var codigosDDD = [11, 12, 13, 14, 15, 16, 17, 18, 19,
    21, 22, 24, 27, 28, 31, 32, 33, 34,
    35, 37, 38, 41, 42, 43, 44, 45, 46,
    47, 48, 49, 51, 53, 54, 55, 61, 62,
    64, 63, 65, 66, 67, 68, 69, 71, 73,
    74, 75, 77, 79, 81, 82, 83, 84, 85,
    86, 87, 88, 89, 91, 92, 93, 94, 95,
    96, 97, 98, 99];
      //verifica se o DDD é valido (sim, da pra verificar rsrsrs)
      if(codigosDDD.indexOf(parseInt(telefone.substring(0, 2))) == -1) return false;
      
      //  E por ultimo verificar se o numero é realmente válido. Até 2016 um celular pode 
      //ter 8 caracteres, após isso somente numeros de telefone e radios (ex. Nextel)
      //vão poder ter numeros de 8 digitos (fora o DDD), então esta função ficará inativa
      //até o fim de 2016, e se a ANATEL realmente cumprir o combinado, os numeros serão
      //validados corretamente após esse período.
      //NÃO ADICIONEI A VALIDAÇÂO DE QUAIS ESTADOS TEM NONO DIGITO, PQ DEPOIS DE 2016 ISSO NÃO FARÁ DIFERENÇA
      //Não se preocupe, o código irá ativar e desativar esta opção automaticamente.
      //Caso queira, em 2017, é só tirar o if.
      //if(new Date().getFullYear() < 2017) return true;
      if (telefone.length == 10 && [2, 3, 4, 5, 7].indexOf(parseInt(telefone.substring(2, 3))) == -1) return false;
      //se passar por todas as validações acima, então está tudo certo
      return true;
}

$(function(){
$('#telefone-captacao').on('focusout', function(){
    $('#resposta-captacao').html('');
    if(telefone_validation($('#telefone-captacao').val())){
      $('#resposta-captacao').html('<b style="color:#fff">Telefone Correto!</b>');
      $('#botao-captacao').removeAttr('disabled');
    }else{
      $('#resposta-captacao').html('<b style="color:#fff">Algo errado com seu telefone!</b>');
      $('#botao-captacao').attr('disabled', 'disabled');
    }
});
$("#formulario-captacao").submit(function(){
  var telefoneInput = $('#telefone-captacao').val().split(' ');
  var ddd = telefoneInput[0].replace('(','').replace(')','');
  var telefone = telefoneInput[1];
  $('#hdDdd-captacao').val(ddd);
  $('#hdtlfn-captacao').val(telefone);
  $('#botao-captacao').attr('disabled', 'disabled');
  $('#botao-captacao').html('ENVIANDO...');
});

});

$(function(){
$('#telefone-modal').on('focusout', function(){
    $('#resposta-modal').html('');
    if(telefone_validation($('#telefone-modal').val())){
      $('#resposta-modal').html('<b style="color:#777">Telefone Correto!</b>');
      $('#botao-modal').removeAttr('disabled');
    }else{
      $('#resposta-modal').html('<b style="color:#777">Algo errado com seu telefone!</b>');
      $('#botao-modal').attr('disabled', 'disabled');
    }
});
$("#formulario-modal").submit(function(){
  var telefoneInput = $('#telefone-modal').val().split(' ');
  var ddd = telefoneInput[0].replace('(','').replace(')','');
  var telefone = telefoneInput[1];
  $('#hdDdd-modal').val(ddd);
  $('#hdtlfn-modal').val(telefone);
  $('#botao-modal').attr('disabled', 'disabled');
  $('#botao-modal').html('ENVIANDO...');
});

});

$(function(){
$('#telefone-contato').on('focusout', function(){
    $('#resposta-contato').html('');
    if(telefone_validation($('#telefone-contato').val())){
      $('#resposta-contato').html('<b style="color:#777">Telefone Correto!</b>');
      $('#botao-contato').removeAttr('disabled');
    }else{
      $('#resposta-contato').html('<b style="color:#777">Algo errado com seu telefone!</b>');
      $('#botao-contato').attr('disabled', 'disabled');
    }
});
$("#formulario-contato").submit(function(){
  var telefoneInput = $('#telefone-contato').val().split(' ');
  var ddd = telefoneInput[0].replace('(','').replace(')','');
  var telefone = telefoneInput[1];
  $('#hdDdd-contato').val(ddd);
  $('#hdtlfn-contato').val(telefone);
  $('#botao-contato').attr('disabled', 'disabled');
  $('#botao-contato').html('ENVIANDO MENSAGEM...');
});

});

