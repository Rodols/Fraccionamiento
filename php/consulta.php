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
		<center>
			<h4 id="tabS" ><br>Registro de salida (Xalapa Ver, <?=$fechaActual;?>)</h4><br>
		</center>
<div class="row">
		<div class="col-md-5"></div>
	<div class="col-md-2">
	<center>
		<form method="POST" id="formSalida" action="consulta.php">
			<div class="form-group">
				<label for="cod">Codigo</label>
				<input type="text" name="textoCod" required="" class="form-control" id="textoCod">
			</div>
		 	<input type="submit" value="Buscar" class="btn btn-info" name="btnConsulta"><br><br>
	</center>
	    </form>
	</div>

<div class="col-md-5"></div>
</div>

<div class="container-fluid">
	<div id="formVistaSalida"></div>
	</div>
<script src="../Js/salida.js"></script>
<?php
if (isset($_POST['btnSalida'])) {
	
	$nombre_ref      	 = $_POST['referencia'];
	$codigo      = $_POST['codigo'];
    $fecha       = $_POST['fecha'];
    $entrada     = $_POST['entrada'];
    $nombre      = $_POST['nombre'];
	$calle       = $_POST['calle'];
    $numero      = $_POST['numero'];
    $motivo      = $_POST['motivo'];
	$observacion = $_POST['observacion'];

		if(isset($_POST['placas'])){
			$placas      = $_POST['placas'];
		}else{
			$placas="sin vehiculo";
		}

		if(isset($_POST['foto_c'])){
			$foto_c      = $_POST['foto_c'];
		}else{
			$foto_c="sin foto";
		}
		if (isset($_POST['foto_r'])){
			$foto_r      = $_POST['foto_r'];
		}else{
			$foto_r="sin foto";
		}
	
		if (isset($_POST['foto_v'])){
			$foto_v      = $_POST['foto_v'];
		}else{
			$foto_v="sin foto";
		}
		
		include_once "abrir_conexion.php";

	
	 $respuesta = $conexion->query("INSERT INTO $tabla_db3 (
				visitante,codigo,usuario,fecha,entrada,salida,nombre,nombre_ref,calle,numero,placas,motivo_visita,observaciones,
				imagen_rostro,imagen_credencial,imagen_coche)
				 values (Null,'$codigo','$user','$fecha','$entrada',NOW(),'$nombre','$nombre_ref','$calle','$numero','$placas','$motivo',
				 '$observacion','$foto_r','$foto_c','$foto_v')");

    if ($respuesta==true) {
        mysqli_query($conexion, "DELETE FROM $tabla_db1 WHERE codigo = $codigo");
        include_once "cerrar_conexion.php";
        echo "
					<script>
				alert(\"Los datos fueron registrados la Bitacora!\")
				</script>
		";
    } else {
        echo "
					<script>
				alert(\"Ocurrio un error ..vuelve a intentarlo por favor!\")
				</script>
		";
    }
}
?>
<?php
include_once '../plantillas/FinDocumento.inc.php';
?>