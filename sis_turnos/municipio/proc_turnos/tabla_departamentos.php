<script type="text/javascript">
$(document).ready(function(){
    $('#form_eliminar').hide();
$('.btn_editar').click(function(){
    formvalido=true;
$('#nombre_dep').val($(this).attr('nombredep'));
$('#abreviatura_dep').val($(this).attr('abreviaturadep'));
$('#modulo option[value="'+$(this).attr('nombremod')+'"]').attr('selected','selected');
$('#btn_registrar').val("GUARDAR");
});

$('.btn_eliminar').click(function(){
    $('#txtiduser').val($(this).attr('nombredep'));
$('#form_eliminar').show('SLOW');
});
});

</script>
<?php
include '../conexion.php';
@session_start();
?>

<table class="table table-striped table-bordered table-advance table-hover">
                      <thead>
                                    <tr>
                                        <th><i class=""></i> NOMBRE DEL DEPARTAMENTO</th>
                                        <th><i class=""></i> MODULO</th>
                                        <th><i class=""></i> ASIGNACION</th>
                                        <th><i class=""></i> ABREVIATURA</th>
                                        <th><i class=""></i> EDITAR/ELIMINAR</th>
                                    </tr>
                                                                       </thead>
                                    <tbody>

<?php

$consultadep = "SELECT * FROM departamentos where nombre_departamento like '%".$_POST['txtbusqueda']."%' ;";
$resultadodep = $conexion->query($consultadep)or die ( $conexion->error);
while ($filadep = $resultadodep->fetch_array()) {

?>

<tr>
 <td style="text-transform: uppercase"><div id=""><strong><?php echo $filadep['nombre_departamento'];?></strong></div></td>
<td ><?php echo $filadep['nombre_modulo'];?></td>
<?php 
if ($filadep['idusuario']==0) {
 ?>
<td class="label label-important">SIN ASIGNAR</td>

 <?php }
else{
  $consultauser = "SELECT nombre,apellido FROM usuario where idusuario= '".$filadep['idusuario']."' ;";
$resultadouser = $conexion->query($consultauser)or die ( $conexion->error);
$filauser = $resultadouser->fetch_array();
  ?>
  <td class="label label-success"><?php echo $filauser['nombre'].' '.$filauser['apellido'];?></td>
<?php } ?>
<td ><?php echo $filadep['abreviatura'];?></td>
 <td >
<strong><button href="#nombre_dep=<?php echo $filadep['nombre_departamento'];?>" 
    nombredep="<?php echo $filadep['nombre_departamento'];?>" 
    abreviaturadep="<?php echo $filadep['abreviatura'];?>" 
    nombremod="<?php echo $filadep['nombre_modulo'];?>" 
    class="btn_siguiente_asig btn_editar" style="color:#242B5D" id="btn_asignar">EDITAR</button></strong>
    <strong><button value='<?php echo $filadep['idusuario'];?>' 
nombredep="<?php echo $filadep['nombre_departamento'];?>" 
class="btn_siguiente_asig btn_eliminar" style="color:#242B5D" id="btn_asignar">ELIMINAR</button></strong>
</td>

                                    </tr>

                                    <?php
}
?>

                                    
                                    </tbody>
                                </table>
