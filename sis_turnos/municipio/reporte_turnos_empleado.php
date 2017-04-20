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
   <link rel="stylesheet" type="text/css" href="assets/bootstrap-datepicker/css/datepicker.css" />
   <link rel="stylesheet" type="text/css" href="assets/bootstrap-daterangepicker/daterangepicker.css" />
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
                <div class="span2">
                  <div class="widget blue" >
                      <div class="widget-title">
                          <h4><i class="icon-user"> </i> <i class="icon-user"> </i>   TURNOS POR MES</h4>
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
                         <form metod="GET" action="proc_turnos/pdf_turnos_por_mes.php">
                        <?php 
                        };
                         ?>
                         <?php if ($_SESSION["tipouser"]=='SECRE') {
                         ?>
                         <form metod="GET" action="proc_turnos/pdf_tramite_mas_solicitado.php">
                        <?php 
                        }
                         ?>
                        <?php if ($_SESSION["tipouser"]=='ADMIN'||$_SESSION["tipouser"]=='SECRE') {
                         ?>
                        <input id="idusuario" name="idusuario" type="hidden" value="<?php echo $_SESSION['idusuario']; ?>">
                        <input id="txtbusqueda" type="hidden" placeholder="Búsqueda por: cedula,nombres o apellidos" class="span5">

                        <div class="control-group">
                                    <label class="control-label">Seleccione Mes</label>
                                    <div class="controls">
                                        <div class="input-prepend">
                                             <select class="selectpicker" name="mes">
                        <?php 
                        $meses=[
                                  ['id'=>1,'nombre'=>'Enero'],
                                  ['id'=>2,'nombre'=>'Febrero'],
                                  ['id'=>3,'nombre'=>'Marzo'],
                                  ['id'=>4,'nombre'=>'Abril'],
                                  ['id'=>5,'nombre'=>'Mayo'],
                                  ['id'=>6,'nombre'=>'Junio'],
                                  ['id'=>7,'nombre'=>'Julio'],
                                  ['id'=>8,'nombre'=>'Agosto'],
                                  ['id'=>9,'nombre'=>'Septiembre'],
                                  ['id'=>10,'nombre'=>'Octubre'],
                                  ['id'=>11,'nombre'=>'Noviembre'],
                                  ['id'=>12,'nombre'=>'Diciembre']
                                  // ['id'=>12,'nombre'=>'TODOS']
                                ];

                        foreach ($meses as $key => $value) {
                         ?>
                              <option  value="<?php echo $value['id']; ?>"><?php echo $value['nombre']; ?></option>
                                     <?php 
                                   }
                                   ?>
                         </select>
                                        </div>
                                    </div>
                                </div>
                       
                         <?php 
                        };
                        ?>        
                        <input type="Submit" id="btn_generar" class="btn btn-info" value="GENERAD PDF">

                         </form>
                      </div>
                  </div>
            </div>

             <div class="span4">
                  <div class="widget blue" >
                      <div class="widget-title">
                          <h4><i class="icon-user"> </i> <i class="icon-user"> </i>   TURNOS POR FECHAS</h4>
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
                         <form metod="GET" action="proc_turnos/pdf_turnos_por_mes.php">
                        <?php 
                        };
                         ?>
                         <?php if ($_SESSION["tipouser"]=='SECRE') {
                         ?>
                         <form metod="GET" action="proc_turnos/pdf_tramite_mas_solicitado.php">
                        <?php 
                        }
                         ?>
                        <?php if ($_SESSION["tipouser"]=='ADMIN'||$_SESSION["tipouser"]=='SECRE') {
                         ?>
                        <input id="idusuario" name="idusuario" type="hidden" value="<?php echo $_SESSION['idusuario']; ?>">
                        <input id="txtbusqueda" type="hidden" placeholder="Búsqueda por: cedula,nombres o apellidos" class="span5">

                                <div class="control-group">
                                    <label class="control-label">Seleccione un rango de fechas</label>
                                    <div class="controls">
                                        <div class="input-prepend">
                                            <span class="add-on"><i class="icon-calendar"></i></span>
                                            <input id="reservation" name="fechas" type="text" class=" m-ctrl-medium" />
                                        </div>
                                    </div>
                                </div>
                         <?php 
                        };
                        ?>        
                        <input type="Submit" id="btn_generar" class="btn btn-info" value="GENERAD PDF">

                         </form>
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
   <!-- <script src="js/home-chartjs.js"></script> -->

   <script type="text/javascript" src="assets/bootstrap-toggle-buttons/static/js/jquery.toggle.buttons.js"></script>
   <script type="text/javascript" src="assets/chosen-bootstrap/chosen/chosen.jquery.min.js"></script>
   <script type="text/javascript" src="assets/uniform/jquery.uniform.min.js"></script>
   <script type="text/javascript" src="assets/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
   <script type="text/javascript" src="assets/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
   <script type="text/javascript" src="assets/clockface/js/clockface.js"></script>
   <script type="text/javascript" src="assets/jquery-tags-input/jquery.tagsinput.min.js"></script>
   <script type="text/javascript" src="assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
   <script type="text/javascript" src="assets/bootstrap-daterangepicker/date.js"></script>
   <script type="text/javascript" src="assets/bootstrap-daterangepicker/daterangepicker.js"></script>
   <script type="text/javascript" src="assets/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
   <script type="text/javascript" src="assets/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
   <script type="text/javascript" src="assets/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
   <script src="assets/fancybox/source/jquery.fancybox.pack.js"></script>
   <script src="js/jquery.scrollTo.min.js"></script>
      <script src="js/form-component.js"></script>

   <!-- END JAVASCRIPTS -->   
</body>
<!-- END BODY -->
</html>