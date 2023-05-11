<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- TemplateBeginEditable name="doctitle" -->
<title>SIPCO.©...</title>
<link type="text/css" rel="stylesheet" href="styles/style.css" />
<link rel="shortcut icon" href="iconos/revision.ico"/><!--con esto colocamos el icono en la barra de navegacio y pestaña-->
    
    <link rel="stylesheet" href="files/faary.css" type="text/css" />
    <link rel="stylesheet" href="files/faary3.css" type="text/css" />
    <link rel="stylesheet" href="files/faary2.css" type="text/css" />
    
<!-- TemplateEndEditable -->
<!-- TemplateBeginEditable name="head" -->
<!-- TemplateEndEditable -->
<style type="text/css">
<!--
body {
	font: 100%/1.4 Verdana, Arial, Helvetica, sans-serif;
	background-color: #4E5869;
	margin: 0;
	padding: 0;
	color: #000;
}

/* ~~ Selectores de elemento/etiqueta ~~ */
ul, ol, dl { /* Debido a las diferencias existentes entre los navegadores, es recomendable no añadir relleno ni márgenes en las listas. Para lograr coherencia, puede especificar las cantidades deseadas aquí o en los elementos de lista (LI, DT, DD) que contienen. Recuerde que lo que haga aquí se aplicará en cascada en la lista .nav, a no ser que escriba un selector más específico. */
	padding: 0;
	margin: 0;
}
h1, h2, h3, h4, h5, h6, p {
	margin-top: 0;	 /* la eliminación del margen superior resuelve un problema que origina que los márgenes escapen de la etiqueta div contenedora. El margen inferior restante lo mantendrá separado de los elementos de que le sigan. */
	padding-right: 15px;
	padding-left: 15px; /* la adición de relleno a los lados del elemento dentro de las divs, en lugar de en las divs propiamente dichas, elimina todas las matemáticas de modelo de cuadro. Una div anidada con relleno lateral también puede usarse como método alternativo. */
}
a img { /* este selector elimina el borde azul predeterminado que se muestra en algunos navegadores alrededor de una imagen cuando está rodeada por un vínculo */
	border: none;
}

/* ~~ La aplicación de estilo a los vínculos del sitio debe permanecer en este orden (incluido el grupo de selectores que crea el efecto hover -paso por encima-). ~~ */
a:link {
	color:#414958;
	text-decoration: underline; /* a no ser que aplique estilos a los vínculos para que tengan un aspecto muy exclusivo, es recomendable proporcionar subrayados para facilitar una identificación visual rápida */
}
a:visited {
	color: #4E5869;
	text-decoration: underline;
}
a:hover, a:active, a:focus { /* este grupo de selectores proporcionará a un usuario que navegue mediante el teclado la misma experiencia de hover (paso por encima) que experimenta un usuario que emplea un ratón. */
	text-decoration: none;
}

/* ~~ este contenedor rodea a todas las demás divs, lo que les asigna su anchura basada en porcentaje ~~ */
.container {
	width: 100%;
	max-width: 1366px;/* puede que sea conveniente una anchura máxima (max-width) para evitar que este diseño sea demasiado ancho en un monitor grande. Esto mantiene una longitud de línea más legible. IE6 no respeta esta declaración. */
	min-width: 550px;/* puede que sea conveniente una anchura mínima (min-width) para evitar que este diseño sea demasiado estrecho. Esto permite que la longitud de línea sea más legible en las columnas laterales. IE6 no respeta esta declaración. */
	background-color: #FFF;
	margin: 0 auto; /* el valor automático de los lados, unido a la anchura, centra el diseño. No es necesario si establece la anchura de .container en el 100%. */
}

/* ~~no se asigna una anchura al encabezado. Se extenderá por toda la anchura del diseño. Contiene un marcador de posición de imagen que debe sustituirse por su propio logotipo vinculado~~ */
.header {
	background-color: #000;
	background-image: url(iconos/header2.jpg);
	min-height: 200px;
	min-width: 100%;
}

/* ~~ Esta es la información de diseño. ~~ 

1) El relleno sólo se sitúa en la parte superior y/o inferior de la div. Los elementos situados dentro de esta div tienen relleno a los lados. Esto le ahorra las "matemáticas de modelo de cuadro". Recuerde que si añade relleno o borde lateral a la div propiamente dicha, éste se añadirá a la anchura que defina para crear la anchura *total*. También puede optar por eliminar el relleno del elemento en la div y colocar una segunda div dentro de ésta sin anchura y el relleno necesario para el diseño deseado.

*/
.sidebar1 {
	float: left;
	width: 22%;
	background-color: rgba(0,0,0,0.0);/*coloco el fondo de este div trasparente para que aparezca el del container*/
	padding-bottom: 10px;
	
}
.content {
	padding: 10px 0;
	width: 78%;
	float: left;
}

/* ~~ Este selector agrupado da espacio a las listas del área de .content ~~ */
.content ul, .content ol { 
	padding: 0 15px 15px 40px; /* este relleno reproduce en espejo el relleno derecho de la regla de encabezados y de párrafo incluida más arriba. El relleno se ha colocado en la parte inferior para que el espacio existente entre otros elementos de la lista y a la izquierda cree la sangría. Estos pueden ajustarse como se desee. */
}

