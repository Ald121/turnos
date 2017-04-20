<?php
include 'conexion.php';
@session_start();
if (!($_SESSION)) {

    header("Location: login.php");
}
else{
$idusuario = $_SESSION['idusuario'];
$consulta = "SELECT idusuario,cedula,nombre,apellido,telefono,direccion,tipo_user FROM usuario WHERE idusuario='" . $idusuario . "'";
$resultado=$conexion->query($consulta);
$fila = mysqli_fetch_array($resultado);

$_SESSION["tipouser"]=$fila['tipo_user'];

if($fila['tipo_user']=="CLIENTE"){
$nombre = $fila['nombre'];
$apellido = $fila['apellido'];
$_SESSION["idusuario"]=$fila['idusuario'];
$_SESSION["cedula"]=$fila['cedula'];
$_SESSION["nombre"]=$fila['nombre'];
$_SESSION["apellido"]=$fila['apellido'];
$_SESSION["telefono"]=$fila['telefono'];
$_SESSION["direccion"]=$fila['direccion'];
$_SESSION["departamento"]="";

}

if($_SESSION["tipouser"]=="SECRE"){

    $idusuario = $_SESSION['idusuario'];
$consulta = "SELECT min(idusuario)as idcliente FROM turnos,turnos_proc WHERE turnos_proc.nroturno=turnos.nroturno;";

$resultado=$conexion->query($consulta);
$fila = mysqli_fetch_array($resultado);

$_SESSION["idcliente"]=$fila['idcliente'];


$consulta = "SELECT nombre,apellido FROM usuario WHERE idusuario='" . $idusuario . "'";

$resultado=$conexion->query($consulta);
$fila = mysqli_fetch_array($resultado);
$nombre = $fila['nombre'];
$apellido = $fila['apellido'];

}

if($_SESSION["tipouser"]=="ADMIN"){

$idusuario = $_SESSION['idusuario'];

$consulta = "SELECT nombre,apellido,cedula,telefono,direccion FROM usuario WHERE idusuario='" . $idusuario . "'";

$resultado=$conexion->query($consulta);
$fila = mysqli_fetch_array($resultado);
$nombre = $fila['nombre'];
$apellido = $fila['apellido'];

$_SESSION["cedula"]=$fila['cedula'];
$_SESSION["nombre"]=$fila['nombre'];
$_SESSION["apellido"]=$fila['apellido'];
$_SESSION["telefono"]=$fila['telefono'];
$_SESSION["direccion"]=$fila['direccion'];
$_SESSION["departamento"]="";

}



}
?>
<div class="navbar-inner">
    <div class="container-fluid">
        <!--BEGIN SIDEBAR TOGGLE-->
        <div class="sidebar-toggle-box hidden-phone">
            <div class="icon-reorder tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
        </div>
        <!--END SIDEBAR TOGGLE-->
        <!-- BEGIN LOGO -->
        <a class="brand" href="index.php">
            <img src="img/logo.png" width="40px" alt="Metro Lab" />
            Otavalo | Digital
        </a>
        <!-- END LOGO -->
        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
        <a class="btn btn-navbar collapsed" id="main_menu_trigger" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="arrow"></span>
        </a>
        <!-- END RESPONSIVE MENU TOGGLER -->
        <div id="top_menu" class="nav notify-row">
            <!-- BEGIN NOTIFICATION -->
        </div>
        <!-- END  NOTIFICATION -->
        <div class="top-nav ">
            <ul class="nav pull-right top-menu" >
                <!-- BEGIN SUPPORT -->
                <!-- END SUPPORT -->
                <!-- BEGIN USER LOGIN DROPDOWN -->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="img/avatar1_small.jpg" alt="">
                        <span class="username"><?php echo $nombre . " " . $apellido ?></span>
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu extended logout">
                        <li><a href="conf_cuenta.php"><i class="icon-user"></i> Mi perfil</a></li>
                        <li><a href="desconectar_usuario.php"><i class="icon-key"></i> Salir</a></li>
                    </ul>
                </li>
                <!-- END USER LOGIN DROPDOWN -->
            </ul>
            <!-- END TOP NAVIGATION MENU -->
        </div>
    </div>
</div>