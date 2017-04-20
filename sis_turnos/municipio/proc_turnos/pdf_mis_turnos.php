<?php
include '../conexion.php';
ob_start();
?>
<style type="text/css">
<!--
   table{
    border: 1px solid #ddd;
    border-collapse: separate;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    border-radius: 4px;
    margin-bottom: 30px;
    position: relative;
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
    left: 77px;

}

    table.page_footer {width: 100%; border: none; background-color: #DDDDFF; border-top: solid 1mm #AAAADD; padding: 2mm}

.body{
         height: 842px;
}


.center{
    text-align: center;
}
    div.niveau
    {
        padding-left: 5mm;
    }

.rectangulo {
    margin-top: 10px;
    width: 650px;
    height: 160px;
    background: #242B5D;
    border-radius: 15px;
    position: absolute;
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

-->
</style>
<page >
    
    <page_header>
    <div class="body">
<div class="rectangulo">
           <img src="../../images/escudo.png" style="    position: relative;
    margin-left: 10px;
    z-index: 9;">


<div style="          position: fixed;
    color: white;
    padding-top: 2px;
    left: 119px;
    margin-top: -179px;"><h2>MUNICIPIO DE OTAVALO</h2></div>

    <ul>
                            <li>Teléfono: (06) 292-0460</li>
                            <li>Página web: <a href="http://www.otavalo.gob.ec/" style="color: wheat;">http://www.otavalo.gob.ec/</a></li>
                            <li>Direción: Garcia Moreno, 505, Otavalo</li>
                        </ul>

</div>

<div class="center">



<h1 style="color:#242B5D; margin-top: 185px;">MIS SURNOS</h1>
    </div>

        <table>
                      <thead style="    font-size: 10px;">
                                    <tr>
                                        <th><i class=""></i> CÉDULA</th>
                                        <th><i class=""></i> NOMBRES</th>
                                        <th><i class=""></i> APELLIDOS</th>
                                        <th><i class=""></i> TELEFONO</th>                                       
                                        <th><i class=""></i> NROTURNO</th>
                                        <th><i class=""></i> DEPARTAMENTO</th>
                                        <th><i class=""></i> HORA</th>
                                        <th><i class=""></i> ESTADO</th>
                                    </tr>
                                                                       </thead>
                                    <tbody>
<?php

$consulta_mod = "SELECT cedula,nombre,apellido,telefono,direccion,email,turnos_proc.nroturno,turnos.nombre_departamento,hora,turnos_proc.estado FROM turnos,turnos_proc,usuario,departamentos where  
turnos.idusuario='".$_GET["idusuario"]."' and turnos.nroturno=turnos_proc.nroturno and turnos.idusuario=usuario.idusuario and turnos.nombre_departamento=departamentos.nombre_departamento ;";


$resultado_mod = $conexion->query($consulta_mod)or die ( $conexion->error);
while ($fila_mod = $resultado_mod->fetch_array()) {

?>
<tr>

                                        <td ><?php echo $fila_mod['cedula'];?></td>
                                        <td ><?php echo $fila_mod['nombre'];?></td>
                                        <td ><?php echo $fila_mod['apellido'];?></td>
                                        <td ><?php echo $fila_mod['telefono'];?></td>
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

                                        <?php 
if ($fila_mod['estado']=="PERDIDO") {
                                         ?>
                                        <td class="label label-perdido" style="background: #999 !important;"><?php echo $fila_mod['estado'];?></td>

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
    </page_header>

    <page_footer>
        <table class="page_footer">
            <tr>
                <td style="width: 100%; text-align: right">
                    Página [[page_cu]]/[[page_nb]]
                </td>
            </tr>
        </table>

    </page_footer>
</page>
<?php
   $content = ob_get_clean();

    // convert to PDF
    require_once(dirname(__FILE__).'../../pdf/html2pdf.class.php');
    try
    {
        $html2pdf = new HTML2PDF('P', 'A4', 'es');
        $html2pdf->pdf->SetDisplayMode('fullpage');
        $html2pdf->writeHTML($content);
        $html2pdf->Output('exemple04.pdf');
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }