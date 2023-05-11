
<?php

function cabecera($usuario)
{
?>	
<script type="text/javascript"></script>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script language='javascript' src="popcalendar.js"></script>
<script language="JavaScript">

document.onkeydown = mykeyhandler;

function mykeyhandler(event) {

	//keyCode 116 = F5 
	//keyCode 122 = F11
	//keyCode   8 = Backspace
	//keyCode  37 = LEFT ROW
	//keyCode  78 = N
	//keyCode  39 = RIGHT ROW
	//keyCode  67 = C
	//keyCode  86 = V
	//keyCode  85 = U	
	//keyCode  45 = Insert

	event = event || window.event;
	var tgt = event.target || event.srcElement;
	if((event.altKey && event.keyCode==37) || (event.altKey && event.keyCode==39) || 
	   (event.ctrlKey && event.keyCode==78)|| (event.ctrlKey && event.keyCode==85)||
	   (event.ctrlKey && event.keyCode==45)|| (event.shiftKey && event.keyCode==45 || (event.shiftKey && event.keyCode==116))){
        event.cancelBubble = true;
        event.returnValue = false;	
		alert("Función no permitida");
		return false;
	}
	
	if(event.keyCode==18 && tgt.type != "text" && tgt.type != "password" && tgt.type != "textarea"){
		return false;	
	}
	
	if (event.keyCode == 8 && tgt.type != "text" && tgt.type != "password" && tgt.type != "textarea"){		
		return false;
	}

    if ((event.keyCode == 116) || (event.keyCode == 122) || (event.keyCode == 117)) {
		if (navigator.appName == "Microsoft Internet Explorer"){
			window.event.keyCode=0;
        }
        return false;
    }
}

function mouseDown(e) {
	var ctrlPressed=0;
	var altPressed=0;
	var shiftPressed=0;
	if (parseInt(navigator.appVersion)>3) {
		if (navigator.appName=="Netscape") {
			var mString =(e.modifiers+32).toString(2).substring(3,6);
			shiftPressed=(mString.charAt(0)=="1");
			ctrlPressed =(mString.charAt(1)=="1");
			altPressed  =(mString.charAt(2)=="1");
			self.status="modifiers="+e.modifiers+" ("+mString+")"
		}
 		else 
 		{
  			shiftPressed=event.shiftKey;
 	 		altPressed  =event.altKey;
  			ctrlPressed =event.ctrlKey;
 		}
 		if (shiftPressed || altPressed || ctrlPressed) 
  			alert ("Función no permitida");
 	}
 	return true;
}

if (parseInt(navigator.appVersion)>3) {
	document.onmousedown = mouseDown;
	if (navigator.appName=="Netscape") 
		document.captureEvents(Event.MOUSEDOWN);
}

var message="";

function clickIE() {
	if (document.all){
		(message);
		return false;
	}
}

function clickNS(e) {
	if(document.layers||(document.getElementById&&!document.all)) {
		if (e.which==2||e.which==3) {
			(message);return false;
		}
	}
}

if (document.layers){
	document.captureEvents(Event.MOUSEDOWN);
	document.onmousedown=clickNS;
}else{
	document.onmouseup=clickNS;document.oncontextmenu=clickIE;
}

document.oncontextmenu=new Function("return false");
</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- TemplateBeginEditable name="doctitle" -->
<title>Sistema Preventivas</title>
<link type="text/css" rel="stylesheet" href="styles/style.css" />
<link rel="shortcut icon" href="iconos/revision.ico" /><!--con esto colocamos el icono en la barra de navegacio y pestaña-->
    
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
	min-height: 668px;
	max-width: 1366px;/* puede que sea conveniente una anchura máxima (max-width) para evitar que este diseño sea demasiado ancho en un monitor grande. Esto mantiene una longitud de línea más legible. IE6 no respeta esta declaración. */
	min-width: 550px;/* puede que sea conveniente una anchura mínima (min-width) para evitar que este diseño sea demasiado estrecho. Esto permite que la longitud de línea sea más legible en las columnas laterales. IE6 no respeta esta declaración. */
	background-color: #E6E6E6;
	margin: 0 auto; /* el valor automático de los lados, unido a la anchura, centra el diseño. No es necesario si establece la anchura de .container en el 100%. */
}

