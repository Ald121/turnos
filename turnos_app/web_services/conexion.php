<?php
$conexion = new mysqli("localhost", "root", "root", "municipio");
if ($conexion->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") ";
}
?>