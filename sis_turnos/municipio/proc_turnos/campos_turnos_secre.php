
<script type="text/javascript">
$(".txtobservaciones").keyup(function(event) {
  $('#txtauxobsercaciones').val($(this).val());
});
</script>
<?php 
include '../conexion.php';
@session_start();


$consulta = "SELECT turnos_proc.nroturno FROM departamentos,turnos,turnos_proc WHERE turnos.nombre_departamento=departamentos.nombre_departamento and turnos_proc.estado='ACTIVO' and turnos.nroturno=turnos_proc.nroturno and nombre_modulo='".$_SESSION['dep']."'";
$resultado = $conexion->query($consulta);
$fila = mysqli_fetch_array($resultado);

//echo $fila[0];

//$_SESSION["turnoactual"]=$fila['nroturno'];

              
       ?>
                    <div class="alert alert-info ">
                                <strong>TURNO ACTUAL</strong> 
                                <h1><strong><?php

$consulta = "SELECT count(nroturno) FROM turnos WHERE nroturno='".$_SESSION['turnoactual']."'";
$resultado = $conexion->query($consulta);
$fila = mysqli_fetch_array($resultado);
$nro_atendidos=$fila[0];
if ($fila[0]==0) {

echo('<script> alert("NO EXISTEN MAS CLIENTES"); self.location = "index.php"</script>'); 

function nro_mas($number,$n) { 
return str_pad(((int) $number)+1,$n,"0",STR_PAD_LEFT); 
}

$consulta = "SELECT max(turnos_proc.nroturno) FROM turnos,turnos_proc,departamentos WHERE turnos.nombre_departamento=departamentos.nombre_departamento and nombre_modulo='".$_SESSION['dep']."' and turnos_proc.nroturno=turnos.nroturno and turnos_proc.estado='ATENDIDO'";
$resultado = $conexion->query($consulta);
$fila = mysqli_fetch_array($resultado);

$nro1=substr($fila[0],0,strpos($fila[0],'-')+1);
$nro2=substr($fila[0],-1);

  $_SESSION["turnoactual"]=$nro1.nro_mas($nro2,3); 

}else{

                  echo($_SESSION["turnoactual"]);
}

                
                
       ?></strong></h1>
                            </div>

<div class="alert alert-info">
<?php 
$consulta = "SELECT cedula,nombre,apellido,telefono,direccion,turnos.nombre_departamento,turnos.observaciones,turnos_proc.estado FROM usuario,turnos,turnos_proc WHERE usuario.idusuario=turnos.idusuario and turnos.nroturno=turnos_proc.nroturno and turnos_proc.nroturno='".$_SESSION["turnoactual"]."'";

$resultado=$conexion->query($consulta);
$fila = mysqli_fetch_array($resultado);
$_SESSION["cedula"]=$fila['cedula'];
$_SESSION["nombre"]=$fila['nombre'];
$_SESSION["apellido"]=$fila['apellido'];
$_SESSION["telefono"]=$fila['telefono'];
$_SESSION["direccion"]=$fila['direccion'];
$_SESSION["nombre_depa"]=$fila['nombre_departamento'];
$_SESSION["observaciones"]=$fila['observaciones'];
$_SESSION["estado_turno"]=$fila['estado'];

?>
           <strong>DATOS DEL CLIENTE</strong> <br><br>
           <input type="text" value="<?php echo($fila['cedula'])?>" readonly>
           <input type="text" value="<?php echo($fila['nombre'])?>"  readonly>
           <input type="text" value="<?php echo($fila['apellido'])?>"  readonly>
           <input type="text" value="<?php echo($fila['direccion'])?>"  readonly>
           <input type="text" value="<?php echo($fila['telefono'])?>"  readonly>
           <input type="text" name="dept" value="<?php echo $fila['nombre_departamento'];?>" readonly>
           
<?php 
if ($fila['estado']=="EN ESPERA") {
                                         ?>
                                        <a class="label label-warning lblestado" estadoturno="<?php echo $fila['estado'];?>"><?php echo $fila['estado'];?></a>

<?php 
}
 ?>
                                        <?php 
if ($fila['estado']=="ATENDIDO") {
                                         ?>
                                        <a class="label label-info lblestado" estadoturno="<?php echo $fila['estado'];?>"><?php echo $fila['estado'];?></a>

<?php 
}
 ?>

                                         <?php 
if ($fila['estado']=="ACTIVO") {
                                         ?>
                                        <a class="label label-success lblestado" estadoturno="<?php echo $fila['estado'];?>"><?php echo $fila['estado'];?></a>

<?php 
}
 ?>

                                         <?php 
if ($fila['estado']=="CANCELADO") {
                                         ?>
                                        <a class="label label-important lblestado" estadoturno="<?php echo $fila['estado'];?>" ><?php echo $fila['estado'];?></a>

<?php 
}
 ?>
                                         <?php 
if ($fila['estado']=="PERDIDO") {
                                         ?>
                                        <a class="label label-perdido lblestado" estadoturno="<?php echo $fila['estado'];?>" ><?php echo $fila['estado'];?></a>

<?php 
}
 ?>

           <br>
          <textarea class="span10 txtobservaciones" rows="5" placeholder="Observaciones"><?php echo $fila['observaciones'];?></textarea>

                    </div>


<script type="text/javascript">
$(document).ready(function(){

//alert($('.lblestado').attr('estadoturno'));
var estado_turno=$('.lblestado').attr('estadoturno');

if (estado_turno=='ATENDIDO'||estado_turno=='CANCELADO'||estado_turno=="PERDIDO") {
$('#btn_terminar').attr('style','display:none');
$('#btn_perdido').attr('style','display:none');
};

});

</script>