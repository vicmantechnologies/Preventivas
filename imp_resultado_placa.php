<?php
session_start();//activa secion y pide conectividad entrre pagina y pagina

error_reporting(0);
require("funciones.php");
cabecera($_SESSION['k_username']);
contenido();
?>
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
<BR>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
	?>
	<script>window.open('imprimir_placa.php?placa_revision=<?php echo $_POST["placas_finalizadas"]?>', 'name', 'location=yes,menubar=no,status=no,toolbar=no,scrollbars=yes,width=700,height=540')</script>
    <?php
	mysql_query("UPDATE revisiones set impresion=1 where id_rev like '".$_POST["placas_finalizadas"]."' ");
}

?>
<form class="iform2" action="" method="post" name="registrar">
  <table width="100%" border="1" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td>
    
    	<table width="90%" border="0" cellspacing="0" cellpadding="4" align="center">
  <tr>
    <td colspan="4" class="Estilo1">Por favor seleccione la palca para realizar la impresion de los resultados de la inspeccion...</td>
  </tr>
  <tr>
    <td colspan="4" class="Estilo1">&nbsp;</td>
  </tr>
  <tr>
    <td width="20%">Placa</td>
    <td width="30%" colspan="2"><span id="sprytextfield1">
      <label for="placas_finalizadas"></label>
      <input class="itext3" type="text" name="placas_finalizadas" id="placas_finalizadas" onKeyUp="this.value=this.value.toUpperCase()">
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
    <td colspan="4" align="center"><input type="submit" name="enviar" id="enviar" value="Imprimir Resultado"></td>
  </tr>
</table>

    
    
    
    </td>
  </tr>
</table>



</form>

<?php
 footer();
?>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none", {validateOn:["change"]});
</script>
