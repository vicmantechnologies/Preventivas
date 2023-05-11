<?php
session_start();//activa secion y pide conectividad entrre pagina y pagina

error_reporting(0);
require("funciones.php");
cabecera($_SESSION['k_username']);

contenido();
?><BR>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
	?>
	<script>window.open('reporte_general_registros.php?fecha_con1=<?php echo $_POST["fecha_con1"]?>&fecha_con2=<?php echo $_POST["fecha_con2"]?>&punto_venta=<?php echo $_POST["tipo"]?>', 'name', 'location=yes,menubar=no,status=no,toolbar=no,scrollbars=yes,width=840,height=480')</script>
    <?php
	mysql_query("UPDATE revisiones set impresion=1 where id_rev like '".$_POST["placas_finalizadas"]."' ");
}

?>
<form name="consulta_punto" class="iform2" method="post" id="consulta_punto"  >

  		  <p align="center" class="Estilo1">REPORTE GENERAL DE  REGISTROS - SIPCO</p>

<br><br><br>
<table border="0"  cellpadding="0" cellspacing="0" width="95%" bordercolorlight="#CCCCCC" bordercolordark="#FFFFFF" align="center" class="Estilo5">
           <tr>
           		<td>INFORME REGISTROS</td>
           </tr>
           <tr>
           		<td><table width="90%" border="0"  class="Estilo6" align="center" >
    <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="16%">Fecha Inicial</td>
    <td width="23%" align="left"> <input class="itext3" type="text"  required name="fecha_con1" size="10" id="fecha_con1" maxlength="10" onFocus="popUpCalendar(this, consulta_punto.fecha_con1, 'yyyy-mm-dd');" value="<?php echo date("Y-m-d"); ?>" /></td>
    <td width="10%">Fecha Final</td>
    <td width="26%" align="left"><input class="itext3" type="text"  required name="fecha_con2" size="10" id="fecha_con2" maxlength="10" onFocus="popUpCalendar(this, consulta_punto.fecha_con2, 'yyyy-mm-dd');" value="<?php echo date("Y-m-d"); ?>" /></td>
    <td width="25%"><input  type="submit" class="ibutton2"  value="Consultar" method="POST" /><input name="action" type="hidden" value="upload" /></td>
  </tr>
  <tr>
    <td width="16%">&nbsp;</td>
    <td width="23%" colspan="2"></td>
    
    <td width="26%">&nbsp;</td>
  </tr>
</table></td>
</tr>
</table>
<br/><br/><br/><br/><br/>
</form>
<?php
 footer();
?>
