<?php
session_start();
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
<BR>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
	/*Procedimiento para subir archivo al servidor*/
     $nombre = $_FILES['userfile']['name'];
     $tipo_archivo = $_FILES['userfile']['type'];
     $tamano_archivo = $_FILES['userfile']['size'];
     $ruta = "pdfrtm/";
     $ruta_del_archivo = $ruta.$_FILES['userfile']['name'];  
     $nombre_archivo=$_FILES['userfile']['name'];
     //echo "nombre= ".$nombre." EXTENSION= ". $tipo_archivo. " Tamano= ".$tamano_archivo."<br>";
     if ($nombre!='')
	 {
          if (!(strpos($tipo_archivo, "pdf") && ($tamano_archivo < 5000000)))
		  {
             $mensaje = "no tiene la extensión o el tamaño corecto.";
          }
		  else
		  {
			  $new_name=$_POST['placa_reg']."-".date("Y-m-d")."-".date("His").".pdf";
             if(copy($_FILES['userfile']['tmp_name'],$ruta.''.$new_name))
			 {
				 mysql_query("INSERT INTO rtmpdf ( placa_rtm,fecha_rtm, empresa_rtm, aprobado_rtm, tp_revision, archivo_rtm) VALUES ('".$_POST['placa_reg']."','".date("Y-m-d")."','".$_POST['empresa']."', '".$_POST['aprobado_rtm']."', '".$_POST['tp_revision']."', '".$new_name."')") or die (mysql_error());
				 $mensaje ="fue cargado correctamente";
			 }
			 else
			 {
                  $mensaje ="no se pudo cargar por favor intente nuevamente.";
              }
          }
     } 

  ?>
   <form class="iform2" action="" method="post" name="registrar">
  <table width="100%" border="1" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td>
    
    	<table width="90%" border="0" cellspacing="0" cellpadding="4" align="center">
  <tr>
    <td colspan="4" class="Estilo2" align="center" >Resultado del Cargue</td>
  </tr>
  <tr>
    <td colspan="4" class="Estilo1">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4" align="center">El archivo para el vehículo de placas <?php echo $_POST[placa_reg].' '. $mensaje?> </td>
    
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4" align="center"><b>Para cargar el informe de otro vehículo por favor de click en el boton que se encuentra a continuación.<b></td>
    
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4" align="center"><input class="ibutton2" type="button" name="enviar2" id="enviar2" value="Nuevo Registro" onClick="(location = 'upload_rtm.php')"></td>
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


<form class="iform2" method="post" enctype="multipart/form-data" id="registrar" name="registrar">
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
    <td width="30" colspan="2"><span id="sprytextfield1">
    <label for="placa_reg"></label>
    <input class="itext3" type="text" name="placa_reg" id="placa_reg" onKeyUp="this.value=this.value.toUpperCase()" onBlur="xajax_procesar_formulario_masivo(xajax.getFormValues('registrar'))">
    <span class="textfieldRequiredMsg">Se necesita un valor.</span><span class="textfieldMaxCharsMsg">Se ha superado el número máximo de caracteres.</span></span></td>
    
    <td width="30%"><label for="usuario"></label></td>
  </tr>
  <tr>
    <td>Archivo</td>
    <td><span id="sprytextfield2">
    <label for="archivo"></label>
    <input class="itext2" type="file" name="userfile" id="userfile" size="40" placeholder="Seleccionar" />
    <span class="textfieldRequiredMsg">Se necesita un valor.</span><span class="textfieldMinCharsMsg">No se cumple el mínimo de caracteres requerido.</span></span></td>
    <td>Estado RTM</td>
    <td><span id="spryselect1">
      <label for="estado_rtm"></label>
      <select class="iselect2" name="aprobado_rtm" id="aprobado_rtm">
        <option value="-1">Seleccionar...</option>
        <option value="1">Aprobado</option>
        <option value="0">Rechazado</option>
      </select>
      <span class="selectInvalidMsg">Seleccione un elemento válido.</span><span class="selectRequiredMsg">Seleccione un elemento.</span></span></td>
  </tr>
  <tr>
    <td>Empresa</td>
    <td><span id="spryselect5">
      <label for="qaz"></label>
      <?php
                                                               //Conexion con la base
require("conexion.php");

	$query_empresa_user= mysql_query('SELECT empresa FROM usuarios WHERE id_usuario like "'.$_SESSION["k_username"].'"');//hago la consulta a la base de datos para traer la empresa del usuario
	$result_empresa_user=mysql_fetch_array($query_empresa_user);
	
	$query_ciudad_user= mysql_query('SELECT * FROM ciudades WHERE nom_cda like "'.$result_empresa_user["empresa"].'"');//hago la consulta a la base de datos para traer las ciudad de la empresa del usuario
	$result_ciudad_user=mysql_fetch_array($query_ciudad_user);
	//echo $result_ciudad_user["id_ciudad"];

        $query_convenios="Select nombre,id_cliente from clientes WHERE ciudad = '".$result_ciudad_user["nom_ciudad"]."' or multi_ciudad='1' ORDER BY nombre ASC ";
$result_convenios=mysql_query($query_convenios);


echo '<select class="iselect2" id="empresa" name="empresa" onchange="ShowSelected();" >';
echo "<option value='0'>Elegir Empresa</option>";
//Generamos el menu desplegable

while ($row_convenios=mysql_fetch_array($result_convenios))
{

//echo '<option value='.$row_convenios["v_prev_t"].'>'.$row_convenios["nombre"].'</option>';
echo "<option value='".$row_convenios["id_cliente"]."'>".$row_convenios["nombre"]."</option>";
}
echo '</select>';
?>
      <span class="selectInvalidMsg">Seleccione un elemento válido.</span><span class="selectRequiredMsg">Seleccione un elemento.</span></span>
      
      <label for="id_sede"></label></td>
    <td>Tipo Revisión</td>
    <td><span id="spryselect2">
      <label for="tp_revision"></label>
      <select class="iselect2" name="tp_revision" id="tp_revision">
        <option value="0">Seleccionar</option>
        <option value="1">RTM</option>
        <option value="2">Preventiva</option>
      </select>
      <span class="selectInvalidMsg">Seleccione un elemento válido.</span><span class="selectRequiredMsg">Seleccione un elemento.</span></span></td>
  </tr>
  <tr>
    <td colspan="4" align="center"><input class="ibutton2" type="submit" name="enviar" id="enviar" value="Registrar Revision"></td>
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
var spryselect5 = new Spry.Widget.ValidationSelect("spryselect5", {invalidValue:"0", validateOn:["change"]});
var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1", {invalidValue:"-1", validateOn:["change"]});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "none", {validateOn:["change"], minChars:6});
var spryselect2 = new Spry.Widget.ValidationSelect("spryselect2", {invalidValue:"0", validateOn:["change"]});
</script>
