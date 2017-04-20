<?php 
include_once 'conexion.php';
$response = array();

$consulta="SELECT turnos_proc.nroturno,fecha,turnos.nombre_departamento,turnos_proc.estado FROM turnos,turnos_proc where (turnos_proc.estado='EN ESPERA' or turnos_proc.estado='ACTIVO' or turnos_proc.estado='ATENDIDO' or turnos_proc.estado='CANCELADO' or turnos_proc.estado='PERDIDO') and idusuario='".$_POST["usuario"]."' and turnos.nroturno=turnos_proc.nroturno;";

$resultado = $conexion->query($consulta)or die ( $conexion->error);
     
    while($fila = $resultado->fetch_array()){
        // temporary array to create single category
        $tmp = array();
        $tmp["nro_turno"] = $fila[0];
         $tmp["fecha"] = $fila[1];
        $tmp["nombre_departamento"] = $fila[2];
        $tmp["estado"] = $fila[3];
        //$tmp["name"] = $row["name"];
         
        // push category to final json array
        array_push($response, $tmp);
    }
     
    // keeping response header to json
    header('Content-Type: application/json');
     
    // echoing json result
    echo json_encode($response);

 ?>
