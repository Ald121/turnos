
   <?php
   include '../conexion.php';
@session_start();
   ?>


<script type="text/javascript">
  $(document).ready(function() {
  function myDate(){
  var now = new Date();

  var outHour = now.getHours();
  if (outHour >12){newHour = outHour-12;outHour = newHour;}
  if(outHour<10){document.getElementById('HourDiv').innerHTML="0"+outHour;}
  else{document.getElementById('HourDiv').innerHTML=outHour;}

  var outMin = now.getMinutes();
  if(outMin<10){document.getElementById('MinutDiv').innerHTML="0"+outMin;}
  else{document.getElementById('MinutDiv').innerHTML=outMin;}

  var outSec = now.getSeconds();
  if(outSec<10){document.getElementById('SecDiv').innerHTML="0"+outSec;}
  else{document.getElementById('SecDiv').innerHTML=outSec;}

  } 
  myDate();
  setInterval(function(){   myDate();}, 1000);

  });
  </script>

   <style>
  #HourDiv, #MinutDiv, #SecDiv {display: inline; padding-left: 2px;padding-right: 2px}
  </style>

<div class="row-fluid">
<div class="text-center">
  <div class="alert alert-info span12">
                                <strong>HORA  Y FECHA ACTUAL</strong> 
                                <h1><strong> <?php 
                                echo date("d-m-Y");?></strong></h1>
                                <h1><strong>  <div id="HourDiv"></div><span>:</span><div id="MinutDiv"></div><span>:</span><div id="SecDiv"></div><br></strong></h1>
                                
                            </div>
                            </div>

  </div>

<div class="row-fluid">
 <div class="text-center">

<?php
$consultamod = "SELECT * FROM modulos";
$resultadomod = $conexion->query($consultamod)or die ( $conexion->error);
while ($filamod = $resultadomod->fetch_array()) {

?>

  <div class="alert alert-success span4">
                                <strong><?php echo $filamod['nombre_modulo']?></strong><br> 
                                <strong>TURNO ACTUAL</strong>
                                <h1><strong> <?php 
$consulta = "SELECT turnos_proc.nroturno FROM departamentos,turnos,turnos_proc where turnos.nroturno=turnos_proc.nroturno and turnos.nombre_departamento=departamentos.nombre_departamento and nombre_modulo='".$filamod['nombre_modulo']."' and turnos_proc.estado='ACTIVO'";
$resultado = $conexion->query($consulta)or die ( $mysqli->error);
$fila = mysqli_fetch_array($resultado);

echo $fila[0];

                                ?></strong></h1>

                                <strong>SIGUIENTE TURNO</strong>

                                <h1><strong> <?php 
$consulta = "SELECT turnos_proc.nroturno FROM departamentos,turnos,turnos_proc where turnos.nroturno=turnos_proc.nroturno and turnos.nombre_departamento=departamentos.nombre_departamento and nombre_modulo='".$filamod['nombre_modulo']."' and turnos_proc.estado='EN ESPERA' LIMIT 1";
$resultado = $conexion->query($consulta)or die ( $mysqli->error);
$fila = mysqli_fetch_array($resultado);

echo $fila[0];

                                ?></strong></h1>
                                          

                            </div>
<?php
}
?>


                            </div>
                            </div>
