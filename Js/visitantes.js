$(function() {

  $('#ayudaVisitantes').on("mouseenter",function(e) {
    e.preventDefault(); // cancela el evento por defecto del formulario
    var cardAyuda = document.getElementById("cardVisitantes"); 
    if(cardAyuda.style.display === 'none'){
    cardAyuda.style.display = 'block';
      }else{
        cardAyuda.style.display = 'none';
      }
     });

     
  $('#ayudaVisitantes').on("mouseleave",function(e) {
    e.preventDefault(); // cancela el evento por defecto del formulario
    var cardAyuda = document.getElementById("cardVisitantes"); 
    if(cardAyuda.style.display === 'none'){
    cardAyuda.style.display = 'block';
      }else{
        cardAyuda.style.display = 'none';
      }
     });

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