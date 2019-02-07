<?php
$host = "localhost";
//Desde internet
$baseDeDatos = "id8656024_visitas";
$usuario     = "id8656024_rodo";
$clave       = "Caracoles";

//DESDE mi pc
//$baseDeDatos = "fraccionamiento";
//$usuario     = "root";
//$clave       = "1727";

$tabla_db1 = "Visitas";
$tabla_db2 = "Usuarios";
$tabla_db3 = "Bitacora";
$tabla_db4 = "Residentes";
$tabla_db5 = "Proveedores";

error_reporting(0);

$conexion = new mysqli($host, $usuario, $clave, $baseDeDatos);
$conexion->query("SET GLOBAL time_zone = 'America/Mexico_City'");
$conexion->query("SET time_zone = '-06:00'");
$conexion->query("SET @@session.time_zone = '-06:00'");

if ($conexion->connect_errno) {
    echo "Nuestro sitio experimenta fallos....";
    exit();
}
