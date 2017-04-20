<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
   <meta charset="utf-8" />
   <title>ADMINSITRADOR- MUNICIPIO OTAVALO</title>
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
$_SESSION['dep']=$_GET['dep'];
//$_SESSION['dept']=$_GET['dept'];?>


                              <script type="text/javascript">

 $(document).ready(function(){
  $('#contenido').load('proc_turnos/campos_turnos_secre.php');
   $('#reloj').load('proc_turnos/reloj_espera.php');

   $('#reloj').load('reloj_espera.php');

});

function realizaProceso(valorCaja1){

  $('#txttiempo').val(document.getElementById('reloj').innerText);

  /*
        var parametros = {
                "valorCaja1" : valorCaja1
        };
        $.ajax({
                data:  parametros,
                url:   'proc_turnos/guardar_tiempo.php',
                type:  'post',
                beforeSend: function () {
                       // $("#resultado").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                        $("#resultado").html(response);
                }
        });*/
}

setInterval( "realizaProceso(document.getElementById('reloj').innerText)", 100 );
   $.ajaxSetup({ cache: false });
 </script>

 <div class="alert alert-info ">
                                <strong>TIEMPO</strong> 
                                <h1><strong>
  <div id="reloj"><img src="img/loading.gif"></div>

                                </strong></h1>
                            </div>

      <div id="contenido"><img src="img/loading.gif"></div>

<form action="info_general_secre.php">
 <textarea style="display:none;" id="txtauxobsercaciones" name="observaciones" class="span10" placeholder="Observaciones"></textarea>
<input type="hidden" name="tiempo" id="txttiempo" value="" readonly>

<input type="text" name="dep" value="<?php echo $_SESSION['dep'];?>" readonly><br>          
<button class="btn btn-success" id="btn_anterior" value="0" name="btn_anterior">ANTERIOR</button>
<button class="btn btn-primary" id="btn_siguiente" value="0" name="btn_siguiente">SIGUIENTE</button>
<button class="btn btn-danger" id="btn_terminar" value="0" name="btn_terminar">TERMINAR</button>
<button class="btn btn-warning" id="btn_perdido" value="0" name="btn_perdido">PERDIDO</button>
                                 </form>
                                 <br>
  
                            </div>
                            </div>
                            </div>                                                  

       <?php


if(isset($_GET['btn_terminar'])){


function nro_mas($number,$n) { 
return str_pad(((int) $number)+1,$n,"0",STR_PAD_LEFT); 
}

function nro_menos($number,$n) { 
return str_pad(((int) $number)-1,$n,"0",STR_PAD_LEFT); 
}

/*$consulta = "SELECT nombre_modulo FROM departamentos WHERE nombre_departamento='".$_SESSION['dep']."'";
$resultado = $conexion->query($consulta);
$fila = mysqli_fetch_array($resultado);
$nombre_mod=$fila[0];
*/

//$consulta = "SELECT min(turnos_proc.nroturno) FROM turnos,turnos_proc,departamentos WHERE turnos.nombre_departamento=departamentos.nombre_departamento and nombre_modulo='".$_SESSION['dep']."' and turnos_proc.nroturno=turnos.nroturno and turnos_proc.estado='EN ESPERA'";

//$resultado = $conexion->query($consulta);
//$fila = mysqli_fetch_array($resultado);


$nro1=substr($_SESSION["turnoactual"],0,strpos($_SESSION["turnoactual"],'-')+1);
$nro2=substr($_SESSION["turnoactual"],-1);

//echo $nro1."---".$nro2;

//echo "-----------------".$nro1.nro_mas($nro2,3);

$sql = "UPDATE turnos_proc SET estado='ATENDIDO' WHERE nroturno='".$_SESSION["turnoactual"]."'";
 $resultado = $conexion->query($sql);                                        
                                        if ($resultado===TRUE) {

                                         $_SESSION["idcliente"]=$nro1.nro_mas($nro2,3);
                                          
                                        } else {
                                            echo "<script> alert('ERROR ESTADO');  </script>";
                                        }

$sql = "UPDATE turnos_proc SET estado='ACTIVO' WHERE nroturno='".($nro1.nro_mas($nro2,3))."'";
 $resultado = $conexion->query($sql);                                        
                                        if ($resultado===TRUE) {
                                       //  echo "<meta http-equiv='Refresh' content='0.5;url=info_general_secre.php'>";
                                        } else {
                                            echo "<script> alert('ERROR ESTADO');  </script>";
                                        }

$observaciones=$_GET['observaciones'];

$sql = "UPDATE turnos SET observaciones='$observaciones' WHERE nroturno='".$_SESSION["turnoactual"]."'";
 $resultado = $conexion->query($sql)or die($conexion->error);                                        
                                        if ($resultado===TRUE) {
                                       //  echo "<meta http-equiv='Refresh' content='0.5;url=info_general_secre.php'>";
                                        } else {
                                            echo "<script> alert('ERROR ESTADO');  </script>";
                                        }

$sql = "UPDATE turnos_proc SET tiempo='".$_GET['tiempo']."' WHERE nroturno='".$_SESSION["turnoactual"]."'";
 $resultado = $conexion->query($sql)or die($conexion->error);                                     
                                        if ($resultado===TRUE) {

                                          // echo "('OK TIEMPO')";
                                        } else {
                                            // echo "('ERROR TIEMPO')";
                                        }

}

  ?>

