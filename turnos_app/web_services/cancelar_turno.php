<?php 
include("conexion.php"); 

//echo $_POST['txtidanuncio'];

$sql = "UPDATE turnos_proc SET  estado='CANCELADO' WHERE nroturno='" . $_POST['idturno'] . "'";
$resultado=$conexion->query($sql)or die ( $conexion->error);
                                        if ($resultado) {
           $json['resultado'] = 'OK';
                echo json_encode($json);
                mysqli_close ($conexion);
                                        } else {
                     $json['resultado'] = 'FAIL';
                echo json_encode($json);
                mysqli_close ($conexion);
                                        }
 ?>