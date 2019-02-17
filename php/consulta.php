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
			<h4 id="tabS" ><br>Registro de Salida</h4>
			<h5>Xalapa Ver, <?=$fechaActual;?></h5><br>
		</center>
<div class="row">
		<div class="col-md-5"></div>
	<div class="col-md-2">
	<center>
		<form method="POST" action="consulta.php">
			<div class="form-group">
				<label for="cod">Codigo</label>
				<input type="text" name="cod" required="" class="form-control" id="cod">
			</div>
		 	<input type="submit" value="Buscar" class="btn btn-info" name="btnConsulta"><br><br>
	</center>
	    </form>
	</div>

<div class="col-md-5"></div>
</div>
<?php
if (isset($_POST['btnConsulta'])) {
    $codigo = $_POST['cod'];
    if ($codigo != "") {
        include_once "abrir_conexion.php";
        $resultados = mysqli_query($conexion, "SELECT * FROM $tabla_db1 WHERE codigo = $codigo");

        while ($consulta = mysqli_fetch_array($resultados)) {

            if ($consulta[8] != "") {
    	  echo "
            <div class=\"row\">
				<div class=\"col-md-4\"></div>
				<div class=\"col-md-4\">
					<form method=\"POST\" action=\"consulta.php\">
						<div class=\"form-group\">
							<label for=\"codigo\">Codigo</label>
							<input type=\"text\" name=\"codigo\" value='$consulta[0]' readonly=\"readonly\" class=\"form-control\" id=\"codigo\">
						</div>
						<div class=\"form-group\">
							<label for=\"usuario\">Usuario</label>
							<input type=\"text\" name=\"usuario\" value='$consulta[1]' readonly=\"readonly\" class=\"form-control\" id=\"usuario\">
						</div>

						<div class=\"form-group\">
							<label for=\"fecha\">Fecha</label>
							<input type=\"text\" name=\"fecha\" value='$consulta[2]' readonly=\"readonly\" class=\"form-control\" id=\"fecha\">
						</div>
						<div class=\"form-group\">
							<label for=\"entrada\">Hora de entrada</label>
							<input type=\"text\" name=\"entrada\" value='$consulta[3]' readonly=\"readonly\" class=\"form-control\" id=\"entrada\">
						</div>
						<div class=\"form-group\">
							<label for=\"nombre\">Nombre visitante</label>
							<input type=\"text\" name=\"nombre\" value='$consulta[4]' readonly=\"readonly\" class=\"form-control\" id=\"nombre\">
						</div>
					
						<div class=\"form-group form-inline\" >
							<label for=\"calle\">Direcciòn</label><br>
							<input type=\"text\" name=\"calle\" value='$consulta[6]' readonly=\"readonly\" class=\"form-control form-inline\" id=\"calle\" size=\"28\">
							<input type=\"text\" name=\"numero\" value='$consulta[7]' readonly=\"readonly\" class=\"form-control form-inline\" id=\"numero\" size=\"8\">
						</div>
						<div class=\"form-group\">
							<label for=\"referencia\">Nombre referencia</label>
							<input type=\"text\" name=\"referencia\" value='$consulta[5]' readonly=\"readonly\" class=\"form-control\" id=\"referencia\">
						</div>
						<div class=\"form-group\">
							<label for=\"motivo\">Motivo de visita</label>
							<input type=\"text\" name=\"motivo\" value='$consulta[9]' readonly=\"readonly\" class=\"form-control\" id=\"motivo\">
						</div>
						<div class=\"form-group\">
							<label for=\"observacion\">Observaciones</label>
							<input type=\"text\" name=\"observacion\" value='$consulta[10]' class=\"form-control\" id=\"observacion\">
						</div>
						<div class=\"form-group form-inline\">
							<label for=\"foto_c\">Foto-Rostro</label><br>
							<input type=\"text\" readonly=\"readonly\" name=\"foto_r\" value='$consulta[11]' class=\"form-control\" ><br>
							<img src='$consulta[11]'  width=\"400\" heigth=\"600\" name=\"foto_r\" />
						</div>
						<div class=\"form-group form-inline\">
							<label for=\"foto_r\">Foto-Credencial</label><br>
							<input type=\"text\" readonly=\"readonly\" name=\"foto_c\" value='$consulta[12]' class=\"form-control\" ><br>
							<img src='$consulta[12]'  width=\"400\" heigth=\"600\" name=\"foto_c\" />
						</div>
						<div class=\"form-group\">
							<label for=\"placas\">Placas</label>
							<input type=\"text\" name=\"placas\" value='$consulta[8]' readonly=\"readonly\" class=\"form-control\" id=\"placas\">
						</div>
						<div class=\"form-group form-inline\">
							<label for=\"foto_v\">Foto-Vehiculo</label><br>
							<input type=\"text\" readonly=\"readonly\" name=\"foto_v\" value='$consulta[13]' class=\"form-control\" ><br>
							<img src='$consulta[13]'  width=\"400\" heigth=\"600\" name=\"foto_v\" />
						</div>
						<center>
		 					<br><input type=\"submit\" value=\"Salida\" class=\"btn btn-danger\" name=\"btnSalida\"><br><br>
		 				</center>
				    </form>
				</div>
			</div>
		</div>		
					";
            } else {	
				
    	 echo"
		<div class=\"row\">
			<div class=\"col-md-4\"></div>
			<div class=\"col-md-4\">
					<form method=\"POST\" action=\"consulta.php\">
						<div class=\"form-group\">
							<label for=\"codigo\">Codigo</label>
							<input type=\"text\" name=\"codigo\" value='$consulta[0]' readonly=\"readonly\" class=\"form-control\" id=\"codigo\">
						</div>
						<div class=\"form-group\">
							<label for=\"usuario\">Usuario</label>
							<input type=\"text\" name=\"usuario\" value='$consulta[1]' readonly=\"readonly\" class=\"form-control\" id=\"usuario\">
						</div>
						<div class=\"form-group\">
							<label for=\"fecha\">Fecha</label>
							<input type=\"text\" name=\"fecha\" value='$consulta[2]' readonly=\"readonly\" class=\"form-control\" id=\"fecha\">
						</div>
						<div class=\"form-group\">
							<label for=\"entrada\">Hora de entrada</label>
							<input type=\"text\" name=\"entrada\" value='$consulta[3]' readonly=\"readonly\" class=\"form-control\" id=\"entrada\">
						</div>
						<div class=\"form-group\">
							<label for=\"nombre\">Nombre de visitante</label>
							<input type=\"text\" name=\"nombre\" value='$consulta[4]' readonly=\"readonly\" class=\"form-control\" id=\"nombre\">
						</div>
						<div class=\"form-group\">
							<label for=\"referencia\">Persona a quien visita</label>
							<input type=\"text\" name=\"referencia\" value='$consulta[5]' readonly=\"readonly\" class=\"form-control\" id=\"referencia\">
						</div>
						<div class=\"form-group form-inline\" >
							<label for=\"calle\">Direcciòn</label><br>
							<input type=\"text\" name=\"calle\" value='$consulta[6]' readonly=\"readonly\" class=\"form-control form-inline\" id=\"calle\" size=\"28\">
							<input type=\"text\" name=\"numero\" value='$consulta[7]' readonly=\"readonly\" class=\"form-control form-inline\" id=\"numero\" size=\"8\">
						</div>
						<div class=\"form-group\">
							<label for=\"motivo\">Motivo de visita</label>
							<input type=\"text\" name=\"motivo\" value='$consulta[9]' readonly=\"readonly\" class=\"form-control\" id=\"motivo\">
						</div>
						<div class=\"form-group\">
							<label for=\"observacion\">Observaciones</label>
							<input type=\"text\" name=\"observacion\" value='$consulta[10]' class=\"form-control\" id=\"observacion\">
						</div>
						<div class=\"form-group form-inline\">
							<label for=\"foto_r\">Captura-Rostro</label><br>
							<input type=\"text\" readonly=\"readonly\" name=\"foto_r\" value='$consulta[11]' class=\"form-control\" ><br>
							<img src='$consulta[11]'  width=\"400\" heigth=\"600\" name=\"foto_r\" />
						</div>
						<div class=\"form-group form-inline\">
							<label for=\"foto_c\">Captura-Credencial</label><br>
							<input type=\"text\" readonly=\"readonly\" name=\"foto_c\" value='$consulta[12]' class=\"form-control\" ><br>
							<img src='$consulta[12]'  width=\"400\" heigth=\"600\" name=\"foto_c\" />
						</div>
						<center>
		 					<br><input type=\"submit\" value=\"Salida\" class=\"btn btn-danger\" name=\"btnSalida\"><br><br>
		 				</center>
			    </form>
			</div>
		</div>
	</div>
	";
				echo "<br>";
			
            }
        }

    }
    include_once "cerrar_conexion.php";
}

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