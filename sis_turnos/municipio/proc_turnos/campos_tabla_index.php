<?php
include '../conexion.php';
@session_start();
?>

<table class="table table-striped table-bordered table-advance table-hover">
                      <thead>
                                    <tr>
                                        <th><i class="icon-bullhorn"></i> Servicio</th>
                                        <th><i class=" icon-edit"></i> GENERAR TURNO</th>
                                        <th class="hidden-phone"><i class="icon-question-sign"></i> ULTIMO TICKET</th>
                                        <th><i class="icon-bookmark"></i> CLIENTES ESPERANDO</th>
                                        <th><i class=" icon-edit"></i> CLIENTES ATENDIDOS</th>
                                        <th></th>
                                    </tr>
                                                                       </thead>
                                    

<?php

$consultamod = "SELECT * FROM modulos";
$resultadomod = $conexion->query($consultamod)or die ( $conexion->error);
while ($filamod = $resultadomod->fetch_array()) {

$modulo=$filamod[0];

$consulta2 = "SELECT max(turnos_proc.nroturno) FROM turnos,turnos_proc,departamentos where turnos.nombre_departamento=departamentos.nombre_departamento and nombre_modulo='".$modulo."' and turnos_proc.nroturno=turnos.nroturno and (turnos_proc.estado='EN ESPERA' or turnos_proc.estado='ATENDIDO' or turnos_proc.estado='ACTIVO')";
$resultado2 = $conexion->query($consulta2)or die ( $conexion->error);
$fila2 = mysqli_fetch_array($resultado2);
$last_turno=$fila2[0];


$consulta2 = "SELECT count(turnos_proc.nroturno) FROM turnos,turnos_proc,departamentos where turnos.nombre_departamento=departamentos.nombre_departamento and nombre_modulo='".$modulo."' and turnos_proc.nroturno=turnos.nroturno and turnos_proc.estado='EN ESPERA'";
$resultado2 = $conexion->query($consulta2)or die ( $conexion->error);
$fila2 = mysqli_fetch_array($resultado2);
$clientes_espera=$fila2[0];

$consulta2 = "SELECT count(turnos_proc.nroturno) FROM turnos,turnos_proc,departamentos where turnos.nombre_departamento=departamentos.nombre_departamento and nombre_modulo='".$modulo."' and turnos_proc.nroturno=turnos.nroturno and (turnos_proc.estado='ATENDIDO' or turnos_proc.estado='ACTIVO')";
$resultado2 = $conexion->query($consulta2)or die ( $conexion->error);
$fila2 = mysqli_fetch_array($resultado2);
$clientes_atendidos=$fila2[0];


$consulta2 = "SELECT max(tiempo) FROM turnos,turnos_proc,departamentos where turnos.nombre_departamento=departamentos.nombre_departamento and nombre_modulo='".$modulo."' and turnos_proc.nroturno=turnos.nroturno and (turnos_proc.estado='ATENDIDO' or turnos_proc.estado='ACTIVO')";
$resultado2 = $conexion->query($consulta2)or die ( $conexion->error);
$fila2 = mysqli_fetch_array($resultado2);
$tiempo_count=$fila2[0];


?>

 <tr>
                                        <th><h3><strong> <?php echo $filamod[0];?></strong></h3></th>
<th ></th>
                                        <th><h3><strong><?php echo $last_turno;?></strong></h3></th>
                                        <th><h3><strong><?php echo $clientes_espera;?></strong></h3></th>
                                        <th><h3><strong><?php echo $clientes_atendidos;?></strong></h3></th>

                                    </tr>
<?php

$consulta = "SELECT * FROM departamentos where nombre_modulo='".$filamod[0]."'";
$resultadodep = $conexion->query($consulta)or die ( $conexion->error);

while ($filadep = $resultadodep->fetch_array()) {


?>  

                                    <tbody>

<tr>
<td style="text-transform: uppercase"><div id="<?php echo $filadep[0];?>"><strong><?php echo $filadep[0];?></strong></div></td>
                                                                             <td><span class="">

<?php

if($_SESSION["tipouser"]=='CLIENTE'){
?>
<strong><a class="link_generar" ver="1" href='info_general.php?btn_generar=generar&txtdep=<?php echo $filadep[3];?>' style="color:#242B5D">GENERAR TURNO</a></strong>
            <?php
}
?>

<?php

if($_SESSION["tipouser"]=='ADMIN'){
?>
<strong><a class="link_generar" ver="1" href='generar_turno_admin.php?btn_generar=generar&txtdep=<?php echo $filadep[3];?>' style="color:#242B5D">GENERAR TURNO</a></strong>
            <?php
}
?>

                                        </span></td>
                                        
                                    </tr>
           <?php
}
}
?>
                                    
                                    </tbody>
                                </table>