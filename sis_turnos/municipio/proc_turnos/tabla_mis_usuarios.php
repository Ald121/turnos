<?php 
include '../conexion.php';
if (isset($_POST['estado'])) {
 ?>
<table class="table table-striped table-bordered table-advance table-hover">
                      <thead>
                                    <tr>
                                        <th><i class=""></i> CÉDULA</th>
                                        <th><i class=""></i> NOMBRES</th>
                                        <th><i class=""></i> APELLIDOS</th>
                                        <th><i class=""></i> TELEFONO</th>                                       
                                        <th><i class=""></i> DIRECCIÓN</th>
                                        <th><i class=""></i> CORREO</th>
                                        <th><i class=""></i> NROTURNO</th>
                                        <th><i class=""></i> DEPARTAMENTO</th>
                                        <th><i class=""></i> HORA</th>
                                        <th><i class=""></i> ESTADO</th>
                                    </tr>
                                                                       </thead>
                                    <tbody>
<?php

$consulta_mod = "SELECT cedula,nombre,apellido,telefono,direccion,email,turnos_proc.nroturno,turnos.nombre_departamento,hora,turnos_proc.estado FROM turnos,turnos_proc,usuario,departamentos where  
departamentos.idusuario='".$_POST["idusuario"]."' and turnos.nroturno=turnos_proc.nroturno and
turnos.idusuario=usuario.idusuario and turnos.nombre_departamento=departamentos.nombre_departamento and turnos_proc.estado='".$_POST['estado']."' and concat(nombre,' ',apellido,' ',cedula) like '%".$_POST['textobusqueda']."%';";


$resultado_mod = $conexion->query($consulta_mod)or die ( $mysqli->error);
while ($fila_mod = $resultado_mod->fetch_array()) {

?>
<tr>

                                        <td ><?php echo $fila_mod['cedula'];?></td>
                                        <td ><?php echo $fila_mod['nombre'];?></td>
                                        <td ><?php echo $fila_mod['apellido'];?></td>
                                        <td ><?php echo $fila_mod['telefono'];?></td>
                                         <td ><?php echo $fila_mod['direccion'];?></td>
                                          <td ><?php echo $fila_mod['email'];?></td>
                                        <td ><?php echo $fila_mod['nroturno'];?></td>
                                            <td ><?php echo $fila_mod['nombre_departamento'];?></td>
                                         <td ><?php echo $fila_mod['hora'];?></td>
                                        <?php 
if ($fila_mod['estado']=="EN ESPERA") {
                                         ?>
                                        <td class="label label-warning"><?php echo $fila_mod['estado'];?></td>

<?php 
}
 ?>
                                        <?php 
if ($fila_mod['estado']=="ATENDIDO") {
                                         ?>
                                        <td class="label label-info"><?php echo $fila_mod['estado'];?></td>

<?php 
}
 ?>

                                         <?php 
if ($fila_mod['estado']=="ACTIVO") {
                                         ?>
                                        <td class="label label-success"><?php echo $fila_mod['estado'];?></td>

<?php 
}
 ?>

                                          <?php 
if ($fila_mod['estado']=="CANCELADO") {
                                         ?>
                                        <td class="label label-important"><?php echo $fila_mod['estado'];?></td>

<?php 
}
 ?>
</tr>
<?php 
}
 ?>
                                      </tbody>
                                </table>
<?php }
else{
 ?>

<table class="table table-striped table-bordered table-advance table-hover">
                      <thead>
                                    <tr>
                                        <th><i class=""></i> CÉDULA</th>
                                        <th><i class=""></i> NOMBRES</th>
                                        <th><i class=""></i> APELLIDOS</th>
                                        <th><i class=""></i> TELEFONO</th>                                       
                                        <th><i class=""></i> DIRECCIÓN</th>
                                        <th><i class=""></i> CORREO</th>
                                        <th><i class=""></i> NROTURNO</th>
                                        <th><i class=""></i> DEPARTAMENTO</th>
                                        <th><i class=""></i> HORA</th>
                                        <th><i class=""></i> ESTADO</th>
                                    </tr>
                                                                       </thead>
                                    <tbody>
<?php

$consulta_mod = "SELECT cedula,nombre,apellido,telefono,direccion,email,turnos_proc.nroturno,turnos.nombre_departamento,hora,turnos_proc.estado FROM turnos,turnos_proc,usuario,departamentos where  
departamentos.idusuario='".$_POST["idusuario"]."' and turnos.nroturno=turnos_proc.nroturno and
turnos.idusuario=usuario.idusuario and turnos.nombre_departamento=departamentos.nombre_departamento and (turnos_proc.estado='EN ESPERA' or turnos_proc.estado='ATENDIDO' or turnos_proc.estado='ACTIVO' or turnos_proc.estado='CANCELADO') and concat(nombre,' ',apellido,' ',cedula) like '%".$_POST['textobusqueda']."%';";


$resultado_mod = $conexion->query($consulta_mod)or die ( $mysqli->error);
while ($fila_mod = $resultado_mod->fetch_array()) {

?>
<tr>

                                        <td ><?php echo $fila_mod['cedula'];?></td>
                                        <td ><?php echo $fila_mod['nombre'];?></td>
                                        <td ><?php echo $fila_mod['apellido'];?></td>
                                        <td ><?php echo $fila_mod['telefono'];?></td>
                                         <td ><?php echo $fila_mod['direccion'];?></td>
                                          <td ><?php echo $fila_mod['email'];?></td>
                                        <td ><?php echo $fila_mod['nroturno'];?></td>
                                            <td ><?php echo $fila_mod['nombre_departamento'];?></td>
                                         <td ><?php echo $fila_mod['hora'];?></td>
                                        <?php 
if ($fila_mod['estado']=="EN ESPERA") {
                                         ?>
                                        <td class="label label-warning"><?php echo $fila_mod['estado'];?></td>

<?php 
}
 ?>
                                        <?php 
if ($fila_mod['estado']=="ATENDIDO") {
                                         ?>
                                        <td class="label label-info"><?php echo $fila_mod['estado'];?></td>

<?php 
}
 ?>

                                         <?php 
if ($fila_mod['estado']=="ACTIVO") {
                                         ?>
                                        <td class="label label-success"><?php echo $fila_mod['estado'];?></td>

<?php 
}
 ?>

                                          <?php 
if ($fila_mod['estado']=="CANCELADO") {
                                         ?>
                                        <td class="label label-important"><?php echo $fila_mod['estado'];?></td>

<?php 
}
 ?>
</tr>
<?php 
}
 ?>
                                      </tbody>
                                </table>


 <?php } ?>
