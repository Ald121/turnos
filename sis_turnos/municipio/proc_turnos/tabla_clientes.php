<script type="text/javascript">

$(document).ready(function(){
     $('#form_eliminar').hide();
    $('.btn_editar').click(function(){
    formvalido=true;
$('#id_user').val($(this).attr('idusuario'));
$('#cedula').val($(this).attr('cedula'));
$('#nombre').val($(this).attr('nombres'));
$('#apellido').val($(this).attr('apellidos'));
$('#direccion').val($(this).attr('direccion'));
$('#telefono').val($(this).attr('telefono'));
$('#email').val($(this).attr('correo'));
$('#genero option[value="'+$(this).attr('sexo')+'"]').attr('selected','selected');
$('#usuario').val($(this).attr('usuario'));
$('#pass').val($(this).attr('pass'));
$('#btn_registrar').val("GUARDAR");
});

$('.btn_eliminar').click(function(){
    $('#txtiduser').val($(this).attr('idusuario'));
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
                                        <th><i class=""></i> CÉDULA</th>
                                        <th><i class=""></i> NOMBRES APELLIDOS</th>
                                        <th><i class=""></i> TELEFONO</th>
                                        <th><i class=""></i> CORREO</th>
                                        <th><i class=""></i> DEPARTAMENTOS ASIGNADOS</th>
                                    </tr>
                                                                       </thead>
                                    <tbody>

<?php

$consultauser = "SELECT * FROM usuario where tipo_user='CLIENTE' and concat(nombre,' ',apellido) like '%".$_POST['txtbusqueda']."%' ;";
$resultadouser = $conexion->query($consultauser)or die ( $conexion->error);
while ($filauser = $resultadouser->fetch_array()) {

?>

<tr>
    <td ><?php echo $filauser['cedula'];?></td>
 <td style="text-transform: uppercase"><div id=""><strong><?php echo $filauser['nombre'].' '.$filauser['apellido'];?></strong></div></td>
<td ><?php echo $filauser['telefono'];?></td>
<td ><?php echo $filauser['email'];?></td>
 <td >
<strong><button href="#idusuario=<?php echo $filauser['idusuario'];?>" 
    idusuario="<?php echo $filauser['idusuario'];?>" 
    cedula="<?php echo $filauser['cedula'];?>" 
    nombres="<?php echo $filauser['nombre'];?>" 
    apellidos="<?php echo $filauser['apellido'];?>" 
    direccion="<?php echo $filauser['direccion'];?>" 
    correo="<?php echo $filauser['email'];?>"
    telefono="<?php echo $filauser['telefono'];?>" 
    sexo="<?php echo $filauser['sexo'];?>"  
    usuario="<?php echo $filauser['usuario'];?>" 
    pass="<?php echo $filauser['pass'];?>" 
    value='<?php echo $filauser['idusuario'];?>' class="btn_siguiente_asig btn_editar" style="color:#242B5D" id="btn_asignar">EDITAR</button></strong>
    <strong><button value='<?php echo $filauser['idusuario'];?>' 
idusuario="<?php echo $filauser['idusuario'];?>"
class="btn_siguiente_asig btn_eliminar" style="color:#242B5D" id="btn_asignar">ELIMINAR</button></strong>
</td>

                                    </tr>

                                    <?php
}
?>

                                    
                                    </tbody>
                                </table>

     <script type="text/javascript">

 $(document).ready(function(){

$(".btn_siguiente_asig").on("click", function(){
 var parametros = {
                "iduser_asignar" : $(this).val()
        };
        $.ajax({
                data:  parametros,
                url:   'proc_turnos/form_asignar.php',
                type:  'post',
                beforeSend: function () {
                      // $("#div_asignacion").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                        $("#div_asignacion").html(response);
                }
        });
        });

})

 </script>