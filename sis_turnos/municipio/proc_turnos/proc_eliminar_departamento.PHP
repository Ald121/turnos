<?php 
include("../conexion.php"); 
$sql = "DELETE FROM departamentos WHERE nombre_departamento='".$_POST['txtiduser']."'";
                  
                                        if ($sql) {
                                         $conexion->query($sql);
                                            echo '<div class="alert alert-success">
                                <button data-dismiss="alert" class="close">×</button>
                                <strong>Correcto!</strong> Departamento eliminado.
                            </div>';
                                        } else {
                                                 echo '<div class="alert alert-error">
                                <button data-dismiss="alert" class="close">×</button>
                                <strong>Error!</strong> Algo a salido mal.
                            </div>';
                                        }

 ?>