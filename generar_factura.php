<?php
session_start();//activa secion y pide conectividad entrre pagina y pagina

error_reporting();
require("funciones.php");
cabecera($_SESSION['k_username']);
contenido();
?>
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
<BR>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //consultar ultima factura
    //$factura2 = mysql_query("SELECT MAX(id_fac) FROM revisiones");
    $nmax = mysql_query("SELECT MAX(id_fac) FROM revisiones where id_rev >'60912'") or die (mysql_error());
    $new_factura2 = mysql_fetch_row($nmax);
    $new_factura = $new_factura2[0] + 1;

    //insertar numero de factura en tabla
    mysql_query("UPDATE revisiones set id_fac='" . $new_factura . "' where placa like '" . $_POST["placas_fac"] . "' order by id_rev desc limit 1");

    //consulto el valor de factura
    $valor = mysql_query("select valor from revisiones where placa like '" . $_POST["placas_fac"] . "' order by id_rev desc limit 1");
    $row_valor = mysql_fetch_array($valor);
    ?>
    <script>window.open('imprimir_recibo.php?placa_revision=<?php echo $_POST["placas_fac"]?>&vref=<?php echo $row_valor["valor"]?>', 'name', 'location=yes,menubar=no,status=no,toolbar=no,scrollbars=yes,width=700,height=540')</script>
    <?php

}

?>
<?php
$generado_por = mysql_query("select * from usuarios where id_usuario like '" . $_SESSION['k_username'] . "'");
$row_generado = mysql_fetch_array($generado_por);
if ($row_generado["empresa"] == "PREVENTIVAS") {
    ?>
    <form class="iform2" action="" method="post" name="registrar">
        <table width="100%" border="1" cellspacing="0" cellpadding="0" align="center">
            <tr>
                <td>

                    <table width="90%" border="0" cellspacing="0" cellpadding="4" align="center">
                        <tr>
                            <td colspan="4" class="Estilo1">Por favor seleccione la palca para realizar la impresion de
                                la factura...
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4" class="Estilo1">&nbsp;</td>
                        </tr>
                        <tr>
                            <td width="20%">Placa</td>
                            <td width="30%" colspan="2"><span id="sprytextfield1">
      <label for="placas_finalizadas"></label>
      <input class="itext3" type="text" name="placas_fac" id="placas_fac" onKeyUp="this.value=this.value.toUpperCase()">
      <span class="textfieldRequiredMsg">Se necesita un valor.</span></span></td>

                            <td width="30%"><label for="usuario"></label></td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td><label for="id_sede"></label></td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="4" align="center"><input type="submit" name="enviar" id="enviar"
                                                                  value="Imprimir Factura"></td>
                        </tr>
                    </table>


                </td>
            </tr>
        </table>


    </form>
    <?php
} else {
    ?>
    <form name="consulta_punto" class="iform2" method="post" id="consulta_punto">

        <p align="center" class="Estilo1">ACCESO DENEGADO- SIPCO</p>

        <br><br><br>
        <table border="0" cellpadding="0" cellspacing="0" width="95%" bordercolorlight="#CCCCCC"
               bordercolordark="#FFFFFF" align="center" class="Estilo5">
            <tr>
                <td align="center" style="font-style:normal; color:#F00">SU PERFIL NO TIENE ACCESO A ESTE REPORTE</td>
            </tr>
            <tr>
                <td>
                    <table width="90%" border="0" class="Estilo6" align="center">
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td width="16%" colspan="5" align="center"><input type="button" name="enviar2" id="enviar2"
                                                                              value="Salir"
                                                                              onclick="(location = 'principal_user.php')"/>
                            </td>

                        </tr>

                    </table>
                </td>
            </tr>
        </table>
        <br/><br/><br/><br/><br/>
    </form>
    <?php
}
?>


<?php
footer();
?>
<script type="text/javascript">
    var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none", {validateOn: ["change"]});
</script>
