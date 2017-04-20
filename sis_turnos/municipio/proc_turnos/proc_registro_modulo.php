<?php 
include("../conexion.php"); 

  $sql = "INSERT INTO modulos (nombre_modulo,abreviatura_mod) "
. "VALUES (
		'" . $_POST['nombre_dep'] . "',
		'" . $_POST['abreviatura_dep'] . "'
)";
$conexion->query($sql)or die ( $conexion->error);
                                        if ($sql) {
                                            echo '<div class="alert alert-success">
                                <button data-dismiss="alert" class="close">×</button>
                                <strong>Correcto!</strong> Módulo ingresado.
                            </div>';
                                        } else {
                                                 echo '<div class="alert alert-error">
                                <button data-dismiss="alert" class="close">×</button>
                                <strong>Error!</strong> Algo a salido mal.
                            </div>';
                                        }
 ?>