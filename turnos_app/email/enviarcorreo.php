

<?php
require("class.phpmailer.php");
require("class.smtp.php");

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
$mail->From = "alex.dario@gmail.com";
$mail->FromName = "Autenticacion Usuario";
$mail->Subject = "Otavalo System";
$mail->AltBody = "";

$mail->MsgHTML('
    <style type="text/css">
            <!--
            .cajaInput {
                border: 1px dotted #ED1B24;
            }
            .style5 {color: #FF0000; font-family: Arial, Helvetica, sans-serif; font-weight: bold; font-size: 12px; }
            .style6 {
                font-family: Arial, Helvetica, sans-serif;
                font-size: 12px;
                font-weight: bold;
                font-style: italic;
            }
            .colorTextoFijo {
                color: #008F9F;
                font-weight: bold;
                font: Arial, Helvetica, sans-serif;
            }
            .lineaDivisoria {
                border-bottom-style:dotted;
                border-bottom-color:#ED1B24;
                border-bottom-width:1px;
                height: 2px;
            }
            .cajaInputIzq {
                border-top-width: 1px;
                border-bottom-width: 1px;
                border-left-width: 1px;
                border-top-style: dotted;
                border-bottom-style: dotted;
                border-left-style: dotted;
                border-top-color: #ED1B24;
                border-bottom-color: #ED1B24;
                border-left-color: #ED1B24;
            }
            .style9 {font-size: 8px;
                     font-family: Arial, Helvetica, sans-serif;
            }
            .style12 {color: #FFFFFF}
            .style13 {font-size: 12px; font-family: Arial, Helvetica, sans-serif;}
            .style14 {font-family: Arial, Helvetica, sans-serif; font-size: 12px; font-weight: bold; color: #FFFFFF; }
            .style15 {
                font-family: Arial, Helvetica, sans-serif;
                font-size: 10px;
                font-weight: bold;
                color: #FFFFFF;
            }
            .style6 {
                font-weight: bold;
                text-align: center;
            }
            .centro {
                text-align: center;
            }
            .isquierdo {
                text-align: left;
            }
            -->
        </style>
    </head>

    <body>
        <table width="650" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td width="10">&nbsp;</td>
                <td width="100"><table width="675" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td style="text-align:center;"><span class="colorTextoFijo">SISTEMA DE TURNOS</span></td>
                            <td class="style6"><div align="right"></div></td>
                        </tr>
                        <tr>
                             <td><div align="right" class="style6" >RUC.: 10917123810001</div></td>

                        </tr>
                        <tr>
                        <span class="colorTextoFijo"></span></td>
                            <td class="centro">ACTIVACIÒN</td>
                        </tr>
                        <tr>
                            <td><span class="style6">Mail: master@ota.gov</span><span class="style6"></span></td>
                        </tr>
                        <tr>
                            <td><span class="style6">OTAVALO - ECUADOR</span><span class="style6"></span></td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td class="style13">&nbsp;</td>
                        </tr>
                        <tr>
                            <td class="style13">DALE CLIC PARA ACTIVAR TU CUENTA <br> <br> 
<a href="http://192.168.1.1/sis_turnos/email/form_activacion.php"><img src="on.png" width="50" height="50" /></a>
                            </td> 

                        </tr>


                    </table></td>

       ');
$mail->AddAddress("patriandsjaypi@gmail.com", "Usuario Prueba");
$mail->IsHTML(true);

//Enviamos el correo electr�nico
$mail->Send();

?>


