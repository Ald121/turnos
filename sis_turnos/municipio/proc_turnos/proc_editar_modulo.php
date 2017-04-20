<?php 
include("../conexion.php"); 

  $sql = "UPDATE modulos SET 
  nombre_modulo='" . $_POST['nombre_dep'] . "',
  abreviatura_mod='" . $_POST['abreviatura_dep'] . "' WHERE nombre_modulo='" . $_POST['nombre_dep'] . "'";
$conexion->query($sql)or die ( $conexion->error);
                                        if ($sql) {
                                            echo '<div class="alert alert-success">
                                <button data-dismiss="alert" class="close">×</button>
                                <strong>Correcto!</strong> Módulo editado.
                            </div>';
                                        } else {
                                                 echo '<div class="alert alert-error">
                                <button data-dismiss="alert" class="close">×</button>
                                <strong>Error!</strong> Algo a salido mal.
                            </div>';
                                        }
 ?>