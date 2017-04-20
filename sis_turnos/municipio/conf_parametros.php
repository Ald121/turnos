<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="es"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
   <meta charset="utf-8" />
   <title>ADMINSITRADOR- PARAMETROS</title>
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
      <script src="js/validar_pass.js"></script>
      <script src="js/validacion.js"></script>

</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="fixed-top">
        <script type="text/javascript">
$(document).ready(function(){
  $("#btn_guardar").click(function(){

var formvalido = true;

$("form#form_add_empleado :input").each(function(){
 if ($(this).val()==""&&$(this).prop('required')) {
   $(this).css('border-color','red');
   formvalido = false;
 }
});
 if (!formvalido) {
  alert("Debe completar lo siguientes campos");
 }
 else{

var formData = new FormData($("#form_add_empleado")[0]);

var ruta = "proc_turnos/proc_edit_param.php";

            $.ajax({
                url: ruta,
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(datos)
                {
                    $("#respuesta_edit_pass").html(datos);
                }
            });
}

           });

});
      </script>

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
                     FORMULARIO DE PARÁMETROS
                   </h3>
                   <ul class="breadcrumb">
                       <li>
                           <a href="index.php">Inicio</a>
                           <span class="divider">/</span>
                       </li>
                       <li>
                           <a href="conf_parametros.php">Configuracion de Parámetros</a>
                           <span class="divider">/</span>
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
                <div class="span4">
                    <!-- BEGIN CHART PORTLET-->
                    <div class="widget blue ">
                        <div class="widget-title">
                            <h4><i class="icon-edit"></i> Parámetros</h4>
                            <span class="tools">
                                <a href="javascript:;" class="icon-chevron-down"></a>
                                <a href="javascript:;" class="icon-remove"></a>
                            </span>
                        </div>
                        <div class="widget-body">
              <div class="text-center">
<div id="respuesta_edit_pass" >
                              </div>

                              <?php 
include("conexion.php"); 

$consultapram = "SELECT hora_inicio,hora_fin,tiempo_espera FROM parametros where idparametros='1'";
$resultadoparam = $conexion->query($consultapram)or die ( $conexion->error);
$filaparam=$resultadoparam->fetch_array();
                               ?>
<form id="form_add_empleado" class="form-horizontal " >
<input type="hidden" id="id_user" name="id_user" value="<?php echo $_SESSION['idusuario']; ?>"/>
<div class="control-group">
<div id="Info"></div> 
<strong>HORARIO: De </strong> <input type="time" class="span4" placeholder="Hora de inicio(*)" min="08:00" max="16:00" value="<?php echo $filaparam['hora_inicio']; ?>" id="hora_ini" name="hora_ini" onkeypress="return soloNumeros(event)"  maxlength="13" class="span12  popovers" data-trigger="hover" data-content="Por favor ingrese la hora de inicio de las actividades" data-original-title="HORA DE INICIO" required/><strong> A </strong> 
<input type="time" class="span4" placeholder="Hora de finalización (*)" min="8" max="16" id="hora_fin" value="<?php echo $filaparam['hora_fin']; ?>" name="hora_fin" class="span12  popovers" data-trigger="hover" data-content="Por favor ingrese la hora de finalización de las actividades" data-original-title="HORA DE FINALIZACIÓN" required/>
</div>
<div class="control-group">
<div id="Info"></div> 
<strong>TIPO DE ESPERA POR TURNO: </strong> 
<input type="number" class="span2" placeholder="tiempo de espera por turno (*))" min="1" max="30" id="tiempo_espera" value="<?php echo $filaparam['tiempo_espera']; ?>" name="tiempo_espera" data-trigger="hover" data-content="Se refire al tiempo de espera entre turnos" data-original-title="TIEMPO DE ESPERA" required/> MIN
</div>
<div class="form-actions">
<input type="Button" id="btn_guardar" class="btn btn-success" value="GUARDAR">
                                        </div>
</form>

                            </div>

                        </div>
                    </div>
                    <!-- END CHART PORTLET-->
                </div>

            </div>            

    <!-- BEGIN FOOTER -->
   <div id="footer">
       2015 &copy; Otavalo| Digital.
   </div>
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