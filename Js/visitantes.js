$(function() {

    function listaVisitas(){
      var busquedaV= $("#buscarVisitas").val();
      $.ajax({
        url: "buscadorVisit.php",
        type: "POST",
        data: {busquedaV},
        success: function(response){
           $("#visitantesTabla").html(response);
        }

      })
    }

    listaVisitas();

    $('#formBuscarVisit').on("submit",function(e) {
      e.preventDefault(); // cancela el evento por defecto del formulario
      var busquedaV= $("#buscarVisitas").val();
      $.ajax({
        url: "buscadorVisit.php",
        type: "POST",
        data: {busquedaV},
        success: function(response){
           $("#visitantesTabla").html(response);
        }

      })
  
    });

    $('#buscarVisitas').on("keyup",function(e){
      var busquedaV= $("#buscarVisitas").val();
            $.ajax({
        url: "buscadorVisit.php",
        type: "POST",
        data: {busquedaV},
        success: function(response){
          $("#visitantesTabla").html(response);
        }
    });
  
    });

  });