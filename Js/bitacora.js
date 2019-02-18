$(function() {

  function listaBitacora(){
    var busquedaB= $("#buscarBitacora").val();
            $.ajax({
        url: "buscadorBita.php",
        type: "POST",
        data: {busquedaB},
        success: function(response){
          $("#bitacoraTabla").html(response);
        }
    });

  }

  listaBitacora();

    $('#formBuscarBita').on("submit",function(e) {
      e.preventDefault(); // cancela el evento por defecto del formulario
      var parametros = $(this).serialize();
      $.ajax({
        url: "buscadorBita.php",
        type: "POST",
        data: parametros,
        success: function(response){
           $("#bitacoraTabla").html(response);
        }

      })
  
    });

    $('#buscarBitacora').on("keyup",function(e){
      var busquedaB= $("#buscarBitacora").val();
            $.ajax({
        url: "buscadorBita.php",
        type: "POST",
        data: {busquedaB},
        success: function(response){
          $("#bitacoraTabla").html(response);
        }
    });
  
    });

  });