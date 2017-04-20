<?php 
include("../conexion.php"); 

  $sql = "INSERT INTO departamentos (nombre_departamento,nombre_modulo,idusuario,abreviatura) "
. "VALUES (
		'" . $_POST['nombre_dep'] . "',
                '" . $_POST['modulo'] . "',
		'0',
		'" . $_POST['abreviatura_dep'] . "'
)";
$conexion->query($sql)or die ( $conexion->error);
                                        if ($sql) {
                                            echo '<div class="alert alert-success">
                                <button data-dismiss="alert" class="close">×</button>
                                <strong>Correcto!</strong> Departamento ingresado.
                            </div>';
                                        } else {
                                                 echo '<div class="alert alert-error">
                                <button data-dismiss="alert" class="close">×</button>
                                <strong>Error!</strong> Algo a salido mal.
                            </div>';
                                        }
 ?>