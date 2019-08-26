   	//Parte que se encarga de guardar un elemento nuevo
		$("#formEntrada").submit(function(event) {
			var formData = new FormData($("#formEntrada")[0]);
		    $.ajax({
                type: "POST",
                url: "registrar_entrada.php",
                data: formData,
                contentType: false,
                cache:false,
                processData:false,
		        beforeSend: function(formData) {
		        },
		        success: function(response) {
                    $("#formEntrada")[0].reset();
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
