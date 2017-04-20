<?php 
include("../conexion.php"); 

$estado_editar=true;

$consultapass = "SELECT pass FROM usuario where idusuario='".$_POST['id_user']."'";
$resultadopass = $conexion->query($consultapass)or die ( $conexion->error);
$filapass=$resultadopass->fetch_array();

if ($filapass[0]!=$_POST['pass_actual']) {
     $estado_editar=false;
    echo '<div class="alert alert-error">
                                <button data-dismiss="alert" class="close">×</button>
                                <strong>Error!</strong> Contraseña actual incorrecta.
                            </div>';
}

if ($_POST['new_pass']!=$_POST['confirm_pass']) {
    $estado_editar=false;
            echo '<div class="alert alert-error">
                                <button data-dismiss="alert" class="close">×</button>
                                <strong>Error!</strong> Las contraseñas no coinciden.
                            </div>';
}


if ($estado_editar) {
$sql = "UPDATE usuario SET 
pass='" . $_POST['new_pass'] . "' 
WHERE idusuario='".$_POST['id_user']."'";
                  
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
                                        }

 ?>