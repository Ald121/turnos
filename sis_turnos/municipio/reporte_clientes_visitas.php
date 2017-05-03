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
                                        <th><i class=""></i> CLIENTE</th>
                                        <th><i class=""></i> NRO. DE VISITAS</th>
                                        <th><i class=""></i> DEPARTAMENTO</th>
                                        <th><i class=""></i> FECHA</th>                                       
                                        <th><i class=""></i> HORA</th>
                                        <!-- <th><i class=""></i> IMPRIMIR</th> -->
                                        <!-- <th><i class=""></i> CANCELAR</th> -->
                                    </tr>
                                                                       </thead>
                                    <tbody>
<?php
include 'conexion.php';

$consulta_mod = "SELECT count(turnos.nroturno)as visitas,nombre,apellido,nombre_departamento,turnos.nroturno,fecha,hora FROM turnos,turnos_proc,usuario WHERE usuario.idusuario=turnos.idusuario and turnos.nroturno=turnos_proc.nroturno AND turnos_proc.estado='ATENDIDO' GROUP BY turnos.idusuario;";



$resultado_mod = $conexion->query($consulta_mod)or die ( $mysqli->error);
while ($fila_mod = $resultado_mod->fetch_array()) {

?>
<tr>

                                        <td ><?php echo $fila_mod['nroturno'];?></td>
                                        <td ><?php echo $fila_mod['nombre'].' '.$fila_mod['apellido'];?></td>
                                        <td ><?php echo $fila_mod['visitas']?></td>
                                        <td ><?php echo $fila_mod['nombre_departamento'];?></td>
                                        <td ><?php echo $fila_mod['fecha'];?></td>
                                        <td ><?php echo $fila_mod['hora'];?></td>
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