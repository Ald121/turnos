<?php 
include("../conexion.php"); 

//echo $_POST['txtidanuncio'];

$sql = "UPDATE turnos_proc SET 
  estado='CANCELADO' WHERE nroturno='" . $_POST['txtidanuncio'] . "'";
$conexion->query($sql)or die ( $conexion->error);
                                        if ($sql) {
                                            echo '<div class="alert alert-success">
                                <button data-dismiss="alert" class="close">×</button>
                                <strong>Correcto!</strong> Turno cancelado.
                            </div>';
                                        } else {
                                                 echo '<div class="alert alert-error">
                                <button data-dismiss="alert" class="close">×</button>
                                <strong>Error!</strong> Algo a salido mal.
                            </div>';
                                        }
 ?>