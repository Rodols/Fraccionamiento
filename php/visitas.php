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
			<h2>Visitas dentro del fraccionamiento</h2>
			<h4><b>Xalapa Ver, <?=$fechaActual;?></b></h4><br>
			<form class="form-inline" method="POST" action="visitas.php">
  <div class="form-group">
    <input type="text" class="form-control" name="buscarVisitas" id="buscarVisitas" placeholder="Buscar">
  </div>
  <div class="form-group">
    	    <select id="selectBusqueda" name="selectBusqueda">
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
	/* ESto es para abriri y cerrar la pesataña del arduino wifi
	echo "
	<script>
	ventana = window.open(\"http://192.168.1.82/LED=ON\", \"nuevo\", \"width=400,height=400\");
	setTimeout(cerrarVentana,1000);
	function cerrarVentana(){
		ventana.close();
   }
   </script>
   ";
   */

    $buscar_text = $_POST['buscarVisitas'];
    $columna     = $_POST['selectBusqueda'];
    include_once "abrir_conexion.php";

    if (($columna == "todos") && ($buscar_text == "")) {
        $resultados = mysqli_query($conexion, "SELECT * FROM $tabla_db1 ORDER BY fecha DESC");
    }
    if (($columna != "todos") && ($buscar_text != "")) {
        $resultados = mysqli_query($conexion, "SELECT * FROM $tabla_db1  WHERE $columna = '$buscar_text' ORDER BY fecha DESC ");
    }
    while ($consulta = mysqli_fetch_array($resultados)) {
        if ($consulta['placas'] != "") {
            echo
                "
				 <br><table class=\"table\" >
							<tr bgcolor=\"#11B1F7\">
								<th><b><center>Gafete</center></b></th>
								<th><b><center>Usuario</center></b></th>
								<th><b><center>Entrada</center></b></th>
								<th><b><center>Nombre</center></b></th>
								<th><b><center>Visita a</center></b></th>
								<th><b><center>Placas</center></b></th>
								<th><b><center>MotivoVisita</center></b></th>
								<th><b><center>Observaciones</center></b></th>
								<th><b><center>Imagenes</center></b></th>
							</tr>
							<tr align=\"center\">
								<td width=\"85\" nowrap>". '<span class="titulo">'. $consulta['codigo'] .'</span>'. "</td>
								<td width=\"90\" nowrap>" . $consulta['usuario'] . "</td>
								<td width=\"100\" nowrap>" . $consulta['fecha'] .'<br/>'.'<span class="titulo">'. $consulta['entrada'] .'</span>'."</td>
								<td width=\"170\" nowrap>". $consulta['nombre'] ."</td>
								<td width=\"170\" nowrap>".$consulta['nombre_ref'].'<br/> '.'<span class="titulo">' . $consulta['calle'] .' #'. $consulta['numero'].'</span>'."</td>
								<td width=\"100\" nowrap>" . $consulta['placas'] . "</td>
								<td width=\"225\" nowrap>" . $consulta['motivo_visita'] . "</td>
								<td width=\"240\" nowrap>" . $consulta['observaciones'] . "</td>
								<td width=\"150\" nowrap><a href='$consulta[imagen_rostro]'  name=\"foto_r\" />ImagenRostro</a><br/>
								  <a href='$consulta[imagen_credencial]'  name=\"foto_c\" />ImagenCredencial</a><br/>
								  <a href='$consulta[imagen_coche]'  name=\"foto_v\" />ImagenCoche</a></td>
				    		</tr>
					</table>
				";
        } else {
            echo "
    	 		<br><table class=\"table\" >
						<tr bgcolor=\"#11B1F7\">
							<th><b><center>Gafete</center></b></th>
							<th><b><center>Usuario</center></b></th>
							<th><b><center>Entrada</center></b></th>
							<th><b><center>Nombre</center></b></th>
							<th><b><center>Visita a</center></b></th>
							<th><b><center>Placas</center></b></th>
							<th><b><center>MotivoVisita</center></b></th>
							<th><b><center>Observaciones</center></b></th>
							<th><b><center>Imagenes</center></b></th>

						</tr>
						<tr align=\"center\">
							<td width=\"85\" nowrap>" . '<span class="titulo">'. $consulta['codigo'] .'</span>'. "</td>
							<td width=\"90\" nowrap>" . $consulta['usuario'] . "</td>
							<td width=\"100\" nowrap>" . $consulta['fecha'] .'<br/>'.'<span class="titulo">'. $consulta['entrada'] .'</span>'."</td>
							<td width=\"170\" nowrap>" . $consulta['nombre'] . "</td>
							<td width=\"170\" nowrap>".$consulta['nombre_ref'].'<br/>'.'<span class="titulo">' . $consulta['calle'] .' #'. $consulta['numero'] .'.</span>'."</td>
							<td width=\"100\" nowrap>" . 'Sin vehiculo'. "</td>
							<td width=\"225\" nowrap>" . $consulta['motivo_visita'] . "</td>
							<td width=\"240\" nowrap>" . $consulta['observaciones'] . "</td>
							<td width=\"150\" nowrap><a href='$consulta[imagen_rostro]' name=\"foto_r\" />ImagenRostro</a><br/>
							  <a href='$consulta[imagen_credencial]' name=\"foto_c\" />ImagenCredencial</a></td>
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