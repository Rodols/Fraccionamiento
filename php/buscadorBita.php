<?php
$buscarText=$_POST['busquedaB'];
if(isset($buscarText)){
    include_once "abrir_conexion.php";

    if (($buscarText == "")) {
        $resultados = mysqli_query($conexion, "SELECT * FROM $tabla_db3 ORDER By visitante DESC");
    }
    if ($buscarText != "") {
        $resultados = mysqli_query($conexion, "SELECT * FROM $tabla_db3  WHERE  
            $tabla_db3.usuario LIKE '%". $buscarText ."%' OR
            $tabla_db3.nombre LIKE '%". $buscarText ."%' OR
            $tabla_db3.codigo LIKE '%". $buscarText ."%' OR
            $tabla_db3.placas LIKE '%". $buscarText ."%' OR
            $tabla_db3.fecha LIKE '%". $buscarText ."%' ORDER By visitante DESC ");
	}


if($resultados){
    echo "
    <table class=\"table table-bordered table-striped table-sm table-hover\">
                 <thead class=\"thead-dark\">
                    <tr>
                            <th width=\"75\"><b><center>Registro</center></b></th>
                            <th width=\"117\"><b><center>Fecha de registro</center></b></th>
                            <th width=\"152\"><b><center>Nombre</center></b></th>
                            <th width=\"150\"><b><center>Visita a</center></b></th>
                            <th width=\"170\"><b><center>MotivoVisita</center></b></th>
                            <th width=\"180\"><b><center>Observaciones</center></b></th>
                            <th width=\"120\"><b><center>Imagenes</center></b></th>
                    </tr>
                </thead>
                <tbody >
                ";
}

while ($consulta = mysqli_fetch_array($resultados)) {
    

        echo
            "
            <tr align=\"center\" >
                            <td width=\"80\" nowrap>" . $consulta['visitante'] .'<br/>'.'<span class="titulo">'.$consulta['codigo'].' </span>'.'<br>'.  $consulta['usuario'] ."</td>
                            <td width=\"125\" nowrap>" . $consulta['fecha'].'<br/>'.'<span class="titulo">Entrada: </span>'.$consulta['entrada'] .'<br/>'.'<span class="titulo">Salida: </span>'.$consulta['salida'] . "</td>
                            <td width=\"160\" nowrap>" . $consulta['nombre'] .'<br><span class="titulo">Placas: </span>'. $consulta['placas'] .'<br/>'.'<span class="titulo">'.'Vehículo:  </span>'.$consulta['vehiculo']." </td>
                            <td width=\"160\" nowrap>" . $consulta['nombre_ref'] . '<br/>'.
                            '<span class="titulo">'.'Dir. ' . $consulta['calle'] .' #'. $consulta['numero'] .'</span>'."</td>
                            <td width=\"170\" nowrap>" . $consulta['motivo_visita'] . "</td>
                            <td width=\"190\" nowrap>" ."<span class='titulo'>Entrada: </span>". $consulta['observaciones_entrada'] ."<br> <span class='titulo'>Salida: </span>".$consulta['observaciones_salida']. "</td>
                            <td width=\"130\" nowrap><a href='$consulta[imagen_rostro]'  name=\"foto_r\">* ImgRostro</a><br/>
                                <a href='$consulta[imagen_credencial]'  name=\"foto_c\">* ImgCredencial</a><br/>
                                <a href='$consulta[imagen_coche]'  name=\"foto_v\">* ImgCoche</a></td>
                    </tr>
            ";
    
}
}
?>
<?php include_once "cerrar_conexion.php"; ?>
