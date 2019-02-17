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

<div role="tabpanel" class="tab-pane" id="test_1">
	<div class="container-fluid">
		<center>
			<h4 id="tabB"><br>Historial de visitas (Xalapa Ver, <?=$fechaActual;?>)</h4><br>
				<form class="form-inline text-center" id="formBuscar" method="POST" action="bitacora.php">
  					<div class="form-group mb-2">
    					<input type="text" class="form-control" name="busqueda" id="busqueda"  placeholder="Buscar">
 		 			</div>
  					<div class="form-group mx-sm-3 mb-2">
    	   				 <select class="form-control" id="selectBitacora" name="selectBitacora">
                			<option value="todos" >MostrarTodos</option>
                			<option value="usuario" >BuscarEnUsuario</option>
                 			<option value="fecha" >BuscarEnFecha</option>
                			<option value="nombre" >BuscarEnNombreVisitante</option>
                			<option value="calle" >BuscarEnCalle</option>
                			<option value="placas" >Placas</option>
            			</select>
				    </div>
				    <div class="form-group mb-2">
						<button type="submit"  name="btnFiltro" id="btnfiltro" class="btn btn-info form-control">Buscar</button>
				    </div>
				</form>
		</center>
	</div>
	
	<div class="container-fluid ">
	<div id="visitantesTabla"></div>
	
<script src="../Js/bitacora.js"></script>
<?php include_once '../plantillas/FinDocumento.inc.php'; ?>
