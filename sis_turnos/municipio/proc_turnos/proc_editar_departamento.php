<?php 
include("../conexion.php"); 

  $sql = "UPDATE departamentos SET 
  nombre_departamento='" . $_POST['nombre_dep'] . "',
  nombre_modulo='" . $_POST['modulo'] . "',
  abreviatura='" . $_POST['abreviatura_dep'] . "' WHERE nombre_departamento='" . $_POST['nombre_dep'] . "'";
$conexion->query($sql)or die ( $conexion->error);
                                        if ($sql) {
                                            echo '<div class="alert alert-success">
                                <button data-dismiss="alert" class="close">×</button>
                                <strong>Correcto!</strong> Departamento editado.
                            </div>';
                                        } else {
                                                 echo '<div class="alert alert-error">
                                <button data-dismiss="alert" class="close">×</button>
                                <strong>Error!</strong> Algo a salido mal.
                            </div>';
                                        }
 ?>