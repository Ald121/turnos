<?php
include_once 'conexion.php';

if (isset($_POST['cedula'])) {
$query = "SELECT cedula FROM usuario where cedula='".$_POST['cedula']."'";

	$resultado = $conexion->query($query )or die ( $conexion->error);
	$fila = $resultado->fetch_array();
	//echo mysqli_num_rows($resultado);
		if(mysqli_num_rows($resultado)>0){
			$json['respuesta'] = 'REPETIDA';
			echo json_encode($json);
			mysqli_close ($conexion);

		}
}

if (isset($_POST['email'])) {
$query = "SELECT email FROM usuario where email='".$_POST['email']."'";

	$resultado = $conexion->query($query )or die ( $conexion->error);
	$fila = $resultado->fetch_array();
	//echo mysqli_num_rows($resultado);
		if(mysqli_num_rows($resultado)>0){
			$json['respuesta'] = 'EMAILREPETIDO';
			echo json_encode($json);
			mysqli_close ($conexion);

		}
}

	

?>