<?php

sleep(1);
include './conexion.php';
if ($_REQUEST) {
    $correo_f = $_REQUEST['email'];
    $query = "select * from usuario where email = '" . strtolower($correo_f) . "'";
    $results = mysql_query($query) or die('ok');

    if (mysql_num_rows(@$results) > 0) { // not available
       echo '<div id="Success" style="color: #A52A2A; font-weight:bold; ">CORREO ELECTRONICO YA EXISTE EN LA BDD</div>';
    } else {
          echo '<div id="Success" style="color: #006400; font-weight:bold; ">EMAIL DISPONIBLE!!</div>';
    }
}?>