/* ~~ El pie de página ~~ */
.footer {
	padding: 10px 0;
	background-color: #6F7D94;
	position: relative;/* esto da a IE6 hasLayout para borrar correctamente */
	clear: both;
}

/* ~~ clases float/clear varias ~~ */
.fltrt {  /* esta clase puede utilizarse para que un elemento flote en la parte derecha de la página. El elemento flotante debe preceder al elemento junto al que debe aparecer en la página. */
	float: right;
	margin-left: 8px;
}
.fltlft { /* esta clase puede utilizarse para que un elemento flote en la parte izquierda de la página. El elemento flotante debe preceder al elemento junto al que debe aparecer en la página. */
	float: left;
	margin-right: 8px;
}
.clearfloat { /* esta clase puede situarse en una <br /> o div vacía como elemento final tras la última div flotante (dentro de #container) si #footer se elimina o se saca fuera de #container */
	clear:both;
	height:0;
	font-size: 1px;
	line-height: 0px;
}
</style>
<style type="text/css">

.mitabla table {     font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
    font-size: 12px;    margin: 45px;     width: 960px; text-align: left;    border-collapse: collapse; }

.mitabla th {     font-size: 14px;     font-weight: bold;     padding: 8px;     background: #b9c9fe; 
    border-top: 4px solid #aabcfe;    border-bottom: 1px solid #fff; color: #039; }

.mitabla td {    padding: 8px;     background: #e8edff;     border-bottom: 1px solid #fff;
    color: #669;    border-top: 1px solid transparent; font-size:12px}

.mitabla tr:hover td { background: #d0dafd; color: #339; }
</style>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<?PHP
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{ 
echo '<script>
	  function MOSTRAR2()
	   {
			setTimeout("window.close()",3000);
	   }
   </script>';
   }
?>
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
</head>

<body onLoad="MOSTRAR2()">

<div class="container">
  <div class="header">
    <!-- end .header --></div>
    <div class="sidebar1">
    <BR />
      <form class="iform2" action="validar_usuario.php" method="post" name="primer_form">
      <p align="center" class="Estilo1">Ingreso Web</p>
  <p align="center" class="Estilo3">Esta zona tiene el acceso restringido.<br>
    Para entrar debe identificarse.
      <table width="70%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>

      <table width="20%" border="0" cellspacing="5" cellpadding="0">
  <tr>
    <td width="20%">Usuario</td>
    <td width="80%"><span id="sprytextfield1">
      <label for="usuario"></label>
      <input class="itext3" type="text" name="usuario" id="usuario" />
      <span class="textfieldRequiredMsg">Se necesita un valor.</span></span></td>
  </tr>
  
  <tr>
    <td>Contraseña</td>
    <td><span id="sprytextfield2">
      <label for="pass"></label>
      <input class="itext3" type="password"  name="pass" id="pass" />
      <span class="textfieldRequiredMsg">Se necesita un valor.</span></span></td>
  </tr>
 
  <tr>
    <td align="center" colspan="2"><input name="Ingresar" type="submit"  value = "Ingresar"/></td>
  </tr>
</table>

</td>
  </tr>
</table>
<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
      </form>
      
  </div>
  <div class="content">
    <h1>Bienvenidos a Previcar S.A</h1>
    <p><?php echo"La fecha del presente día es:";?> <? echo date("Y/m/d"); ?>
<?php echo"La hora del sistema local es:";?> <? echo date("G:i:s");?></p>  <p>Bienvenidos al nuevo sistema de control e inspeccion de Reviciones Preventivas, mediante este sistema usted podra realizar el seguimiento a las revisiones de los automoteres de su empresa.Tenga en cuenta que la informacion en esta plataforma es confidencial y que el uso de su usuario y contraseña es personal e intrasferible..</p>
    <h2>Para tener en cuenta!</h2>
    <p>La resolución 0000315 de 2013 es la resolucion por la cual se adoptan medidas para garantizar la seguridad del trasporte público terrestre automotor.</p>
    <p>El Ministerio de Transporte, como lo establece el Decreto 087 de 2011, es el organismo del Gobierno Nacional encargado de formular y adoptar las políticas, planes, programas, proyectos y regulación económica del transporte, el tránsito y la infraestructura..</p>
    <p>RUNT es un sistema de información que permite registrar y mantener actualizada, centralizada, autorizada y validada la misma sobre los registros de automotores, conductores, licencias de tránsito, empresas de transporte público, infractores, accidentes de tránsito, seguros, remolques y de personas naturales o jurídicas que prestan servicio al sector.</p>
    <h3>&nbsp;</h3>
    <!-- end .content --></div>
  
  <div class="footer">
    <p align="center"><font color="#ffffff">SISTEMA DE INFORMACION REVISIONES PREVENTIVAS PREVICAR S.A <br />
      SIPCO.© Copyright 2015. Design by Jhon Cobos®</font></p>
  <!-- end .footer --></div>
  <!-- end .container --></div>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
</script>
</body>
</html>
