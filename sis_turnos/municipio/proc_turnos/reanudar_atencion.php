<?php 

include '../conexion.php';
@session_start();

//GET DEPARTAMENTOS ASIGNADOS
$consulta = "SELECT * FROM departamentos_standy WHERE idusuario='".$_SESSION['idusuario']."'";
$resultado = $conexion->query($consulta);
$array_deps_session=[];
$aux=0;

while ($dep_asignado = $resultado->fetch_array()) {
	// Actualizar usuario en departamentos

	$sql = "UPDATE departamentos SET idusuario='".$_SESSION['idusuario']."' WHERE abreviatura='".$dep_asignado['abreviatura']."'";
	$conexion->query($sql);
	// ELiminar Departamentos de Stadn By
	$sql = "DELETE FROM departamentos_standy WHERE abreviatura='".$dep_asignado['abreviatura']."'";
	$conexion->query($sql);
}

echo json_encode(['respuesta'=>true]);


 ?>