<?php
error_reporting(0);
require("funciones.php");
cabecera($_SESSION['k_username']);
validar_usuario();
contenido();
?>
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script src="src/js/jscal2.js"></script>
    <script src="src/js/lang/es.js"></script>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
<link href="SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="src/css/jscal2.css" />
    <link rel="stylesheet" type="text/css" href="src/css/border-radius.css" />
    <link rel="stylesheet" type="text/css" href="src/css/steel/steel.css" />
    <link href="SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
<script src="SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
<script type="text/javascript">
function ShowSelected()
{
/* Para obtener el valor */
//var cod = document.getElementById("empresa").value;
//alert(cod);
 
/* Para obtener el texto */
var combo = document.getElementById("empresa");
var selected = combo.options[combo.selectedIndex].text;
document.registrar.nom_empresa.value = selected;
//alert(selected);
}
</script>
<BR>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{ 
	//primero miramos de que empresa es el usuario para generar id de facturacion o no dependiendo de la empresa
	$generado_por=mysql_query("select * from usuarios where id_usuario like '".$_SESSION['k_username']."'");
	$row_generado=mysql_fetch_array($generado_por);
	
	//primero miramos que no haya sido registrada la placa el mismo dia
		$verifica_placa=mysql_query("select * from revisiones where placa like '".$placa_reg."' and fecha = '".date("Y-m-d")."' order by id_rev desc limit 1");
		$verifica=mysql_num_rows($verifica_placa);
		if($verifica>0)
		{
			
			$row_verifica=mysql_fetch_array($verifica_placa);
			$fecha = $row_verifica["hora"];
			$nuevafecha = strtotime ( '+30 minute' , strtotime ( $fecha ) ) ;
			$nuevafecha = date ( 'H:i:s' , $nuevafecha );
			//echo $nuevafecha;
			$hora1 = strtotime( $nuevafecha );
			$hora2 = strtotime( date("H:i:s") );
			if($hora1 >= $hora2)// no han pasado 30 minutos
			{
				
				?>
                	<form class="iform2" action="" method="post" name="registrar">
                      <table width="100%" border="1" cellspacing="0" cellpadding="0" align="center">
                      <tr>
                        <td>
                        
                            <table width="90%" border="0" cellspacing="0" cellpadding="4" align="center">
                      <tr>
                        <td colspan="4" align="center" style=" font-family:'Arial Black', Gadget, sans-serif; font-size:32px; color:#F00"  ><b>Error Placa ya Ingresada</b></td>
                      </tr>
                      <tr>
                        <td colspan="4" class="Estilo1">&nbsp;</td>
                      </tr>
                      <tr>
                        <td colspan="4" align="center">El vehiculo de placas <?php echo $_POST[placa_reg]?> de la empresa <?php echo $_POST[nom_empresa]?> ya fue  registrado el dia de hoy a las <?php echo  $row_verifica["hora"]?> con la factura No. <?php echo  $row_verifica["factura"]?>.</td>
                        
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td colspan="4" align="center"><b>Para continuar por favor de click en el boton que se encuentra a continuacion tenga en cuenta que una vez ingresada una placa esta misma no podra ser ingresada el mismo dia.<b></td>
                        
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td colspan="4" align="center"><input type="button" name="enviar2" id="enviar2" value="Continuar" onClick="(location = 'principal_user.php')"></td>
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
				footer();
				exit();

			}
		}
	
	if($row_generado["empresa"]=="PREVENTIVAS" )
	{
		
		//realizamos insercion en nuestra tabla registros CON FACTURA para esto debemos buscar el ultimo id factura registrado para la sede correspondiente
		$factura=mysql_query("select id_fac from revisiones where sede = 9 and id_fac>0 order by id_fac desc limit 1");
		$row_factura=mysql_fetch_array($factura);
		$new_factura = $row_factura["id_fac"]+1;
		if($new_factura>50000)
		{
			?>
                	<form class="iform2" action="" method="post" name="registrar">
                      <table width="100%" border="1" cellspacing="0" cellpadding="0" align="center">
                      <tr>
                        <td>
                        
                            <table width="90%" border="0" cellspacing="0" cellpadding="4" align="center">
                      <tr>
                        <td colspan="4" align="center" style=" font-family:'Arial Black', Gadget, sans-serif; font-size:32px; color:#F00"  ><b>Error Facturacion No Disponible</b></td>
                      </tr>
                      <tr>
                        <td colspan="4" class="Estilo1">&nbsp;</td>
                      </tr>
                      <tr>
                        <td colspan="4" align="center">&nbsp;</td>
                        
                      </tr>
                      
                      <tr>
                        <td colspan="4" align="center"><b>Para continuar se debe tener consecutivos de facturación disponibles, por favor contacte al administrador del sistema para que ingrese la siguiente facturacion asignada por la DIAN.<b></td>
                        
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td colspan="4" align="center"><input type="button" name="enviar2" id="enviar2" value="Continuar" onClick="(location = 'principal_user.php')"></td>
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
				footer();
				exit();
		}
		else
		{
			//$nuevo=mysql_query("INSERT INTO revisiones (id_rev,id_fac,fecha,hora,placa,nombres,apellidos,empresa,factura,tipo_revision,usuario,sede,conductor,celular) VALUES (NULL,'".$new_factura."','".date("Y-m-d")."', '".date("H:i:s")."', '$placa_reg', '$nombre', '$apellido', '$nom_empresa', 1111, '$tipo_revision','$usuario','$id_sede','$conductor','$celular');");
			$nuevo=mysql_query("INSERT INTO revisiones (id_rev,id_fac,fecha,hora,placa,nombres,apellidos,empresa,factura,tipo_revision,usuario,sede,conductor,celular,valor) VALUES (NULL,'0','".date("Y-m-d")."', '".date("H:i:s")."', '$placa_reg', '$nombre', '$apellido', '$nom_empresa', 1111, '$tipo_revision','$usuario','$id_sede','$conductor','$celular','$empresa');");
			//INSERTAMOS DATOS DEL VEHICULO SINO EXISTE EN DB
			$placa_existe=mysql_query("select placa from info_vehiculos where placa like '".$placa_reg."' order by id_veh desc limit 1");
		$existe=mysql_num_rows($placa_existe);
		if($existe==0)
		{
			mysql_query("INSERT INTO data_preventivas.info_vehiculos (placa, servicio, clase, marca, linea, modelo, combustible, fin_soat, fin_rtm, tel_prop, correo) VALUES ('$placa_reg', '$servicio', '$clase', '$marca', '$linea', '$modelo', '$combustible', '$f_date1', '$f_date2', '$tel_propietario', '$correo')");
		}
		else
		{
			mysql_query("UPDATE info_vehiculos SET servicio='$servicio', clase='$clase', marca='$marca', linea='$linea', modelo='$modelo', combustible='$combustible', fin_soat='$f_date1', fin_rtm='$f_date2', tel_prop='$tel_propietario', correo = '$correo' where placa = '$placa_reg' limit 1") or die (mysql_error());
		}
			
			?>
        <!--VENTANA DE IMPRECION DE FACTURA SOLO PREVENTIVAS DON ORLANDO-->
        <!--SE INHABILITA GENER FACTURAS POR SOLICITUD EXPRESA-->
        <!--<script>window.open('imprimir_recibo.php?placa_revision=<?php //echo $placa_reg?>&vref=<?php //echo $empresa?>', 'name', 'location=yes,menubar=no,status=no,toolbar=no,scrollbars=yes,width=700,height=540')</script>-->
        <?PHP
		}//cierre if si facuracion desbordo
		
		
	}
	else
	{
		//realizamos insercion en nuestra tabla registros SIN FACTURA
		$nuevo=mysql_query("INSERT INTO revisiones (id_rev,fecha,hora,placa,nombres,apellidos,empresa,factura,tipo_revision,usuario,sede,conductor,celular) VALUES (NULL, '".date("Y-m-d")."', '".date("H:i:s")."', '$placa_reg', '$nombre', '$apellido', '$nom_empresa', '$factura', '$tipo_revision','$usuario','$id_sede','$conductor','$celular');");
		
		//INSERTAMOS DATOS DEL VEHICULO SINO EXISTE EN DB
			$placa_existe=mysql_query("select placa from info_vehiculos where placa like '".$placa_reg."' order by id_veh desc limit 1");
		$existe=mysql_num_rows($placa_existe);
		if($existe==0)
		{
			mysql_query("INSERT INTO data_preventivas.info_vehiculos (placa, servicio, clase, marca, linea, modelo, combustible, fin_soat, fin_rtm, tel_prop, correo) VALUES ('$placa_reg', '$servicio', '$clase', '$marca', '$linea', '$modelo', '$combustible', '$f_date1', '$f_date2', '$tel_propietario', '$correo')");
		}
		else
		{
			mysql_query("UPDATE info_vehiculos SET servicio='$servicio', clase='$clase', marca='$marca', linea='$linea', modelo='$modelo', combustible='$combustible', fin_soat='$f_date1', fin_rtm='$f_date2', tel_prop='$tel_propietario', correo = '$correo' where placa = '$placa_reg' limit 1") or die (mysql_error());
		}
	}

	 

  ?>
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
    <td colspan="4" align="center">El vehiculo de placas <?php echo $_POST[placa_reg]?> de la empresa <?php echo $_POST[nom_empresa]?> fue registrado correctamente.</td>
    
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4" align="center"><b>Para continuar por favor de click en el boton que se encuentra a continuacion tenga en cuenta que una vez ingresada una placa esta misma no podra ser ingresada hasta pasados 30 minutos<b></td>
    
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4" align="center"><input type="button" name="enviar2" id="enviar2" value="Registrar Nuevo Vehiculo" onClick="(location = 'principal_user.php')"></td>
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


<form class="iform2" action="" method="post" name="registrar">
  <table width="100%" border="1" cellspacing="0" cellpadding="0" align="center" class="Estilo6">
  <tr>
    <td>
    
    	<table width="90%" border="0" cellspacing="0" cellpadding="4" align="center" class="Estilo6">
  <tr>
    <td colspan="4" class="Estilo1">Por favor registre  los campos que encuentra a continuacion...</td>
  </tr>
  <tr>
    <td colspan="4" class="Estilo1">&nbsp;</td>
  </tr>
  <tr>
    <td width="20%">Placa</td>
    <td width="30%" colspan="2"><span id="sprytextfield1">
    <label for="placa_reg"></label>
    <input class="itext3" type="text" name="placa_reg" id="placa_reg" onKeyUp="this.value=this.value.toUpperCase()">
    <span class="textfieldRequiredMsg">Se necesita un valor.</span><span class="textfieldMaxCharsMsg">Se ha superado el número máximo de caracteres.</span></span></td>
    
    <td width="30%"><label for="usuario"></label>
      <input type="hidden" name="usuario" id="usuario" value="<?php echo $_SESSION[k_username]?>"></td>
  </tr>
  <tr>
    <td>Nombre Propietario</td>
    <td><span id="sprytextfield2">
    <label for="nombre"></label>
    <input class="itext2" type="text" name="nombre" id="nombre" onKeyUp="this.value=this.value.toUpperCase()">
    <span class="textfieldRequiredMsg">Se necesita un valor.</span><span class="textfieldMinCharsMsg">No se cumple el mínimo de caracteres requerido.</span></span></td>
    <td>Apellido Propietarios</td>
    <td><span id="sprytextfield3">
    <label for="apellido"></label>
    <input class="itext2" type="text" name="apellido" id="apellido" onKeyUp="this.value=this.value.toUpperCase()">
    <span class="textfieldRequiredMsg">Se necesita un valor.</span><span class="textfieldMinCharsMsg">No se cumple el mínimo de caracteres requerido.</span></span></td>
  </tr>
  <tr>
  <td>Tel Propietario</td>
  <td><span id="sprytextfield11">
  <label for="tel_propietario"></label>
  <input class="itext2" type="text" name="tel_propietario" id="tel_propietario" />
  <span class="textfieldInvalidFormatMsg">Formato no válido.</span><span class="textfieldMinCharsMsg">No se cumple el mínimo de caracteres requerido.</span><span class="textfieldMaxCharsMsg">Se ha superado el número máximo de caracteres.</span></span></td>
  <td>Correo</td>
  <td><span id="sprytextfield12">
  <label for="correo"></label>
  <input class="itext2" type="text" name="correo" id="correo" onKeyUp="this.value=this.value.toUpperCase()"/>
  <span class="textfieldInvalidFormatMsg">Formato no válido.</span><span class="textfieldMinCharsMsg">No se cumple el mínimo de caracteres requerido.</span></span></td>
  </tr>
   <tr>
    <td>Nombre Conductor</td>
    <td>
      <label for="conductor"></label>
      <input class="itext2" type="text" name="conductor" id="conductor" onKeyUp="this.value=this.value.toUpperCase()" />
      <label for="tipo_revision"></label></td>
    <td>Celular</td>
    <td><label for="celular"></label>
      <span id="sprytextfield5">
      <input class="itext2" type="text" name="celular" id="celular" />
<span class="textfieldInvalidFormatMsg">Formato no válido.</span></span></td>
  </tr>
<tr>
<td>Servicio</td>
<td><span id="spryselect2">
  <label for="servicio"></label>
  <select class="iselect2" name="servicio" id="servicio">
    <option value="0">Seleccionar</option>
    <option value="1">PUBLICO</option>
    <option value="2">PARTICULAR</option>
    <option value="3">ESPECIAL</option>
  </select>
  <span class="selectRequiredMsg">Seleccione un elemento.</span></span></td>
<td>Clase</td>
<td><span id="spryselect3">
  <label for="clase"></label>
  <select class="iselect2" name="clase" id="clase">
    <option value="0">Seleccionar...</option>
    <option value="1">AUTOMOVIL</option>
    <option value="2">BUS</option>
    <option value="3">BUSETA</option>
    <option value="4">CAMIONETA</option>
    <option value="5">CAMPERO</option>
    <option value="6">MICROBUS</option>
  </select>
  <span class="selectRequiredMsg">Seleccione un elemento.</span></span></td>
</tr>
<tr>
<td>Marca</td>
<td><span id="sprytextfield6">
  <label for="marca"></label>
  <input class="itext2" type="text" name="marca" id="marca" onKeyUp="this.value=this.value.toUpperCase()" />
  <span class="textfieldRequiredMsg">Se necesita un valor.</span></span></td>
<td>Linea</td>
<td><span id="sprytextfield8">
<label for="linea"></label>
<input class="itext2" type="text" name="linea" id="linea" onKeyUp="this.value=this.value.toUpperCase()"/>
<span class="textfieldRequiredMsg">Se necesita un valor.</span><span class="textfieldMinCharsMsg">No se cumple el mínimo de caracteres requerido.</span></span></td>
</tr>
<tr>
<td>Modelo</td>
<td><span id="sprytextfield7">
<label for="modelo"></label>
<input class="itext2" type="text" name="modelo" id="modelo"/>
<span class="textfieldRequiredMsg">Se necesita un valor.</span><span class="textfieldInvalidFormatMsg">Formato no válido.</span><span class="textfieldMaxCharsMsg">Se ha superado el número máximo de caracteres.</span><span class="textfieldMinCharsMsg">No se cumple el mínimo de caracteres requerido.</span></span></td>
<td>Combustible</td>
<td><span id="spryselect4">
  <label for="combustible"></label>
  <select class="iselect2" name="combustible" id="combustible">
    <option value="0">Seleccionar...</option>
    <option value="1">GASOLINA</option>
    <option value="2">GAS-GASOLINA</option>
    <option value="3">DIESEL</option>
    <option value="4">ELECTRICO</option>
  </select>
  <span class="selectRequiredMsg">Seleccione un elemento.</span></span></td>
</tr>
<tr>
<td>Vencimiento Soat</td>
<td><span id="sprytextfield9">
<label for="fecha_soat"></label>
<input size="30" class="itext2" name="f_date1" id="f_date1" maxlength="10"/>

<span class="textfieldRequiredMsg">Se necesita un valor.</span><span class="textfieldInvalidFormatMsg">Formato no válido.</span></span>
<button id="f_btn1">...</button>
<br />
<script type="text/javascript">//<![CDATA[
        Calendar.setup({
            inputField : "f_date1",
            trigger    : "f_date1",
            trigger    : "f_btn1",
            onSelect   : function() { this.hide() },
            showTime   : 12,
            dateFormat : "%Y-%m-%d"
            <!-- este es el originaldateFormat : "%Y-%m-%d %I:%M %p"-->
        });
        //]]></script>
</td>
<td>Vencimiento RTM</td>
<td><span id="sprytextfield10">
<label for="fecha_rtm"></label>
<label for="fecha_soat"></label><input size="30" class="itext2" name="f_date2" id="f_date2" maxlength="10"/>

<span class="textfieldRequiredMsg">Se necesita un valor.</span><span class="textfieldInvalidFormatMsg">Formato no válido.</span></span>
  <button id="f_btn2">...</button>
    <br />

    <script type="text/javascript">//<![CDATA[
        Calendar.setup({
            inputField : "f_date2",
            trigger    : "f_date2",
            trigger    : "f_btn2",
            onSelect   : function() { this.hide() },
            showTime   : 12,
            dateFormat : "%Y-%m-%d"
            <!-- este es el originaldateFormat : "%Y-%m-%d %I:%M %p"-->
        });
        //]]></script>
  </td>
</tr>
  <tr>
    <td>Empresa</td>
    <td><span class="Campos">
      <?php
                                                               //Conexion con la base
require("conexion.php");

	$query_empresa_user= mysql_query('SELECT empresa FROM usuarios WHERE id_usuario like "'.$_SESSION["k_username"].'"');//hago la consulta a la base de datos para traer la empresa del usuario
	$result_empresa_user=mysql_fetch_array($query_empresa_user);
	
	$query_ciudad_user= mysql_query('SELECT * FROM ciudades WHERE nom_cda like "'.$result_empresa_user["empresa"].'"');//hago la consulta a la base de datos para traer las ciudad de la empresa del usuario
	$result_ciudad_user=mysql_fetch_array($query_ciudad_user);
	//echo $result_ciudad_user["id_ciudad"];

        $query_convenios="Select nombre,v_prev_t from clientes WHERE ciudad = '".$result_ciudad_user["nom_ciudad"]."' or multi_ciudad='1' ORDER BY nombre ASC ";
$result_convenios=mysql_query($query_convenios);


echo '<select class="iselect2" id="empresa" name="empresa" onchange="ShowSelected();" >';
//echo "<option value='0'>Elegir Empresa</option>";
//Generamos el menu desplegable

while ($row_convenios=mysql_fetch_array($result_convenios))
{

echo '<option value='.$row_convenios["v_prev_t"].'>'.$row_convenios["nombre"].'</option>';
}
echo '</select>';
?>
    </span><label for="id_sede"></label>
      <input type="hidden" name="id_sede" id="id_sede" readonly="readonly" value="<?php echo $result_ciudad_user["id_ciudad"]?>"/></td>
    <td>Factura No.</td>
    <td><span id="sprytextfield4">
    <label for="factura"></label>
    <input class="itext3" type="text" name="factura" id="factura" value="">
    <span class="textfieldRequiredMsg">Se necesita un valor.</span><span class="textfieldInvalidFormatMsg">Formato no válido.</span><span class="textfieldMinCharsMsg">No se cumple el mínimo de caracteres requerido.</span></span></td>
  </tr>
  <tr>
    <td>Tipo Revision</td>
    <td><span id="spryselect1">
      <label for="tipo_revision"></label>
      <select class="iselect2" name="tipo_revision" id="tipo_revision">
        
        <option value="1">PREVENTIVA</option>
        
      </select>
      <span class="selectInvalidMsg">Seleccione un elemento válido.</span><span class="selectRequiredMsg">Seleccione un elemento.</span></span></td>
    <td>&nbsp;</td>
    <td><label for="nom_empresa"></label>
      <input type="hidden" name="nom_empresa" id="nom_empresa" readonly="readonly" /></td>
  </tr>
  <tr>
    <td colspan="4" align="center"><input type="submit" name="enviar" id="enviar" value="Registrar Revision"></td>
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
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none", {validateOn:["change"], maxChars:6});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "none", {validateOn:["change"], minChars:4});
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "none", {minChars:4, validateOn:["change"]});
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4", "integer", {validateOn:["change"], minChars:4});
var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1", {validateOn:["change"], invalidValue:"0"});
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5", "integer", {isRequired:false, validateOn:["change"]});
var spryselect2 = new Spry.Widget.ValidationSelect("spryselect2");
var spryselect3 = new Spry.Widget.ValidationSelect("spryselect3");
var sprytextfield6 = new Spry.Widget.ValidationTextField("sprytextfield6");
var sprytextfield7 = new Spry.Widget.ValidationTextField("sprytextfield7", "integer", {validateOn:["change"], maxChars:4, minChars:4});
var spryselect4 = new Spry.Widget.ValidationSelect("spryselect4");
var sprytextfield8 = new Spry.Widget.ValidationTextField("sprytextfield8", "none", {minChars:4});
var sprytextfield9 = new Spry.Widget.ValidationTextField("sprytextfield9", "date", {format:"yyyy-mm-dd"});
var sprytextfield10 = new Spry.Widget.ValidationTextField("sprytextfield10", "date", {format:"yyyy-mm-dd"});
var sprytextfield11 = new Spry.Widget.ValidationTextField("sprytextfield11", "integer", {isRequired:false, minChars:7, maxChars:10, validateOn:["change"]});
var sprytextfield12 = new Spry.Widget.ValidationTextField("sprytextfield12", "email", {isRequired:false, minChars:10, validateOn:["change"]});
</script>
