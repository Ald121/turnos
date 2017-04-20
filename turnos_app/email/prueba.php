
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>CLIENTE</title>
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
        <table width="650" border="0.5" cellspacing="0" cellpadding="0">
            <tr>
                <td width="10">&nbsp;</td>
                <td width="100"><table width="675" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <th width="181" rowspan="9" scope="col"><form id="form1" name="form1" method="post" action="">
                                    <img src="../fac_venta/logototora.JPG" width="149" height="199" />
                                </form></th>
                            <th width="267" scope="col">&nbsp;</th>
                            <th width="227" scope="col">&nbsp;</th>
                        </tr>

                        <tr>
                            <td style="text-align:center;"><span class="colorTextoFijo">TOTORA SISA S.C.C.</span></td>
                            <td class="style6"><div align="right"></div></td>
                        </tr>
                        <tr>
                            <td class="style6">Dir.: Bolivar e Imbacocha</td>
                            <td><div align="right" class="style6" >RUC.: 10917123810001</div></td>

                        </tr>
                        <tr>
                            <td><span class="style6"><img src="../fac_venta/telefono-icono.jpg" width="18" height="20" />2919-508 Cel.: 0988598926-0988449456</span><span class="colorTextoFijo"></span></td>
                            <td class="centro">FACTURA</td>
                        </tr>
                        <tr>
                            <td><span class="style6">Mail: totorasisa@yahoo.com</span><span class="style6"></span></td>
                            <td>No.: </td>
                        </tr>
                        <tr>
                            <td><span class="style6">OTAVALO - ECUADOR</span><span class="style6"></span></td>
                            <td><span class="style6">Núm Aut SRI.: 1115375970</span><span class="style6"></span></td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td><span class="style6">Fecha de  Aut.: 11 AGOSTO DE 2014</span><span class="style6"></span></td>
                        </tr>
                        <tr>
                            <td class="style13">&nbsp;</td>
                            <td class="style6">CLAVE DE ACCESO</td>
                        </tr>
                        <tr>
                            <td class="style13">OBLIGADO A LLEVAR CONTABILIDAD: SI</td>

                            <td><div align="right"><img src="../fac_venta/barcode.jpg" width="237" height="49" /></div></td>
                        </tr>


                    </table></td>
                <td width="10">&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td class="lineaDivisoria">&nbsp;</td>
                <td>&nbsp;</td>

            </tr>
            <tr>


                <?php
                include '../../conexion.php';
                $idfac = $_GET['id'];
                $sqlFacDet = mysql_query("SELECT * FROM detalle_facturaven where idfacturaven='$idfac';");
                while ($rowDetFac = mysql_fetch_array($sqlFacDet)) {
                    $idFAc = $rowDetFac["iddetalle_facturaVen"];
                }
                ?>



                <?php
                $fechaCreacion = date("Y-m-d");
                $sql = "SELECT * FROM facturaven,detalle_facturaven,usuario
                                            where facturaven.idfacturaVen=detalle_facturaven.idfacturaven
                                            and facturaven.idusuario=usuario.idusuario and facturaven.idfacturaVen='$idfac';";
                $CliFactura = mysql_query($sql, $conexion);
                while ($rowCliFac = mysql_fetch_array($CliFactura)) {
                    $id_cliF = $rowCliFac["idusuario"];
                    $ced_CliF = $rowCliFac["cedula"];
                    $nom_cliF = $rowCliFac["nombres"];
                    $ape_cliF = $rowCliFac["apellidos"];
                    $dir_cliF = $rowCliFac["direccion"];
                    $tel_cliF = $rowCliFac["telefono"];
                    $correo_cliF = $rowCliFac["email"];
                    $ciu_cliF = $rowCliFac["idciudad"];
                    $est_cliF = $rowCliFac["estado"];
                }
                ?>

                <?php
                //recuperando el id de la factura
                $sqlFactira = "select * from facturaven order by idfacturaVen desc limit 1";
                $CliFactura = mysql_query($sqlFactira, $conexion);
                while ($rowFac = mysql_fetch_array($CliFactura)) {
                    $idFactura = $rowFac["idfacturaVen"];
                }
                //fin recuperando el id de la factura
                ?>
                <td>&nbsp;</td>
                <td><table width="650" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td width="67" height="19" class="style6">CLIENTE:</td>
                            <td colspan="6" class="style5"><?php echo $nom_cliF . " " . $ape_cliF; ?></td>
                            <td width="131" class="style6">No. de Folio:</td>

                            <td width="126" class="style5">Datos</td>
                        </tr>
                        <tr>
                            <td height="19" class="style6">Dirección</td>
                            <td colspan="6" class="style5"><?php echo $dir_cliF; ?></td>
                            <td class="style6">Fecha de Emisi&oacute;n:</td>

                            <td class="style5"><?php echo $fechaCreacion; ?></td>
                        </tr>
                        <tr>
                            <td height="19" class="style6">Tel&eacute;fono</td>
                            <td colspan="6" class="style5">Datos</td>
                            <td class="style6">No. de Certificado:</td>

                            <td class="style5">Datos</td>
                        </tr>
                        <tr>
                            <td height="19" class="style6">Fecha</td>
                            <td colspan="6" class="style5"><?php echo $fechaCreacion; ?></td>
                            <td class="style6">A&ntilde;o de aprobaci&oacute;n:</td>

                            <td class="style5">2014</td>
                        </tr>
                        <tr>
                            <td height="19" class="style6">RUC/CI</td>
                            <td colspan="6" class="style5"><?php echo $ced_CliF; ?></td>
                            <td class="style6">No. de aprobaci&oacute;n</td>

                            <td class="style5">Datos</td>
                        </tr>
                    </table></td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td class="lineaDivisoria">&nbsp;</td>

                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td><table border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td width="63" height="19">
                                <div align="center" class="style6">CANTIDAD
                                </div></td>
                            <td width="71"><div align="center" class="style6">CODIGO</div></td>
                            <td width="397"><div align="center" class="style6">DESCRIPCI&Oacute;N</div></td>
                            <td width="65"><div align="center" class="style6">P.UNITARIO</div></td>
                            <td width="54"><div align="center" class="style6">DESC</div></td>
                            <td width="54" ><div align="center" class="style6">TOTAL</div></td>
                        </tr>

                        <?php
                        $conta = 0;
                        $sqlProduct = "select * from facturaven,detalle_facturaven,productos where facturaven.idfacturaVen=detalle_facturaven.idfacturaven and detalle_facturaven.idproductos=productos.idproductos and facturaven.idfacturaVen='$idfac';";
                        $madre = mysql_query($sqlProduct);
                        while ($rowprod = mysql_fetch_array($madre)) {
                            $conta++;
                            ?>
                            <tr>

                                <td height="8" class="cajaInputIzq"><?php echo $rowprod[6]; ?></td>
                                <td class="cajaInputIzq"><?php echo $rowprod[20]; ?></td>
                                <td class="cajaInputIzq"><?php echo $rowprod[13]; ?></td>
                                <td class="cajaInputIzq">$ <?php echo $rowprod[14]; ?></td>
                                <td class="cajaInputIzq">$ 0.00</td>
                                <td class="cajaInput"><?php echo $rowprod[8]; ?></td>

                            </tr>

                            <?php
                        }
                        ?>

                        <!--SUMA MORMAL -->                                           
                        <?php
                        $res1 = mysql_query("SELECT SUM(SubTotal) as suma FROM detalle_facturaven where idfacturaVen='$idfac';");
                        while ($rowprod1 = mysql_fetch_array($res1)) {
                            $SumTT1 = $rowprod1[0];
                        }
                        ?>
                        <!-- SUMA CON IVA-->
                        <?php
                        $res = mysql_query("SELECT SUM(Total) as suma FROM detalle_facturaven where idfacturaVen='$idfac';");
                        while ($rowprod2 = mysql_fetch_array($res)) {
                            $SumTT = $rowprod2[0];
                        }
                        ?>

                        <!-- SUMA CON TOTAL A PAGAR-->
                        <?php
                        $pagar = mysql_query("SELECT SUM(Pagar) as suma FROM detalle_facturaven where idfacturaVen='$idfac';");
                        while ($rowprod3 = mysql_fetch_array($pagar)) {
                            $SumTT3 = $rowprod3[0];
                        }
                        ?>
                        <tr>
                            <td height="20" class="style6">CANTIDAD</div></td>
                            <td height="20" class="style6">CON LETRA</td>
                            <td height="20" class="style6">&nbsp;</td>
                            <td class="style6"><div align="right">SUBTOTAL: </div></td>
                            <td><?php echo $SumTT1; ?></td>
                        </tr>
                        <tr>
                            <td height="19">&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td class="style6" valign="top"><div align="right">I.V.A.</div></td>
                            <td>$<?php echo $SumTT; ?></td>

                        </tr>
                        <tr>
                            <td class="style9" valign="bottom">&nbsp;</td>
                            <td>&nbsp;</td>
                            <td class="style9">&nbsp;</td>
                            <td class="style6" valign="top"><div align="right">TOTAL</div> </td>
                            <td>$<?php echo $SumTT3; ?></td>
                        </tr>
                    </table>
                </td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td class="lineaDivisoria">&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td><table width="650" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <th width="320" bgcolor="333333" class="style6" scope="col"><div align="center" class="style12">
                                    <div align="right">COMPROVANTE AUTORIZADO</div>

                                </div></th>
                            <th width="330" bgcolor="333333" class="style14" scope="col"></th>
                        </tr>
                        <tr>
                            <td></td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>

                            <td><p><span class="style6">INFORMACION ADICIONAL</span></p>
                              <p>Fecha de emision: <br />
                            </p></td>
                            <td class="style6" valign="top"><p>&nbsp;</p>
                            <p>&nbsp;</p>
                            <p>Sello Digital</p></td>
                        </tr>

                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>

                    </table>
                </td>
                <td>&nbsp;</td>
            </tr>
            <tr>

                <td>&nbsp;</td>
                <td bgcolor="#333333"><div align="center" class="style15">VALIDO PARA SU EMISION 11 ADOSTRO DEL 2015<br />
                </div></td>
                <td>&nbsp;</td>
            </tr>
        </table>
         <a class="btn btn-inverse btn-large hidden-print" onclick="javascript:window.print();">Imprimir <i class="icon-print icon-big"></i></a>
    </body>
</html>
                    



