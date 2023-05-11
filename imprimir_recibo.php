
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Certificación</title>
</head>

<body>
<!-------------recibo-------------------->
<table border="0" width="100%" cellspacing="0" bordercolorlight="#FFFFFF" bordercolordark="#C0C0C0" cellpadding="1">
    <tr>

    </tr>
</table>
<table border="0" width="100%" id="table5">
    <tr>
        <td>
            <table border="0" width="100%" cellspacing="3" id="table6">
                <tr>
                    <td width="28%" height="70" align="left"
                        style="font-family:'Times New Roman', Times, serif; font-size:10px"><p align="center"><img
                                src="imagenes/preventax.jpg" width="138" height="41" border="0"/><BR/>NIT
                            901044808 - 1<BR/>CALLE 12 B  N° 44 - 77<BR/> TEL 2690657</p></td>
                    <td align="right" width="72%" colspan="2">


                        <table width="100%" border="0" cellspacing="0" cellpadding="0"
                               style="font-family:'Times New Roman', Times, serif; font-size:10px">
                            <tr>
                                <td align="right" colspan="2">Documento oficial de Autorización de númeración de
                                    Facturación N°18762002201732. Fecha: 2017/02/14.
                                </td>
                            </tr>
                            <tr>
                                <td align="right" colspan="2">PPB-1 AL PPB-50000</td>
                            </tr>
                            <tr>
                                <td align="right" colspan="2">I.V.A REGIMEN COMUN NO SOMOS GRANDES CONTRIBUYENTES ICA  9.66 / 1000- ACTIVIDAD ECONOMICA 7120

                                </td>
                            </tr>
                            <tr>
<!--                               <td align="right" colspan="2">Resolucion Del Ministerio De Transporte No. 001254 del 3-->
<!--                                   de Abril de 2009-->
<!--                                </td>-->
                            </tr>
                            <tr>
                                <td align="right" width="60%"></td>
                                <td align="right">
                                    <table width="100%" border="1" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td align="right"><B>FACTURA DE VENTA PPB-</B><?php
                                                @ $db = mysql_pconnect("localhost", "root", "123456");
                                                if (!$db) {
                                                    echo " Critical Error: No se ha podido conectar a la bd. Por favor prueba de nuevo.";
                                                    exit;
                                                }
                                                mysql_select_db("data_preventivas");

                                                $query9 = "select * from revisiones where placa like '" . $_GET['placa_revision'] . "' order by id_rev desc limit 1";
                                                $resultado9 = mysql_query($query9);
                                                $row9 = mysql_fetch_array($resultado9);
                                                echo '' . $row9["id_fac"] . '';
                                                ?></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <table border="0" width="100%" cellspacing="0" id="table7">
                <tr>
                    <td width="100%">
                        <fieldset style='padding: 0'>
                            <legend><font face='tahoma' size='2' color='#000000'><b></b></font></legend>
                            <table border="0" width="100%" id="table8">
                                <tr>
                                    <td width="14%"><font color="#000000" size="2" face="Arial">Nombre</font></td>
                                    <td width="39%"><font face="Arial" size="2" color='#000000'>
                                            <?php echo '' . $row9['nombres'] . ' ' . $row9['apellidos'] . ''; ?>
                                        </font></td>
                                    <td width="15%"></td>
                                    <td width="41%"></td>
                                </tr>
                                <tr>
                                    <td><font face="Arial" size="2" color='#000000'>Ciudad y Fecha </font></td>
                                    <td><font face="Arial" size="2" color='#000000'>Bogota D.C</font><font face="Arial"
                                                                                                           size="2"
                                                                                                           color='#000000'>,
                                            <?php //se imprime fecha y hora del servidor
                                            echo '' . $row9['fecha'] . ' ';
                                            ?>
                                        </font></td>
                                    <td>Empresa</td>
                                    <td><font face="Arial" size="2">
                                            <?php echo '' . $row9['empresa'] . ' '; ?>
                                        </font></td>
                                </tr>
                                <tr>
                                    <td><font face="Arial" size="2" color='#000000'>Placa No.</font></td>
                                    <td width="39%"><font face="Arial" size="2" color='#000000'>
                                            <?php echo '' . $row9['placa'] . ' '; ?>
                                        </font></td>
                                    <td width="15%">&nbsp;</td>
                                    <td><?php
