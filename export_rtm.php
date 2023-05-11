<?php
session_start();//activa secion y pide conectividad entrre pagina y pagina

error_reporting(0);
require("funciones.php");
cabecera($_SESSION['k_username']);

contenido();
?><BR>
<?php
//este reporte es solo para usuario preventivas que facturan
	$generado_por=mysql_query("select * from usuarios where id_usuario like '".$_SESSION['k_username']."'");
	$row_generado=mysql_fetch_array($generado_por);
	if($row_generado["empresa"]!="")
	{
		?>
        	<form name="consulta_punto" class="iform2" id="consulta_punto" method="POST" action="excel_rtm.php" >

  		  <p align="center" class="Estilo1">REPORTE VENCIMIENTO RTM - SIPCO</p>

<br><br><br>
<table border="0"  cellpadding="0" cellspacing="0" width="95%" bordercolorlight="#CCCCCC" bordercolordark="#FFFFFF" align="center" class="Estilo5">
           <tr>
           		<td>INFORME VENCIMIENTOS</td>
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
    
    
    <td width="26%">&nbsp;</td>
  </tr>
</table></td>
</tr>
</table>
<br/><br/><br/><br/><br/>
</form>
        <?php
	}
	else
	{
		?>
        	<form name="consulta_punto" class="iform2" method="post" id="consulta_punto"  >

  		  <p align="center" class="Estilo1">ACCESO DENEGADO- SIPCO</p>

<br><br><br>
<table border="0"  cellpadding="0" cellspacing="0" width="95%" bordercolorlight="#CCCCCC" bordercolordark="#FFFFFF" align="center" class="Estilo5">
           <tr>
           		<td align="center" style="font-style:normal; color:#F00">SU PERFIL NO TIENE ACCESO A ESTE REPORTE</td>
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
    <td width="16%" colspan="5" align="center"><input type="button" name="enviar2" id="enviar2" value="Salir" onclick="(location = 'principal_user.php')" /></td>
    
  </tr>

</table></td>
</tr>
</table>
<br/><br/><br/><br/><br/>
</form>
        <?php
		
	}//fin de verifiacion si el usuario es de empresa preventivas
?>

<?php
 footer();
?>
