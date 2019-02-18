<?php
$buscarText=$_POST['busquedaV'];
if(isset($buscarText)){
    include_once "abrir_conexion.php";

    if (($buscarText == "")) {
        $resultados = mysqli_query($conexion, "SELECT * FROM $tabla_db1 ORDER By fecha DESC");
    }
    if ($buscarText != "") {
        $resultados = mysqli_query($conexion, "SELECT * FROM $tabla_db1  WHERE  
            $tabla_db1.usuario LIKE '%". $buscarText ."%' OR
            $tabla_db1.nombre LIKE '%". $buscarText ."%' OR
            $tabla_db1.codigo LIKE '%". $buscarText ."%' OR
            $tabla_db1.placas LIKE '%". $buscarText ."%' OR
            $tabla_db1.fecha LIKE '%". $buscarText ."%' ORDER By fecha DESC ");
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
                            <th width=\"170\"><b><center>MotivoVisita</center></b></th>
                            <th width=\"170\"><b><center>Observaciones</center></b></th>
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
                            <td width=\"150\" nowrap>" . $consulta['fecha'].'<br/>'.'<span class="titulo">Entrada: </span>'.$consulta['entrada'] . "</td>
                            <td width=\"160\" nowrap>" . $consulta['nombre'] . "</td>
                            <td width=\"200\" nowrap>" . $consulta['nombre_ref'] . '<br/>'.
                            '<span class="titulo">'.'Dir. ' . $consulta['calle'] .' #'. $consulta['numero'] .'</span>'."</td>
                            <td width=\"100\" nowrap>" . $consulta['placas'] . "</td>
                            <td width=\"170\" nowrap>" . $consulta['motivo_visita'] . "</td>
                            <td width=\"170\" nowrap>" . $consulta['observaciones'] . "</td>
                            <td width=\"130\" nowrap><a href='$consulta[imagen_rostro]'  name=\"foto_r\">* ImgRostro</a><br/>
                                <a href='$consulta[imagen_credencial]'  name=\"foto_c\">* ImgCredencial</a><br/>
                                <a href='$consulta[imagen_coche]'  name=\"foto_v\">* ImgCoche</a></td>
                    </tr>
            ";
    
}
}
?>
<?php include_once "cerrar_conexion.php"; ?>
