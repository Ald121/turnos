
<?php 
include_once 'conexion.php';
$response = array();


$consultamod = "SELECT * FROM modulos";
$resultadomod = $conexion->query($consultamod)or die ( $conexion->error);
while ($filamod = $resultadomod->fetch_array()) {

$modulo=$filamod[0];

$consulta2 = "SELECT turnos_proc.nroturno FROM departamentos,turnos,turnos_proc where turnos.nroturno=turnos_proc.nroturno and turnos.nombre_departamento=departamentos.nombre_departamento and nombre_modulo='".$filamod['nombre_modulo']."' and turnos_proc.estado='ACTIVO'";
$resultado2 = $conexion->query($consulta2)or die ( $conexion->error);
$fila2 = mysqli_fetch_array($resultado2);
$turno_actual=$fila2[0];

$consulta3 = "SELECT turnos_proc.nroturno FROM departamentos,turnos,turnos_proc where turnos.nroturno=turnos_proc.nroturno and turnos.nombre_departamento=departamentos.nombre_departamento and nombre_modulo='".$modulo."' and turnos_proc.estado='EN ESPERA' LIMIT 1";
$resultado3 = $conexion->query($consulta3)or die ( $mysqli->error);
$fila3 = mysqli_fetch_array($resultado3);
$siguiente_turno=$fila3[0];


        // temporary array to create single category
        $tmp = array();
        $tmp["nombre_modulo"] = $modulo;
        if ( $turno_actual != null) {
$tmp["turno_actual"] = $turno_actual;
        }
        else{
          $tmp["turno_actual"] = "------";  
        };


      if ( $siguiente_turno != null) {
$tmp["siguiente_turno"] = $siguiente_turno;
        }
        else{
          $tmp["siguiente_turno"] = "------";  
        };

        //$tmp["name"] = $row["name"];
         
        // push category to final json array
        array_push($response, $tmp);
    }
     
    // keeping response header to json
    header('Content-Type: application/json');
     
    // echoing json result
    echo json_encode($response);

 ?>