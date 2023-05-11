<?php
session_start();
require_once("funciones.php");
cabecera($_SESSION['usuario']);
contenido();
?>



  <h1></h1>
<form name="nuevo_usuario" class="iform2" id="principal" method="POST">

  		  <p align="center" class="Estilo9">INFORMACIÓN CLIENTES - SIPCO</p>
<!--Esta tabla hace el maco exterio por eso el border esta en 2 se crea tabla de 2filas y 1 sola columna--><p align="center"><font color="green" size="2"> </font></p>
<BR />

<table border="0" cellpadding="0" cellspacing="0" width="75%" bordercolorlight="#CCCCCC" bordercolordark="#FFFFFF" bgcolor="#FDFBFF"align="center" class="Estilo5">
           <tr>
           		<td>BUSCAR INFORMACIÓN DE CLIENTES</td>
           </tr>
           <tr>
           		<td>
                
                <table width="70%" border="0"  class="Estilo6" align="center" >
   
  <BR>

      <tr>
    <td>Placa</td>
    <td>
      <input type="text" class="itext2" name="placa_consulta" id="placa_consulta"  size="20" onKeyUp="this.value=this.value.toUpperCase()"  />
      <input type="hidden" name="id_usuario" value="<?php echo $nombreuser["id_usuario"] ?>" readonly/></td>
    </tr>
</table>
</td>
</tr>
</table>
  
  <p align="center">
  <input name="enviar" type="submit" class="ibutton2" id="enviar" value="Buscar" />
      <input name="action" type="hidden" value="upload" />
    <input type='button' class="ibutton2" value='Salir' name='cerrar' onClick="(location='principal_user.php');" >
  </p>
  
  <!--/*resultado del la consulta*/-->
  <?php 
  if ($_POST["action"] == "upload") 
  {
	
	$informacion=mysql_query("select * from revisiones where placa like '".$placa_consulta."' order by id_rev desc limit 1");
	$resultados=mysql_num_rows($informacion);
	if($resultados==0)
	{
		echo '<div align="center">NO HUBO RESULTADOS PARA LA CONSULTA</div>';
	}
	else
	{
		$row_informacion=mysql_fetch_array($informacion);
		?>
  <form class="iform2" action="" method="post" name="recibido">
    <table align="center" width="80%" border="0" class="Estilo6">
  <tr>
    <td colspan="4">Resultados de la Busqueda</td>
  </tr>
  <tr>
    <td>Placa</td>
    <td><label for="placa"></label>
      <input class="itext2" type="text" name="placa" id="placa" value="<?php echo $placa_consulta;?>" readonly></td>
    <td>Empresa</td>
    <td><input class="itext2" type="text" name="placa2" id="placa2" value="<?php echo $row_informacion[empresa];?>" readonly></td>
  </tr>
  <tr>
    <td>Nombres Prop</td>
    <td><input class="itext2" type="text" name="placa5" id="placa5" value="<?php echo $row_informacion[nombres];?>" readonly></td>
    <td>Apellidos Prop</td>
    <td><input class="itext2" type="text" name="placa6" id="placa6" value="<?php echo $row_informacion[apellidos];?>" readonly></td>
  </tr>
  <tr>
    <td>Conductor</td>
    <td><input class="itext2" type="text" name="placa3" id="placa3" value="<?php echo $row_informacion[conductor];?>" readonly></td>
    <td>Celular</td>
    <td><input class="itext2" type="text" name="placa4" id="placa4" value="<?php echo $row_informacion[celular];?>" readonly></td>
  </tr>
</table>

  </form>
    <?php
	}

	
	
}
	?>
  </form>
  
  

<!-- end .content --></div>
<?php
footer();
?>
