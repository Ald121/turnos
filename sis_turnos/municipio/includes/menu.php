<ul class="sidebar-menu">
    <li class="sub-menu active">
        <a class="" href="index.php">
            <i class="icon-dashboard"></i>INICIO</a>
    </li>

<?php
if($_SESSION["tipouser"]=='CLIENTE'){
?>

<li class="sub-menu">
        <a class="" href="conf_cuenta.php">
            <i class="icon-user"></i>MI PERFIL</a>
    </li>
    <li class="sub-menu">
        <a class="" href="mis_turnos.php">
            <i class="icon-tag"></i>MIS TURNOS</a>
    </li>
      <li class="sub-menu">
        <a href="javascript:;" class="">
            <i class="icon-file-text-alt"></i>
            <span>REPORTES</span>
            <span class="arrow"></span>
        </a>
        <ul class="sub">
 <li><a class="" href="reporte_clientes_atendidos.php">Mis turnos</a></li>
                    </ul>
    </li>
            <?php
}
?>

<?php
if($_SESSION["tipouser"]=='SECRE'){
?>

<li class="sub-menu">
        <a class="" href="query_usuarios.php">
            <i class="icon-user"></i><i class="icon-user"></i>USUARIOS</a>
    </li>
<li class="sub-menu">
        <a class="" href="conf_cuenta.php">
            <i class="icon-user"></i>MI PERFIL</a>
    </li>

         <li class="sub-menu">
        <a href="javascript:;" class="">
            <i class="icon-file-text-alt"></i>
            <span>REPORTES</span>
            <span class="arrow"></span>
        </a>
        <ul class="sub">
 <li><a class="" href="reporte_clientes_atendidos.php">Usuarios Atendidos/Cancelados</a></li>
                    </ul>
    </li>

            <?php
}
?>
<?php
if($_SESSION["tipouser"]=='ADMIN'){
?>
    <li class="sub-menu">
        <a href="javascript:;" class="">
            <i class="icon-book"></i>
            <span>SERVICIOS</span>
            <span class="arrow"></span>
        </a>
        <ul class="sub">
 <li><a class="" href="conf_parametros.php">Configuración de Parámetros</a></li>
<li><a class="" href="ingreso_empleados.php">Administrar Empleados</a></li>
<li><a class="" href="ingreso_modulos.php">Administrar Módulos</a></li>
  <li><a class="" href="ingreso_departamentos.php">Administrar Departamentos</a></li>
  <li><a class="" href="ingreso_clientes.php">Administrar Clientes</a></li>
 <li><a class="" href="asignacion_turnos.php">Asignar Departamentos</a></li>
                    </ul>
    </li>

        <li class="sub-menu">
        <a class="" href="conf_cuenta.php">
            <i class="icon-user"></i>MI PERFIL</a>
    </li>
        <li class="sub-menu">
        <a class="" href="mis_turnos.php">
            <i class="icon-tag"></i>MIS TURNOS</a>
    </li>
     <li class="sub-menu">
        <a href="javascript:;" class="">
            <i class="icon-file-text-alt"></i>
            <span>REPORTES</span>
            <span class="arrow"></span>
        </a>
        <ul class="sub">
 <li><a class="" href="reporte_clientes_atendidos.php">Usuarios Atendidos/Cancelados</a></li>
  <li><a class="" href="reporte_tramite_mas_solicitado.php">Tramite mas Solicitado</a></li>
  <li><a class="" href="reporte_turnos_mes.php">Turnos Semanales/Mensuales</a></li>
                    </ul>
    </li>


            <?php
}
?>


