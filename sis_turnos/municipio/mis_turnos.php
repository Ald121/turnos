<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
   <meta charset="utf-8" />
   <title>MIS TURNOS</title>
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

   <script src="js/jquery-1.8.3.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
 $('#form_eliminar').hide();

$('.btn_cancelar_turno').click(function(){

//alert($(this).attr('idturnocancelar'));
$('#txtidanuncio').val($(this).attr('idturnocancelar'));
   $('#form_eliminar').show('slow');
  
});

$('.btn_si').click(function(){
   $('#form_eliminar').hide();
   // alert($('#txtiduser').val());
    var formData = new FormData($("#form_eliminar")[0]);
      var ruta = "proc_turnos/proc_cancelar_turno.PHP";
            $.ajax({
                url: ruta,
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(datos)
                {
                    $("#respuesta_cancelacion").html(datos);
                }
            });

});

});

</script>
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
                     MIS TURNOS
                   </h3>
                   <ul class="breadcrumb">
                       <li>
                           <a href="index.php">Inicio</a>
                           <span class="divider">/</span>
                       </li>
                       <li class="active">
                        Mis Turnos
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
<div class="span12">
<div class="widget blue" >
                        <div class="widget-title">
                            <h4><i class="icon-reorder"> </i> MIS TURNOS</h4>
                            <span class="tools">
                                <a href="javascript:;" class="icon-chevron-down"></a>
                                <a href="javascript:;" class="icon-remove"></a>
                            </span>
                        </div>
                        <div class="widget-body">
                            
<form class="label label-important" id="form_eliminar">
    <input type="hidden" id="txtidanuncio" name="txtidanuncio">
¿Esta seguro de Cancelar su turno?
<input type="button" value="SI" class="btn_si">
</form>

<div id="respuesta_cancelacion"></div>

<table class="table table-striped table-bordered table-advance table-hover">
                      <thead>
                                    <tr>
                                        <th><i class=""></i> NRO. TURNO</th>
                                        <th><i class=""></i> DEPARTAMENTO</th>
                                        <th><i class=""></i> MÓDULO</th>
                                        <th><i class=""></i> FECHA</th>                                       
                                        <th><i class=""></i> HORA</th>
                                        <th><i class=""></i> ESTADO</th>
                                        <th><i class=""></i> IMPRIMIR</th>
                                        <th><i class=""></i> CANCELAR</th>
                                    </tr>
                                                                       </thead>
                                    <tbody>
<?php
include 'conexion.php';

$consulta_mod = "SELECT * FROM turnos,turnos_proc where (turnos_proc.estado='EN ESPERA' or
 turnos_proc.estado='ACTIVO' or turnos_proc.estado='ATENDIDO' or turnos_proc.estado='CANCELADO'or turnos_proc.estado='PERDIDO') 
and idusuario='".$_SESSION["idusuario"]."' and turnos.nroturno=turnos_proc.nroturno;";



$resultado_mod = $conexion->query($consulta_mod)or die ( $mysqli->error);
while ($fila_mod = $resultado_mod->fetch_array()) {

$sql_mod=$conexion->query("SELECT nombre_modulo FROM departamentos WHERE nombre_departamento='".$fila_mod['nombre_departamento']."'");
$datos_mod=$sql_mod->fetch_array();
?>
<tr>

                                        <td ><?php echo $fila_mod['nroturno'];?></td>
                                        <td ><?php echo $fila_mod['nombre_departamento'];?></td>
                                        <td ><?php echo $datos_mod['nombre_modulo'];?></td>
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

   <td><strong><a href='proc_turnos/generacion_pdf.php?nro=<?php echo $fila_mod['nroturno'];?>&user=<?php echo $_SESSION["nombre"].' '.$_SESSION["apellido"];?>&hora=<?php echo $fila_mod['hora'];?>&modulo=<?php echo $datos_mod[0];?>&depar=<?php echo $fila_mod['nombre_departamento'];?>'>IMPRIMIR</a></strong></td>


                                          <?php 
if ($fila_mod['estado']=="ACTIVO"||$fila_mod['estado']=="EN ESPERA") {
                                         ?>
<td><a style="color:#E80000;" idturnocancelar="<?php echo $fila_mod['nroturno'];?>" class="btn_cancelar_turno" href="#">CANCELAR TURNO</a></td>

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
      
   <!-- BEGIN FOOTER -->
   <?php include 'includes/footer.php'; ?>
   <!-- END FOOTER -->

   <!-- BEGIN JAVASCRIPTS -->
   <!-- Load javascripts at bottom, this will reduce page load time -->

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