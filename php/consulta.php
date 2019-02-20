<?php
session_start();
ob_start();
if ($_SESSION['session_exito'] != 1) {
    //require 'index.php';
    header('Location:../index.php');
} else {
	include_once '../plantillas/InicioDocumento.inc.php';
	?>
	<body onload="VistaSalida();">
   <?php include_once '../plantillas/BarraNavegacion.inc.php';
}
?>

	<div class="container-fluid">
			<center>
			<h4 id="tabS" ><br>Registro de salida (Xalapa Ver, <?=$fechaActual;?>)</h4><br>
			
			<div class="row">
				<div class="col-md-3">
					<form method="POST" class="form-inline" id="formSalida" action="consulta.php">
						<div class="form-group mx-sm-3 mb-2">
							<input type="text" name="textoCod" size="13"  placeholder="Ingresa el codigo" required="" class="form-control" id="textoCod">
						</div>
		 				<input type="submit" value="Buscar" class="btn btn-info mb-2" name="btnConsulta">
		   			</form>
				</div>
				<div class="col-md-6">
					<div id="formVistaSalida"></div>
				</div>
			</div>
			</center>
	</div>
<script src="../Js/salida.js"></script>
<?php
include_once '../plantillas/FinDocumento.inc.php';
?>