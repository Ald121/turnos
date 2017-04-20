<?php
ini_set('date.timezone','America/Lima'); 
    // get the HTML
    ob_start();
    $num = $_GET['nro'];
    $nom = $_GET['user'];
    $fecha = date("d-m-Y");
    $hora = $_GET['hora'];
    $departamento = $_GET['depar'];
    $modulo = $_GET['modulo'];
?>

<page format="100x200" orientation="L" style="font: arial;">
    <div style="rotate: 90; position: absolute; width: 100mm; height: 4mm; left: -39mm; top: 0; font-style: italic; font-weight: normal; text-align: center; font-size: 2.5mm;">
       Otavalo digital
    </div>
    <table style="width: 99%;border: none;" cellspacing="4mm" cellpadding="0">
        <tr>
            <td colspan="2" style="width: 100%">
                <div class="zone" style="height: 34mm; position: relative; font-size: 5mm;">

                    <h2>TURNO NRO: <?php echo $num; ?></h2>
                    <b>USUARIO:</b> <?php echo $nom; ?>
                    <br><b>FECHA:</b> <?php echo $fecha; ?><br>
                    <b>HORA PROXIMADA:</b> <?php echo $hora; ?><<br>
                    <b>DEPARTAMENTO:</b> <?php echo $departamento; ?><br>
                    <b>MODULO:</b> <?php echo $modulo; ?><br>
                    <img src="../img/logo_otavalo.png" alt="logo" style=" margin-top: -46mm; margin-left: 113mm;  position: relative;">
                </div>
            </td>
        </tr>
        <tr>
            <td style="width: 25%;">
                <div class="zone" style="height: 40mm;vertical-align: middle;text-align: center;">
                    <qrcode value="<?php echo $num."\n".$nom."\n".$fecha."\n".$hora."\n".$departamento."\n".$modulo; ?>" ec="Q" style="width: 37mm; border: none;" ></qrcode>
                </div>
            </td>
            <td style="width: 75%">
                <div class="zone" style="height: 40mm;vertical-align: middle; text-align: justify">
                    <b>AVISO<br>
               usted debera acercarse 10 minutos antes de la hora indicada.<br></b>
                    <br>
                </div>
            </td>
        </tr>
    </table>
</page>
<?php
     $content = ob_get_clean();
    // convert
    require_once(dirname(__FILE__).'../../pdf/html2pdf.class.php');
    try
    {
        $html2pdf = new HTML2PDF('P', 'A4', 'fr', true, 'UTF-8', 0);
        $html2pdf->pdf->SetDisplayMode('fullpage');
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        $html2pdf->Output('ticket.pdf');
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }