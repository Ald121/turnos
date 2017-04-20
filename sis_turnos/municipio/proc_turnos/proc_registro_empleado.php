<?php 
include("../conexion.php"); 

if ($_POST['tipo_ingreso']=="EMPLEADO") {
 

									    $sql = "INSERT INTO usuario (cedula,nombre,apellido,telefono,direccion,email,sexo,estado,usuario,pass,tipo_user) "
                                                . "VALUES ('" . $_POST['cedula'] . "',
		'" . $_POST['nombre'] . "',
		'" . $_POST['apellido'] . "',
                '" . $_POST['telefono'] . "',
		'" . $_POST['direccion'] . "',
		'" . $_POST['email'] . "',
		'" . $_POST['genero'] . "',
		'ACTIVO',
		'" . $_POST['usuario'] . "',
		'" . $_POST['pass'] . "','SECRE')";
                                        if ($sql) {
                                         $conexion->query($sql);
                                            echo '<div class="alert alert-success">
                                <button data-dismiss="alert" class="close">×</button>
                                <strong>Correcto!</strong> Empleado ingresado.
                            </div>';
                                        } else {
                                                 echo '<div class="alert alert-error">
                                <button data-dismiss="alert" class="close">×</button>
                                <strong>Error!</strong> Algo a salido mal.
                            </div>';
                                        }
}
elseif ($_POST['tipo_ingreso']=="CLIENTE") {

                                        $sql = "INSERT INTO usuario (cedula,nombre,apellido,telefono,direccion,email,sexo,estado,usuario,pass,tipo_user) "
                                                . "VALUES ('" . $_POST['cedula'] . "',
        '" . $_POST['nombre'] . "',
        '" . $_POST['apellido'] . "',
                '" . $_POST['telefono'] . "',
        '" . $_POST['direccion'] . "',
        '" . $_POST['email'] . "',
        '" . $_POST['genero'] . "',
        'ACTIVO',
        '" . $_POST['usuario'] . "',
        '" . $_POST['pass'] . "','CLIENTE')";
                                        if ($sql) {
                                         $conexion->query($sql);
                                            echo '<div class="alert alert-success">
                                <button data-dismiss="alert" class="close">×</button>
                                <strong>Correcto!</strong> Cliente ingresado.
                            </div>';
                                        } else {
                                                 echo '<div class="alert alert-error">
                                <button data-dismiss="alert" class="close">×</button>
                                <strong>Error!</strong> Algo a salido mal.
                            </div>';
                                        }

}
 ?>