$(document).ready(function() {

    atualizaAtendimento();
  
    setInterval(atualizaAtendimento, 60000);
  
  });
  
  function atualizaAtendimento() {
    var Agora = new Date().getHours();
  
    statusLoja1(Agora);
  
  }
  
  
  function statusLoja1(Agora) {
    var hrAbre = 8;
    var hrFecha = 22;
  
    if (Agora >= hrAbre && Agora < hrFecha) { 
      $('.statusLoja1').html("Aberto").css("color", "green");
    } else {
      $('.statusLoja1').html("Fechado").css("color", "red");
    }
  }