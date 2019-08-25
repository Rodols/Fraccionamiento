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
                    <tr align=\"center\">
                            <th width=\"100\"><b>Registro</b></th>
                            <th width=\"120\"><b>Fecha de registro</b></th>
                            <th width=\"157\"><b>Nombre</b></th>
                            <th width=\"182\"><b>Visita a</b></th>
                            <th width=\"175\"><b>MotivoVisita</b></th>
                            <th width=\"168\"><b>Observaciones</b></th>
                            <th width=\"117\"><b>Imagenes</b></th>
                    </tr>
                </thead>
                <tbody >
                ";
}

while ($consulta = mysqli_fetch_array($resultados)) {
    

        echo
            "
            <tr align=\"center\" >
                            <td width=\"100\" nowrap>" . $consulta['usuario'] .'<br/>'.'<span class="titulo">'.$consulta['codigo'].' </span>'. "</td>
                            <td width=\"120\" nowrap>" . $consulta['fecha'].'<br/>'.'<span class="titulo">Entrada: </span>'.$consulta['entrada'] . "</td>
                            <td width=\"160\" nowrap>" . $consulta['nombre'] .'<br><span class="titulo">Placas: </span>'. $consulta['placas'] .'<br/>'.'<span class="titulo">'.'Vehículo:  </span>'.$consulta['vehiculo']." </td>
                            <td width=\"185\" nowrap>" . $consulta['nombre_ref'] . '<br/>'.
                            '<span class="titulo">'.'Dir. ' . $consulta['calle'] .' #'. $consulta['numero'] .'</span>'."</td>
                            <td width=\"175\" nowrap>" . $consulta['motivo_visita'] . "</td>
                            <td width=\"170\" nowrap>" . $consulta['observaciones_entrada'] . "</td>
                            <td width=\"120\" nowrap><a href='$consulta[imagen_rostro]'  name=\"foto_r\">* ImgRostro</a><br/>
                                <a href='$consulta[imagen_credencial]'  name=\"foto_c\">* ImgCredencial</a><br/>
                                <a href='$consulta[imagen_coche]'  name=\"foto_v\">* ImgCoche</a></td>
                    </tr>
            ";
    
}
}
?>
<?php include_once "cerrar_conexion.php"; ?>
