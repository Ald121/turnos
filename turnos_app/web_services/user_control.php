<?php

include_once 'conexion.php';
	
	if ($_POST['password']==""||$_POST['email']=="") {
		$json['error'] = ' Complete los Campos vacios';
				echo json_encode($json);
	}
	else{
	$query = "SELECT * FROM usuario where usuario='".$_POST['email']."' and pass= '".$_POST['password']."' and estado='ACTIVO' and tipo_user='CLIENTE'";

		$resultado = $conexion->query($query )or die ( $conexion->error);
		$fila = $resultado->fetch_array();
		//echo mysqli_num_rows($resultado);
			if(mysqli_num_rows($resultado)>0){
						$json['success'] = ' Bienvenido '.$_POST['email'];
						$json['id_user'] = $fila['idusuario'];
				echo json_encode($json);
				mysqli_close ($conexion);

			}else{
				$json['error'] = ' Usuario/Contraseña incorrectos';
				echo json_encode($json);
				mysqli_close ($conexion);
			}
			}
	

?>