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
        <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
        <link href="assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
        <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link href="css/style.css" rel="stylesheet" />
        <link href="css/style-responsive.css" rel="stylesheet" />
        <link href="css/style-default.css" rel="stylesheet" id="style_color" />
    </head>
    <!-- END HEAD -->
    <!-- BEGIN BODY -->
    <body class="lock">
        <div class="lock-header">
            <!-- BEGIN LOGO -->
            <a class="center" id="logo" href="../index.html">
                <img class="center" alt="logo" width="10%" src="img/logo.png">
            </a>
            <h1 style="color:#242B5D;">OTAVALO | DIGITAL</h1>
            <!-- END LOGO -->
        </div>

        <form name="frm_ingreso" id="frm_ingreso" method="post" action="script_acceso_usuario.php">
            <div class="login-wrap">
                <div class="metro single-size accordion">
                    <div class="locked">
                        <i class="icon-lock"></i>
                        <span>indentificate</span>
                    </div>
                </div>
                <div class="metro double-size blue" >
                    <div class="input-append lock-input">
                        <input name="usuario" id="usuario" type="text" class="" placeholder="Ingrese su usuario" required>
                    </div>
                </div>
                <div class="metro double-size blue">
                    <div class="input-append lock-input">
                        <input name="contrasena" id="contrasena" type="password" class="" placeholder="Ingrese su clave" required>
                    </div>
                </div>
              <div class="metro single-size accordion">
                    <button type="submit" class="btn login-btn">
                        Ingresar
                        <i class=" icon-long-arrow-right"></i>
                    </button>
                </div>
              <div class="login-footer">
                  <div class="remember-hint pull-left">
  
                </div>
                    <div class="forgot-hint pull-right">
                        <a id="forget-password" class="" href="registro_cliente.php">¿No tienes cuenta? REGISTRATE</a>
                    </div>
              </div>
            </div>
        </form>


    </body>
    <!-- END BODY -->
</html>