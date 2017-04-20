
   <?php
   include '../conexion.php';
@session_start();
   ?>
   <div class="row-fluid">

<?php 
$consulta_gen=$conexion->query("SELECT count(turnos_proc.nroturno) FROM turnos,turnos_proc 
  WHERE (turnos_proc.estado='ACTIVO' or turnos_proc.estado='EN ESPERA' ) 
and turnos.nroturno=turnos_proc.nroturno and idusuario='" . $_SESSION["idusuario"] . "'");
$datos_gen=$consulta_gen->fetch_array();

//echo $datos_gen[0];

if (intval($datos_gen[0])<=2 &&intval($datos_gen[0])!=0) {
 ?>
    
<div class="text-center">
  <div class="alert alert-info span6">
                                <strong>SU TURNO</strong> 
                                <h1><strong> <?php 
  $consulta = "SELECT min(turnos_proc.nroturno) FROM turnos,turnos_proc where (turnos_proc.estado='EN ESPERA' or turnos_proc.estado='ACTIVO') and idusuario='".$_SESSION["idusuario"]."' and turnos.nroturno=turnos_proc.nroturno;";
$resultado = $conexion->query($consulta)or die ( $conexion->error);
$fila = mysqli_fetch_array($resultado);
$miturno=$fila[0];

echo $fila[0];
?>
<h3><strong></strong></h3>

                                </strong></h1>                       
                            </div>

                            <div class="alert alert-info span6">
                                <strong>DETALLES</strong> 
                                <h1><strong> <?php 
ini_set('date.timezone','America/Lima'); 
$consulta = "SELECT turnos_proc.nroturno,hora FROM turnos,turnos_proc where turnos_proc.estado='EN ESPERA' and turnos_proc.nroturno='".$miturno."';";
$resultado = $conexion->query($consulta)or die ( $conexion->error);
$fila = mysqli_fetch_array($resultado);

$consulta_mod = "SELECT turnos.nombre_departamento,nombre_modulo FROM departamentos,turnos where turnos.nombre_departamento=departamentos.nombre_departamento and nroturno='".$miturno."';";
$resultado_mod = $conexion->query($consulta_mod)or die ( $conexion->error);
$fila_mod = mysqli_fetch_array($resultado_mod);

echo "<h1>HORA ESTIMADA: ".$fila[1]."</h1>"."<h1> DIA: ".date("d-m-Y")."</h1>";

//echo $_SESSION["idusuario"];
/*if($tiempo_espera==0){
//echo $tiempo_espera;
}
if($tiempo_espera>=60&&$tiempo_espera!=0){
echo intval (($tiempo_espera/60))." H";
}
if($tiempo_espera<60&&$tiempo_espera!=0){
    echo intval($tiempo_espera)." MIN";
    }*/

                                ?>
                                <h3><strong><a href='proc_turnos/generacion_pdf.php?nro=<?php echo $miturno;?>&user=<?php echo $_SESSION["nombre"].' '.$_SESSION["apellido"];?>&hora=<?php echo $fila[1];?>&modulo=<?php echo $fila_mod[1];?>&depar=<?php echo $fila_mod[0];?>'>IMPRIMIR</a></strong></h3>
                                </strong></h1>                       
                            </div>
                            </div>
                            <?php } ?>

  </div>

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
