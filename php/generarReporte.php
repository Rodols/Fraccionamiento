<?php
$clave=$_POST['clave'];
if($clave=="reporte"){
    include_once "abrir_conexion.php"; 
      //Query para crear Reporte
    $sql=( "SELECT * FROM $tabla_db3 ORDER By visitante DESC");
    $reporteXls= mysqli_query($conexion,$sql);

    if (mysqli_num_rows($reporteXls)>0) {
?>
        <table>
           <tr>
                   <th >Visitante</th>
                   <th >Usuario</th>
                   <th >Fecha de registro</th>
                   <th >Nombre</th>
                   <th >Visita a</th>
                   <th >Placas</th>
                   <th >MotivoDeVisita</th>
                   <th >Observaciones</th>
           </tr>
 <?php
while ($row = mysqli_fetch_array($reporteXls))
    { 
        ?>
         <tr >
                <td ><?= $row['visitante'];?></td>
                <td ><?= $row["usuario"];?></td>
                <td ><?= $row["fecha"];?></td>
                <td ><?= $row["entrada"];?></td>
                <td ><?= $row["salida"];?></td>
                <td ><?= $row["placas"];?></td>
                <td ><?= $row["motivo_visita"];?></td>
                <td ><?= $row["observaciones"];?></td>
        </tr>       
<?php
    }
     
}     ?>
    </table>
 <?php
 include_once "cerrar_conexion.php";
}
?>
