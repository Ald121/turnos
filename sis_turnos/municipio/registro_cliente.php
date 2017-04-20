<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <title>REGISTRO DE NUEVOS USUARIOS</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
        <link href="assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
        <link href="assets/bootstrap/css/bootstrap-fileupload.css" rel="stylesheet" />
        <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link href="css/style.css" rel="stylesheet" />
        <link href="css/style-responsive.css" rel="stylesheet" />
        <link href="css/style-default.css" rel="stylesheet" id="style_color" />

        <link href="assets/fancybox/source/jquery.fancybox.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="assets/uniform/css/uniform.default.css" />

        <link rel="stylesheet" type="text/css" href="assets/chosen-bootstrap/chosen/chosen.css" />
        <link rel="stylesheet" type="text/css" href="assets/jquery-tags-input/jquery.tagsinput.css" />
        <link rel="stylesheet" type="text/css" href="assets/clockface/css/clockface.css" />
        <link rel="stylesheet" type="text/css" href="assets/bootstrap-wysihtml5/bootstrap-wysihtml5.css" />
        <link rel="stylesheet" type="text/css" href="assets/bootstrap-datepicker/css/datepicker.css" />
        <link rel="stylesheet" type="text/css" href="assets/bootstrap-timepicker/compiled/timepicker.css" />
        <link rel="stylesheet" type="text/css" href="assets/bootstrap-colorpicker/css/colorpicker.css" />
        <link rel="stylesheet" href="assets/bootstrap-toggle-buttons/static/stylesheets/bootstrap-toggle-buttons.css" />
        <link rel="stylesheet" type="text/css" href="assets/bootstrap-daterangepicker/daterangepicker.css" />

        <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />

        <script type="text/javascript" src="jquery-1.3.2.js"></script>
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script src="js/validacion.js"></script>

        
        <script type="text/javascript" src="ajax_bus_usuario.js"></script>
            <script src="js/validar_pass.js"></script>
          
    </head>
    <!-- END HEAD -->
    <!-- BEGIN BODY -->
    <body class="fixed-top">
        <!-- BEGIN HEADER -->
        <div id="header" class="navbar navbar-inverse navbar-fixed-top">
            <!-- BEGIN TOP NAVIGATION BAR -->
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
                                FORMULARIO DE REGISTRO "USUARIOS"
                            </h3>
                            <ul class="breadcrumb">
                                <li>
                                    <a href="../index.php">Inicio</a>
                                    <span class="divider">/</span>
                                </li>
                                <li>
                                    <a href="#">Administrador</a>
                                    <span class="divider">/</span>
                                </li>
                                <li class="active">
                                    Usuarios
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
                            <!-- BEGIN SAMPLE FORMPORTLET-->
                            <div class="widget blue">
                                <div class="widget-title">
                                    <h4><i class="icon-reorder"></i>REGISTRO - USUARIOS </h4>
                                    <span class="tools">
                                        <a href="javascript:;" class="icon-chevron-down"></a>
                                        <a href="javascript:;" class="icon-remove"></a>
                                    </span>
                                </div>
                                <div class="widget-body">
                                    <!-- BEGIN FORM-->

                                    <?php
                                    if (isset($_REQUEST['RegistrarCliente'])) {
                                    include("conexion.php"); 
									    $sql = "INSERT INTO usuario (cedula,nombre,apellido,telefono,direccion,email,sexo,estado,usuario,pass,tipo_user) "
                                                . "VALUES ('" . $_POST['cedula'] . "',
		'" . $_POST['nombre'] . "',
		'" . $_POST['apellido'] . "',
                '" . $_POST['telefono'] . "',
		'" . $_POST['direccion'] . "',
		'" . $_POST['email'] . "',
		'" . $_POST['genero'] . "',
		'PASIVO',
		'" . $_POST['usuario'] . "',
		'" . $_POST['pass'] . "','CLIENTE')";
                                        if ($sql) {
                                         $conexion->query($sql);
                                            echo "<script> alert('SE REGISTRO CORRECTAMENTE!! ');  </script>";
                                        } else {
                                            echo "<script> alert('ERROR AL INGRESAR DATOS');  </script>";
                                        }
                                    
									
									//------------------------------------------enviar coreo

require("../email/class.phpmailer.php");
require("../email/class.smtp.php");

//Especificamos los datos y configuraci�n del servidor
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->SMTPSecure = "ssl";
$mail->Host = "smtp.gmail.com";
$mail->Port = 465;

//Nos autenticamos con nuestras credenciales en el servidor de correo Gmail
$mail->Username = "patriandsjaypi@gmail.com";
$mail->Password = "paghdyytbvskvwcx";

