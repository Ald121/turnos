<?php
include_once 'conexion.php';

    $query = "UPDATE usuario SET   nombre='".$_POST['nombres']."',  
    apellido='".$_POST['apellidos']."', 
     telefono='".$_POST['telefono']."',  direccion='".$_POST['direccion']."',
    email='".$_POST['correo']."',
    sexo='".$_POST['sexo']."',
    usuario='".$_POST['usuario']."' ,
    pass='".$_POST['pass']."'
     WHERE idusuario='".$_POST["idusuario"]."'";

       $resultado = $conexion->query($query)or die($conexion->error);
            if($resultado){
                $json['resultado'] = "OK";
                echo json_encode($json);
                mysqli_close ($conexion);
            }else{
                 $json['resultado'] = "FAIL";
                echo json_encode($json);
                mysqli_close ($conexion);
            }


?>