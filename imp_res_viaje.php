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
	<script>window.open('imp_viaje.php?idviaje=<?php echo $_POST["placas_finalizadas"]?>', 'name', 'location=yes,menubar=no,status=no,toolbar=no,scrollbars=yes,width=700,height=540')</script>
    <?php
	mysql_query("UPDATE revisionesviaje set impreso=1 where idViaje = '".$_POST["placas_finalizadas"]."' ");
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
    <td width="30%" colspan="2"><span class="Campos">
      <?php
                                                               //Conexion con la base
require("conexion.php");

	$query_empresa_user= mysql_query('SELECT empresa FROM usuarios WHERE id_usuario like "'.$_SESSION["k_username"].'"');//hago la consulta a la base de datos para traer la empresa del usuario
	$result_empresa_user=mysql_fetch_array($query_empresa_user);
	
	$query_ciudad_user= mysql_query('SELECT * FROM ciudades WHERE nom_cda like "'.$result_empresa_user["empresa"].'"');//hago la consulta a la base de datos para traer la empresa del usuario
	$result_ciudad_user=mysql_fetch_array($query_ciudad_user);
	//echo $result_ciudad_user["id_ciudad"];

        $query_convenios="Select idViaje,placaViaje from revisionesviaje WHERE finInspeccionViaje=1 and impreso=0 and sedeRegViaje='".$result_ciudad_user["id_ciudad"]."' ORDER BY horaViaje ASC ";
$result_convenios=mysql_query($query_convenios) or die ('Error en informaciond e placas FUR: '.mysql_error());


echo '<select class="iselect2" name="placas_finalizadas" >';
echo "<option value='0'>Seleccionar Placa...</option>";
//Generamos el menu desplegable

while ($row_convenios=mysql_fetch_array($result_convenios))
{

echo '<option value="'.$row_convenios["idViaje"].'">'.$row_convenios["placaViaje"];}
echo '</select>';
?>
    </span></td>
    
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
