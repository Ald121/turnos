<?php
//include '../conexion.php';
$items =$_GET['nombre_dep'];

for ($i=0; $i <count($items) ; $i++) { 
   echo $items[$i];
}

?>

