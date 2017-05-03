<?php 

include '../conexion.php';
@session_start();

//GET DEPARTAMENTOS ASIGNADOS
$consulta = "SELECT * FROM departamentos WHERE idusuario='".$_SESSION['idusuario']."'";
$resultado = $conexion->query($consulta);
$array_deps_session=[];
$aux=0;

while ($dep_asignado = $resultado->fetch_array()) {
	// Guardar departamentos en stand By
	$consulta_dep = "SELECT * FROM departamentos_standy WHERE abreviatura='".$dep_asignado['abreviatura']."'";
	$resultado_dep = $conexion->query($consulta_dep);
	$dep = $resultado_dep->fetch_array();
	//si ya existe el departamento
	if (count($dep)==0) {
		$sql = "INSERT INTO departamentos_standy (iddep_standy, abreviatura, idusuario) VALUES (iddep_standy,'" . $dep_asignado['abreviatura'] . "','" . $_SESSION['idusuario'] . "')";
		$conexion->query($sql);
	}
	$array_deps_session[$aux]=['id'=>$dep_asignado['abreviatura'],'nombre_departamento'=>$dep_asignado['nombre_departamento']];
	$aux++;
}

// print_r($array_deps_session);

//TRES MENOS ASIGNADOS
$consulta_user_dep = "SELECT count(nombre_departamento)as dep_asignados,idusuario FROM departamentos WHERE idusuario!='".$_SESSION['idusuario']."' GROUP BY idusuario ORDER BY dep_asignados limit 3";
$resultado_user_dep = $conexion->query($consulta_user_dep);
$array_user_dep=[];
$aux=0;
// $usuarios_departamentos = mysqli_fetch_array($resultado_user_dep);


while ($dep_user = $resultado_user_dep->fetch_array()) {
	$array_user_dep[$aux]=['dep_asignados'=>$dep_user['dep_asignados'],'idusuario'=>$dep_user['idusuario']];
	$aux++;
}

// ASIGNAR DEPARTAMENTOS A NUEVOS USUARIOS
$array=array_chunk($array_deps_session, count($array_user_dep));



// Asignar departamentos a los 3 empleados con menos departamentos asignados
for ($i=0; $i < count($array_user_dep); $i++) { 
	$idempleado=$array_user_dep[$i]['idusuario'];
		for ($k=0; $k <count($array[$i]) ; $k++) { 
			$sql = "UPDATE departamentos SET idusuario='".$idempleado."' WHERE abreviatura='".$array[$i][$k]['id']."'";
			$conexion->query($sql);
		}
}

echo json_encode(['respuesta'=>true]);




 ?>