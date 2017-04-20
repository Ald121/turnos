<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="es"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
   <meta charset="utf-8" />
   <title>ADMINSITRADOR- ASIGNACION DEPARTAMENTOS</title>
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
                   <div id="theme-change" class="hidden-phone">
                       <i class="icon-cogs"></i>
                        <span class="settings">
                            <span class="text">Theme Color:</span>
                            <span class="colors">
                                <span class="color-default" data-style="default"></span>
                                <span class="color-green" data-style="green"></span>
                                <span class="color-gray" data-style="gray"></span>
                                <span class="color-purple" data-style="purple"></span>
                                <span class="color-red" data-style="red"></span>
                            </span>
                        </span>
                   </div>
                   <!-- END THEME CUSTOMIZER-->
                  <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                   <h3 class="page-title">
                     FORMULARIO DE ASIGNACINO DE TURNOS
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
                               <?php
//---------------------------------------------------- ASIGNAR DEPARTAMENTOS //----------------------------------------------------
  if(isset($_GET['btn_asignar'])){
include 'conexion.php';
//echo $_POST['nombre_apellidos'];
 $items =$_GET['nombre_dep'];

for ($i=0; $i <count($items) ; $i++) { 
 $sql = "UPDATE departamentos SET idusuario='".$_GET['idusuario']."' WHERE nombre_departamento='".$items[$i]."'";
$resultado=$conexion->query($sql);
}

                                        if ($resultado) {
                
                                            echo "<script> alert('ASIGNACIÓN CORRECTA!! ');  </script>";
                                            echo "<script> window.location='http://localhost/tesis_cambios/sis_turnos/municipio/asignacion_turnos.php';  </script>";
                                        } else {
                                            echo "<script> alert('ERROR AL INGRESAR DATOS');  </script>";
                                            echo "<script> window.location='http://localhost/tesis_cambios/sis_turnos/municipio/asignacion_turnos.php';  </script>";
                                        }


}
//---------------------------------------------------- EDITAR DEPARTAMENTOS //----------------------------------------------------
if (isset($_GET['btn_editar_asignacion'])) {

   $items =$_GET['nombre_dep'];

for ($i=0; $i <count($items) ; $i++) { 
 $sql = "UPDATE departamentos SET idusuario='0' WHERE nombre_departamento='".$items[$i]."'";
$resultado=$conexion->query($sql);
}

                                        if ($resultado) {
                                              echo "<script> alert('EDICIÓN CORRECTA!! ');  </script>";
                                              echo "<script> window.location='http://localhost/tesis_cambios/sis_turnos/municipio/asignacion_turnos.php';  </script>";
                                        } else {
                                            echo "<script> alert('ERROR AL INGRESAR DATOS, INTENTALO NUEVAMENTE');  </script>";
                                            echo "<script> window.location='http://localhost/tesis_cambios/sis_turnos/municipio/asignacion_turnos.php';  </script>";
                                        }

}
?>
                                <input type="text" id="txt_busqueda" placeholder="Nombres, Apellidos" >
 
 <script type="text/javascript">

 $(document).ready(function(){

  function buscar_persona(valorCaja1){
        var parametros = {
                "txtbusqueda" : valorCaja1
        };
        $.ajax({
                data:  parametros,
                url:   'proc_turnos/tabla_asignacion.php',
                type:  'post',
                beforeSend: function () {
                      // $("#div_asignacion").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                        $("#div_asignacion").html(response);
                }
        });
}

$("#txt_busqueda").keyup(function(event) {
  buscar_persona($(this).val());
});

})

 </script>
<div id="div_asignacion"></div>
                            </div>
                            </div>
                            </div>
                                                    

    <!-- BEGIN FOOTER -->
   <div id="footer">
       2015 &copy; Metro Lab Dashboard.
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