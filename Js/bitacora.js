$(function() {
    $('#formBuscar').on("submit",function(e) {
      e.preventDefault(); // cancela el evento por defecto del formulario
      var parametros = $(this).serialize();
      $.ajax({
        url: "buscadorBita.php",
        type: "POST",
        data: parametros,
        success: function(response){
           $("#visitantesTabla").html(response);
        }

      })
  
    });

    $('#busqueda').on("keyup",function(e){
      var busqueda= $("#busqueda").val();
      var selectBitacora = $("#selectBitacora").val();
        $.ajax({
        url: "buscadorBita.php",
        type: "POST",
        data: {busqueda,selectBitacora},
        success: function(response){
          $("#visitantesTabla").html(response);
        }
    });
  
    });

  });