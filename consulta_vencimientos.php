<?php
error_reporting(0);
require("funciones.php");
cabecera($_SESSION['k_username']);
contenido();
?><BR>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{ 

  ?>
   <script language='javascript' src="popcalendar.js"></script>
   <form class="iform2" action="" method="post" name="registrar">
  <table width="100%" border="1" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td>
    
    	<table width="90%" border="0" cellspacing="0" cellpadding="4" align="center">
  <tr>
    <td colspan="4" class="Estilo2" align="center" >Informacion Registrada Satisfactoriamente</td>
  </tr>
  <tr>
    <td colspan="4" class="Estilo1">&nbsp;</td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4" align="center"><b>Para continuar por favor de click en el boton que se encuentra a continuacion tenga en cuenta que una vez ingresada la informacion no podra ser eliminada por ningun motivo...<b></td>
    
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4" align="center"><input type="button" name="enviar2" id="enviar2" value="Continuar.." onClick="(location = 'principal_user.php')"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>

    </td>
  </tr>
</table>

</form>

  <?php
	 
}
else
{
?>


<form class="iform2" method="post" name="registrar" action="excel_gral.php">
  <table width="100%" border="1" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td>
    
    	<table width="90%" border="0" cellspacing="0" cellpadding="4" align="center">
  <tr>
    <td width="80%" class="Estilo1" colspan="4">Por favor seleccione el rango de fecha de vencimiento...</td>
  </tr>
  
                      
                        <td width="17%" class= "Campos">&nbsp;</td>
                        <td width="27%" class= "Campos">&nbsp;</td>
                        <td width="13%" class= "Campos">&nbsp;</td>
                        
                                    <td width="43%" class= "Campos">
                        
                      </tr>
                      <tr>
                        <td width="17%" class= "Campos">Fecha Inicial</td>
                        <td width="27%" class= "Campos"><input class="itext3" name="fecha"  type="text" id="fecha" onFocus="popUpCalendar(this, registrar.fecha, 'yyyy-mm-dd');" size="10" value="<?php echo date("Y-m-d")?>" /></td>
                        <td width="13%" class= "Campos">Fecha Final</td>
                        <td width="43%" class= "Campos"><input class="itext3" name="fecha2"  type="text" id="fecha2" onFocus="popUpCalendar(this, registrar.fecha, 'yyyy-mm-dd');" size="10" value="<?php echo date("Y-m-d")?>" /></td>
                      </tr>
                      <tr>
                      <td colspan="4">&nbsp;</td>
                      </tr>
                      
                    
  <tr>
    <td align="center" colspan="4"><input class="ibutton2" type="submit" name="enviar" id="enviar" value="Exportar" >
      <input type='button' class="ibutton2" value='Salir' name='cerrar' onclick="(location='principal_user.php');" /></td>
  </tr>
</table>

    
    
    
    </td>
  </tr>
</table>



</form>
 
 <?php
}
 ?>
<?php
 footer();
?>
