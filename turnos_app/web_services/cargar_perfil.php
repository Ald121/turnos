
<?php 
include_once 'conexion.php';
$response = array();


$consulta = "SELECT * FROM usuario WHERE idusuario='".$_POST["usuario"]."'";
$resultado = $conexion->query($consulta)or die ( $conexion->error);
while ($fila = $resultado->fetch_array()) {

 $tmp = array();
        $tmp["cedula"] = $fila[1];
         $tmp["nombre"] = $fila[2];
         $tmp["apellido"] = $fila[3];
         $tmp["telefono"] = $fila[4];
         $tmp["direccion"] = $fila[5];
         $tmp["email"] = $fila[6];
         $tmp["sexo"] = $fila[7];
         $tmp["usuario"] = $fila[9];
         $tmp["pass"] = $fila[10];

        //$tmp["name"] = $row["name"];
         
        // push category to final json array
        array_push($response, $tmp);
    }
     
    // keeping response header to json
    header('Content-Type: application/json');
     
    // echoing json result
    echo json_encode($response);

 ?>