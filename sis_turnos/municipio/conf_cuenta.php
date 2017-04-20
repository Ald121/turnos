<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="es"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
   <meta charset="utf-8" />
   <title>ADMINSITRADOR- CONF DE CUENTA</title>
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

var ruta = "proc_turnos/proc_edit_pass.php";

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

btn_editar

$("#btn_editar").click(function(){

var formvalido = true;

$("form#form_edit_perfil :input").each(function(){
 if ($(this).val()==""&&$(this).prop('required')) {
   $(this).css('border-color','red');
   formvalido = false;
 }
});
 if (!formvalido) {
  alert("Debe completar lo siguientes campos");
 }
 else{

var formData = new FormData($("#form_edit_perfil")[0]);

var ruta = "proc_turnos/proc_editar_empleado.php";

            $.ajax({
                url: ruta,
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(datos)
                {
                    $("#respuesta_edit_perfil").html(datos);
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
                     FORMULARIO DE CONFIGURACIÓN DE CUENTA
                   </h3>
                   <ul class="breadcrumb">
                       <li>
                           <a href="index.php">Inicio</a>
                           <span class="divider">/</span>
                       </li>
                       <li>
                           <a href="conf_cuenta.php.php">Configuración</a>
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

<?php 

include('conexion.php');

$consulta = "SELECT * FROM usuario where idusuario='".$_SESSION['idusuario']."'";
$resultado = $conexion->query($consulta)or die ( $conexion->error);
$fila=$resultado->fetch_array();
 ?>

<div class="span6">
                    <!-- BEGIN CHART PORTLET-->
                    <div class="widget blue ">
                        <div class="widget-title">
                            <h4><i class="icon-user"></i> Añadir Empleado</h4>
                            <span class="tools">
                                <a href="javascript:;" class="icon-chevron-down"></a>
                                <a href="javascript:;" class="icon-remove"></a>
                            </span>
                        </div>
                        <div class="widget-body">
              <div class="text-center">
<div id="respuesta_edit_perfil" >
                              </div>
<form id="form_edit_perfil" class="form-horizontal" >
  <input type="hidden" id="id_user" name="id_user"/>
     <input type="hidden" id="id_user" name="id_user" value="<?php echo $_SESSION['idusuario']; ?>" readonly/>
<div class="control-group">
<div id="Info"></div> 
<input type="text" placeholder="Cedula (*)" value="<?php echo $fila['cedula']; ?>" id="cedula" name="cedula" onkeypress="return soloNumeros(event)"  onblur="javascript: validarcedula(this.value);" maxlength="13" class="span12  popovers" data-trigger="hover" data-content="Por favor digite el nùmero de cedula del usuario" data-original-title="CEDULA" required readonly/>
</div>
<div class="control-group">
<input type="text" placeholder="Nombre (*)" value="<?php echo $fila['nombre']; ?>" id="nombre" onkeypress="return soloLetras(event)" name="nombre" class="span12  popovers" data-trigger="hover" data-content="Por favor digite el Nombre del usuario" data-original-title="NOMBRE" required/>
</div>
<div class="control-group">
<input type="text" placeholder="Apellido (*)" value="<?php echo $fila['apellido']; ?>" id="apellido" onkeypress="return soloLetras(event)" name="apellido" class="span12  popovers" data-trigger="hover" data-content="Por favor digite el Apellido del usuario" data-original-title="APELLIDO" required/>
</div>
<div class="control-group">
<input type="text" placeholder="Telefono (*)" value="<?php echo $fila['telefono']; ?>" id="telefono" name="telefono" onkeypress="return soloNumeros(event)"  maxlength="10" class="span12  popovers" data-trigger="hover" data-content="Por favor digite el nùmero de telefono/celular del usuario" data-original-title="TELEFONO/CELULAR" required/>
</div>
<div class="control-group">
<input type="text" placeholder="Direcciòn (*)" value="<?php echo $fila['direccion']; ?>"id="direccion" name="direccion" class="span12  popovers" data-trigger="hover" data-content="Por favor digite la direcciòn donde recidel el usuario" data-original-title="DIRECCION" required/>
</div>
<div id="Infoemail"></div>
<div class="control-group">
<input class="span12" placeholder="Correo Electrónico" value="<?php echo $fila['email']; ?>" type="text" id="email" name="email" placeholder="Email Address" readonly/>
</div>
<script type="text/javascript">
$(document).ready(function(){
$('#genero option[value="<?php echo $fila["sexo"]; ?>"]').attr('selected','selected');
});
</script>
<div class="control-group">
<select class="span12" id="genero" name="genero" data-placeholder="Choose a Category" tabindex="1">
<option value="0">Seleccione Genero ...</option>
<option value="MASCULINO">MASCULINO</option>
<option value="FEMENINO">FEMENINO</option>
<option value="OTRO">OTRO</option>
</select>
</div>
<hr width="100%"/>
<div class="alert alert-info" id="pswd_info">
                                <button data-dismiss="alert" class="close">×</button>

   <h4><strong>Requerimientos de contraseña:</strong></h4><br>
   <ul>
      <li id="letter">Al menos debería tener <strong>una letra</strong></li>
      <li id="capital">Al menos debería tener <strong>una letra en mayúsculas</strong></li>
      <li id="number">Al menos debería tener <strong>un número</strong></li>
      <li id="length">Debería tener <strong>8 carácteres</strong> como mínimo</li>
   </ul>
                            </div>
<div class="control-group">
<input type="text" placeholder="Usuario (*)" value="<?php echo $fila['usuario']; ?>" id="usuario" name="usuario" class="span12  popovers" data-trigger="hover" data-content="Por favor digite usuario" data-original-title="USUARIO" required readonly/>
</div>
</form>
<div class="form-actions">
<input type="Button" id="btn_editar" class="btn btn-success" value="GUARDAR">
                                        </div>
                            </div>

                        </div>
                    </div>
                    <!-- END CHART PORTLET-->
                </div>


                <div class="span4">
                    <!-- BEGIN CHART PORTLET-->
                    <div class="widget blue ">
                        <div class="widget-title">
                            <h4><i class="icon-edit"></i> Configuración</h4>
                            <span class="tools">
                                <a href="javascript:;" class="icon-chevron-down"></a>
                                <a href="javascript:;" class="icon-remove"></a>
                            </span>
                        </div>
                        <div class="widget-body">
              <div class="text-center">
<div id="respuesta_edit_pass" >
                              </div>
                              <div class="alert alert-info" id="pswd_info">
                                <button data-dismiss="alert" class="close">×</button>

   <h4><strong>Requerimientos de contraseña:</strong></h4><br>
   <ul>
      <li id="letter">Al menos debería tener <strong>una letra</strong></li>
      <li id="capital">Al menos debería tener <strong>una letra en mayúsculas</strong></li>
      <li id="number">Al menos debería tener <strong>un número</strong></li>
      <li id="length">Debería tener <strong>8 carácteres</strong> como mínimo</li>
   </ul>
                            </div>
<form id="form_add_empleado" class="form-horizontal" >
<input type="hidden" id="id_user" name="id_user" value="<?php echo $_SESSION['idusuario']; ?>"/>
<div class="control-group">
<div id="Info"></div> 
<input type="password" placeholder="Contraseña actual(*)" id="pass_actual" name="pass_actual" onkeypress="return soloNumeros(event)"  onblur="javascript: validarcedula(this.value);" maxlength="13" class="span12  popovers" data-trigger="hover" data-content="Por favor digite el nùmero de cedula del usuario" data-original-title="CEDULA" required/>
</div>
<div class="control-group">
<input type="password" placeholder="Nueva contraseña" id="new_pass" name="new_pass" class="span12  popovers" data-trigger="hover" data-content="Por favor digite el Nombre del usuario" data-original-title="NOMBRE" required/>
</div>
<div class="control-group">
<input type="password" placeholder="Confirmar Contraseña" id="confirm_pass" name="confirm_pass" class="span12  popovers" data-trigger="hover" data-content="Por favor digite el Apellido del usuario" data-original-title="APELLIDO" required/>
</div>
</form>
<div class="form-actions">
<input type="Button" id="btn_guardar" class="btn btn-success" value="GUARDAR">
                                        </div>
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