<?php
session_start();
ob_start();
if ($_SESSION['session_exito'] != 1) {
    //require 'index.php';
    header('Location:../index.php');
}
include_once '../plantillas/InicioDocumento.inc.php';
?>
<body onload="VistaVisitantes();">
<?php include_once '../plantillas/BarraNavegacion.inc.php';?>

	<div class="container-fluid">
			<div class="row">
				 <div class="col-md-3"></div>
				 <div class="col-md-6">
					  <center>
							<h4 id="tabV"><br>Visitas dentro del fracc. (Xalapa Ver, <?=$fechaActual;?>)</h4><br>
							<form class="form-inline justify-content-center" id="formBuscarVisit" method="POST" action="visitas.php">
  								<div class="form-group mb-2">
   							 			<input type="text" class="form-control" name="busquedaV" id="buscarVisitas" placeholder="Buscar">
 			 						</div>
  				 				<div class="form-group mx-sm-3 mb-2">
					 						<button type="submit" name="btnFiltro" class="btn btn-info form-control">Buscar</button>
									 </div>
									 <div class=" form-group mb-2" >
												<button type="buton" id="ayudaVisitantes" class="btn btn-outline-dark" style="color:green; font-weight: bold ;" >Ayuda</button>
										</div>
							</form>
						</center>
				  </div>
				  <div class="col-md-3 ayuda">
					<div class="card text-white bg-dark mb-2" id="cardVisitantes" style="max-width: 15rem; display: none;">
  							<div class="card-header"><h5 class="card-title">¿Como buscar?</h5></div>
  							<div class="card-body">
    								<p class="card-text">Puedes "Buscar" por <span class="textAyuda"> codigo, usuario, fecha, nombre, placas.</span></p>
 								 </div>
						</div>
					</div>
	  	</div>
	</div>
	<div class="container-fluid">

	<!-- ESto es para abriri y cerrar la pesataña del arduino wifi
	echo "
	<script>
	ventana = window.open(\"http://192.168.1.82/LED=ON\", \"nuevo\", \"width=400,height=400\");
	setTimeout(cerrarVentana,1000);
	function cerrarVentana(){
		ventana.close();
   }
   </script>
   ";
   -->

  <div id="visitantesTabla"></div>
  </div>
<script src="../Js/visitantes.js"></script>
<?php include_once '../plantillas/FinDocumento.inc.php';?>