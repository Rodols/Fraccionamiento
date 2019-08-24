<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,user-scalable=no, initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0">
 
  <link rel="stylesheet" type="text/css" href="../Css/bootstrap.min.css" media="screen" />
 <link rel="stylesheet" type="text/css" href="../Css/estiloPdf.css" media="screen" />
  <title>Document</title>
</head>
<body>
  <div id="encabezado"><h1>Historial de visitas (Fracc. Real del bosque)</h1></div>

<div id="ListaVisitas">
<?php
    include_once "abrir_conexion.php"; 
      //Query para crear Reporte
    $sql=( "SELECT * FROM $tabla_db3 ORDER By visitante DESC");
    $resultado= mysqli_query($conexion,$sql);
    if (mysqli_num_rows($resultado)>0) {
?>      
           <hr>
           <?php
while ($row = mysqli_fetch_array($resultado))
    { 
        ?>
        
                <p><span class="rubros"><?=$row['visitante']?></span>
                Nombre:<span class="rubros"><?=$row['nombre']?>,</span> 
                  User:<?=$row['usuario']?>
                  , Fecha:<?=$row['fecha']?>
                  , Entrada:<?=$row['entrada']?>
                  , Salida:<?=$row['salida']?><br>
                &nbsp; &nbsp; &nbsp; &nbsp;Visita a: <?=$row['nombre_ref']?>
                 Placas: <?=$row['placas']?>
                 Vehiculo: <?=$row['vehiculo']?>
                Observaciones: <?=$row['observaciones']?>, MotivoDeVisita: <?=$row['motivo_visita']?></p><hr>
                  
             <?php  
    }?>

     <?php }?>
          
</div>
</body>
</html>