/* ~~no se asigna una anchura al encabezado. Se extenderá por toda la anchura del diseño. Contiene un marcador de posición de imagen que debe sustituirse por su propio logotipo vinculado~~ */
.header {
	background-color: #000;
	background-image: url(iconos/header2.png);
	min-height: 200px;
	min-width: 100%;
}
.header2 {
	background-color: #000000;
	font-size:14px;
	font:Arial, Helvetica, sans-serif	;
	/*background-image: url(imagenes/header.jpg);*/
}
.header3 {
	background-color:#E6E6E6;
	font-size:14px;
	font:Arial, Helvetica, sans-serif	;
	/*background-image: url(imagenes/header.jpg);*/
}

/* ~~ Esta es la información de diseño. ~~ 

1) El relleno sólo se sitúa en la parte superior y/o inferior de la div. Los elementos situados dentro de esta div tienen relleno a los lados. Esto le ahorra las "matemáticas de modelo de cuadro". Recuerde que si añade relleno o borde lateral a la div propiamente dicha, éste se añadirá a la anchura que defina para crear la anchura *total*. También puede optar por eliminar el relleno del elemento en la div y colocar una segunda div dentro de ésta sin anchura y el relleno necesario para el diseño deseado.

*/
.content {
	margin:0 auto;
	width: 60%;
	padding: 0px 0;
	background-color:#E6E6E6;
}

/* ~~ Este selector agrupado da espacio a las listas del área de .content ~~ */
.content ul, .content ol { 
	padding: 0 15px 15px 40px; /* este relleno reproduce en espejo el relleno derecho de la regla de encabezados y de párrafo incluida más arriba. El relleno se ha colocado en la parte inferior para que el espacio existente entre otros elementos de la lista y a la izquierda cree la sangría. Estos pueden ajustarse como se desee. */
}