<!--    <li class="sub-menu">
        <a href="javascript:;" class="">
            <i class="icon-cogs"></i>
            <span>Components</span>
            <span class="arrow"></span>
        </a>
        <ul class="sub">
            <li><a class="" href="calendar.html">Calendar</a></li>
            <li><a class="" href="grids.html">Grids</a></li>
            <li><a class="" href="chartjs.html">Chart Js</a></li>
            <li><a class="" href="flot_chart.html">Flot Charts</a></li>
            <li><a class="" href="gallery.html"> Gallery</a></li>
        </ul>
    </li>
    <li class="sub-menu">
        <a href="javascript:;" class="">
            <i class="icon-tasks"></i>
            <span>Form Stuff</span>
            <span class="arrow"></span>
        </a>
        <ul class="sub">
            <li><a class="" href="form_layout.html">Form Layouts</a></li>
            <li><a class="" href="form_component.html">Form Components</a></li>
            <li><a class="" href="form_wizard.html">Form Wizard</a></li>
            <li><a class="" href="form_validation.html">Form Validation</a></li>
            <li><a class="" href="dropzone.html">Dropzone File Upload </a></li>
        </ul>
    </li>
    <li class="sub-menu">
        <a href="javascript:;" class="">
            <i class="icon-th"></i>
            <span>Data Tables</span>
            <span class="arrow"></span>
        </a>
        <ul class="sub">
            <li><a class="" href="basic_table.html">Basic Table</a></li>
            <li><a class="" href="dynamic_table.html">Dynamic Table</a></li>
            <li><a class="" href="editable_table.html">Editable Table</a></li>
        </ul>
    </li>
    <li class="sub-menu">
        <a href="javascript:;" class="">
            <i class="icon-fire"></i>
            <span>Icons</span>
            <span class="arrow"></span>
        </a>
        <ul class="sub">
            <li><a class="" href="font_awesome.html">Font Awesome</a></li>
            <li><a class="" href="glyphicons.html">Glyphicons</a></li>
        </ul>
    </li>
    <li class="sub-menu">
        <a class="" href="javascript:;">
            <i class="icon-trophy"></i>
            <span>Portlets</span>
            <span class="arrow"></span>
        </a>
        <ul class="sub">
            <li><a href="general_portlet.html" class=""> General Portlet</a></li>
            <li><a href="draggable_portlet.html" class="">Draggable Portlet</a></li>
        </ul>
    </li>
    <li class="sub-menu">
        <a class="" href="javascript:;">
            <i class="icon-map-marker"></i>
            <span>Maps</span>
            <span class="arrow"></span>
        </a>
        <ul class="sub">
            <li><a href="vector_map.html" class="">Vector Maps</a></li>
            <li><a href="google_map.html" class="">Google Map</a></li>
        </ul>
    </li>
    <li class="sub-menu">
        <a href="javascript:;" class="">
            <i class="icon-file-alt"></i>
            <span>Sample Pages</span>
            <span class="arrow"></span>
        </a>
        <ul class="sub">
            <li><a class="" href="blank.html">Blank Page</a></li>
            <li><a class="" href="blog.html">Blog</a></li>
            <li><a class="" href="timeline.html">Timeline</a></li>
            <li><a class="" href="profile.html">Profile</a></li>
            <li><a class="" href="about_us.html">About Us</a></li>
            <li><a class="" href="contact_us.html">Contact Us</a></li>
        </ul>
    </li>
    <li class="sub-menu">
        <a href="javascript:;" class="">
            <i class="icon-glass"></i>
            <span>Extra</span>
            <span class="arrow"></span>
        </a>
        <ul class="sub">
            <li><a class="" href="lock.html">Lock Screen</a></li>
            <li><a class="" href="invoice.html">Invoice</a></li>
            <li><a class="" href="pricing_tables.html">Pricing Tables</a></li>
            <li><a class="" href="search_result.html">Search Result</a></li>
            <li><a class="" href="faq.html">FAQ</a></li>
            <li><a class="" href="404.html">404 Error</a></li>
            <li><a class="" href="500.html">500 Error</a></li>
        </ul>
    </li>

    <li>
        <a class="" href="login.html">
            <i class="icon-user"></i>
            <span>Login Page</span>
        </a>
    </li>
</ul>-->
