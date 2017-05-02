<?php 

include '../conexion.php';
@session_start();

//GET DEPARTAMENTOS ASIGNADOS
$consulta = "SELECT * FROM departamentos where idusuario='".$_SESSION['idusuario']."'";
$resultado = $conexion->query($consulta);
$dep_asignados = $resultado->fetch_array();
$array_deps_session=[];
$aux=0;

while ($dep_asignado = $resultado->fetch_array()) {
	// Guardar departamentos en stand By
	$sql = "INSERT INTO departamentos_standy (iddep_standy, abreviatura, idusuario) VALUES (iddep_standy,'" . $dep_asignado['abreviatura'] . "','" . $_SESSION['idusuario'] . "')";
	$conexion->query($sql);
	$array_deps_session[$aux]=['id'=>$dep_asignado['abreviatura'],'nombre_departamento'=>$dep_asignado['nombre_departamento']];
	$aux++;
}


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
$array=array_chunk($array_deps_session, count($array_user_dep), true);

// echo json_encode(count($array));

for ($j=0; $j < count($array[0][0]); $j++) { 
		print_r($array[$j][$j]);
	}

for ($i=0; $i < count($array_user_dep); $i++) { 
	echo $array_user_dep[$i]['idusuario'].'--';
	// for ($j=0; $j < count($array[$i]); $j++) { 
	// 	print_r($array[$i][$j]['nombre_departamento']);
	// }
}





 ?>