$vref=$row9['valor'];
                                        $vunidad = round(($vref / 1.16), 2);
                                        $vunidadmostrar = number_format($vunidad, 2, ",", ".");
                                        $iva = $vref - $vunidad;
                                        $vivamostrar = number_format($iva, 2, ",", ".");
                                        ?></td>
                                </tr>
                            </table>
                        </fieldset>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <table border="1" width="100%" cellspacing="0" bordercolorlight="#FFFFFF" bordercolordark="#C0C0C0"
                   cellpadding="2" style="font-family:'Times New Roman', Times, serif; font-size:10px">
                <tr>
                    <td width="25%" bgcolor='#efefef'>
                        <table border="1" width="100%" cellspacing="0" bordercolorlight="#FFFFFF"
                               bordercolordark="#C0C0C0" cellpadding="2">
                            <tr>
                                <td width="10%" bgcolor='#efefef'>COD.</td>
                                <td width="38%" bgcolor='#efefef'>Descripcion</td>
                                <td width="9%" bgcolor='#efefef' align="center">I.V.A</td>
                                <td width="12%" bgcolor='#efefef' align="center">Cantidad</td>
                                <td width="16%" bgcolor='#efefef' align="center">V/UNIT</td>
                                <td width="15%" bgcolor='#efefef' align="center">V/TOTAL</td>
                            </tr>
                            <tr>
                                <td>Preventiva Liv</td>
                                <td><?php echo '' . $_SESSION["num_poliza"] . ''; ?>Revison Periodica segun resolución
                                    0000315 de 2013
                                </td>
                                <td align="right">19.00 %</td>
                                <td align="right">1</td>
                                <td align="right">$
                                    <?php echo $vunidadmostrar ?></td>
                                <td align="right">$
                                    <?php echo $vunidadmostrar ?></td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            <table border="1" width="100%" cellspacing="0" bordercolorlight="#FFFFFF" bordercolordark="#C0C0C0"
                   cellpadding="2">
                <tr>
                    <td width="66%"></td>
                    <td width="34%">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0"
                               style="font-family:'Times New Roman', Times, serif; font-size:10px">
                            <tr>
                                <td width="56%">SUBTOTAL</td>
                                <td width="44%" align="right">$ <?php echo $vunidadmostrar ?></td>
                            </tr>
                            <tr>
                                <td>DESCUENTO</td>
                                <td align="right">$ 0,00</td>
                            </tr>
                            <tr>
                                <td>I.V.A</td>
                                <td align="right">$ <?php echo $vivamostrar ?></td>
                            </tr>
                            <tr>
                                <td>RETEFUENTE</td>
                                <td align="right">$ 0,00</td>
                            </tr>
                            <tr>
                                <td><B>TOTAL</B></td>
                                <td align="right">$ <?php echo $vivamostrar = number_format($vref, 2, ",", "."); ?></td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            <table border="1" width="100%" cellspacing="0" bordercolorlight="#FFFFFF" bordercolordark="#C0C0C0"
                   cellpadding="2" style="font-family:'Times New Roman', Times, serif; font-size:10px">
                <tr>
                    <td bgcolor='#efefef' width="100%"><font face="Arial" size="2"><b>Esta factura se asimila en sus
                                efectos legales a una letra de cambio segun el Art. 774 del codigo de comercio y podra
                                causar interesesde mora al maximo</b></font></td>
                </tr>
                <tr>

                </tr>
            </table>
            <table border="0" width="100%" cellspacing="0" bordercolorlight="#FFFFFF" bordercolordark="#C0C0C0"
                   cellpadding="2">
                <tr>
                    <td width="24%" valign="top"><font face="Arial" size="2">Punto: <?php

                            $query_ciudad_user = mysql_query("SELECT * FROM ciudades WHERE id_ciudad = '" . $row9['sede'] . "'");//hago la consulta a la base de datos para traer las ciudad de la empresa del usuario
                            $result_ciudad_user = mysql_fetch_array($query_ciudad_user);

                            echo $result_ciudad_user['nom_cda']; ?></font></td>
                    <td width="24%" valign="top"><font face="Arial" size="2">Elabor&oacute;: <?php
                            $nombre_user = mysql_query("SELECT * FROM usuarios WHERE id_usuario = '" . $_SESSION['k_username'] . "'");//hago la consulta a la base de datos para traer las ciudad de la empresa del usuario
                            $result_user = mysql_fetch_array($nombre_user);
                            echo '' . $result_user['usuario'] . ''; ?></font></td>
                    <td width="52%">
                        <table width="100%" align="center">
                            <tr>
                                <td><font face="Arial" size="2">FIRMA Y SELLO</font></td>
                            </tr>
                            <tr>
                                <td height="25"></td>
                            </tr>
                            <tr>
                                <td>
                                    <hr/>
                                    <font face="Arial" size="2">NIT. 901044808 - 1</font></td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
<br/>
<?php echo "<script>window.print();</script>"; ?>
</body>
</html>