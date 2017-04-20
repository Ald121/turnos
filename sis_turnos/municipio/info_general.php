<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
   <meta charset="utf-8" />
   <title>ADMINSITRADOR- MUNICIPIO OTAVALO</title>
   <meta content="width=device-width, initial-scale=1.0" name="viewport" />
   <meta content="" name="description" />
   <meta content="Mosaddek" name="author" />
   <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
   <link href="assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
   <link href="assets/bootstrap/css/bootstrap-fileupload.css" rel="stylesheet" />
   <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
   <link href="css/style.css" rel="stylesheet" />
   <link href="css/style-responsive.css" rel="stylesheet" />
   <link href="css/style-default.css" rel="stylesheet" id="style_color" />
   <link href="assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
   <link href="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="fixed-top">
   <!-- BEGIN HEADER -->
   <div id="header" class="navbar navbar-inverse navbar-fixed-top">
       <!-- BEGIN TOP NAVIGATION BAR -->
       <?php include 'includes/navigetor_bar.php'; ?>
       <!-- END TOP NAVIGATION BAR -->
   </div>
   <!-- END HEADER -->
   <!-- BEGIN CONTAINER -->
   <div id="container" class="row-fluid">
      <!-- BEGIN SIDEBAR -->
      <div class="sidebar-scroll">
        <div id="sidebar" class="nav-collapse collapse">

         <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
         <div class="navbar-inverse">
            <form class="navbar-search visible-phone">
               <input type="text" class="search-query" placeholder="Search" />
            </form>
         </div>
         <!-- END RESPONSIVE QUICK SEARCH FORM -->
         <!-- BEGIN SIDEBAR MENU -->
          <?php include 'includes/menu.php'; ?>
         <!-- END SIDEBAR MENU -->
      </div>
      </div>
      <!-- END SIDEBAR -->
      <!-- BEGIN PAGE -->  
      <div id="main-content">
         <!-- BEGIN PAGE CONTAINER-->
         <div class="container-fluid">
            <!-- BEGIN PAGE HEADER-->   
            <div class="row-fluid">
               <div class="span12">
                                    <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                   <h3 class="page-title">
                     FORMULARIO DE ASIGNACIÓN DE TURNOS
                   </h3>
                   <ul class="breadcrumb">
                       <li>
                           <a href="index.php">Inicio</a>
                           <span class="divider">/</span>
                       </li>
                       <li>
                           <a href="../administrador/registro_usuario.php">Administrador</a>
                           <span class="divider">/</span>
                       </li>
                       <li class="active">
                           Panel Principal
                       </li>
                       <li class="pull-right search-wrap">
                           <form action="search_result.html" class="hidden-phone">
                               <div class="input-append search-input-area">
                                   <input class="" id="appendedInputButton" type="text">
                                   <button class="btn" type="button"><i class="icon-search"></i> </button>
                               </div>
                           </form>
                       </li>
                   </ul>
                   <!-- END PAGE TITLE & BREADCRUMB-->
               </div>
            </div>
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->
            <?php include('includes/btn_atras_adelante.html') ?>
            <div class="row-fluid">
              <?php  ?>
<div class="span6">
<div class="widget blue" >
                        <div class="widget-title">
                            <h4><i class="icon-reorder"> </i> DATOS</h4>
                            <span class="tools">
                                <a href="javascript:;" class="icon-chevron-down"></a>
                                <a href="javascript:;" class="icon-remove"></a>
                            </span>
                        </div>
                        <div class="widget-body">
                            <div class="text-center">
 
 <script type="text/javascript">

 function actualizar(){
$('#contenido').load('proc_turnos/campos_turnos.php');
}
setInterval( "actualizar()", 100 );
   $.ajaxSetup({ cache: false });

 </script>
    <div id="contenido"><img src="img/loading.gif"></div>
<div class="alert alert-info">
                                <strong>DATOS PERSONALES</strong> <br><br>
                                        <input type="text" placeholder="<?php echo($_SESSION["cedula"])?>" contenteditable="false">
           <input type="text" placeholder="<?php echo($_SESSION["nombre"])?>"  contenteditable="false">
           <input type="text" placeholder="<?php echo($_SESSION["apellido"])?>"  contenteditable="false">
           <input type="text" placeholder="<?php echo($_SESSION["direccion"])?>"  contenteditable="false">
           <input type="text" placeholder="<?php echo($_SESSION["telefono"])?>"  contenteditable="false">

                    </div>
                    
      <form action="index.php">              
                    <div class="alert alert-info">
                                <strong>DEPARTAMENTO</strong> <br><br>