<?php


if(isset($_GET['btn_perdido'])){


function nro_mas($number,$n) { 
return str_pad(((int) $number)+1,$n,"0",STR_PAD_LEFT); 
}

function nro_menos($number,$n) { 
return str_pad(((int) $number)-1,$n,"0",STR_PAD_LEFT); 
}


$nro1=substr($_SESSION["turnoactual"],0,strpos($_SESSION["turnoactual"],'-')+1);
$nro2=substr($_SESSION["turnoactual"],-1);


$sql = "UPDATE turnos_proc SET estado='PERDIDO' WHERE nroturno='".$_SESSION["turnoactual"]."'";
 $resultado = $conexion->query($sql);                                        
                                        if ($resultado===TRUE) {

                                         $_SESSION["idcliente"]=$nro1.nro_mas($nro2,3);
                                          
                                        } else {
                                            echo "<script> alert('ERROR ESTADO');  </script>";
                                        }

$sql = "UPDATE turnos_proc SET estado='ACTIVO' WHERE nroturno='".($nro1.nro_mas($nro2,3))."'";
 $resultado = $conexion->query($sql);                                        
                                        if ($resultado===TRUE) {
                                       //  echo "<meta http-equiv='Refresh' content='0.5;url=info_general_secre.php'>";
                                        } else {
                                            echo "<script> alert('ERROR ESTADO');  </script>";
                                        }

$observaciones=$_GET['observaciones'];

$sql = "UPDATE turnos SET observaciones='$observaciones' WHERE nroturno='".$_SESSION["turnoactual"]."'";
 $resultado = $conexion->query($sql)or die($conexion->error);                                        
                                        if ($resultado===TRUE) {
                                       //  echo "<meta http-equiv='Refresh' content='0.5;url=info_general_secre.php'>";
                                        } else {
                                            echo "<script> alert('ERROR ESTADO');  </script>";
                                        }

$sql = "UPDATE turnos_proc SET tiempo='".$_GET['tiempo']."' WHERE nroturno='".$_SESSION["turnoactual"]."'";
 $resultado = $conexion->query($sql)or die($conexion->error);                                     
                                        if ($resultado===TRUE) {

                                          //echo "('OK TIEMPO')";
                                        } else {
                                            // echo "('ERROR TIEMPO')";
                                        }

}

  ?>

<?php 

if (isset($_GET['btn_iniciar'])) {


$consulta = "SELECT min(turnos_proc.nroturno) FROM turnos,turnos_proc,departamentos WHERE turnos.nombre_departamento=departamentos.nombre_departamento and nombre_modulo='".$_SESSION['dep']."' and turnos_proc.nroturno=turnos.nroturno and (turnos_proc.estado='EN ESPERA' or turnos_proc.estado='ACTIVO')";
$resultado = $conexion->query($consulta)or die($conexion->error);
$fila = mysqli_fetch_array($resultado);

echo $fila[0];
$_SESSION["turnoactual"]=$fila[0];

}

 ?>


    <?php
if(isset($_GET['btn_siguiente'])){

function nro_mas($number,$n) { 
return str_pad(((int) $number)+1,$n,"0",STR_PAD_LEFT); 
}

$nro1=substr( $_SESSION["turnoactual"],0,strpos( $_SESSION["turnoactual"],'-')+1);
$nro2=substr( $_SESSION["turnoactual"],-1);


//echo "-----------------".$nro1.nro_mas($nro2,3);
 $_SESSION["turnoactual"]=$nro1.nro_mas($nro2,3);

//echo $nro2;

}

  ?>


     <?php
$nro2=substr( $_SESSION["turnoactual"],-1);

if(isset($_GET['btn_anterior'])&&(int)$nro2>=2){


function nro_menos($number,$n) { 
return str_pad(((int) $number)-1,$n,"0",STR_PAD_LEFT); 
}

$nro1=substr( $_SESSION["turnoactual"],0,strpos( $_SESSION["turnoactual"],'-')+1);
$nro2=substr( $_SESSION["turnoactual"],-1);


//echo "-----------------".$nro1.nro_mas($nro2,3);
 $_SESSION["turnoactual"]=$nro1.nro_menos($nro2,3);

//echo $nro2;

}

  ?>

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
   <script src="js/home-chartjs.js"></script>

   <!-- END JAVASCRIPTS -->   
</body>
<!-- END BODY -->
</html>