<?php

include 'conexion.php';
$id = $_GET['ruc'];
if (isset($id)) {
    
} else {
    ?>
    <script>
        alert('Error, NO HA SELECIONADO UN PROVEEDOR PARA ELIMINAR!!');
        window.location.href = 'registro_usuario.php';
    </script>
    <?php

}
?>
<?php

$con_proveedor = mysql_query("SELECT * from usuario where cedula='" . $id . "'");
while ($row = mysql_fetch_array($con_proveedor)) {
    $ced_pro = $id;
$estador=$row["estado"];
}

$sql2 = " update usuario set estado='INACTIVO' where cedula='$id';";
$cs = mysql_query($sql2, $conexion);
//        $sql = "update proveedor SET Ruc='" . $_POST['cedula'] . "',NombreComercial='" . $_POST['nombre'] . "',Nombre='" . $_POST['nombre2'] . "',Apellido='" . $_POST['apellido'] . "',Telefono='" . $_POST['telefono'] . "',Email='" . $_POST['correo'] . "',Estado='ACTIVO',Observaciones='" . $_POST['obs'] . "' where Ruc='" . $id . "'";
//                                            echo "<script> alert('$sql');  </script>";
if ($cs) {
    ?>
    <script>
        alert('ESTE USUARIO SE DIO DE BAJA CORRECTAMENTE!!');
        window.location.href = 'registro_usuario.php';
    </script>
    <?php

} else {
    ?>
    <script>
        alert('Error al intentar Eliminar!!');
        window.location.href = 'registro_usuario.php';
    </script>
    <?php

}
?>