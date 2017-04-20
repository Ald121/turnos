<table class="table table-striped table-bordered table-advance table-hover">
                      <thead>
                                    <tr>
                                        <th><i class=""></i> NRO. TURNO</th>
                                        <th><i class=""></i> DEPARTAMENTO</th>
                                        <th><i class=""></i> FECHA</th>                                       
                                        <th><i class=""></i> HORA</th>
                                        <th><i class=""></i> ESTADO</th>
                                    </tr>
                                                                       </thead>
                                    <tbody>
<?php
include '../conexion.php';
$consulta_mod = "SELECT * FROM turnos,turnos_proc where (turnos_proc.estado='EN ESPERA' or turnos_proc.estado='ACTIVO' or turnos_proc.estado='ATENDIDO' or turnos_proc.estado='CANCELADO' or turnos_proc.estado='PERDIDO') and idusuario='".$_SESSION["idusuario"]."' and turnos.nroturno=turnos_proc.nroturno;";
$resultado_mod = $conexion->query($consulta_mod)or die ( $mysqli->error);
while ($fila_mod = $resultado_mod->fetch_array()) {

?>
<tr>

                                        <td ><?php echo $fila_mod['nroturno'];?></td>
                                        <td ><?php echo $fila_mod['nombre_departamento'];?></td>
                                        <td ><?php echo $fila_mod['fecha'];?></td>
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

                                       <?php 
if ($fila_mod['estado']=="PERDIDO") {
                                         ?>
                                        <td class="label label-perdido" style="background: #999 !important;"><?php echo $fila_mod['estado'];?></td>

<?php 
}
 ?>
</tr>
<?php 
}
 ?>
                                      </tbody>
                                </table>