<?php
$codigo = $_POST['codigo'];
if (isset($codigo)) {
	
	$nombre_ref    = $_POST['referencia'];
	$operario      = $_POST['operario'];
	$codigo      = $_POST['codigo'];
    $fecha       = $_POST['fecha'];
    $entrada     = $_POST['entrada'];
    $nombre      = $_POST['nombre'];
	$calle       = $_POST['calle'];
    $numero      = $_POST['numero'];
    $motivo      = $_POST['motivo'];
	$observacion_entrada = $_POST['obentrada'];
	$observacion_salida = $_POST['obsalida'];

		if(isset($_POST['placas'])){
			$placas      = $_POST['placas'];
		}else{
			$placas="sin vehiculo";
		}

		if(isset($_POST['vehiculo'])){
			$vehiculo      = $_POST['vehiculo'];
		}else{
			$vehiculo="sin vehiculo";
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
				visitante,codigo,usuario,fecha,entrada,salida,nombre,nombre_ref,calle,numero,placas,vehiculo,motivo_visita,observaciones_entrada,observaciones_salida,
				imagen_rostro,imagen_credencial,imagen_coche)
				 values (NULL,'$codigo','$operario','$fecha','$entrada',NOW(),'$nombre','$nombre_ref','$calle','$numero','$placas','$vehiculo','$motivo',
				 '$observacion_entrada','$observacion_salida','$foto_r','$foto_c','$foto_v')");

    if ($respuesta==true) {
        mysqli_query($conexion, "DELETE FROM $tabla_db1 WHERE codigo = $codigo");
        include_once "cerrar_conexion.php";
        echo "
					<h4>Salida registrada en Bitacora!</h4><br>
					<h5>Ingresa un nuevo codigo....</h5>
		";
    } else {
        echo "
					<h4>Ocurrio un error ..vuelve a intentarlo por favor!</h4>
		";
    }
}
?>