/* ~~ El pie de página ~~ */
.footer {
	padding: 10px 0;
	background-color: #6F7D94;
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

</head>



<div class="container">
  <div class="header">
    <!-- end .header --></div>
          <div class="header2" style="color:#FFF" align="right">
      <?php 
	  require('conexion.php');

	  $consulta_usuario=mysql_query("select nombres,empresa from usuarios where id_usuario like '".$_SESSION["k_username"]."'");
		$nombre=mysql_fetch_array($consulta_usuario);
		//$consulta_nomusuario=mysql_query("select nombre from sede where id='".$nombre['id_sede']."'");
		//$nombre_usuario=mysql_fetch_array($consulta_nomusuario);
	  echo 'Sede: '.$nombre['empresa'].' Usuario: '.$nombre['nombres'].'  '; ?> 
    <!-- end .header --></div>

    <?php
function validar_administrador($usuario1)
{	
	  $consulta_nivel=mysql_query("select * from usuarios where id like '".$usuario1."'");
		$nivel_usr=mysql_fetch_array($consulta_nivel);
		if($nivel_usr["nivel"]!=1)//para operados no debe dejar ver ningun reporte
		{
			echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";
				
		
?>
<form id="form1" class="iform" name="form1"  method="post" action="" >

  <p align="center" class="Estilo7">PORTAL WEB SIPCO </p>
  <p align="center" class="Estilo3">ACCESO DENEGADO.</p> 
  
  <table bgcolor=#FFFFFF align="center">
    <tr>
     <td> <div align="center" class="Estilo2">Esta area esta restringida para su usuario por favor abstengace de ingresar.</div></td>
    </tr>
    <tr>
    	<td align="center"><?php echo "<font color=\"red\" size=4>IP {$_SERVER["REMOTE_ADDR"]}<br>"; 
		?></td>
     </tr>
     <tr>
     <td> <div align="center" class="Estilo2">Un reporte de esta incidencia ha sido enviada al area de sistemas.</div></td>
    </tr>
 </table>
    <p align="center" class="Estilo3">
<input type='button' value='Regresar' name='cerrar2' onClick="(location='../logout.php');" >
</form></p>
<?php
echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";
session_destroy();
footer();
exit;
		}
}

}function contenido()
{
	?>
    	<div class="content">
      <div class="header3" align="center">
    <?php
	$consulta_nivel=mysql_query("select nivel_usuario from usuarios where id_usuario like '".$_SESSION["k_username"]."'");
		$nivel_usr=mysql_fetch_array($consulta_nivel);
		if($nivel_usr["nivel_usuario"]=="Administrador")//para operados no debe dejar ver ningun reporte
		{
			?>
            <link href="rh-files/styles_qwlos.css" type="text/css" rel="stylesheet"/>
<ul id="vbUL_qwlos" class="vbULqwlos" style="visibility:hidden;">
<li><a href="nuevo_usuario.php" title="Crear Usuario">Crear&nbsp;Usuario</a></li>
<li><a href="modificar_usuario.php" title="Modificar Usuario">Modificar&nbsp;Usuario</a></li>
<li><a href="consultar_usuario.php" title="Consultar Usuarios">Consultar Usuarios</a></li>
<li><a href="cambiar_pass.php" title="Cambiar Contraseña">Cambiar&nbsp;Contraseña</a></li></ul>
<ul id="vbUL_mwlos" class="vbULqwlos" style="visibility:hidden;">
<li><a title="Submenu item 2">Submenu&nbsp;item&nbsp;2</a></li></ul>
<ul id="vbUL_5wlos" class="vbULqwlos" style="visibility:hidden;">
<li><a href="principal_user.php" title="Registrar Vehiculo">Registrar Vehiculo</a></li></ul>
<ul id="vbUL_awlos" class="vbULqwlos" style="visibility:hidden;">
<li><a href="imp_resultado.php" title="Imprimir Resultado">Imprimir Resultado</a></li>
<li><a href="imp_resultado_placa.php" title="Imprimir Por Placa">Imprimir Por Placa</a></li>
</ul>
<script type="text/javascript" src="rh-files/scqwlos.js"></script>
<table id="vista-buttons.com:idqwlos" width=0 cellpadding=0 cellspacing=0 border=0 align="center"><tr><td style="padding-right:2px" title ="ADMINISTRACION" bgcolor="#000000">
<a onMouseOver='xpe("qwloso");xpshow("qwlos",0,this);xpsmover(this);' onMouseOut='xpsmout(this);' onMouseDown='xpe("qwlosc");'><img id="xpi_qwlos" src="rh-files/btqwlos_0.gif" name=vbqwlos width="160" height="28" border=0 alt="ADMINISTRACION"></a></td><td style="padding-right:2px" title ="EMPRESAS" bgcolor="#000000">
<a onMouseOver='xpe("mwloso");xpshow("mwlos",0,this);xpsmover(this);' onMouseOut='xpsmout(this);' onMouseDown='xpe("mwlosc");'><img id="xpi_mwlos" src="rh-files/btmwlos_0.gif" name=vbmwlos width="160" height="28" border=0 alt="EMPRESAS"></a></td><td style="padding-right:2px" title ="REGISTROS" bgcolor="#000000">
<a onMouseOver='xpe("5wloso");xpshow("5wlos",0,this);xpsmover(this);' onMouseOut='xpsmout(this);' onMouseDown='xpe("5wlosc");'><img id="xpi_5wlos" src="rh-files/bt5wlos_0.gif" name=vb5wlos width="160" height="28" border=0 alt="REGISTROS"></a></td><td style="padding-right:2px" title ="BUSQUEDAS" bgcolor="#000000">
<a onMouseOver='xpe("awloso");xpshow("awlos",0,this);xpsmover(this);' onMouseOut='xpsmout(this);' onMouseDown='xpe("awlosc");'><img id="xpi_awlos" src="rh-files/btawlos_0.gif" name=vbawlos width="160" height="28" border=0 alt="BUSQUEDAS"></a></td><td style="padding-right:2px" title ="SALIR" bgcolor="#000000">
<a href="logout.php" onMouseOver='xpe("swloso");' onMouseOut='xpe("swlosn");' onMouseDown='xpe("swlosc");'><img id="xpi_swlos" src="rh-files/btswlos_0.gif" name=vbswlos width="160" height="28" border=0 alt="SALIR"></a></td></tr></table>
</div>
            <?php
		}
		if($nivel_usr["nivel_usuario"]=="Inspector")//para operados no debe dejar ver ningun reporte
		{
			?>
            <link href="preventivas_inspector-files/styles_qwlos.css" type="text/css" rel="stylesheet"/>
<ul id="vbUL_qwlos" class="vbULqwlos" style="visibility:hidden;">
<li><a title="Cambiar Contraseña">Cambiar&nbsp;Contraseña</a></li></ul>
<ul id="vbUL_mwlos" class="vbULqwlos" style="visibility:hidden;">
<li><a href="principal_inspector.php" title="Vehiculos">Vehiculos</a></li></ul>
<ul id="vbUL_5wlos" class="vbULqwlos" style="visibility:hidden;">
<li><a title="Vehiculos Finalizados">Vehiculos&nbsp;Finalizados</a></li></ul>
<script type="text/javascript" src="preventivas_inspector-files/scqwlos.js"></script>
<table id="vista-buttons.com:idqwlos" width=0 cellpadding=0 cellspacing=0 border=0><tr><td style="padding-right:2px" title ="ADMINISTRACION">
<a onMouseOver='xpe("qwloso");xpshow("qwlos",0,this);xpsmover(this);' onMouseOut='xpsmout(this);' onMouseDown='xpe("qwlosc");'><img id="xpi_qwlos" src="preventivas_inspector-files/btqwlos_0.gif" name=vbqwlos width="160" height="28" border=0 alt="ADMINISTRACION"></a></td><td style="padding-right:2px" title ="INSPECCIONAR">
<a onMouseOver='xpe("mwloso");xpshow("mwlos",0,this);xpsmover(this);' onMouseOut='xpsmout(this);' onMouseDown='xpe("mwlosc");'><img id="xpi_mwlos" src="preventivas_inspector-files/btmwlos_0.gif" name=vbmwlos width="160" height="28" border=0 alt="INSPECCIONAR"></a></td><td style="padding-right:2px" title ="BUSQUEDAS">
<a onMouseOver='xpe("5wloso");xpshow("5wlos",0,this);xpsmover(this);' onMouseOut='xpsmout(this);' onMouseDown='xpe("5wlosc");'><img id="xpi_5wlos" src="preventivas_inspector-files/bt5wlos_0.gif" name=vb5wlos width="160" height="28" border=0 alt="BUSQUEDAS"></a></td><td style="padding-right:2px" title ="SALIR">
<a href="logout.php" onMouseOver='xpe("awloso");' onMouseOut='xpe("awlosn");' onMouseDown='xpe("awlosc");'><img id="xpi_awlos" src="preventivas_inspector-files/btawlos_0.gif" name=vbawlos width="160" height="28" border=0 alt="SALIR"></a></td></tr></table>
</div>
            <?php
		}
		if($nivel_usr["nivel_usuario"]=="Usuario")//para operados no debe dejar ver ningun reporte
		{
			?>
            <link href="preventivas_usuario-files/styles_qwlos.css" type="text/css" rel="stylesheet"/>
<ul id="vbUL_qwlos" class="vbULqwlos" style="visibility:hidden;">
<li><a href="cambiar_pass.php" title="Cambiar Contraseña">Cambiar&nbsp;Contraseña</a></li>
<li><a href="crear_empresa.php" title="Crear Empresa">Crear Empresa</a></li></ul>
<ul id="vbUL_mwlos" class="vbULqwlos" style="visibility:hidden;">
<li><a href="principal_user.php" title="Registrar Vehiculo">Registrar Vehiculo</a></li>
<li><a href="generar_factura.php" title="Generar Factura">Generar Factura</a></li></ul>
<ul id="vbUL_5wlos" class="vbULqwlos" style="visibility:hidden;">
<li><a href="imp_resultado.php" title="Imprimir Resultado">Imprimir Resultado</a></li>
<li><a href="imp_resultado_placa.php" title="Imprimir Por Placa">Imprimir Por Placa</a></li>
<li><a href="cierre_caja.php" title="Informe Produccion">Informe Produccion</a></li>
<li><a href="cierre_diario.php" title="Informe Diario">Informe Diario</a></li>
<li><a href="buscar_cliente.php" title="Buscar Cliente">Buscar Cliente</a></li>
<li><a href="historial_placa.php" title="Historial por Placa">Historial por Placa</a></li>
<li><a href="consulta_vencimientos.php" title="Vencimientos Preventiva">Vencimientos</a></li>
<li><a href="reporte_preventivas_rango.php" title="Exportar Informes">Exportar Informes</a></li>
</ul>
<script type="text/javascript" src="preventivas_usuario-files/scqwlos.js"></script>
<table id="vista-buttons.com:idqwlos" width=0 cellpadding=0 cellspacing=0 border=0><tr><td style="padding-right:2px" title ="ADMINISTRACION">
<a onMouseOver='xpe("qwloso");xpshow("qwlos",0,this);xpsmover(this);' onMouseOut='xpsmout(this);' onMouseDown='xpe("qwlosc");'><img id="xpi_qwlos" src="preventivas_usuario-files/btqwlos_0.gif" name=vbqwlos width="160" height="28" border=0 alt="ADMINISTRACION"></a></td><td style="padding-right:2px" title ="REGISTRO">
<a onMouseOver='xpe("mwloso");xpshow("mwlos",0,this);xpsmover(this);' onMouseOut='xpsmout(this);' onMouseDown='xpe("mwlosc");'><img id="xpi_mwlos" src="preventivas_usuario-files/btmwlos_0.gif" name=vbmwlos width="160" height="28" border=0 alt="REGISTRO"></a></td><td style="padding-right:2px" title ="BUSQUEDAS">
<a onMouseOver='xpe("5wloso");xpshow("5wlos",0,this);xpsmover(this);' onMouseOut='xpsmout(this);' onMouseDown='xpe("5wlosc");'><img id="xpi_5wlos" src="preventivas_usuario-files/bt5wlos_0.gif" name=vb5wlos width="160" height="28" border=0 alt="BUSQUEDAS"></a></td><td style="padding-right:2px" title ="SALIR">
<a href="logout.php" onMouseOver='xpe("awloso");' onMouseOut='xpe("awlosn");' onMouseDown='xpe("awlosc");'><img id="xpi_awlos" src="preventivas_usuario-files/btawlos_0.gif" name=vbawlos width="160" height="28" border=0 alt="SALIR"></a></td></tr></table>
<noscript><a href="http://vista-buttons.com">Hover Buttons by Vista-Buttons.com v2.27</a></noscript>
</div>
            <?php
		}

}
function validar_usuario()
{
	if (!isset($_SESSION['k_username']))
	{
		session_destroy();
	}
	if($_SESSION["k_username"]=='')
	{
?>
<br /><br />
    <form id="form1" class="iform" name="form1"  method="post" action="" >

  <p align="center" class="Estilo7">PORTAL WEB SIPCO </p>
  <p align="center" class="Estilo3">ACCESO DENEGADO.</p> 
  
  <table bgcolor=#FFFFFF align="center">
    <tr>
     <td> <div align="center" class="Estilo2">Esta area esta restringida para su usuario por favor abstengace de ingresar.</div></td>
    </tr>
    <tr>
    	<td align="center"><?php echo "<font color=\"red\" size=4>IP {$_SERVER["REMOTE_ADDR"]}<br>"; 
		?></td>
     </tr>
     <tr>
     <td> <div align="center" class="Estilo2">Un reporte de esta incidencia ha sido enviada al area de sistemas.</div></td>
    </tr>
 </table>
    <p align="center" class="Estilo3">
<input type='button' value='Regresar' name='cerrar2' onClick="(location='logout.php');" >
</form></p>
<?php
echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";
session_destroy();
footer();
exit;
}//cierro if q valida que no hay usuario logueado
	
}//fin funcion validar usuario
function footer()
{
?>
    <!-- end .content --></div>
  <!-- end .container --></div>
      <div class="footer" style="color:#FFF">
    <p align="center"><font color="#ffffff">SISTEMA DE INFORMACION REVISIONES PREVENTIVAS<br />
      SIPCO.© Copyright 2015. Powered by Jhon Cobos®</font></p>
    
    <!-- end .footer --></div>
</body>
</html>

<?php	
}