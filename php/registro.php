<?php
session_start();
ob_start();
if ($_SESSION['session_exito'] != 1) {
    //require 'index.php';
    header('Location:../index.php');
} else {
    include_once '../plantillas/InicioDocumento.inc.php';
    include_once '../plantillas/BarraNavegacion.inc.php';
}
?>
        <center>
            <h2><strong>Registro de Entrada</strong></h2>
            <h4><strong>Xalapa Ver,a <?=$fechaActual;?></strong></h4><br>
        </center>
 <div class="row">
    <div class="col-md-4">
        </div>
    <div class="col-md-4">
        <form method="POST" action="registro.php" enctype="multipart/form-data">
            <div class="form-group">
                <label for="cod">Codigo</label>
                <input type="text" name="cod" required="" class="form-control" id="cod">
            </div>

            <div class="form-group">
                <label for="nombre">Nombre visitante</label>
                <input type="text" name="nombre" required="" class="form-control" id="nombre">
            </div>
               <div class="form-group">
                <label for="nombre_referencia">Persona a visitar</label>
                <input type="text" name="nombre_referencia" class="form-control" id="nombre_referencia">
            </div>

            <div class="form-group">
         <label for="select1" >Direccion de persona a quien visita</label><br>
            <select id="select1" name="select1" onchange="populate(this.id,'select2')">
                <option value="Calle"> Calle</option>
                <option value="Asturia"> Asturia</option>
                <option value="Avila"> Avila</option>
                <option value="CadizDerecha"> CadizDerecha</option>
                <option value="Cordoba"> Cordoba</option>
                <option value="EspañaEntrada"> EspañaEntrada</option>
                <option value="EspañaSalida"> EspañaSalida</option>
                <option value="Galicia"> Galicia</option>
                <option value="Granada"> Granada</option>
                <option value="Ibiza"> Ibiza</option>
                <option value="Jerez"> Jerez</option>
                <option value="Mallorca"> Mallorca</option>
                <option value="Marbella"> Marbella</option>
                <option value="SantanderDerecha"> SantanderDerecha</option>
                <option value="SantanderIzquierda"> SantanderIzquierda</option>
                <option value="Toledo"> Toledo</option>
                <option value="Valencia"> Valencia</option>
            </select>

            <select id="select2" name="select2">
                <option value="numero" >Numero</option>
            </select>
             </div>
               <div class="form-group">
              <input type="checkbox" name="check" id="check" value="1" onchange="javascript:showContent()" /><b>Accseso en vehiculo</b>
                </div>
           <div id="content" style="display: none;" class="form-group ">
                <label for="placas">Placas</label>
                <input type="text" name="placas"  class="form-control" id="placas"><br>
                 <label for="ImgCoche">Captura de vehiculo</label>
                 <input type="file" class="form-control-file" id="ImgCoche" name="ImgCoche">
            </div>

            <div class="form-group>
                 <label for="imagen_credencial">Captura de credencial</label>
                 <input type="file" class="form-control-file"  id="imagen_credencial" name="imagen_credencial">
            </div><br>

            <div class="form-group>
                 <label for="imagen_rostro">Captura de rostro</label>
                 <input type="file" class="form-control-file"  id="imagen_rostro" name="imagen_rostro">
            </div><br>

            <div class="form-group">
                <label for="motivo">Motivo de visita</label>
                <input type="text" name="motivo" required="" class="form-control" id="motivo">
            </div>


            <div class="form-group">
                <label for="observacion">Observaciones</label>
                <input type="text" name="observacion" required="" class="form-control" id="observacion">
            </div>

                <center>
                    <br><input type="submit" value="Guardar" class="btn btn-success" name="btn1"><br><br>
                </center>

        </form>
</div>

<div class="col-md-4"></div>
</div>
<script type="text/javascript" src="../Js/registro.js"></script>
<?php
if (isset($_POST['btn1'])) {
    $codigo      = $_POST['cod'];
    $nombre      = $_POST['nombre'];
    $nombre_ref  = $_POST['nombre_referencia'];
    $calle       = $_POST['select1'];
    $numero      = $_POST['select2'];
    $placas      = $_POST['placas'];
    $motivo      = $_POST['motivo'];
    $observacion = $_POST['observacion'];

  
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
    

    if (($numero != "numero") && ($codigo != "") && ($nombre != "") && ($motivo != "")) {
        include_once "abrir_conexion.php";

        $realizado = $conexion->query("INSERT INTO $tabla_db1 (
            codigo,usuario,fecha,entrada,nombre,nombre_ref,calle,numero,placas,motivo_visita,observaciones,
            imagen_rostro,imagen_credencial,imagen_coche)
             values ('$codigo','$user',NOW(),NOW(),'$nombre','$nombre_ref','$calle','$numero','$placas','$motivo',
             '$observacion','$destinoR','$destinoC','$destinoV')");

        if ($realizado==true){
            echo "
                    <script>
                alert(\"Los datos fueron registrados!\")
                </script>
        ";
        } else {
            echo "
                <script>
                alert(\"Ocurrio un error..Porfavor vuelve a intentarlo\")
                </script>
        ";
        $buscarGafete = mysqli_query($conexion, "SELECT * FROM $tabla_db1 WHERE codigo = $codigo");
        while ($encontrado = mysqli_fetch_array($buscarGafete)) {
        if(isset($encontrado[0])){
            echo "
            <script>
            alert(\"El gafete ya esta ocupado..Porfavor vuelve a intentarlo\")
            </script>
    ";
        }
        }

        }
    } else {
        echo "
                <script>
                alert(\"Porfavor vuelve a ingresar los datos..Revisa que esten completos\")
                </script>
        ";
    }
}
?>
<?php
include_once '../plantillas/FinDocumento.inc.php';
?>
