<?php
include '../conexion.php';
//echo $_POST['nombre_apellidos'];
/*foreach($_POST['nombre_dep'] as $check) {
            echo $check; 
    }*/

$consultamod = "SELECT nombre,apellido FROM usuario where idusuario='".$_POST['iduser_asignar']."';";
$resultadomod = $conexion->query($consultamod)or die ( $conexion->error);
$filamod = $resultadomod->fetch_array();
?>

<div id="respuesta_asignacion"></div>
<form style="text-transform: uppercase" >
    <h1><strong><?php echo $filamod['nombre'].' '.$filamod['apellido'];?></strong></h1><br> 
    <input name="idusuario" value='<?php echo  $_POST["iduser_asignar"];?>' style="display:none" >

<?php
$consultamod = "SELECT nombre_departamento FROM departamentos where idusuario='".$_POST['iduser_asignar']."';";
$resultadomod = $conexion->query($consultamod)or die ( $conexion->error);
while ($filamod = $resultadomod->fetch_array()) {
?>
<input type="checkbox" name="nombre_dep[]" value='<?php echo $filamod['nombre_departamento'];?>'><?php echo $filamod['nombre_departamento'];?>&nbsp;
<?php
}
?>
<br><br><button type="submit" style="color:#242B5D" name="btn_editar_asignacion" id="btn_editar_asignacion_form">QUITAR</button>
</form>

