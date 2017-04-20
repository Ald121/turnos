
<?php
include 'conexion.php';

$q = $_POST["q"];
$sql = "select * from usuario where cedula LIKE '" . $q . "%' or nombre LIKE '" . $q . "%' or apellido LIKE '" . $q . "%' and Estado='ACTIVO'; ";
$res = mysql_query($sql, $conexion);

?>

<table class="table table-striped table-hover table-bordered" id="editable-sample">
    <thead>
        <tr>
            <th style="color: #800;">Cedula</th>
            <th style="color: #800;">Nombre</th>
            <th style="color: #800;">Apellido</th>
            <th style="color: #800;">Email</th>
            <th style="color: #800;">Estado</th>
            <th style="color: #800;">Eliminar</th>
        </tr>
    </thead>
    <?php
    while ($resultados = mysql_fetch_array($res)) {
        ?>
        <tbody>
            <tr class="" style="text-align: center;">
                <td style="color: #000;"><?php echo $resultados['cedula'] ?></td>
                <td style="color: #000;"><?php echo $resultados['nombre'] ?></td>
                <td style="color: #000;"><?php echo $resultados['apellido'] ?></td>
                <td style="color: #000;"><?php echo $resultados['email'] ?></td>
                   <td style="color: #000;"><?php echo $resultados['estado'] ?></td>
                <td><a class="delete" href="javascript:;">Eliminar</a></td>
            </tr>
        </tbody>
        <?php
    }
    ?> 
</table>