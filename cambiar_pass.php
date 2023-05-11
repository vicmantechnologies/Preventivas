<?php
session_start();
require_once("funciones.php");
cabecera($_SESSION['usuario']);
contenido();
?>
<?php 
$status = "";
if ($_POST["action"] == "upload") 
{
    if($_POST["contrasena1"]!=$_POST["contrasena2"])//pregunta si las contraseñas son diferentes 
		{
			$error_contrasena=1;//si son diferente genera este mensaje y ejecuta la funcion.
			
		}
		else
		{
			
			//$contrasena1=sha1($contrasena1);
			$query = "UPDATE usuarios SET password='".$_POST["contrasena1"]."' where id_usuario='".$_POST["id_usuario"]."' limit 1";
    mysql_query($query) or die(mysql_error());
         
		}
}
?>
<div class="content">

  <h1></h1>
<form name="nuevo_usuario" class="iform2" id="principal" method="POST"  onSubmit="return confirm('Esta seguro de cambiar su contraseña?');">

  		  <p align="center" class="Estilo9">CAMBIAR CONTRASEÑA - SIPCO</p>
<!--Esta tabla hace el maco exterio por eso el border esta en 2 se crea tabla de 2filas y 1 sola columna--><p align="center"><font color="green" size="2"> <?php if ($_POST["action"] == "upload") {
	if($error_contrasena==1)
	{ echo 'Las contraseñas no coinciden intente nuevamente';}
	else
	{
	$consulta_nom_user=mysql_query("Select usuario from usuarios where id_usuario like '".$_SESSION["k_username"]."'");	
	$nom_user=mysql_fetch_array($consulta_nom_user);
	echo "El usuario '".$_POST["usuario"]."' ha sido modificado de manera satisfactoria.<br />"; }}?></font></p>
<BR />

<table border="0" cellpadding="0" cellspacing="0" width="75%" bordercolorlight="#CCCCCC" bordercolordark="#FFFFFF" bgcolor="#FDFBFF"align="center" class="Estilo5">
           <tr>
           		<td>CAMBIAR CONTRASEÑA</td>
           </tr>
           <tr>
           		<td>
                
                <table width="70%" border="0"  class="Estilo6" align="center" >
   
  <BR>

      <tr>
    <td>Usuario</td>
    <td><?php  $consulta_nusuario=mysql_query("select usuario,id_usuario from usuarios where id_usuario='".$_SESSION["k_username"]."'");
		$nombreuser=mysql_fetch_array($consulta_nusuario);
	  ?>
      <input type="text" class="itext2" name="usuario" id="usuario"  size="20" value="<?php echo $nombreuser["usuario"]; ?>" readonly />
      <input type="hidden" name="id_usuario" value="<?php echo $nombreuser["id_usuario"] ?>" readonly="readonly"/></td>
    </tr>
    <tr>
    	<td>Contraseña</td>
    	<td><label for="informacion"></label>
    	  <label for="valor_pgrc"></label>
    	  <input type="password" class="itext2" name="contrasena1" id="contrasena1"  size="20" required /></td>
    </tr>
    
  <tr>
    <td>Confirmar contraseña</td>
    <td><input type="password" class="itext2" name="contrasena2" id="contrasena2"  size="20" required /></td>
    </tr>
</table>
</td>
</tr>
</table>
  </p>
  
  
  
  
  <p align="center">
  <input name="enviar" type="submit" class="ibutton2" id="enviar" value="Guardar" />
      <input name="action" type="hidden" value="upload" /> 
  <input type='reset' class="ibutton2" value='Limpiar Datos' name='limpiar' >
  <input type='button' class="ibutton2" value='Salir' name='cerrar' onClick="(location='principal.php');" >
  </p>
  <br><br>
  </form>

  <!-- end .content --></div>
<?php
footer();
?>
