   <?php
   include 'conexion.php';

 //---------------------------------SU_TURNO
  $consulta = "SELECT min(turnos_proc.nroturno),fecha FROM turnos,turnos_proc where (turnos_proc.estado='EN ESPERA' or turnos_proc.estado='ACTIVO') and idusuario='".$_POST["usuario"]."' and turnos.nroturno=turnos_proc.nroturno;";
$resultado = $conexion->query($consulta)or die ( $mysqli->error);
$fila = mysqli_fetch_array($resultado);
$miturno=$fila[0];

//echo $fila[0];
$tmp["fecha_turno"] =$fila[1];
  $tmp["mi_turno"]=$fila[0];

//--------------------------------DETALLES
//ini_set('date.timezone','America/Lima'); 
$consulta = "SELECT turnos_proc.nroturno,hora FROM turnos,turnos_proc where turnos_proc.estado='EN ESPERA' and turnos_proc.nroturno='".$miturno."';";
$resultado = $conexion->query($consulta)or die ( $mysqli->error);
$fila = mysqli_fetch_array($resultado);

$consulta_mod = "SELECT turnos.nombre_departamento,nombre_modulo FROM departamentos,turnos where turnos.nombre_departamento=departamentos.nombre_departamento and nroturno='".$miturno."';";
$resultado_mod = $conexion->query($consulta_mod)or die ( $mysqli->error);
$fila_mod = mysqli_fetch_array($resultado_mod);

     $tmp["departamento"] =$fila_mod[0];
     $tmp["modulo"] =$fila_mod[1];
$tmp['hora_estimada'] =$fila[1];

                echo json_encode($tmp);
?>
