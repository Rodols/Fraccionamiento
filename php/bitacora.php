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
				<form class="form-inline text-center"  method="POST" action="bitacora.php">
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
						<button type="submit" name="btnFiltro" class="btn btn-info form-control">Buscar</button>
				    </div>
				</form>
		</center>
	</div>
	
	<div class="container-fluid ">
		
<?php
if (isset($_POST['btnFiltro'])) {
    $buscar_text = $_POST['busqueda'];
    $columna     = $_POST['selectBitacora'];
    include_once "abrir_conexion.php";

    if (($columna == "todos") && ($buscar_text == "")) {
        $resultados = mysqli_query($conexion, "SELECT * FROM $tabla_db3 ORDER By visitante DESC");
    }
    if (($columna != "todos") && ($buscar_text != "")) {
        $resultados = mysqli_query($conexion, "SELECT * FROM $tabla_db3  WHERE $columna = '$buscar_text' ORDER By visitante DESC ");
	}

	if($resultados){
		echo "
		<br><table class=\"table table-bordered table-striped table-sm table-hover\">
				 	<thead class=\"thead-dark\">
						<tr>
								<th width=\"85\"><b><center>Visitante</center></b></th>
								<th width=\"80\"><b><center>Usuario</center></b></th>
								<th width=\"150\"><b><center>Fecha de registro</center></b></th>
								<th width=\"160\"><b><center>Nombre</center></b></th>
								<th width=\"200\"><b><center>Visita a</center></b></th>
								<th \"100\"><b><center>Placas</center></b></th>
								<th width=\"200\"><b><center>MotivoVisita</center></b></th>
								<th width=\"200\"><b><center>Observaciones</center></b></th>
								<th width=\"130\"><b><center>Imagenes</center></b></th>
						</tr>
					</thead>
					<tbody >
					";
	}
	
    while ($consulta = mysqli_fetch_array($resultados)) {
		

            echo
                "
				<tr align=\"center\" >
								<td width=\"85\" nowrap>" . $consulta['visitante'] .'<br/>'.'<span class="titulo">'.$consulta['codigo'].' </span>'. "</td>
								<td width=\"80\" nowrap>" . $consulta['usuario'] . "</td>
								<td width=\"150\" nowrap>" . $consulta['fecha'].'<br/>'.'<span class="titulo">Entrada: </span>'.$consulta['entrada'] .'<br/>'.'<span class="titulo">Salida: </span>'.$consulta['salida'] . "</td>
								<td width=\"160\" nowrap>" . $consulta['nombre'] . "</td>
								<td width=\"200\" nowrap>" . $consulta['nombre_ref'] . '<br/>'.
								'<span class="titulo">'.'Dir. ' . $consulta['calle'] .' #'. $consulta['numero'] .'</span>'."</td>
								<td width=\"100\" nowrap>" . $consulta['placas'] . "</td>
								<td width=\"200\" nowrap>" . $consulta['motivo_visita'] . "</td>
								<td width=\"200\" nowrap>" . $consulta['observaciones'] . "</td>
								<td width=\"130\" nowrap><a href='$consulta[imagen_rostro]'  name=\"foto_r\">* ImgRostro</a><br/>
									<a href='$consulta[imagen_credencial]'  name=\"foto_c\">* ImgCredencial</a><br/>
									<a href='$consulta[imagen_coche]'  name=\"foto_v\">* ImgCoche</a></td>
						</tr>
				";
        
    }
    include_once "cerrar_conexion.php";
}

?>		</tbody>
		</table>
	</div>
	</div>
<?php
include_once '../plantillas/FinDocumento.inc.php';
?>
