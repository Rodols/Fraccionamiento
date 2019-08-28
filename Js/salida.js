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
      beforeSend: function(objeto) {
          $("#formVistaSalida").html("Enviando...");
      },
      success: function(response) {
          $("#formVistaSalida").html(response);
      }
  });
  event.preventDefault();
    }

    function registroSt(){
      var st = $("#userName").val();
      $.ajax({
           url: "registro_form_st.php",
           type: "POST",
           data: {st},
         success: function(response){ 
         $("#formVistaSalida").html(response);
         }
      });
    }

    $("#formSt").submit(function(event) {
      var formData = new FormData($("#formSt")[0]);
      $.ajax({
        type: "POST",
        url: "generarSalida_st.php",
        data: formData,
        contentType: false,
        cache:false,
        processData:false,
    beforeSend: function(formData) {
    },
    success: function(response) {
            $("#formSt")[0].reset();
            switch (response) {
                case "1":
                    alert("Los datos fueron guardados");
                    break;
             case "2":
                     alert("El gafete ya se encuentra registrado");
                     break;
             case "3":
                      alert("Ocurrio un error vuelve a intentarlo");
                      break;
                default:
                    break;
            }          
      }
        });
      event.preventDefault(); 
        });
    