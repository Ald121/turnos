<?php

sleep(1);
include './conexion.php';
if ($_REQUEST) {
    $username = $_REQUEST['cedula'];
    $query = "select * from usuario where cedula = '" . strtolower($username) . "'";
    $results = mysql_query($query) or die('ok');

    if (mysql_num_rows(@$results) > 0) { // not available
       echo '<div id="Success" style="color: #A52A2A; font-weight:bold; ">NÙMERO DE CEDULA YA EXISTE, NO SE PUEDE REGISTRAR</div>';
    } else {
         echo '<div id="Success" style="color: #006400; font-weight:bold; ">NÙMERO DE CEDULA DISPONIBLE!!</div>';
    }
}?>