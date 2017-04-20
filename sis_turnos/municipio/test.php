
<?php

ob_start();
include '../conexion.php';
?>
<style type="text/css">
.body{
        margin-left: 60px;
    margin-right: 60px;
}

table{
   border: 1px solid #ddd;
    border-collapse: separate;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    border-radius: 4px;
    margin-bottom: 30px;
}

thead tr th {
        background-color: #242B5D;
    color: #FFF;
    padding: 10px;
     border-radius: 4px;
}

tr td {
   border-left-width: 0px;
    text-align: center;
    padding: 8px;
}

ul{
list-style: none;
    float: left;
    position: absolute;
    top: 86px;
    color: white;
    left: 142px;

}

    table.page_footer {width: 100%; border: none; background-color: #DDDDFF; border-top: solid 1mm #AAAADD; padding: 2mm}


.center{
    text-align: center;
}
    div.niveau
    {
        padding-left: 5mm;
    }

.rectangulo {
       margin-top: 22px;
    width: 100%;
    height: 160px;
    background: #242B5D;
    border-radius: 15px;
}

.label{
    border-radius: 10px;
}

.label-orange{
    background: orange;
}
 .label-green{
    background: green;
}

 .label-blue{
    background: blue;
}

 .label-red{
    background: red;
}
</style>
<page backtop="14mm" backbottom="14mm" backleft="10mm" backright="10mm" style="font-size: 12pt">
<div class="body"> 
<img src="../../images/escudo.png" style="position: absolute;
    margin-left: 10px;">

    <img src="../img/logo.png" style="    margin-left: 10px;
    width: 130px;
    float: right;
    margin-right: 24px;">

<div class="rectangulo"></div>
<ul>
                            <li>Teléfono: (06) 292-0460</li>
                            <li>Página web: <a href="http://www.otavalo.gob.ec/" style="color: wheat;">http://www.otavalo.gob.ec/</a></li>
                            <li>Direción: Garcia Moreno, 505, Otavalo</li>
                        </ul>

    <div style="        position: absolute;
    top: 0;
    color: white;
    padding-top: 37px;
    left: 186px;"><h2>OTAVALO | DIGITAL</h2></div>

<h1 style="    position: absolute;
    top: 0;
    color: white;
    padding-top: 67px;
    left: 502px;">MUNICIPIO DE OTAVALO</h1>
<div class="center">
<h1 style="color:#242B5D;">CLIENTES <?php echo $_GET['estado']; ?></h1>
    </div>


<table>
                      <thead>
                                    <tr>
                                        <th><i class=""></i> CÉDULA</th>
                                        <th><i class=""></i> NOMBRES</th>
                                        <th><i class=""></i> APELLIDOS</th>
                                        <th><i class=""></i> TELEFONO</th>                                       
                                        <th><i class=""></i> DIRECCIÓN</th>
                                        <th><i class=""></i> CORREO</th>
                                        <th><i class=""></i> NROTURNO</th>
                                        <th><i class=""></i> DEPARTAMENTO</th>
                                        <th><i class=""></i> HORA</th>
                                        <th><i class=""></i> ESTADO</th>
                                    </tr>
                                                                       </thead>
                                    <tbody>
<?php

$consulta_mod = "SELECT cedula,nombre,apellido,telefono,direccion,email,turnos_proc.nroturno,turnos.nombre_departamento,hora,turnos_proc.estado FROM turnos,turnos_proc,usuario,departamentos where  
departamentos.idusuario='".$_GET["idusuario"]."' and turnos.nroturno=turnos_proc.nroturno and
turnos.idusuario=usuario.idusuario and turnos.nombre_departamento=departamentos.nombre_departamento and turnos_proc.estado='".$_GET['estado']."'  ;";


$resultado_mod = $conexion->query($consulta_mod)or die ( $conexion->error);
while ($fila_mod = $resultado_mod->fetch_array()) {

?>
<tr>

                                        <td ><?php echo $fila_mod['cedula'];?></td>
                                        <td ><?php echo $fila_mod['nombre'];?></td>
                                        <td ><?php echo $fila_mod['apellido'];?></td>
                                        <td ><?php echo $fila_mod['telefono'];?></td>
                                         <td ><?php echo $fila_mod['direccion'];?></td>
                                          <td ><?php echo $fila_mod['email'];?></td>
                                        <td ><?php echo $fila_mod['nroturno'];?></td>
                                            <td ><?php echo $fila_mod['nombre_departamento'];?></td>
                                         <td ><?php echo $fila_mod['hora'];?></td>
                                        <?php 
if ($fila_mod['estado']=="EN ESPERA") {
                                         ?>
                                        <td class="label label-orange"><?php echo $fila_mod['estado'];?></td>

<?php 
}
 ?>
                                        <?php 
if ($fila_mod['estado']=="ATENDIDO") {
                                         ?>
                                        <td class="label label-blue"><?php echo $fila_mod['estado'];?></td>

<?php 
}
 ?>

                                         <?php 
if ($fila_mod['estado']=="ACTIVO") {
                                         ?>
                                        <td class="label label-green"><?php echo $fila_mod['estado'];?></td>

<?php 
}
 ?>

                                          <?php 
if ($fila_mod['estado']=="CANCELADO") {
                                         ?>
                                        <td class="label label-red"><?php echo $fila_mod['estado'];?></td>

<?php 
}
 ?>
</tr>
<?php 
}
 ?>
                                      </tbody>
                                </table>


    </div>
   
    <page_footer>
        <table class="page_footer">
            <tr>
                <td style="width: 100%; text-align: right">
                    page [[page_cu]]/[[page_nb]]
                </td>
            </tr>
        </table>
    </page_footer>


</page>
<?php
   $content = ob_get_clean();

    require_once(dirname(__FILE__).'../../pdf/html2pdf.class.php');
    try
    {
        $html2pdf = new HTML2PDF('P', 'A4', 'en', true, 'UTF-8', 0);
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        $html2pdf->Output('bookmark.pdf');
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }
?>