//Agregamos la informaci�n que el correo requiere
$mail->From = "patriandsjaypi@gmail.com";
$mail->FromName = "Autenticacion Usuario";
$mail->Subject = "Otavalo System";
$mail->AltBody = "";

$mail->MsgHTML('<!DOCTYPE html>
<html lang="es"> 

    <head>
        <meta charset="utf-8" />
        <title>Otavalo | Digital</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
     <style type="text/css">

h1,h2,h3,h4,h5,h6{
font-weight: normal; font-family: "MyriadPro-Light";

}
     </style>
      
    </head>
    <!-- END HEAD -->
    <!-- BEGIN BODY -->
    <body class="lock" style="color: #888888; background: #F0F0F0;">
        <div style="    text-align: center;">
            <!-- BEGIN LOGO -->
            <a class="center" id="logo" >
                <img class="center" alt="logo" width="10%" src="http://192.168.1.4/sis_turnos/municipio/img/logo.png">
            </a>
            <h1 style="color:#242B5D;">OTAVALO | DIGITAL</h1>

            <h3 style="color:#242B5D;">Bienvenido Gracias por registrarte</h3>
             <h4 style="color:#242B5D;">Tus Datos son:</h4>

 <strong style="color:#242B5D;">Usuario: </strong>'.$_POST['usuario'].'<br>
  <strong style="color:#242B5D;">Clave: </strong>'.$_POST['pass'].'<br>
             <h3 style="color:#242B5D;">Para activar tu cuenta debes dar clic en el siguiente boton:</h3>
            <!-- END LOGO -->
            <a type="submit" target="new" href="http://192.168.1.4/sis_turnos/email/form_activacion.php" style="    background: none;
    font-size: 28px;
    margin-top: 65px;
    color: #242B5D;
border: none;
    ">
                        ACTIVAR CUENTA
                    </a>
        </div>


    </body>
    <!-- END BODY -->
</html>
    

       ');
$mail->AddAddress($_POST['email'], "Usuario Prueba");
$mail->IsHTML(true);

//Enviamos el correo electr�nico
$mail->Send();

echo '<div class="alert alert-error">
                                <button data-dismiss="alert" class="close">×</button>
                                <strong>Hemos Enviado un correo de activacion a '.$_POST['email'].' POR FAVOR VERIFICALO Y ACTIVA TU CUENTA PARA PODER ACCEDER AL SISTEMA</strong> </div>
                                ';
									}
									
									?> 




                                    <!--AJAX COMPROVACION CEDULA EN LA BDD-->
                                    <script type="text/javascript">
                                        $(document).ready(function() {
                                            $('#cedula').blur(function() {
                                                $('#Info').html('<img src="loader.gif" alt="" />').fadeOut(1000);
                                                var username = $(this).val();
                                                var dataString = 'cedula=' + username;
                                                $.ajax({
                                                    type: "POST",
                                                    url: "comprobarcedula.php",
                                                    data: dataString,
                                                    success: function(data) {
                                                        $('#Info').fadeIn(1000).html(data);
                                                        if (data == 1) {
                                                            document.customForm.cedula.value = "";
                                                            $('#Info').fadeIn(1000).html("<div style='color:red; text-shadow: 1px 0px 5px #5f9ea0;';>Número de cédula ya registrada</div>");
                                                        } else {
                                                            document.customForm.cedula.focus = false;
                                                            $('#Info').fadeIn(1000).html(data);
                                                        }
                                                        //alert(data);
                                                    }
                                                });
                                            });
                                        });
                                    </script>
                                    <!--FIN COMPROBACION DE CEDULA-->


                                    <!--AJAX COMPROVACION EMAIL EN LA BDD-->
                                    <script type="text/javascript">
                                        $(document).ready(function() {
                                            $('#email').blur(function() {
                                                $('#Infoemail').html('<img src="loader.gif" alt="" />').fadeOut(1000);
                                                var username = $(this).val();
                                                var dataString = 'email=' + username;
                                                $.ajax({
                                                    type: "POST",
                                                    url: "comprobaremail.php",
                                                    data: dataString,
                                                    success: function(data) {
                                                        $('#Infoemail').fadeIn(1000).html(data);
                                                        if (data == 1) {
                                                            document.customForm.correo.value = "";
                                                            $('#Infoemail').fadeIn(1000).html("<div style='color:red; text-shadow: 1px 0px 5px #5f9ea0;';>Correo Electrónico ya registrado</div>");
                                                        } else {
                                                            document.customForm.correo.focus = false;
                                                            $('#Infoemail').fadeIn(1000).html(data);
                                                        }
                                                        //alert(data);
                                                    }
                                                });
                                            });
                                        });
                                    </script>
                                    <!--FIN COMPROBACION DE EMAIL-->

                                    <form action="#" class="form-horizontal" method="post">
                                        <div class="control-group">
                                            <div id="Info"></div> 
                                            <label class="control-label">Cedula (*)</label>
                                            <div class="controls">
                                                <input type="text" id="cedula" name="cedula" onkeypress="return soloNumeros(event)"  onblur="javascript: validarcedula(this.value);" maxlength="10" class="span6  popovers" data-trigger="hover" data-content="Por favor digite el nùmero de cedula del usuario" data-original-title="CEDULA" />
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">Nombre (*)</label>
                                            <div class="controls">
                                                <input type="text" id="nombre" name="nombre" onkeypress="return soloLetras(event)" class="span6  popovers" data-trigger="hover" data-content="Por favor digite el Nombre del usuario" data-original-title="NOMBRE" />
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">Apellido (*)</label>
                                            <div class="controls">
                                                <input type="text" id="apellido" name="apellido" onkeypress="return soloLetras(event)" class="span6  popovers" data-trigger="hover" data-content="Por favor digite el Apellido del usuario" data-original-title="APELLIDO" />
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">Telefono (*)</label>
                                            <div class="controls">
                                                <input type="text" onkeypress="return soloNumeros(event)" maxlength="10" id="telefono" name="telefono" class="span6  popovers" data-trigger="hover" data-content="Por favor digite el nùmero de telefono/celular del usuario" data-original-title="TELEFONO/CELULAR" />
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">Direcciòn (*)</label>
                                            <div class="controls">
                                                <input type="text" id="direccion" name="direccion" class="span6  popovers" data-trigger="hover" data-content="Por favor digite la direcciòn donde recidel el usuario" data-original-title="DIRECCION" />
                                            </div>
                                        </div>


                                        <div id="Infoemail"></div>
                                        <div class="control-group">
                                            <label class="control-label">Correo Electronico</label>
                                            <div class="controls">
                                                <div class="input-prepend">
                                                    <span class="add-on">@</span><input class=" " type="text" id="email" name="email" placeholder="Email Address" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">GENERO DEL USUARIO</label>
                                            <div class="controls">
                                                <select class="span6" id="genero" name="genero" data-placeholder="Choose a Category" tabindex="1">
                                                    <option value="">Seleccione Genero ...</option>
                                                    <option value="MASCULINO">MASCULINO</option>
                                                    <option value="FEMENINO">FEMENINO</option>
                                                    <option value="OTRO">OTRO</option>

                                                </select>
                                            </div>
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
                                            <label class="control-label">Usuario (*)</label>
                                            <div class="controls">
                                                <input type="text" id="usuario" name="usuario" class="span6  popovers" data-trigger="hover" data-content="Por favor digite usuario" data-original-title="USUARIO" />
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">Contraseña (*)</label>
                                            <div class="controls">
                                                <input type="password" id="pass" name="pass" class="span6  popovers" data-trigger="hover" data-content="Por favor digite la contraseña del usuario" data-original-title="PASWORD" />
                                            </div>
                                        </div>



                                        <div class="form-actions">
                                            <button type="submit" id="RegistrarCliente" name="RegistrarCliente" class="btn btn-success">REGISTRAR USUARIO</button>
                                            <button type="button" class="btn">Cancelar</button>
                                        </div>
                                    </form>



                                    <!-- END FORM-->
                                </div>
                            </div>
                            <!-- END SAMPLE FORM PORTLET-->
                        </div>
                    </div>
                    <!-- END PAGE CONTAINER-->



                                    <!-- END PAGE -->
            </div>
            <!-- END CONTAINER -->
        </div>

        <!-- BEGIN FOOTER -->
       <div id="footer">
       2015 &copy; Otavalo| Digital.
   </div>
        <!-- END FOOTER -->

        <!-- BEGIN JAVASCRIPTS -->
        <!-- Load javascripts at bottom, this will reduce page load time -->

        <script src="js/jquery-1.8.2.min.js"></script>
        <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
        <script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="assets/bootstrap/js/bootstrap-fileupload.js"></script>
        <script src="js/jquery.blockui.js"></script>

        <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
        <script src="js/jQuery.dualListBox-1.3.js" language="javascript" type="text/javascript"></script>


        <!-- ie8 fixes -->
        <!--[if lt IE 9]>
        <script src="js/excanvas.js"></script>
        <script src="js/respond.js"></script>
        <![endif]-->
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



        <!--common script for all pages-->
        <script src="js/common-scripts.js"></script>

        <!--script for this page-->
        <script src="js/form-component.js"></script>
        <!-- END JAVASCRIPTS -->

        <script language="javascript" type="text/javascript">

                                                    $(function() {

                                                        $.configureBoxes();

                                                    });

        </script>


    </body>
    <!-- END BODY -->
</html>