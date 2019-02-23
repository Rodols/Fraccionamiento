<?php
if (isset($_POST['codigo'])) {
	
	$nombre_ref    = $_POST['referencia'];
	$operario      = $_POST['operario'];
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
				 values (Null,'$codigo','$operario','$fecha','$entrada',NOW(),'$nombre','$nombre_ref','$calle','$numero','$placas','$motivo',
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
