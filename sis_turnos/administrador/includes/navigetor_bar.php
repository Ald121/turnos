<?php
include 'conexion.php';
@session_start();
if (!($_SESSION)) {

    header("Location: login.php");
}
$id_usuario = $_SESSION['id_usuario'];
$consulta = "SELECT nombre,apellido FROM usuario WHERE idusuario='" . $id_usuario . "'";
$resultado = mysql_query($consulta, $conexion) or die(mysql_error());
$fila = mysql_fetch_array($resultado);
$nombre = $fila['nombre'];
$apellido = $fila['apellido'];

?>



<div class="navbar-inner">
    <div class="container-fluid">
        <!--BEGIN SIDEBAR TOGGLE-->
        <div class="sidebar-toggle-box hidden-phone">
            <div class="icon-reorder tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
        </div>
        <!--END SIDEBAR TOGGLE-->
        <!-- BEGIN LOGO -->
        
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
            <ul class="nav top-menu">
                <!-- BEGIN SETTINGS -->
                
                    <ul class="dropdown-menu extended tasks-bar">
                        <li>
                            <p>You have 6 pending tasks</p>
                        </li>
                        <li>
                            <a href="#">
                                <div class="task-info">
                                    <div class="desc">Dashboard v1.3</div>
                                    <div class="percent">44%</div>
                                </div>
                                <div class="progress progress-striped active no-margin-bot">
                                    <div class="bar" style="width: 44%;"></div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="task-info">
                                    <div class="desc">Database Update</div>
                                    <div class="percent">65%</div>
                                </div>
                                <div class="progress progress-striped progress-success active no-margin-bot">
                                    <div class="bar" style="width: 65%;"></div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="task-info">
                                    <div class="desc">Iphone Development</div>
                                    <div class="percent">87%</div>
                                </div>
                                <div class="progress progress-striped progress-info active no-margin-bot">
                                    <div class="bar" style="width: 87%;"></div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="task-info">
                                    <div class="desc">Mobile App</div>
                                    <div class="percent">33%</div>
                                </div>
                                <div class="progress progress-striped progress-warning active no-margin-bot">
                                    <div class="bar" style="width: 33%;"></div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="task-info">
                                    <div class="desc">Dashboard v1.3</div>
                                    <div class="percent">90%</div>
                                </div>
                                <div class="progress progress-striped progress-danger active no-margin-bot">
                                    <div class="bar" style="width: 90%;"></div>
                                </div>
                            </a>
                        </li>
                        <li class="external">
                            <a href="#">See All Tasks</a>
                        </li>
                    </ul>
                </li>
                <!-- END SETTINGS -->
                <!-- BEGIN INBOX DROPDOWN -->
               
                    <ul class="dropdown-menu extended inbox">
                        <li>
                            <p>You have 5 new messages</p>
                        </li>
                        <li>
                            <a href="#">
                                <span class="photo"><img src="./img/avatar-mini.png" alt="avatar" /></span>
                                <span class="subject">
                                    <span class="from">Jonathan Smith</span>
                                    <span class="time">Just now</span>
                                </span>
                                <span class="message">
                                    Hello, this is an example msg.
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="photo"><img src="./img/avatar-mini.png" alt="avatar" /></span>
                                <span class="subject">
                                    <span class="from">Jhon Doe</span>
                                    <span class="time">10 mins</span>
                                </span>
                                <span class="message">
                                    Hi, Jhon Doe Bhai how are you ?
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="photo"><img src="./img/avatar-mini.png" alt="avatar" /></span>
                                <span class="subject">
                                    <span class="from">Jason Stathum</span>
                                    <span class="time">3 hrs</span>
                                </span>
                                <span class="message">
                                    This is awesome dashboard.
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="photo"><img src="./img/avatar-mini.png" alt="avatar" /></span>
                                <span class="subject">
                                    <span class="from">Jondi Rose</span>
                                    <span class="time">Just now</span>
                                </span>
                                <span class="message">
                                    Hello, this is metrolab
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">See all messages</a>
                        </li>
                    </ul>
                </li>
                <!-- END INBOX DROPDOWN -->
                <!-- BEGIN NOTIFICATION DROPDOWN -->
             
                    <ul class="dropdown-menu extended notification">
                        <li>
                            <p>You have 7 new notifications</p>
                        </li>
                        <li>
                            <a href="#">
                                <span class="label label-important"><i class="icon-bolt"></i></span>
                                Server #3 overloaded.
                                <span class="small italic">34 mins</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="label label-warning"><i class="icon-bell"></i></span>
                                Server #10 not respoding.
                                <span class="small italic">1 Hours</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="label label-important"><i class="icon-bolt"></i></span>
                                Database overloaded 24%.
                                <span class="small italic">4 hrs</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="label label-success"><i class="icon-plus"></i></span>
                                New user registered.
                                <span class="small italic">Just now</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="label label-info"><i class="icon-bullhorn"></i></span>
                                Application error.
                                <span class="small italic">10 mins</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">See all notifications</a>
                        </li>
                    </ul>
                </li>
                <!-- END NOTIFICATION DROPDOWN -->

            </ul>
        </div>
        <!-- END  NOTIFICATION -->
        <div class="top-nav ">
            <ul class="nav pull-right top-menu" >
                <!-- BEGIN SUPPORT -->
                <li class="dropdown mtop5">

                    
                </li>
                <li class="dropdown mtop5">
                 
                </li>
                <!-- END SUPPORT -->
                <!-- BEGIN USER LOGIN DROPDOWN -->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="img/avatar1_small.jpg" alt="">
                        <span class="username"><?php echo $nombre . " " . $apellido ?></span>
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu extended logout">
                        <li><a href="#"><i class="icon-user"></i> My Profile</a></li>
                        <li><a href="#"><i class="icon-cog"></i> My Settings</a></li>
                        <li><a href="desconectar_usuario.php"><i class="icon-key"></i> Log Out</a></li>
                    </ul>
                </li>
                <!-- END USER LOGIN DROPDOWN -->
            </ul>
            <!-- END TOP NAVIGATION MENU -->
        </div>
    </div>
</div>