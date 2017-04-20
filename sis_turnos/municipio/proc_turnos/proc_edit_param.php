<?php 
include("../conexion.php"); 

$estado_editar=true;

if ($_POST['hora_fin']<$_POST['hora_ini']) {
     $estado_editar=false;
    echo '<div class="alert alert-error">
                                <button data-dismiss="alert" class="close">×</button>
                                <strong>Error!</strong> la hora de finalización no puede ser menor a la hora de inicio.
                            </div>';
}

if ($estado_editar) {
$sql = "UPDATE parametros SET 
hora_inicio='" . $_POST['hora_ini'] . "',
hora_fin='" . $_POST['hora_fin'] . "',
tiempo_espera='" . $_POST['tiempo_espera'] . "' 
WHERE idparametros='1'";
                    $resultado=$conexion->query($sql)or die($conexion->error);
                                        if ($resultado) {
                                       
                                            echo '<div class="alert alert-success">
                                <button data-dismiss="alert" class="close">×</button>
                                <strong>Correcto!</strong> Editado correctamente.
                            </div>';
                                        } else {
                                                 echo '<div class="alert alert-error">
                                <button data-dismiss="alert" class="close">×</button>
                                <strong>Error!</strong> Algo a salido mal.
                            </div>';
                                        }
                                        }

 ?>