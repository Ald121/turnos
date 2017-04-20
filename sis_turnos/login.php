<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <title>Otavalo | Digital</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <link href="municipio/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
        <link href="municipio/assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
        <link href="municipio/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link href="municipio/css/style.css" rel="stylesheet" />
        <link href="municipio/css/style-responsive.css" rel="stylesheet" />
        <link href="municipio/css/style-default.css" rel="stylesheet" id="style_color" />
    </head>
    <!-- END HEAD -->
    <!-- BEGIN BODY -->
    <body class="lock">
        <div class="lock-header">
            <!-- BEGIN LOGO -->
            <strong><h1 style="color:#F0F0F0; padding-top: 16px;">INGRESO</h1></strong>
            <!-- END LOGO -->
        </div>

        <form name="frm_ingreso" id="frm_ingreso" method="post" action="municipio/script_acceso_usuario.php">
            <div class="login-wrap">
                <div class="blue" style=" width: 240px;   margin-left: 15px;   height: 63px;">
                    <div class="lock-input">
                        <input name="index_login" type="hidden" value="0">
                        <input style="margin-top: 18px;" name="usuario" id="usuario" type="text" class="" placeholder="Ingrese su usuario" required>
                    </div>
                </div>
                <div class="blue" style="width: 240px;   margin-left: 15px;   height: 63px;">
                    <div class="lock-input" style="margin-top: 20px;">
                        <input style="margin-top: 18px;" name="contrasena" id="contrasena" type="password" class="" placeholder="Ingrese su clave" required>
                    </div><br><br>
                    <button type="submit" class="btn">
                        Ingresar
                        <i class=" icon-long-arrow-right"></i>
                    </button>
                </div>                    
              <div class="login-footer">
                    <div style="    width: 260px; padding-top: 10px;">
                        <a id="forget-password" style="color:#F0F0F0;" href="municipio/registro_cliente.php">¿No tienes cuenta? REGISTRATE</a>
                    </div>
              </div>
            </div>
        </form>


    </body>
    <!-- END BODY -->
</html>