<?php 
$consulta = "SELECT * FROM departamentos where abreviatura='".$_GET['txtdep']."'";
$resultado = $conexion->query($consulta)or die ( $mysqli->error);
$fila = mysqli_fetch_array($resultado);
$_SESSION['departamento']=$fila['nombre_departamento'];
$nombre_depa=$fila['nombre_departamento'];
echo '<input type="text" name="txtdep" VALUE="'.$_SESSION['departamento'].'">';
?>          
                    </div>
           <div class="btn-cont">
            <button class="btn btn-primary" name="btn_generar" value="0">ACEPTAR</button>
                     
                                 
                                 </div>
                                 </form>
                                 <br>
           
                            </div>
                            </div>
                            </div>

</div>

<div class="span6">
<div class="widget blue" >
                        <div class="widget-title">
                            <h4><i class="icon-reorder"> </i> MIS TURNOS</h4>
                            <span class="tools">
                                <a href="javascript:;" class="icon-chevron-down"></a>
                                <a href="javascript:;" class="icon-remove"></a>
                            </span>
                        </div>
                        <div class="widget-body">
                            

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
include 'conexion.php';

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
                                        <td class="label label-important"><?php echo $fila_mod['estado'];?></td>

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
                                        <td class="label label-perdido"><?php echo $fila_mod['estado'];?></td>

<?php 
}
 ?>

</tr>
<?php 
}
 ?>
                                      </tbody>
                                </table>

                            </div>
                            </div>

</div>
                            </div>
       <?php

$generar_turno=true;

 $consulta_turnos = "SELECT count(turnos_proc.nroturno) as num_turnos FROM turnos,turnos_proc
  WHERE (turnos_proc.estado='ACTIVO' or turnos_proc.estado='ATENDIDO'
    or turnos_proc.estado='EN ESPERA' or turnos_proc.estado='CANCELADO' or turnos_proc.estado='PERDIDO') 
and turnos.nroturno=turnos_proc.nroturno and idusuario='".$_SESSION["idusuario"]."' and DAY(turnos_proc.fecha)=DAY(NOW());";
$resultado_turnos = $conexion->query($consulta_turnos)or die ( $mysqli->error);
$fila_turnos = $resultado_turnos->fetch_array();
$nro_turnos=$fila_turnos[0];
//echo $nro_turnos;
if ($nro_turnos>=2) {
  $generar_turno=false;
  echo "<script> alert('SOLO ESTA PERMITIDO LA GENERACION DE 2 TURNOS POR DÍA');  </script>";
};

$consulta_turnos = "SELECT count(turnos.nroturno) FROM turnos,turnos_proc  WHERE turnos.idusuario='".$_SESSION["idusuario"]."' and nombre_departamento='".$nombre_depa."' and turnos.nroturno=turnos_proc.nroturno and DAY(turnos_proc.fecha)=DAY(now()) ";
$resultado_turnos = $conexion->query($consulta_turnos)or die ( $mysqli->error);
$fila_turnos = $resultado_turnos->fetch_array();
$nro_turnos=$fila_turnos[0];
if ($nro_turnos==1) {
  $generar_turno=false;
  echo "<script> alert('USTED YA A GENERADO UN TURNO PARA ESTE DEPARTAMENTO');  </script>";
  echo "<meta http-equiv='Refresh' content='0.5;url=index.php'>";
};

