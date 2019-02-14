<?php
session_start();
ob_start();
if ($_SESSION['session_exito'] != 1) {
    //require 'index.php';
    header('Location:../index.php');
}
include_once '../plantillas/InicioDocumento.inc.php';
include_once '../plantillas/BarraNavegacion.inc.php';
?>
<center>
			<h2>Historial de visitas</h2>
			<h4><b>Xalapa Ver, <?=$fechaActual;?></b></h4><br>
			<form class="form-inline" method="POST" action="bitacora.php">
  <div class="form-group">
    <input type="text" class="form-control" name="busqueda" id="busqueda" placeholder="Buscar">
  </div>
  <div class="form-group">
    	    <select id="selectBitacora" name="selectBitacora">
                <option value="todos" >MostrarTodos</option>
                <option value="usuario" >BuscarEnUsuario</option>
                 <option value="fecha" >BuscarEnFecha</option>
                <option value="nombre" >BuscarEnNombreVisitante</option>
                <option value="calle" >BuscarEnCalle</option>
                <option value="placas" >Placas</option>
            </select>
  </div>
   <button type="submit" name="btnFiltro" class="btn btn-info">Buscar</button>
</form>
		</center>
 <div class="row">
	<div class="col-md-4">
				</div>
	<div class="col-md-4">


</div>

<div class="col-md-4"></div>
</div>
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
    while ($consulta = mysqli_fetch_array($resultados)) {
        if ($consulta['placas'] != "") {
            echo
                "
				 <br><table class=\"table\" >
						<tr bgcolor=\"#11B1F7\">
								<th><b><center>Visitante</center></b></th>
								<th><b><center>Usuario</center></b></th>
								<th><b><center>Fecha de registro</center></b></th>
								<th><b><center>Nombre</center></b></th>
								<th><b><center>Visita a</center></b></th>
								<th><b><center>Dirección que visita</center></b></th>
								<th><b><center>Placas</center></b></th>
								<th><b><center>MotivoVisita</center></b></th>
								<th><b><center>Observaciones</center></b></th>
								<th><b><center>CapturaRostro</center></b></th>
								<th><b><center>CapturaCredencial</center></b></th>
								<th><b><center>CapturaVehiculo</center></b></th>
						</tr>
						<tr align=\"center\">
								<td width=\"85\" nowrap>" . $consulta['visitante'] .'<br/>'.'<span class="titulo">'.$consulta['codigo'].' </span>'. "</td>
								<td width=\"90\" nowrap>" . $consulta['usuario'] . "</td>
								<td width=\"140\" nowrap>" . $consulta['fecha'].'<br/>'.'<span class="titulo">Entrada: </span>'.$consulta['entrada'] .'<br/>'.'<span class="titulo">Salida: </span>'.$consulta['salida'] . "</td>
								<td width=\"170\" nowrap>" . $consulta['nombre'] . "</td>
								<td width=\"170\" nowrap>" . $consulta['nombre_ref'] . "</td>
								<td width=\"170\" nowrap>" . $consulta['calle'] .' #'. $consulta['numero'] ."</td>
								<td width=\"100\" nowrap>" . $consulta['placas'] . "</td>
								<td width=\"200\" nowrap>" . $consulta['motivo_visita'] . "</td>
								<td width=\"230\" nowrap>" . $consulta['observaciones'] . "</td>
								<td width=\"200\" nowrap><img src='$consulta[imagen_rostro]'  width=\"200\" heigth=\"300\" name=\"foto_r\" /></td>
								<td width=\"200\" nowrap><img src='$consulta[imagen_credencial]'  width=\"200\" heigth=\"300\" name=\"foto_c\" /></td>
								<td width=\"200\" nowrap><img src='$consulta[imagen_coche]'  width=\"200\" heigth=\"300\" name=\"foto_v\" /></td>
				    	</tr>
					</table>
				";
        } else {
            echo "
    	 <br><table class=\"table\" >
						<tr bgcolor=\"#11B1F7\">
						<th><b><center>Visitante</center></b></th>
						<th><b><center>Usuario</center></b></th>
						<th><b><center>Fecha de registro</center></b></th>
						<th><b><center>Nombre</center></b></th>		
						<th><b><center>Visita a</center></b></th>
						<th><b><center>Dirección que visita</center></b></th>
						<th><b><center>MotivoVisita</center></b></th>
						<th><b><center>Observaciones</center></b></th>
						<th><b><center>CapturaRostro</center></b></th>
						<th><b><center>CapturaCredencial</center></b></th>
						</tr>
						<tr align=\"center\">
						<td width=\"85\" nowrap>" . $consulta['visitante'] . '<br/>'.'<span class="titulo">'.$consulta['codigo'].' </span>'."</td>
						<td width=\"90\" nowrap>" . $consulta['usuario'] . "</td>
						<td width=\"140\" nowrap>" . $consulta['fecha'] .'<br/>'.'Entrada: '.$consulta['entrada'] .'<br/>'.'Salida: '.$consulta['salida'] . "</td>
						<td width=\"170\" nowrap>" . $consulta['nombre'] . "</td>
						<td width=\"170\" nowrap>" . $consulta['nombre_ref'] . "</td>
						<td width=\"170\" nowrap>" . $consulta['calle'] .' #'. $consulta['numero'] ."</td>
						<td width=\"200\" nowrap>" . $consulta['motivo_visita'] . "</td>
						<td width=\"230\" nowrap>" . $consulta['observaciones'] . "</td>
						<td width=\"200\" nowrap><img src='$consulta[imagen_rostro]'  width=\"200\" heigth=\"300\" name=\"foto_r\" /></td>
						<td width=\"200\" nowrap><img src='$consulta[imagen_credencial]'  width=\"200\" heigth=\"300\" name=\"foto_c\" /></td>
				    	</tr>
					</table>
    	";
        }
    }
    include_once "cerrar_conexion.php";
}

?>
<?php
include_once '../plantillas/FinDocumento.inc.php';
?>