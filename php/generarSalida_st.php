<?php
if (isset($_POST['cod'])) {
    $codigo      = $_POST['cod'];
    $vigilante = $_POST['vigilante'];
    $nombre      = $_POST['nombre'];
    $nombre_ref  = $_POST['nombre_referencia'];
    $calle       = $_POST['select1'];
    $numero      = $_POST['select2'];
    $placas      = $_POST['placas'];
    $vehiculo      = $_POST['vehiculo'];
    $motivo      = $_POST['motivo'];
    $observacion = $_POST['observacion'];

    $observacion_entrada="SnTarjeta";
    $alerta="snt";
  
    $nameImageV = $_FILES['ImgCoche']['name'];
    if($nameImageV!=""){
        $rutaV      = $_FILES['ImgCoche']['tmp_name'];
        $destinoV   = "../Fotos/" . $nameImageV;
        copy($rutaV, $destinoV);
    }

    $nameImageR = $_FILES['imagen_rostro']['name'];
    if($nameImageR!=""){
        $rutaR      = $_FILES['imagen_rostro']['tmp_name'];
        $destinoR   = "../Fotos/" . $nameImageR;
        copy($rutaR, $destinoR);
    }

    $nameImageC = $_FILES['imagen_credencial']['name'];
    if($nameImageC!=""){
        $rutaC      = $_FILES['imagen_credencial']['tmp_name'];
        $destinoC   = "../Fotos/" . $nameImageC;
        copy($rutaC, $destinoC);
    }
    
    if ($motivo == "") {
        $motivo = "Visita";
    }

    if (($numero != "") && ($codigo != "") && ($nombre != "") && ($motivo != "")) {
        include_once "abrir_conexion.php";

        $registradoBd = $conexion->query("INSERT INTO $tabla_db3 (
            	visitante,codigo,usuario,fecha,entrada,salida,nombre,nombre_ref,calle,numero,placas,vehiculo,motivo_visita,observaciones_entrada,observaciones_salida,alerta,
				imagen_rostro,imagen_credencial,imagen_coche)
				 values (NULL,'$codigo','$vigilante',NOW(),NOW(),NOW(),'$nombre','$nombre_ref','$calle','$numero','$placas','$vehiculo','$motivo',
				 '$observacion_entrada','$observacion','$alerta','$destinoR','$destinoC','$destinoV')");
        if ($registradoBd==true){
            echo "1";
        } else {
        $buscarGafete = mysqli_query($conexion, "SELECT * FROM $tabla_db1 WHERE codigo = $codigo");
        while ($encontrado = mysqli_fetch_array($buscarGafete)) {
        if(isset($encontrado[0])){
            echo "2";
        }
        }

        }
    } else {
        echo "3";
    }
}
?>