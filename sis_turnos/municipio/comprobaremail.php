<?php

sleep(1);
include './conexion.php';
if ($_REQUEST) {
    $correo_f = $_REQUEST['email'];
    $query = "select * from usuario where email = '" . strtolower($correo_f) . "'";
    $results = $conexion->query($query);

    if (mysqli_num_rows(@$results) > 0) { // not available
       echo '<div class="alert alert-error">
                                <button data-dismiss="alert" class="close">×</button>
                                <strong>CORREO ELECTRONICO YA EXISTE</strong> </div>
                                ';
    } else {
          echo '<div class="alert alert-success">
                                <button data-dismiss="alert" class="close">×</button>
                                <strong>EMAIL DISPONIBLE!!</strong> </div>
                                ';
    }
}?>