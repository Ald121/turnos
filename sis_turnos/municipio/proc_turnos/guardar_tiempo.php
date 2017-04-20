<?php 

$resultado = $_POST['valorCaja1']; 
echo $resultado.'-----------';

include '../conexion.php';
@session_start();


$sql = "UPDATE turnos_proc SET tiempo='".$resultado."' WHERE nroturno='".$_SESSION["turnoactual"]."'";
 $resultado = $conexion->query($sql);                                        
                                        if ($resultado===TRUE) {

                                          echo "('OK TIEMPO')";
                                        } else {
                                            echo "('ERROR TIEMPO')";
                                        }

?>