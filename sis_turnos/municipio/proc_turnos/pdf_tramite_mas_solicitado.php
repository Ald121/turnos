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



<h1 style="color:#242B5D; margin-top: 185px;">TRAMITE MÁS SOLICITADO</h1>
    </div>

        <table>
                      <thead style="    font-size: 10px;">
                                    <tr>
                                        <th><i class=""></i> NOMBRE DEL MODULO</th>
                                        <th><i class=""></i> NOMBRE DEL DEPARTAMENTO</th>
                                        <th><i class=""></i> NRO DE SOLICITUDES</th>
                                    </tr>
                                                                       </thead>
                                    <tbody>
<?php

if (isset($_GET['modulo'])) {

if ($_GET['modulo']=="TODOS") {
 

$consulta_dep = "SELECT nombre_departamento,count(nombre_departamento) FROM turnos t group by nombre_departamento;";


$resultado_dep = $conexion->query($consulta_dep)or die ( $conexion->error);
while ($fila_dep = $resultado_dep->fetch_array()) {

    $consulta_mod = "SELECT nombre_modulo FROM departamentos WHERE nombre_departamento='".$fila_dep['nombre_departamento']."'";
$resultado_mod = $conexion->query($consulta_mod)or die ( $conexion->error);
$fila_mod = $resultado_mod->fetch_array();

?>
<tr>

                                          <td ><?php echo $fila_mod['nombre_modulo'];?></td>
                                          <td ><?php echo $fila_dep['nombre_departamento'];?></td>
                                         <td ><?php echo $fila_dep[1];?></td>
 
</tr>
<?php 
}
}
else{

$consulta_mod = "SELECT nombre_departamento FROM departamentos WHERE nombre_modulo='".$_GET['modulo']."'";
$resultado_mod = $conexion->query($consulta_mod)or die ( $conexion->error);

while ($fila_mod = $resultado_mod->fetch_array()) {

    $consulta = "SELECT count(nombre_departamento) FROM turnos WHERE nombre_departamento='".$fila_mod['nombre_departamento']."'";
$resultado= $conexion->query($consulta)or die ( $conexion->error);
$fila = $resultado->fetch_array();

?>

<tr>
                                          <td ><?php echo $_GET['modulo'];?></td>
                                          <td ><?php echo $fila_mod['nombre_departamento'];?></td>
                                         <td ><?php echo $fila[0];?></td>
                                         </tr>

<?php
}

}
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