<?php

include_once 'conexion.php';
$response = array();

$guardar_tuno=true;

$consulta_turnos = "SELECT count(turnos_proc.nroturno) FROM turnos,turnos_proc  WHERE idusuario='".$_POST['usuario']."' and turnos_proc.nroturno=turnos.nroturno and (turnos_proc.estado='EN ESPERA' or turnos_proc.estado='ACTIVO' or turnos_proc.estado='ATENDIDO' or turnos_proc.estado='CANCELADO') and DAY(turnos_proc.fecha)=DAY(NOW())";
$resultado_turnos = $conexion->query($consulta_turnos)or die ( $conexion->error);
$fila_turnos = $resultado_turnos->fetch_array();
$nro_turnos=$fila_turnos[0];

if ($nro_turnos>=2) {
$json['resul'] = "2TURNOS";
array_push($response, $json);
$guardar_tuno=false;
};

$consulta_turnos = "SELECT count(turnos_proc.nroturno) FROM turnos,turnos_proc  WHERE turnos.nombre_departamento='".$_POST['departamento']."' and idusuario='".$_POST['usuario']."' and turnos_proc.nroturno=turnos.nroturno and (turnos_proc.estado='EN ESPERA' or turnos_proc.estado='ACTIVO' or turnos_proc.estado='ATENDIDO' or turnos_proc.estado='CANCELADO') and DAY(turnos_proc.fecha)=DAY(NOW())";
$resultado_turnos = $conexion->query($consulta_turnos)or die ( $conexion->error);
$fila_turnos = $resultado_turnos->fetch_array();
$turnosdep=$fila_turnos[0];

if ($turnosdep==1) {
$json['resul'] = "DEPYAGENERADO";
array_push($response, $json);
$guardar_tuno=false;
};

if ($guardar_tuno) {


function number_pad($number,$n) { 
return str_pad(((int) $number)+1,$n,"0",STR_PAD_LEFT); 
}


$consulta3 = "SELECT * FROM departamentos where nombre_departamento='".$_POST['departamento']."'";
$resultado3 = $conexion->query($consulta3)or die ( $conexion->error);
$fila3 = $resultado3->fetch_array();
$nombre_dep=$fila3[0];


$consulta2 = "SELECT max(nroturno) FROM turnos,departamentos WHERE estado='EN ESPERA' and turnos.nombre_departamento=departamentos.nombre_departamento and nombre_modulo='".$fila3[1]."'";

$resultado2=$conexion->query($consulta2);
$fila2 = $resultado2->fetch_array()or die ( $conexion->error);
if(!$fila2[0]){
$nro_turno_gen="000";
}else{
$nro_turno_gen=$fila2[0]; 
}

//echo $_SESSION["idsturno"];

$consulta_mod = "SELECT abreviatura_mod FROM departamentos,modulos WHERE departamentos.nombre_modulo=modulos.nombre_modulo and nombre_departamento='".$_POST['departamento']."'";
$resultado_mod=$conexion->query($consulta_mod)or die($conexion->error);
$fila_mod = $resultado_mod->fetch_array();
$abre_mod=$fila_mod[0];


$newturno=$abre_mod."-".number_pad(substr($nro_turno_gen,-3),3);

$consulta = "SELECT * FROM departamentos where nombre_departamento='".$_POST['departamento']."'";
$resultado = $conexion->query($consulta)or die ( $conexion->error);
$fila = $resultado->fetch_array();


$departamento=$fila['nombre_departamento'];
$sql = "INSERT INTO turnos(nroturno,nombre_departamento,idusuario,estado,observaciones) VALUES ('" .strval ($newturno). "',
    '" . $departamento . "','" . $_POST['usuario'] . "','EN ESPERA','Ninguna')";
                                        $resultado = $conexion->query($sql) or die($conexion->error);
                                        if ($resultado=== TRUE) {
                                            $json['resul'] = "OK";
                                            array_push($response, $json);
//                      $_SESSION["idturno"]=$newturno;
ini_set('date.timezone','America/Lima'); 

$consulta = "SELECT count(turnos_proc.nroturno) FROM turnos,turnos_proc where turnos_proc.estado='EN ESPERA' and SUBSTRING(turnos_proc.nroturno,1,5)='".substr ( $newturno , 0, 5)."' and turnos.nroturno=turnos_proc.nroturno and CONVERT(SUBSTRING_INDEX(turnos_proc.nroturno,'-',-1),UNSIGNED INTEGER)<'".intval (substr ( $newturno , 5, strlen ($newturno)))."';";
$resultado = $conexion->query($consulta)or die ( $conexion->error);
$fila = mysqli_fetch_array($resultado);

$tiempo_espera=$fila[0]*3;
 
$horaInicial=date("H:i");
$minutoAnadir=$tiempo_espera;
 
$segundos_horaInicial=strtotime($horaInicial);
 
$segundos_minutoAnadir=$minutoAnadir*60;
 
$nuevaHora=date("H:i",$segundos_horaInicial+$segundos_minutoAnadir);


                      $sql = "INSERT INTO turnos_proc(idturnos_proc,nroturno,estado,tiempo,fecha,hora) VALUES (idturnos_proc,'" .strval ($newturno). "','EN ESPERA','00:00:00','".date("Y-m-d")."','".$nuevaHora."')";
                                          $resultado = $conexion->query($sql)or die ( $conexion->error);

}
}



                 

                 header('Content-Type: application/json');

       echo json_encode($response);



       ?>