if ($generar_turno){

//date_default_timezone_set('America/Los_Angeles');
              if(isset($_GET['btn_generar'])){

function number_pad($number,$n) { 
return str_pad(((int) $number)+1,$n,"0",STR_PAD_LEFT); 
}
$_SESSION["getdep"]=$_GET['txtdep'];


  $consulta3 = "SELECT * FROM departamentos where abreviatura='".$_SESSION["getdep"]."'";
$resultado3 = $conexion->query($consulta3)or die ( $mysqli->error);
$fila3 = $resultado3->fetch_array();
$nombre_dep=$fila3[0];


$consulta2 = "SELECT max(nroturno) FROM turnos,departamentos WHERE estado='EN ESPERA' and turnos.nombre_departamento=departamentos.nombre_departamento and nombre_modulo='".$fila3[1]."'";

$resultado2=$conexion->query($consulta2);
$fila2 = $resultado2->fetch_array()or die ( $mysqli->error);
if(!$fila2[0]){
$_SESSION["idsturno"]="000";
}else{
$_SESSION["idsturno"]=$fila2[0]; 
}

//echo $_SESSION["idsturno"];

$consulta_mod = "SELECT abreviatura_mod FROM departamentos,modulos WHERE departamentos.nombre_modulo=modulos.nombre_modulo and abreviatura='".$_GET['txtdep']."'";
$resultado_mod=$conexion->query($consulta_mod);
$fila_mod = $resultado_mod->fetch_array();
$abre_mod=$fila_mod[0];


$newturno=$abre_mod."-".number_pad(substr($_SESSION["idsturno"],-3),3);

$consulta = "SELECT * FROM departamentos where abreviatura='".$_GET['txtdep']."'";
$resultado = $conexion->query($consulta)or die ( $mysqli->error);
$fila = $resultado->fetch_array();


$departamento=$fila['nombre_departamento'];
$sql = "INSERT INTO turnos(nroturno,nombre_departamento,idusuario,estado,observaciones) VALUES ('" .strval ($newturno). "',
    '" . $departamento . "','" . $_SESSION["idusuario"] . "','EN ESPERA','Ninguna')";
                                        $resultado = $conexion->query($sql);
                                        if ($resultado=== TRUE) {
                                            echo "<script> alert('GENERACION CORRECTA');  </script>";
                      $_SESSION["idturno"]=$newturno;
//ini_set('date.timezone','America/Lima'); 
date_default_timezone_set('America/Guayaquil');

$consulta = "SELECT tiempo_espera FROM parametros ";
$resultado = $conexion->query($consulta)or die ( $mysqli->error);
$fila = mysqli_fetch_array($resultado);
$aux=$fila[0]*60;

$consulta = "SELECT count(turnos_proc.nroturno) FROM turnos,turnos_proc where turnos_proc.estado='EN ESPERA' and SUBSTRING(turnos_proc.nroturno,1,5)='".substr ( $newturno , 0, 5)."' and turnos.nroturno=turnos_proc.nroturno and CONVERT(SUBSTRING_INDEX(turnos_proc.nroturno,'-',-1),UNSIGNED INTEGER)<'".intval (substr ( $newturno , 5, strlen ($newturno)))."';";
$resultado = $conexion->query($consulta)or die ( $mysqli->error);
$fila = mysqli_fetch_array($resultado);
echo $fila[0];
if ($fila[0]==0) {
 $tiempo_espera=$aux;
};
if ($fila[0]==1) {
 $tiempo_espera=($fila[0]*2)*$aux;
};
if ($fila[0]>1){
$tiempo_espera=$fila[0]*$aux;
}



$hora_actual = strtotime(date("H:i"));


$nuevaHora=date("H:i",$hora_actual+$tiempo_espera);




                      $sql = "INSERT INTO turnos_proc(idturnos_proc,nroturno,estado,tiempo,fecha,hora) VALUES (idturnos_proc,'" .strval ($newturno). "','EN ESPERA','00:00:00','".date("Y-m-d")."','".$nuevaHora."')";
                                          $resultado = $conexion->query($sql)or die ( $conexion->error);
                                        if ($resultado) {
                       //  echo "<meta http-equiv='Refresh' content='0.5;url=info_general.php?txtdep=informacion'>";
                         
                                        } else {
                                            echo "<script> alert('ERROR proc');  </script>";
                                        }
                                        } else {
                                          echo $conexion->error;
                                            echo "<script> alert('USTED YA A GENERADO UN TURNO');  </script>";
                                            //echo "<meta http-equiv='Refresh' content='0.5;url=index.php'>";
                                        }
    }
                
       }



       ?>
   <!-- BEGIN FOOTER -->
   <?php include 'includes/footer.php'; ?>
   <!-- END FOOTER -->

   <!-- BEGIN JAVASCRIPTS -->
   <!-- Load javascripts at bottom, this will reduce page load time -->
   <script src="js/jquery-1.8.3.min.js"></script>
   <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
   <script type="text/javascript" src="assets/jquery-slimscroll/jquery-ui-1.9.2.custom.min.js"></script>
   <script type="text/javascript" src="assets/jquery-slimscroll/jquery.slimscroll.min.js"></script>
   <script src="assets/fullcalendar/fullcalendar/fullcalendar.min.js"></script>
   <script src="assets/bootstrap/js/bootstrap.min.js"></script>

   <!-- ie8 fixes -->
   <!--[if lt IE 9]>
   <script src="js/excanvas.js"></script>
   <script src="js/respond.js"></script>
   <![endif]-->

   <script src="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js" type="text/javascript"></script>
   <script src="js/jquery.sparkline.js" type="text/javascript"></script>
   <script src="assets/chart-master/Chart.js"></script>
   <script src="js/jquery.scrollTo.min.js"></script>


   <!--common script for all pages-->
   <script src="js/common-scripts.js"></script>

   <!--script for this page only-->

   <script src="js/easy-pie-chart.js"></script>
   <script src="js/sparkline-chart.js"></script>
   <script src="js/home-page-calender.js"></script>
   <script src="js/home-chartjs.js"></script>

   <!-- END JAVASCRIPTS -->   
</body>
<!-- END BODY -->
</html>