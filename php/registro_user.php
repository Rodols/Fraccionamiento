<?php
session_start();
ob_start();
if (($_SESSION['tipo'] != 'a')) {
    header('Location:../index.php');
} else {
    include_once '../plantillas/InicioDocumento.inc.php';
    include_once '../plantillas/BarraNavegacion.inc.php';
}
?>
<center>
            <h2><strong>Control de usuarios del sistema</strong></h2>
            <h4><strong>Xalapa Ver,a <?=$fechaActual;?></strong></h4><br>
        </center>
 <div class="row">
    <div class="col-md-4">
        </div>
    <div class="col-md-4">
        <center>
        <form method="POST" action="registro_user.php" >
            <div class="form-group">
                <label for="nombre_usuario">Nombre de usuario</label>
                <input type="text" name="nombre_usuario" class="form-control" id="nombre_usuario" placeholder="Nombre de usuario que quieres crear">
            </div>

            <div class="form-group">
                <label for="password">Contraseña de usuario</label>
                <input type="Password" name="password" class="form-control" id="password" placeholder="Contraseña para el usuario que quieres crear">

                         <br><input type="submit" value="Usuarios" class="btn btn-warning" name="btnUsuarios">
                            <input type="submit" value="Crear" class="btn btn-success" name="btnGuardar"><br><br>
                </center>

        </form>
</div>

<div class="col-md-4"></div>
</div>
<?php
if (isset($_POST['btnGuardar'])) {
    $nombre_user   = $_POST['nombre_usuario'];
    $password_user = $_POST['password'];

    if (($nombre_user != "") && ($password_user != "")) {
        include_once "abrir_conexion.php";

        $realizado = $conexion->query("INSERT INTO $tabla_db2 (user,pass,tipo) values ('$nombre_user','$password_user','b')");
        if (isset($realizado)) {
            echo "
                    <script>
                alert(\"$nombre_user fue agregado a los usuarios\")
                </script>
        ";
            include_once "cerrar_conexion.php";
        }
    } else {
        echo "
                <script>
                alert(\"Los datos no fueron registrados..Revisa que los campos no esten vacios\")
                </script>
        ";
    }

}
if (isset($_POST['btnUsuarios'])) {
    $user_name = $_POST['nombre_usuario'];
    include_once "abrir_conexion.php";
    $resultados = mysqli_query($conexion, "SELECT * FROM $tabla_db2 ");

    while ($consulta = mysqli_fetch_array($resultados)) {
        $usuario_buscar = $consulta[0];
        if (($consulta[0] != $user) && ($consulta[0] != "rodo")) {
            echo "   <form method=\"POST\" action=\"registro_user.php\" >
                        <div class=\"form-group form-inline\">
                    <center>
                    <input type=\"text\" readonly=\"readonly\"  name=\"usuario_buscar\" value='$usuario_buscar' id=\"usuario_buscar\">
                    <input type=\"submit\" value=\"Eliminar\" class=\"btn btn-danger\" name=\"btnEliminar\"><br>
                    </center>
                </form>
                        </div>
            ";
        }
    }
    include_once "cerrar_conexion . php";
}

if (isset($_POST['btnEliminar'])) {
    $user_name = $_POST['usuario_buscar'];
    include_once "abrir_conexion.php";
    mysqli_query($conexion, "DELETE FROM $tabla_db2 WHERE user = '$user_name'");
    include_once "cerrar_conexion.php";
    echo "
                <script>
                alert(\"El usuario: $user_name a sido eliminado\")
                </script>
        ";
}
?>
<?php
include_once '../plantillas/FinDocumento.inc.php';
?>
