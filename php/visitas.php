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
		<center>
			<h4 id="tabV"><br>Visitas dentro del fraccionamiento (Xalapa Ver, <?=$fechaActual;?>)</h4><br>
			<form class="form-inline justify-content-center" id="formBuscarVisit" method="POST" action="visitas.php">
  				<div class="form-group mb-2">
   					 <input type="text" class="form-control" name="busquedaV" id="buscarVisitas" placeholder="Buscar">
 			 	</div>
  				 <div class="form-group mx-sm-3 mb-2">
					 <button type="submit" name="btnFiltro" class="btn btn-info form-control">Buscar</button>
				 </div>
			</form>
		</center>
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