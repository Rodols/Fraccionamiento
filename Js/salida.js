$(function() {
    $('#formSalida').on("submit",function(e) { 
      
      e.preventDefault(); // cancela el evento por defecto del formulario
      var cod = $("#textoCod").val();
      $.ajax({
        url: "buscadorSalida.php",
        type: "POST",
        data: {cod},
        success: function(response){  
          $("#formVistaSalida").style.display="block";
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

    $('#formDarSalida').on("submit",function(e) {
     
      e.preventDefault(); // cancela el evento por defecto del formulario
      var parametros = $(this).serialize();
      $.ajax({
        url: "generarSalida.php",
        type: "POST",
        data: {parametros},
        success: function(response){

                }

      })
  
    });



    

  });