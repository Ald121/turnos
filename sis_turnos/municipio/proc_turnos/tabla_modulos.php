<script type="text/javascript">
$(document).ready(function(){
    $('#form_eliminar').hide();
$('.btn_editar').click(function(){
    formvalido=true;
$('#nombre_dep').val($(this).attr('nombremod'));
$('#abreviatura_dep').val($(this).attr('abreviaturamod'));
$('#btn_registrar').val("GUARDAR");
});

$('.btn_eliminar').click(function(){
    $('#txtiduser').val($(this).attr('nombremod'));
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
                                        <th><i class=""></i> NOMBRE DEL MODULO</th>
                                        <th><i class=""></i> ABREVIATURA</th>
                                        <th><i class=""></i> EDITAR/ELIMINAR</th>
                                    </tr>
                                                                       </thead>
                                    <tbody>

<?php

$consultadep = "SELECT * FROM modulos where nombre_modulo like '%".$_POST['txtbusqueda']."%' ;";
$resultadodep = $conexion->query($consultadep)or die ( $conexion->error);
while ($filadep = $resultadodep->fetch_array()) {

?>

<tr>
 <td style="text-transform: uppercase"><div id=""><strong><?php echo $filadep['nombre_modulo'];?></strong></div></td>
<td ><?php echo $filadep['abreviatura_mod'];?></td>
 <td >
<strong><button href="#" 
    nombremod="<?php echo $filadep['nombre_modulo'];?>" 
    abreviaturamod="<?php echo $filadep['abreviatura_mod'];?>" 
    class="btn_siguiente_asig btn_editar" style="color:#242B5D" id="btn_asignar">EDITAR</button></strong>
    <strong><button value='<?php echo $filadep['nombre_modulo'];?>' 
nombremod="<?php echo $filadep['nombre_modulo'];?>"
class="btn_siguiente_asig btn_eliminar" style="color:#242B5D" id="btn_asignar">ELIMINAR</button></strong>
</td>

                                    </tr>

                                    <?php
}
?>

                                    
                                    </tbody>
                                </table>