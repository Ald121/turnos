<?php
//conexion con el servidor
//$conexion=mysql_connect("localhost","root","root") or die("ERROR EN LA CONEXION A LA BASE DE DATOS");
//seleciona la base de datos
//mysql_select_db("municipio",$conexion) or die("ERROR EN LA SELECION DE LA BASE DE DATOS");

$conexion = new mysqli("localhost", "root", "root", "municipio");
if ($conexion->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") ";
}
?>