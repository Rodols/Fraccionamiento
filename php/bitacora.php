<?php
session_start();
ob_start();
if ($_SESSION['session_exito'] != 1) {
    //require 'index.php';
    header('Location:../index.php');
}
include_once '../plantillas/InicioDocumento.inc.php';
?>
<body onload="VistaBitacora();">
<?php include_once '../plantillas/BarraNavegacion.inc.php';?>

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-4"></div>
			 <div class="col-md-4">
				<center>
					<h4 id="tabB"><br>Historial de visitas <br> (Xalapa Ver, <?=$fechaActual;?>)</h4><br>
					<form class="form-inline justify-content-center" id="formBuscarBita" method="POST" action="bitacora.php">
  						<div class="form-group mb-2 ">
    						<input type="text" class="form-control" name="busquedaB" id="buscarBitacora"  placeholder="Buscar">
 		 				</div>
  						<div class="form-group mx-sm-3 mb-2">
							<button type="submit"  name="btnFiltro" id="btnfiltro" class="btn btn-info form-control">Buscar</button>
				    	</div>
					</form>
				</center>
			</div>
			<div class="col-md-4 ayuda">
				<div class="card text-white bg-dark mb-2" style="max-width: 15rem;">
  					<div class="card-header"><h5 class="card-title">¿Como buscar?</h5></div>
  					<div class="card-body">
    					<p class="card-text">Puedes "Buscar" por <span class="textAyuda"> codigo, usuario, fecha, nombre, placas.</span></p>
 					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="container-fluid ">
 		<div id="bitacoraTabla"></div>
	</div>
<script src="../Js/bitacora.js"></script>
<?php include_once '../plantillas/FinDocumento.inc.php'; ?>
