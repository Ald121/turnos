
<?php 
include_once 'conexion.php';
$response = array();

$consulta="SELECT * FROM departamentos";

$resultado = $conexion->query($consulta)or die ( $conexion->error);
     
    while($fila = $resultado->fetch_array()){
        // temporary array to create single category
        $tmp = array();
        $tmp["nombre_depa"] = $fila["nombre_departamento"];
        //$tmp["name"] = $row["name"];
         
        // push category to final json array
        array_push($response, $tmp);
    }
     
    // keeping response header to json
    header('Content-Type: application/json');
     
    // echoing json result
    echo json_encode($response);

 ?>