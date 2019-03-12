$(function() {
    $('#formSalida').on("submit",function(e) { 
      e.preventDefault(); // cancela el evento por defecto del formulario
      var cod = $("#textoCod").val();
      $.ajax({
        url: "buscadorSalida.php",
        type: "POST",
        data: {cod},
        success: function(response){  
          $("#formVistaSalida").html(response);
        }
      })
  
    });
    
    $('#textoCod').on("keyup",function(e){
      var cod = $("#textoCod").val();
            $.ajax({
        url: "buscadorSalida.php",
        type: "POST",
        data: {cod},
        success: function(response){ 
           $("#formVistaSalida").html(response);
        }
    });
  

    });

  });

    function DarSalida(){
     var parametros = $('#formDarSalida').serialize();
     $.ajax({
      type: "POST",
      url: "generarSalida.php",
      data: parametros,
      success: function(response) {
        $("#formVistaSalida").html(response);
        setTimeout(limpiar,2000);
      }
      });
    }

    function limpiar(){
      $("#formVistaSalida").html("");
    }