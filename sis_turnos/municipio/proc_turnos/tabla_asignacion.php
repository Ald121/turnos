<?php
include '../conexion.php';
@session_start();
?>

<table class="table table-striped table-bordered table-advance table-hover">
                      <thead>
                                    <tr>
                                        <th><i class="icon-user"></i> NOMBRES APELLIDOS</th>
                                        <th><i class=" icon-tags"></i> DEPARTAMENTOS ASIGNADOS</th>
                                        <th><i class=" icon-edit"></i> ASIGNAR</th>
                                    </tr>
                                                                       </thead>
                                    <tbody>

<?php

$consultauser = "SELECT idusuario,nombre,apellido FROM usuario where tipo_user='SECRE' and concat(nombre,' ',apellido) like '%".$_POST['txtbusqueda']."%' ;";
$resultadouser = $conexion->query($consultauser)or die ( $conexion->error);
while ($filauser = $resultadouser->fetch_array()) {

?>

<tr>
 <td style="text-transform: uppercase"><div id=""><strong><?php echo $filauser['nombre'].' '.$filauser['apellido'];?></strong></div></td>
 <td style="text-transform: uppercase"><div id=""><strong>
<?php

$consultamod = "SELECT nombre_departamento FROM departamentos,usuario where departamentos.idusuario=usuario.idusuario and departamentos.idusuario='".$filauser['idusuario']."';";
$resultadomod = $conexion->query($consultamod)or die ( $conexion->error);
while ($filamod = $resultadomod->fetch_array()) {

?>
<div><?php echo $filamod['nombre_departamento'];?></div>

<?php
}
?>

 </strong></div></td>

 <td style="text-transform: uppercase"><strong><button value='<?php echo $filauser['idusuario'];?>' class="btn_editar_asignacion" style="color:#242B5D" id="btn_editar_asignacion">EDITAR</button>
 <button value='<?php echo $filauser['idusuario'];?>' class="btn_siguiente_asig" style="color:#242B5D" id="btn_asignar">ASIGNAR NUEVO</button></strong></td>
                                        
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

$(".btn_editar_asignacion").on("click", function(){
 var parametros = {
                "iduser_asignar" : $(this).val()
        };
        $.ajax({
                data:  parametros,
                url:   'proc_turnos/form_editar_asignacion.php',
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