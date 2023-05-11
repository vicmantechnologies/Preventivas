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
	<script>window.open('imprimir_rango.php?fecha_con1=<?php echo $_POST["fecha_con1"]?>&fecha_con2=<?php echo $_POST["fecha_con2"]?>&empresa=<?php echo "".$_POST["empresa"].""?>', 'name', 'location=yes,menubar=no,status=no,toolbar=no,scrollbars=yes,width=840,height=480')</script>
    <?php
	mysql_query("UPDATE revisiones set impresion=1 where id_rev like '".$_POST["placas_finalizadas"]."' ");
}

?>
<?php
//este reporte es solo para usuario preventivas que facturan
	$generado_por=mysql_query("select * from usuarios where id_usuario like '".$_SESSION['k_username']."'");
	$row_generado=mysql_fetch_array($generado_por);
	if($row_generado["empresa"]=="PREVENTIVAS")
	{
		?>
        	<form name="consulta_punto" class="iform2" method="post" id="consulta_punto"  >

  		  <p align="center" class="Estilo1">REPORTE GENERAL DE VENTAS Y REGISTROS- SIPCO</p>

<br><br><br>
<table border="0"  cellpadding="0" cellspacing="0" width="95%" bordercolorlight="#CCCCCC" bordercolordark="#FFFFFF" align="center" class="Estilo5">
           <tr>
           		<td>INFORME PRODUCCION</td>
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
    <td width="16%">Empresa</td>
    <td width="23%" colspan="2">
	<?php 
	$query_empresa_user= mysql_query('SELECT empresa FROM usuarios WHERE id_usuario like "'.$_SESSION["k_username"].'"');//hago la consulta a la base de datos para traer la empresa del usuario
	$result_empresa_user=mysql_fetch_array($query_empresa_user);
	
	$query_ciudad_user= mysql_query('SELECT * FROM ciudades WHERE nom_cda like "'.$result_empresa_user["empresa"].'"');//hago la consulta a la base de datos para traer las ciudad de la empresa del usuario
	$result_ciudad_user=mysql_fetch_array($query_ciudad_user);
	$query_convenios="Select nombre,v_prev_t,id_cliente from clientes WHERE ciudad = '".$result_ciudad_user["nom_ciudad"]."' or multi_ciudad='1' ORDER BY nombre ASC ";
$result_convenios=mysql_query($query_convenios);


echo '<select class="iselect2" id="empresa" name="empresa" onchange="ShowSelected();" >';
//echo "<option value='0'>Elegir Empresa</option>";
//Generamos el menu desplegable

while ($row_convenios=mysql_fetch_array($result_convenios))
{

echo '<option value='.$row_convenios["id_cliente"].'>'.$row_convenios["nombre"].'</option>';
}
echo '</select>';
	
	?>
    </td>
    
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
