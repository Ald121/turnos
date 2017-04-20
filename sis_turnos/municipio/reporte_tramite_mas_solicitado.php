<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
   <meta charset="utf-8" />
   <title>USUARIOS / ATENDIOS / EN ESPERA</title>
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
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="fixed-top">

<script type="text/javascript">
$(document).ready(function(){

     $("#btn_generar").click(function () {
                     
 var parametros = {
       "modulo" : $('.radioestado').val(),
       "idusuario" : $('#idusuario').val()
        };

 $.ajax({
  data: parametros,
                url: 'proc_turnos/pdf_tramite_mas_solicitado.php',
                type: "POST",
                success: function(datos)
                {
                   // $("#tabla_mis_usuarios").html(datos);
                }
            });


                    });


/*$("#txtbusqueda").keyup(function(event) {
  var parametros = {
       "textobusqueda" : $('#txtbusqueda').val(),
       "estado" : $(this).val(),
       "idusuario" : $('#idusuario').val()
        };

 $.ajax({
  data: parametros,
                url: 'proc_turnos/tabla_mis_usuarios.php',
                type: "POST",
                success: function(datos)
                {
                    $("#tabla_mis_usuarios").html(datos);
                }
            });
});*/


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
                     USUARIOS ATENDIDOS / EN ESPERA
                   </h3>
                   <ul class="breadcrumb">
                       <li>
                           <a href="index.php">Inicio</a>
                           <span class="divider">/</span>
                       </li>
                       <li class="active">
                       Usuarios Atendidos / en Espera
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
                            <h4><i class="icon-user"> </i> <i class="icon-user"> </i>   TRAMITE MÁS SOLICITADO</h4>
                            <span class="tools">
                                <a href="javascript:;" class="icon-chevron-down"></a>
                                <a href="javascript:;" class="icon-remove"></a>
                            </span>
                        </div>
                        <div class="widget-body">
<?php if ($_SESSION["tipouser"]=='CLIENTE') {
 ?>
 <form metod="GET" action="proc_turnos/pdf_tramite_mas_solicitado.php">
<?php 
};
  ?>                        
<?php if ($_SESSION["tipouser"]=='ADMIN') {
 ?>
 <form metod="GET" action="proc_turnos/pdf_tramite_mas_solicitado.php">
<?php 
};
 ?>
 <?php if ($_SESSION["tipouser"]=='SECRE') {
 ?>
 <form metod="GET" action="proc_turnos/pdf_tramite_mas_solicitado.php">
<?php 
}
 ?>
  <input id="idusuario" name="idusuario" type="hidden" value="<?php echo $_SESSION['idusuario']; ?>">
<?php if ($_SESSION["tipouser"]=='ADMIN'||$_SESSION["tipouser"]=='SECRE') {
 ?>
<input id="idusuario" name="idusuario" type="hidden" value="<?php echo $_SESSION['idusuario']; ?>">
<input id="txtbusqueda" type="hidden" placeholder="Búsqueda por: cedula,nombres o apellidos"class="span5">

<?php 
$consultadep = "SELECT * FROM modulos ;";
$resultadodep = $conexion->query($consultadep)or die ( $conexion->error);
while ($filadep = $resultadodep->fetch_array()) {

 ?>
<input class="radioestado" type="radio"  name="modulo" style="width: 15px;" value="<?php echo $filadep['nombre_modulo']; ?>"> <?php echo $filadep['nombre_modulo']; ?>
             <?php 
           }
};
?>      
<input class="radioestado" type="radio"  name="modulo" style="width: 15px;" value="TODOS" checked> TODOS         
<br><br>
<input type="Submit" id="btn_generar" class="btn btn-info" value="GENERAD PDF">

 </form>
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