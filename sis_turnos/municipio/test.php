<!DOCTYPE html>
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
                <img class="center" alt="logo" width="10%" src="http://localhost/turnos/sis_turnos/municipio/img/logo.png">
            </a>
            <h1 style="color:#242B5D;">OTAVALO | DIGITAL</h1>

            <h3 style="color:#242B5D;">Saludos Cordiales</h3>
             <h4 style="color:#242B5D;">Esta es una notificación automatica, el turno con los siguientes datos se ha perdido: </h4>
             <h4><strong>Nro. de Turno: </strong>'.$_POST['mensaje'].'</h4>
             <h4><strong>Departamento: </strong>'.$_POST['mensaje'].'</h4>
             <h4><strong>Fecha: </strong>'.$_POST['mensaje'].'</h4>
             <h4><strong>Hora Aproximada: </strong>'.$_POST['mensaje'].'</h4>
             <h4><strong>Módulo: </strong>'.$_POST['mensaje'].'</h4>
        
        </div>


    </body>
    <!-- END BODY -->
</html>