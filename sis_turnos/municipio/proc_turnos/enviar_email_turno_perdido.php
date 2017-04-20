  <style type="text/css">
.mensaje_ok{
        margin-top: 15px;
    color: white;
    background-color: #3FEC4C;
    text-transform: uppercase;
    border: 0;
    padding: 10px;
}
  </style>
  <?php
include("../conexion.php"); 
                         
//------------------------------------------enviar coreo

require("../../email/class.phpmailer.php");
require("../../email/class.smtp.php");

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
$mail->FromName = "OTAVALO | DIGITAL consulta de ".$_POST['nombre'];
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

            <h3 style="color:#242B5D;">Saludos Cordiales</h3>
             <h4 style="color:#242B5D;">Soy, '.$_POST['nombre'].' ('.$_POST['correo'].') tengo la siguiente consulta: </h4>
             <h3 style="color:#242B5D;">'.$_POST['mensaje'].'</h3>
        
        </div>


    </body>
    <!-- END BODY -->
</html>
       ');
$mail->AddAddress("patriands_pak@hotmail.com", $_POST['asunto']);
$mail->IsHTML(true);

//Enviamos el correo electr�nico
$mail->Send();

echo("<div class='mensaje_ok'>Mensaje enviado correctamente</div><br>");
                                    
                                    ?> 