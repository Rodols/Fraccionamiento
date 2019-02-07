<?php
session_start();
ob_start();
$_SESSION['nombre'] = "";
$_SESSION['tipo'] = "";
$_SESSION['session_exito'] = 0;

include_once 'plantillas/InicioDocumentoIndex.inc.php';
//include_once 'plantillas/BarraNavegacionIndex.inc.php';
echo $_SESSION['nombre'];
?>
<div class="container">
  <div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
      <center><br>
         <h1> Real Del Bosque </h1>
         <h3> Xalapa Ver, <?=$fechaActual;?></h3><br><br>
         <form method="POST" action="index.php">
             <div class="form-group">
                  <label for="user">Usuario</label>
                 <input type="text" name="user" required="" class="form-control" id="user">
              </div>

            <div class="form-group">
              <label for="pass">Password</label>
             <input type="Password" name="pass" required="" class="form-control" id="pass">
             </div>

              <input type="submit" value="Ingresar" class="btn btn-danger" name="btnI">
        </center>
             </form>
     </div>
     <div class="col-md-4"></div>
     </div>
    </div><br> <br>
        <center>  <img src="../Imagenes/miweb.png"  width="150" heigth="150" name="foto" />  
            <h5><br/><br/> &copy 2019 por Rodolfo Vazquez Benitez </h5>
            <h5> vazquezbenitezrodolfo@gmail.com </h5>
        </center><br/>
<?php
if (isset($_POST['btnI'])) {
    $user = $_POST['user'];
    $pass = $_POST['pass'];

    if (($user == "") || ($pass == "")) {
        $_SESSION['session_exito'] = 2; //Error de campos vacios
        echo "error de campos vacios";
    } else {
        $_SESSION['session_exito'] = 3; //DatosIncorrectos
        echo "datos incorecctos";
        include_once "php/abrir_conexion.php";
        $resultados = mysqli_query($conexion, "SELECT * FROM $tabla_db2 WHERE user = '$user' AND pass = '$pass'");
        while ($consulta = mysqli_fetch_array($resultados)) {
            $_SESSION['session_exito'] = 1; //Inicio session
            //require 'registro.php';
            header('Location:php/registro.php');
            $_SESSION['nombre'] = $consulta[0];
            $_SESSION['tipo']   = $consulta[2];
        }
        include_once "php/cerrar_conexion.php";
    }
    if ($_SESSION['session_exito'] != 1) {
        //require 'index.php';
        header('Location:index.php');

    }

}

include_once 'plantillas/FinDocumentoIndex.inc.php';
?>
