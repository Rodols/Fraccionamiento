$(function() {

  $('#ayudaBitacora').on("mouseenter",function(e) {
    e.preventDefault(); // cancela el evento por defecto del formulario
    var cardAyuda = document.getElementById("cardBita"); 
    if(cardAyuda.style.display === 'none'){
    cardAyuda.style.display = 'block';
      }else{
        cardAyuda.style.display = 'none';
      }
     });

     
  $('#ayudaBitacora').on("mouseleave",function(e) {
    e.preventDefault(); // cancela el evento por defecto del formulario
    var cardAyuda = document.getElementById("cardBita"); 
    if(cardAyuda.style.display === 'none'){
    cardAyuda.style.display = 'block';
      }else{
        cardAyuda.style.display = 'none';
      }
     });


     $('#reporteBtn').on("click",function() {
      var clave = 'reporte';
        $.ajax({
          url: "generarReporte.php",
         type: "POST",
         data: {clave},
         success: function(response){
           $("#ListaVisitas").html(response);
           alert("El reporte se comenzara a crear, puede tardar varios minutos. Deseas continuar?");
           window.location.href='../php/printPdf.php';
          }
        });
       });




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

  