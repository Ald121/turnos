<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="es"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
   <meta charset="utf-8" />
   <title>MUNICIPIO OTAVALO</title>
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
   <script src="js/jquery-1.8.3.min.js"></script>
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
                   <!-- BEGIN THEME CUSTOMIZER-->
                  
                   <!-- END THEME CUSTOMIZER-->
                  <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                   <h3 class="page-title">
                     SERVICIOS
                   </h3>
                   <ul class="breadcrumb">
                       <li>
                           <a href="/sis_turnos/index.php">Inicio</a>
                           <span class="divider">/</span>
                       </li>
                       <li class="active">
                           Panel Principal
                       </li>
                       <li class="pull-right search-wrap">
                           <form action="search_result.html" class="hidden-phone">
                               <div class="input-append search-input-area">
                           
                              
                               </div>
                           </form>
                       </li>
                   </ul>
                   <!-- END PAGE TITLE & BREADCRUMB-->
               </div>
            </div>
            <!-- END PAGE HEADER-->

            <!-- BEGIN PAGE CONTENT-->
            <div class="row-fluid">
                <!--BEGIN METRO STATES-->
                              <?php

if($_SESSION["tipouser"]=='CLIENTE'){

?>


<!--INICIO CAJA TURNO de USUARIO-->

<div class="widget blue">
                            <div class="widget-title">
                                <h4><i class="icon-reorder"></i> SU TURNO</h4>
                            <span class="tools">
                                <a href="javascript:;" class="icon-chevron-down"></a>
                                <a href="javascript:;" class="icon-remove"></a>
                            </span>
                            </div>
                            <div class="widget-body" >

                              
   <script type="text/javascript">

 function actualizar_turnos(){
$('#contenido_turnos').load('proc_turnos/campos_tabla_turnos.php');
}
setInterval( "actualizar_turnos()", 5000 );
   $.ajaxSetup({ cache: false });

 </script>

<div id="contenido_turnos"><img src="img/loading.gif"></div>

                        </div>
                        </div>

<!--FIN CAJA TURNO de USUARIO-->
<div class="widget blue">
                            <div class="widget-title">
                                <h4><i class="icon-reorder"></i> MAS DETALLES</h4>
                            <span class="tools">
                                <a href="javascript:;" class="icon-chevron-down"></a>
                                <a href="javascript:;" class="icon-remove"></a>
                            </span>
                            </div>
                            <div class="widget-body" >
           
<?php 
include('conexion.php');

$consulta_gen=$conexion->query("SELECT count(turnos_proc.nroturno) as num_turnos FROM turnos,turnos_proc
  WHERE (turnos_proc.estado='ACTIVO' or turnos_proc.estado='ATENDIDO'
    or turnos_proc.estado='EN ESPERA' or turnos_proc.estado='CANCELADO') 
and turnos.nroturno=turnos_proc.nroturno and idusuario='".$_SESSION["idusuario"]."' and DAY(turnos_proc.fecha)=DAY(NOW())");
$datos_gen=$consulta_gen->fetch_array();


if (intval($datos_gen['num_turnos'])<2) {
 ?>
<script type="text/javascript">

 function actualizar(){
$('#contenido').load('proc_turnos/campos_tabla_index.php');
}
setInterval( "actualizar()", 3000 );
   $.ajaxSetup({ cache: false });

 </script>
    <div id="contenido"><img src="img/loading.gif"></div>
            
            <?php
          }
          else{
            echo '<div class="alert alert-fail">
                        <strong>Usted no puede acceder a esta sección porque ya ha generado el numero maximo de turnos permitidos (2 TURNOS POR DÍA)</strong>
                    </div>';
          }
          ?>

                       </div>
                        </div>
          <?php
}
?>


                         <?php

if($_SESSION["tipouser"]=='SECRE'){
?>
<div class="metro-nav">

<script type="text/javascript">

 function actualizar_dep(){
$('#dep_asignados').load('proc_turnos/dep_asignados.php');
}
setInterval( "actualizar_dep()", 5000 );
   $.ajaxSetup({ cache: false });

</script>

<div id="dep_asignados"><img src="img/loading.gif"></div><br>

<?php
}
?>


                         <?php

if($_SESSION["tipouser"]=='ADMIN'){
?>
  
<div class="metro-nav">
<?php

//$consulta = "SELECT * FROM departamentos where idusuario='".$_SESSION["idusuario"]."'";
//$resultado = $conexion->query($consulta)or die ( $conexion->error);

//while ($fila = $resultado->fetch_array()) {

?>  

                    <div class="metro-nav-block nav-light-green">
                        <a data-original-title="" href="ingreso_empleados.php">
                        <i class="icon-user-md"></i>    
                        <div class="status" >Administrar Empleados</div>
                        </a>
                    </div>
                     <div class="metro-nav-block nav-deep-thistle">
                        <a data-original-title="" href="ingreso_modulos.php">
                        <i class="icon-list-ol"></i>    
                        <div class="status" >Administrar Módulos</div>
                        </a>
                    </div>
                     <div class="metro-nav-block nav-deep-red">
                        <a data-original-title="" href="ingreso_departamentos.php">
                        <i class="icon-building"></i>    
                        <div class="status" >Administrar Departamentos</div>
                        </a>
                    </div>
                    <div class="metro-nav-block nav-light-blue">
                        <a data-original-title="" href="asignacion_turnos.php">
                        <i class="icon-user"></i>
                        <i class="icon-tags"></i>       
                        <div class="status" >Asignar Departamentos</div>
                        </a>
                    </div>
                     <div class="metro-nav-block nav-light-purple">
                        <a data-original-title="" href="ingreso_clientes.php">
                        <i class="icon-user"></i>    
                         <i class="icon-user"></i>
                          <i class="icon-user"></i>
                        <div class="status" >Administrar Clientes</div>
                        </a>
                    </div>
                     <div class="metro-nav-block nav-light-yellow">
                        <a data-original-title="" href="conf_parametros.php">
                        <i class="icon-cog"></i>    
                        <div class="status" >Configuracion de parámetros</div>
                        </a>
                    </div>

<div class="widget blue">
                            <div class="widget-title">
                                <h4><i class="icon-reorder"></i> GERERAR TURNOS</h4>
                            <span class="tools">
                                <a href="javascript:;" class="icon-chevron-down"></a>
                                <a href="javascript:;" class="icon-remove"></a>
                            </span>
                            </div>
                            <div class="widget-body" >
           
        <script type="text/javascript">

 function actualizar(){
$('#tabla_gen_turnos_admin').load('proc_turnos/campos_tabla_index.php');
}
setInterval( "actualizar()", 3000 );
   $.ajaxSetup({ cache: false });

 </script>
    <div id="tabla_gen_turnos_admin"><img src="img/loading.gif"></div>
            

                       </div>
                        </div>




                         <?php
                         
//}
?>
 </div>
              
                                       <?php
}
?>

              
                <div class="space10"></div>
                <!--END METRO STATES-->
            </div>
           <div class="row-fluid">
                <div class="span6">
                    <!-- BEGIN CHART PORTLET-->
                    
                    <!-- END CHART PORTLET-->
                </div>
                <div class="span6">
                    <!-- BEGIN CHART PORTLET--><!-- END CHART PORTLET-->
                </div>
            </div>
            <div class="row-fluid">
                 <div class="span6">
                  
              </div>
                 <div class="span6">
                     <!-- BEGIN CHAT PORTLET--><!-- END CHAT PORTLET-->
                 </div>
           </div>
            <div class="row-fluid">
                <div class="span7 responsive" data-tablet="span7 fix-margin" data-desktop="span7">
                    <!-- BEGIN CALENDAR PORTLET--><!-- END CALENDAR PORTLET-->
                </div>
                <div class="span5">
                    <!-- BEGIN PROGRESS PORTLET--><!-- END PROGRESS PORTLET-->
                    <!-- BEGIN ALERTS PORTLET--><!-- END ALERTS PORTLET-->
              </div>
            </div>

            <!-- END PAGE CONTENT-->         
         </div>
         <!-- END PAGE CONTAINER-->
      </div>
      <!-- END PAGE -->  
   </div>
   <!-- END CONTAINER -->

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
   <!-- <script src="js/home-chartjs.js"></script> -->

   <!-- END JAVASCRIPTS -->   
</body>
<!-- END BODY -->
</html>