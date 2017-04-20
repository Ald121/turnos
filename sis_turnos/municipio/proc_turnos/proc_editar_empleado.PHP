<?php 
include("../conexion.php"); 
$sql = "UPDATE usuario SET cedula='".$_POST['cedula']."',nombre='".$_POST['nombre']."',	apellido='" . $_POST['apellido'] . "', telefono='" . $_POST['telefono'] . "', direccion='" . $_POST['direccion'] . "',	email='" . $_POST['email'] . "', sexo='" . $_POST['genero'] . "',	usuario='" . $_POST['usuario'] . "', pass='" . $_POST['pass'] . "' WHERE idusuario='".$_POST['id_user']."'";
                  
                                        if ($sql) {
                                         $conexion->query($sql);
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

 ?>