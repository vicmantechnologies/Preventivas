<?php
session_start();
error_reporting(0);
require("./conexion/conexion.php");
if($_GET["idviaje"] != "")
{
	$idImpresion = $_GET["idviaje"];
}
else
{
	$informacion=mysql_query("select idViaje from revisionesviaje where placaViaje = '".$_GET["placa"]."' order by idviaje desc limit 1");
}
$informacion=mysql_query("select * from revisionesviaje where idviaje = '".$_GET["idviaje"]."' order by idviaje desc limit 1");

$row_informacion=mysql_fetch_array($informacion);
$datos_vehiculo=mysql_query("select * from info_vehiculos where placa = '".$row_informacion['placaViaje']."'");
$row_vehiculo=mysql_fetch_array($datos_vehiculo);
//labrados
$labrados = explode("|", $row_informacion['labrados']);
$p1 = $labrados[0]; 
$p2 = $labrados[1]; 
$p3 = $labrados[2]; 
$p4 = $labrados[3]; 
$p5 = $labrados[4];
//alumbrado
$alumbrado = explode(" ", $row_informacion['defAlumbradoViaje']);
$l1 = $l2 = $l3 = $l4 = $l5 = $l6 = $l7 = $l7 = $l8 = $l9 = "CONFORME";
if(count($alumbrado) > 0)
{
	if(in_array("1", $alumbrado))
	{
		$l1 = "NO CONFORME";
	}
	if(in_array("2", $alumbrado))
	{
		$l2 = "NO CONFORME";
	}
	if(in_array("3", $alumbrado))
	{
		$l3 = "NO CONFORME";
	}
	if(in_array("4", $alumbrado))
	{
		$l4 = "NO CONFORME";
	}
	if(in_array("5", $alumbrado))
	{
		$l5 = "NO CONFORME";
	}
	if(in_array("6", $alumbrado))
	{
		$l6 = "NO CONFORME";
	}
	if(in_array("7", $alumbrado))
	{
		$l7 = "NO CONFORME";
	}
}
//suspension
$suspension = explode(" ", $row_informacion['defSuspensionViaje']);
$s1 = $s2 = $s3 = $s4 = $s5 = $s6 = $s7 = $s7 = $s8 = $s9 = "CONFORME";
if(count($suspension) > 0)
{
	if(in_array("8", $suspension))
	{
		$s1 = "NO CONFORME";
	}
	if(in_array("9", $suspension))
	{
		$s2 = "NO CONFORME";
	}
	if(in_array("10", $suspension))
	{
		$s3 = "NO CONFORME";
	}
	if(in_array("11", $suspension))
	{
		$s4 = "NO CONFORME";
	}
	if(in_array("12", $suspension))
	{
		$s5 = "NO CONFORME";
	}
	if(in_array("13", $suspension))
	{
		$s6 = "NO CONFORME";
	}
	if(in_array("14", $suspension))
	{
		$s7 = "NO CONFORME";
	}
	if(in_array("15", $suspension))
	{
		$s8 = "NO CONFORME";
	}
}
//fugas
$fugas = explode(" ", $row_informacion['defFugasViaje']);
$f1 = $f2 = $f3 = $f4 = $f5 = $f6 = $f7 = $f7 = $f8 = $f9 = "CONFORME";
if(count($fugas) > 0)
{
	if(in_array("16", $fugas))
	{
		$f1 = "NO CONFORME";
	}
	if(in_array("17", $fugas))
	{
		$f2 = "NO CONFORME";
	}
	if(in_array("18", $fugas))
	{
		$f3 = "NO CONFORME";
	}
	if(in_array("19", $fugas))
	{
		$f4 = "NO CONFORME";
	}
	if(in_array("20", $fugas))
	{
		$f5 = "NO CONFORME";
	}
	if(in_array("21", $fugas))
	{
		$f6 = "NO CONFORME";
	}
}
//equipo de carretera
$carretera = explode(" ", $row_informacion['defCarreteraViaje']);
$e1 = $e2 = $e3 = $e4 = $e5 = $e6 = $e7 = $e7 = $e8 = $e9 = "CONFORME";
if(count($carretera) > 0)
{
	if(in_array("22", $carretera))
	{
		$e1 = "NO CONFORME";
	}
	if(in_array("23", $carretera))
	{
		$e2 = "NO CONFORME";
	}
	if(in_array("24", $carretera))
	{
		$e3 = "NO CONFORME";
	}
	if(in_array("25", $carretera))
	{
		$e4 = "NO CONFORME";
	}
	if(in_array("26", $carretera))
	{
		$e5 = "NO CONFORME";
	}
	if(in_array("27", $carretera))
	{
		$e6 = "NO CONFORME";
	}
	if(in_array("28", $carretera))
	{
		$e7 = "NO CONFORME";
	}
	if(in_array("29", $carretera))
	{
		$e8 = "NO CONFORME";
	}
}
//equipo de carretera
$niveles = explode(" ", $row_informacion['defNivelesViaje']);
$n1 = $n2 = $n3 = $n4 = $n5 = $n6 = $n7 = $n7 = $n8 = $n9 = "CONFORME";
if(count($niveles) > 0)
{
	if(in_array("30", $niveles))
	{
		$n1 = "NO CONFORME";
	}
	if(in_array("31", $niveles))
	{
		$n2 = "NO CONFORME";
	}
	if(in_array("32", $niveles))
	{
		$n3 = "NO CONFORME";
	}
	if(in_array("33", $niveles))
	{
		$n4 = "NO CONFORME";
	}
	if(in_array("34", $niveles))
	{
		$n5 = "NO CONFORME";
	}
}
//vidrios
$vidrios = explode(" ", $row_informacion['defVidriosViaje']);
$v1 = $v2 = $v3 = $v4 = $v5 = $v6 = $v7 = $v7 = $v8 = $v9 = $v10 = $v11 = "CONFORME";
if(count($niveles) > 0)
{
	if(in_array("35", $vidrios))
	{
		$v1 = "NO CONFORME";
	}
	if(in_array("36", $vidrios))
	{
		$v2 = "NO CONFORME";
	}
	if(in_array("37", $vidrios))
	{
		$v3 = "NO CONFORME";
	}
	if(in_array("38", $vidrios))
	{
		$v4 = "NO CONFORME";
	}
	if(in_array("39", $vidrios))
	{
		$v5 = "NO CONFORME";
	}
	if(in_array("40", $vidrios))
	{
		$v6 = "NO CONFORME";
	}
	if(in_array("41", $vidrios))
	{
		$v7 = "NO CONFORME";
	}
	if(in_array("42", $vidrios))
	{
		$v8 = "NO CONFORME";
	}
	if(in_array("43", $vidrios))
	{
		$v9 = "NO CONFORME";
	}
	if(in_array("44", $vidrios))
	{
		$v10 = "NO CONFORME";
	}
	if(in_array("45", $vidrios))
	{
		$v11 = "NO CONFORME";
	}
}

$pista=mysql_query("select * from resultados_pistaviaje where id_rel_rev = '".$row_informacion['idViaje']."'");
$row_pista=mysql_fetch_array($pista);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Viaje Seguro</title>
<link href="../estilos/impresora.css" rel="stylesheet" type="text/css" media="print" />
<style type="text/css">
.pbreak {
font-size: small;
font-family: "Times New Roman", Times, serif;
}
.titulo {
font-family: "Times New Roman", Times, serif;
}
.titulo {
font-family: "Times New Roman", Times, serif;
font-size: medium;
text-align: center;
}
.titulo2 {
font-family: "Times New Roman", Times, serif;
}
.titulo3 {
font-family: "Times New Roman", Times, serif;
}
</style>
<style type="text/css">
.estilo1 {
font-family: Arial, Helvetica, sans-serif;
font-size: 8px;
color: #000000;
}
.estilo2 {
color: #990000;
font-weight: bold;
}
.estilo3 {font-family: Arial, Helvetica, sans-serif; font-size: 10px; color: #000000; }
.estilo4 {font-family: Arial, Helvetica, sans-serif; font-size: 12px; color: #000000; }
</style>
</head>
<body>
<table width="100%" class="estilo1" cellpadding="0" cellspacing="0">
<tr>

  <td width="48%" height="66"><span class="estilo4"><B>VIAJE SEGURO No. <?php echo $row_informacion['idViaje']; ?></B></span></td>
<td width="31%" align="center"><?php 

				

if($row_informacion['sedeRegViaje']==1)

{ echo '<img src="imagenes/distrital.jpg" width="120" height="45" />';}


elseif($row_informacion['sedeRegViaje']==4 or $row_informacion['sedeRegViaje']==9)

{ echo '<img src="imagenes/previtax.jpg" width="120" height="64" />';}

else

{ echo '<img src="imagenes/Previcar.jpg" width="120" height="64" />';}

?></td>

  <td width="21%"><?php 

				

if($row_informacion['sedeRegViaje']==1)

{ echo '900099168-9<br />Av Calle 19 N 36 - 28<br />

  Bogotá';}

elseif($row_informacion['sedeRegViaje']==4 or $row_informacion['sedeRegViaje']==9)

{ echo '900094539-5<br />Carrera 14 B n 119-95<br />

  Bogotá';}

else

{ echo '900094539-5<br />Carrera 14 B n 119-95<br />

  Bogotá';}

?></td></tr>

</table>
<table border="1" cellspacing="0" cellpadding="0" class="estilo3" width="100%">
<tr>
	<td>PLACA: <?php echo $row_informacion['placaViaje']; ?></td>
    <td>FECHA: <?php echo $row_informacion['fechaViaje']; ?></td>
    <td>HORA: <?php echo $row_informacion['horaViaje']; ?></td>
</tr>
</table>
<span class="estilo3" style="text-align:center"><b>1. DATOS DEL PROPIETARIO O TENEDOR </b></span><BR />
<table width="100%" border ="1" cellspacing="0" cellpadding="0" class="estilo1">



<tr>
<td>Nombre o Razon Social<br><?php echo $row_informacion['propietarioViaje'].' '.$row_informacion['apellidoViaje']; ?></td>
<td>Documento <br><?php echo $row_informacion['tipo_doc'];?></td>
<td >Dirección<br /><?php echo $row_informacion['direccionViaje']; ?></td>
<td >Teléfono<br /><?php echo $row_informacion['telefonoViaje']; ?></td>
<td>Correo<br /><?php echo $row_informacion['correoViaje']; ?></td></tr>
</table>

<div align="center"><span class="estilo3"><b>2. DATOS  DEL VEHICULO</b></span></div>
<table width="100%" border ="1" cellspacing="0" cellpadding="0" class="estilo1">
<tr>
<td>Marca<br><?php echo $row_vehiculo['marca']; ?></td>
<td>Linea<br><?php echo $row_vehiculo['linea']; ?></td>
<td>Cilindraje<br><?php echo $row_vehiculo['cilindraje'];?></td>
<!--<td>Color<br><?php echo $row_vehiculo['color']; ?></td>-->
<td>Modelo<br><?php echo $row_vehiculo['modelo']; ?></td>
<td>Servicio<br><?php if($row_vehiculo[servicio] == 1)
		{ echo "PUBLICO";}
		elseif($row_vehiculo[servicio] == 2)
		{ echo "PARTICULAR";}
		else
		{echo "ESPECIAL";}
		?></td>
<td>Kilometraje<br><?php echo $row_informacion['kilometraje']; ?></td>
</tr>
</table>

<table width="100%" border ="1" cellspacing="0" cellpadding="0" class="estilo1">
<tr>
<td>Combustible<br><?php 

		if($row_vehiculo["combustible"] == 1)
		{ echo "GASOLINA";}
		elseif($row_vehiculo["combustible"] == 2)
		{ echo "GAS-GASOLINA";}
		elseif($row_vehiculo["combustible"] == 3)
		{ echo "DIESEL";}
		else
		{echo "ELECTRICO";}
		?></td>
<td>Licencia de Transito<br>SI (   ) NO (   )</td>
<td>Soat vigente  - fecha de vencimiento<br>SI (   ) NO (   )<?php echo $row_vehiculo['fin_soat']; ?></td>
<td>RTMyEC vigente - Fecha de vencimiento<br>SI (   ) NO (   )<?php echo $row_vehiculo['fin_rtm']; ?></td>
<td>Certificado del GNV vig. (si aplica)<br>SI (   )  NO (   )  N/A (   )</td>
</tr>
</table>

<table align="center" class="estilo1"><tr><td><b>3.Supension  </b></td></tr></table>
<table width="100%" border="1" cellspacing="0" class="estilo1">

  <tr>

    <td width="20%"><table width="100%" border="0" cellpadding="0" cellspacing="0">

  <tr>

    <td rowspan="2">Delantera Izquierda</td>

    <td align="center">Valor</td>

  </tr>

  <tr>

    

    <td><?php echo $row_pista['adhi1']; ?></td>

  </tr>

</table>

</td>

    <td width="20%"><table width="100%" border="0" cellpadding="0" cellspacing="0">

  <tr>

    <td rowspan="2">Delantera Derecha</td>

    <td align="center">Valor</td>

  </tr>

  <tr>

    

    <td><?php echo $row_pista['adhd1']; ?></td>

  </tr>

</table></td>

    <td width="20%"><table width="100%" border="0" cellpadding="0" cellspacing="0">

  <tr>

    <td rowspan="2">Trasera Izquierda</td>

    <td align="center">Valor</td>

  </tr>

  <tr>

    

    <td><?php echo $row_pista['adhi2']; ?></td>

  </tr>

</table></td>

    <td width="20%"><table width="100%" border="0" cellpadding="0" cellspacing="0">

  <tr>

    <td rowspan="2">Trasera Derecha</td>

    <td align="center">Valor</td>

  </tr>

  <tr>

    

    <td><?php echo $row_pista['adhd2']; ?></td>

  </tr>

</table></td>

    <td width="20%"><table width="100%" border="0" cellpadding="0" cellspacing="0">

      <tr>

        <td>Minimo</td>

        <td>&gt;=40</td>

      

      

        <td>Unidad</td>

        <td>%</td>

      </tr>

    </table></td>

  </tr>

</table>



<table align="center" class="estilo1"><tr><td><b>4.Frenos</b></td></tr></table>

<table width="100%" border="1" class="estilo1" cellspacing="0" cellpadding="0">

  <tr>

    <td rowspan="3" width="15%"><table width="100%" border="0" class="estilo1" cellpadding="0" cellspacing="0">

      <tr>

        <td align="center">Eficacia Total</td>

        <td align="center">Minimo</td>

        <td align="center">Unidad</td>

      </tr>

      <tr>

        <td align="center"><?php

		$total_fuerzas=$row_pista['fi1']+$row_pista['fd1']+$row_pista['fi2']+$row_pista['fd2'];
		$total_pesos=(($row_pista['pi1']+$row_pista['pd1']+$row_pista['pi2']+$row_pista['pd2']));
		$total_pesos2 = $total_pesos * 9.81;
		$eficacia_total=($total_fuerzas/$total_pesos2)*100;

		if($eficacia_total>=100)
		{
			echo "99.9";
		}
		else
		{
			echo round($eficacia_total,1);
		}
		

		 ?></td>

        <td align="center">&gt;=50</td>

        <td align="center">%</td>

      </tr>

    </table></td>

    <td width="28%"><table width="100%" border="0" class="estilo1" cellpadding="0" cellspacing="0">

      <tr>

        <td width="34%">&nbsp;</td>

        <td width="22%" align="center">Fuerza</td>

        <td width="22%" align="center">Peso</td>

        <td width="22%" align="center">Unidad</td>

      </tr>

    </table></td>

    <td width="28%"><table width="100%" border="0" class="estilo1" cellpadding="0" cellspacing="0">

      <tr>

        <td width="34%">&nbsp;</td>

        <td width="22%" align="center">Fuerza</td>

        <td width="22%" align="center">Peso</td>

        <td width="22%" align="center">Unidad</td>

      </tr>

    </table></td>

    <td width="28%"><table width="100%" border="0" class="estilo1" cellpadding="0" cellspacing="0">

      <tr>

        

        <td width="33%" align="center">Desequilibrio</td>

        <td width="33%" align="center">Maximo</td>

        <td width="33%" align="center">Unidad</td>

      </tr>

    </table></td>

  </tr>

  <tr>

    

    <td><table width="100%" border="0" class="estilo1" cellpadding="0" cellspacing="0">

      <tr>

        <td width="34%">Eje 1 Izquierdo</td>

        <td width="22%" align="center"><?php echo $row_pista['fi1']; ?></td>

        <td width="22%" align="center"><?php echo round(($row_pista['pi1']*9.81),0); ?></td>

        <td width="22%" align="center">N</td>

      </tr>

    </table></td>

    <td><table width="100%" border="0" class="estilo1" cellpadding="0" cellspacing="0">

      <tr>

        <td width="34%">Eje 1 Derecho</td>

        <td width="22%" align="center"><?php echo $row_pista['fd1']; ?></td>

        <td width="22%" align="center"><?php echo round(($row_pista['pd1']*9.81),0); ?></td>

        <td width="22%" align="center">N</td>

      </tr>

    </table></td>

    <td><table width="100%" border="0" class="estilo1" cellpadding="0" cellspacing="0">

      <tr>

        

        <td width="33%" align="center"><?php 

		if($row_pista['fi1']>$row_pista['fd1'])

		{

			$desequilibrio1=($row_pista['fi1']-$row_pista['fd1'])/$row_pista['fi1'];

			echo round($desequilibrio1*100,1);

		}

			else

		{

			$desequilibrio1=($row_pista['fd1']-$row_pista['fi1'])/$row_pista['fd1'];

			echo round($desequilibrio1*100,1);

		}

		 ?></td>

        <td width="33%" align="center">&lt;= 30</td>

        <td width="33%" align="center">%</td>

      </tr>

    </table></td>

  </tr>

  <tr>

    

    <td><table width="100%" border="0" class="estilo1" cellpadding="0" cellspacing="0">

      <tr>

        <td width="34%">Eje 2 Izquierdo</td>

        <td width="22%" align="center"><?php echo $row_pista['fi2']; ?></td>

        <td width="22%" align="center"><?php echo round(($row_pista['pi2']*9.81),0); ?></td>

        <td width="22%" align="center">N</td>

      </tr>

    </table></td>

    <td><table width="100%" border="0" class="estilo1" cellpadding="0" cellspacing="0">

      <tr>

        <td width="34%">Eje 2 Derecho</td>

        <td width="22%" align="center"><?php echo $row_pista['fd2']; ?></td>

        <td width="22%" align="center"><?php echo round(($row_pista['pd2']*9.81),0); ?></td>

        <td width="22%" align="center">N</td>

      </tr>

    </table></td>

    <td><table width="100%" border="0" class="estilo1" cellpadding="0" cellspacing="0">

      <tr>

        

        <td width="33%" align="center"><?php 

		if($row_pista['fi2']>$row_pista['fd2'])

		{

			$desequilibrio2=($row_pista['fi2']-$row_pista['fd2'])/$row_pista['fi2'];

			echo round($desequilibrio2*100,1);

		}

			else

		{

			$desequilibrio2=($row_pista['fd2']-$row_pista['fi2'])/$row_pista['fd2'];

			echo round($desequilibrio2*100,1);

		}

		 ?></td>

        <td width="33%" align="center">&lt;= 30</td>

        <td width="33%" align="center">%</td>

      </tr>

    </table></td>

  </tr>

  <tr>

    <td rowspan="3"><table width="100%" border="0" class="estilo1" cellpadding="0" cellspacing="0">

      <tr>

        <td align="center">Eficacia Aux</td>

        <td align="center">Minimo</td>

        <td align="center">Unidad</td>

      </tr>

      <tr>

        <td align="center"><?php

		   $eficiencia_auxiliar=($row_pista['fauxi']+$row_pista['fauxd'])/$total_pesos2;

		   echo round($eficiencia_auxiliar*100,1);

		 ?></td>

        <td align="center">&gt;=18</td>

        <td align="center">%</td>

      </tr>

    </table>&nbsp;</td>

    <td><table width="100%" border="0" class="estilo1" cellpadding="0" cellspacing="0">

      <tr>

        <td width="34%">Eje 3 Izquierdo</td>

        <td width="22%" align="center">&nbsp;</td>

        <td width="22%" align="center">&nbsp;</td>

        <td width="22%" align="center">N</td>

      </tr>

    </table></td>

    <td><table width="100%" border="0" class="estilo1" cellpadding="0" cellspacing="0">

      <tr>

        <td width="34%">Eje 3 Derecho</td>

        <td width="22%" align="center">&nbsp;</td>

        <td width="22%" align="center">&nbsp;</td>

        <td width="22%" align="center">N</td>

      </tr>

    </table></td>

    <td><table width="100%" border="0" class="estilo1" cellpadding="0" cellspacing="0">

      <tr>

        <td width="33%" align="center">&nbsp;</td>

        <td width="33%" align="center">&lt;= </td>

        <td width="33%" align="center">%</td>

      </tr>

    </table></td>

  </tr>

  <tr>

    

    <td><table width="100%" border="0" class="estilo1" cellpadding="0" cellspacing="0">

      <tr>

        <td width="34%">Eje 4 Izquierdo</td>

        <td width="22%" align="center">&nbsp;</td>

        <td width="22%" align="center">&nbsp;</td>

        <td width="22%" align="center">N</td>

      </tr>

    </table></td>

    <td><table width="100%" border="0" class="estilo1" cellpadding="0" cellspacing="0">

      <tr>

        <td width="34%">Eje 4 Derecho</td>

        <td width="22%" align="center">&nbsp;</td>

        <td width="22%" align="center">&nbsp;</td>

        <td width="22%" align="center">N</td>

      </tr>

    </table></td>

    <td><table width="100%" border="0" class="estilo1" cellpadding="0" cellspacing="0">

      <tr>

        <td width="33%" align="center">&nbsp;</td>

        <td width="33%" align="center">&lt;= </td>

        <td width="33%" align="center">%</td>

      </tr>

    </table></td>

  </tr>

  <tr>

    

    <td><table width="100%" border="0" class="estilo1" cellpadding="0" cellspacing="0">

      <tr>

        <td width="34%">Eje 5 Izquierdo</td>

        <td width="22%" align="center">&nbsp;</td>

        <td width="22%" align="center">&nbsp;</td>

        <td width="22%" align="center">N</td>

      </tr>

    </table></td>

    <td><table width="100%" border="0" class="estilo1" cellpadding="0" cellspacing="0">

      <tr>

        <td width="34%">Eje 5 Derecho</td>

        <td width="22%" align="center">&nbsp;</td>

        <td width="22%" align="center">&nbsp;</td>

        <td width="22%" align="center">N</td>

      </tr>

    </table></td>

    <td><table width="100%" border="0" class="estilo1" cellpadding="0" cellspacing="0">

      <tr>

        <td width="33%" align="center">&nbsp;</td>

        <td width="33%" align="center">&lt;= </td>

        <td width="33%" align="center">%</td>

      </tr>

    </table></td>

  </tr>

</table>

<table align="center" class="estilo1">

<tr><td><b>5.Desviacion Lateral</b></td></tr></table>

<table align="center" class="estilo1" width="100%" border="1" cellspacing="0" cellpadding="0">

<tr>

<td width="15%"><table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr>
	<td>Eje 1</td>
	<td><?php echo $row_pista['desv1']; ?></td>
</tr>
</table>
</td>
<td width="15%"><table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr>
	<td>Eje 2</td>
	<td><?php echo $row_pista['desv2']; ?></td>
</tr>
</table>
</td>
<td width="15%"><table width="100%" border="0" cellpadding="0" cellspacing="0">

  <tr>

    <td>Eje 3</td>

    <td>&nbsp;</td>

  </tr>

</table>

</td>



<td width="15%"><table width="100%" border="0" cellpadding="0" cellspacing="0">

  <tr>

    <td>Eje 4</td>

    <td>&nbsp;</td>

  </tr>

</table>

</td>



<td width="15%"><table width="100%" border="0" cellpadding="0" cellspacing="0">

  <tr>

    <td>Eje 5</td>

    <td>&nbsp;</td>

  </tr>

</table>

</td>



<td width="25%"><table width="100%" border="0" cellpadding="0" cellspacing="0">

  <tr>

    <td>Maximo</td>

    <td>10</td>

    <td>Unidad</td>

    <td>m/Km</td>

  </tr>

</table>

</td>



    

</tr>

</table>

<!--

<table align="center" class="estilo1"><tr><td>10.Dispositivos de Cobro  </td></tr></table>



<table class="estilo1" width="100%" border ="1" cellspacing="0" cellpadding="0">

<tr>

	<td>Referencia Comercial de la llanta<br> </td>

	<td>Error en Distancia<br>   </td>

    <td>Error en Tiempo<br>   </td>

    <td>Maxmimo 2              Unidad  %</td>

</tr>

</table>

-->



  <!--



<!--<span class="estilo3"><b>C. DEFECTOS ENCONTRADOS EN LA INSPECCION VISUAL DE ACUERDO CON LOS CRITERIOS DE LA NTC5375</b></span>

<table align="center" class="estilo1" width="100%" border ="1" cellspacing="0" cellpadding="0" >



<tr align="center">

    <td>Código</td>

    <td>Descripción</td>

    <td>Grupo</td>

    <td>Tipo de Defecto</td>

</tr>

<tr align="center">

    <td>N/A</td>

    <td>N/A</td>

    <td>N/A</td>

    <td>N/A</td>

</tr>

</table>

-->
<div align="center"><span class="estilo3"><b>INSPECCIÓN SENSORIAL </b></span></div>
<table align="center" class="estilo1" width="100%">
<tr>
<td width="32%" valign="top">
    <table border="1" width="100%">
    <tr>
        <td colspan="2" align="center"><B>Alumbrado</B></td>
    </tr>
    <tr>
        <td>Luces de posición o delimitadoras</td>
		<td><?php echo $l1;?></td>
    </tr>
    <tr>
        <td>Luz baja o de Cruze</td>
		<td><?php echo $l2;?></td>
    </tr>
    <tr>
        <td>Luz alta o de carretera</td>
		<td><?php echo $l3;?></td>
    </tr>
    <tr>
        <td>Luz de freno</td>
		<td><?php echo $l4;?></td>
    </tr>
    <tr>
        <td>Luz direccional</td>
		<td><?php echo $l5;?></td>
    </tr>
    <tr>
        <td>Luz reversa</td>
		<td><?php echo $l6;?></td>
    </tr>
    <tr>
        <td>Luz estacionaria</td>
		<td><?php echo $l7;?></td>
    </tr>
    </table>
    <br />
    <table border="1" width="100%">
    <tr>
        <td colspan="2" align="center"><B>Suspensión y Dirección</B></td>
    </tr>
    <tr>
        <td>Amortiguador</td>
		<td><?php echo $s1;?></td>
    </tr>
    <tr>
        <td>Tijera</td>
		<td><?php echo $s2;?></td>
    </tr>
    <tr>
        <td>Bujes de suspensión </td>
		<td><?php echo $s3;?></td>
    </tr>
    <tr>
        <td>Rotula</td>
		<td><?php echo $s4;?></td>
    </tr>
    <tr>
        <td>Terminal de dirección</td>
		<td><?php echo $s5;?></td>
    </tr>
    <tr>
        <td>Axial </td>
		<td><?php echo $s6;?></td>
    </tr>
    <tr>
        <td>Anclaje caja de dirección</td>
		<td><?php echo $s7;?></td>
    </tr>
    <tr>
        <td>Barra estabilizadora</td>
		<td><?php echo $s8;?></td>
    </tr>
    </table>
    <br />
    <table border="1" width="100%">
    <tr>
        <td colspan="2" align="center"><B>Fugas</B></td>
    </tr>
    <tr>
        <td>Fuga de aceite en motor</td>
		<td><?php echo $f1;?></td>
    </tr>
    <tr>
        <td>Fuga de aceite en caja de trasm. </td>
		<td><?php echo $f2;?></td>
    </tr>
    <tr>
        <td>Fuga de refrigerante</td>
		<td><?php echo $f3;?></td>
    </tr>
    <tr>
        <td>Fuga de liquido de frenos </td>
		<td><?php echo $f4;?></td>
    </tr>
    <tr>
        <td>Fuga de aire (si aplica)</td>
		<td><?php echo $f5;?></td>
    </tr>
    <tr>
        <td>Fuga de hidráulico. </td>
		<td><?php echo $f6;?></td>
    </tr>
    </table>
    <BR />
    
</td>
<td width="2%">&nbsp;</td>
<td width="32%" valign="top">
    <table border="1" width="100%">
    <tr>
        <td colspan="2" align="center"><b>Niveles</b></td>
    </tr>
    <tr>
        <td>Nivel de aceite</td>
		<td><?php echo $n1;?></td>
    </tr>
    <tr>
        <td>Nivel  de refrigerante</td>
		<td><?php echo $n2;?></td>
    </tr>
    <tr>
        <td>Nivel de liquido de Frenos</td>
		<td><?php echo $n3;?></td>
    </tr>
    <tr>
        <td>Nivel de Hidráulico</td>
		<td><?php echo $n4;?></td>
    </tr>
    <tr>
        <td>Nivel del limpiaparabrisas</td>
		<td><?php echo $n5;?></td>
    </tr>
    </table>
    <BR />
    <table border="0" width="100%">
    <tr>
    	<td align="center">
    <img src="imagenes/viajeseg.jpg" width="170" height="350" /></td>
    </tr>
    </table>
    
  </td>
<td width="2%">&nbsp;</td>
<td width="32%" valign="top">
    <table border="1" width="100%">
    <tr>
        <td colspan="2" align="center"><b>Vidrios</b></td>
    </tr>
    <tr>
        <td>Espejo Interior</td>
		<td><?php echo $v1;?></td>
    </tr>
    <tr>
        <td>Panorámico Delantero</td>
		<td><?php echo $v2;?></td>
    </tr>
    <tr>
        <td>Panorámico Trasero</td>
		<td><?php echo $v3;?></td>
    </tr>
    <tr>
        <td>Vidrio Delantero derecho</td>
		<td><?php echo $v4;?></td>
    </tr>
    <tr>
        <td>Vidrio Delantero izquierdo</td>
		<td><?php echo $v5;?></td>
    </tr>
    <tr>
        <td>Vidrio Trasero derecho</td>
		<td><?php echo $v6;?></td>
    </tr>
    <tr>
        <td>Vidrio Trasero izquierdo</td>
		<td><?php echo $v7;?></td>
    </tr>
    <tr>
        <td>Vidrio Custodio Derecho</td>
		<td><?php echo $v8;?></td>
    </tr>
    <tr>
        <td>Vidrio Custodio Izquierdo</td>
		<td><?php echo $v9;?></td>
    </tr>
        <tr>
        <td>Espejo exterior izquierdo</td>
		<td><?php echo $v10;?></td>
    </tr>
        <tr>
        <td>Espejo exterior derecho</td>
		<td><?php echo $v11;?></td>
    </tr>
    </table>
    <br />
    <table border="1" width="100%">
    <tr>
        <td colspan="2" align="center"><B>Profundidad de labrado de llantas</B></td>
    </tr>
    <tr>
        <td>Llanta delantera derecha</td>
		<td><?php echo $p1;?> mm</td>
    </tr>
    <tr>
        <td>Llanta delantera izquierda</td>
		<td><?php echo $p2;?> mm</td>
    </tr>
    <tr>
        <td>Llanta trasera derecha</td>
		<td><?php echo $p3;?> mm</td>
    </tr>
    <tr>
        <td>Llanta trasera izquierda</td>
		<td><?php echo $p4;?> mm</td>
    </tr>
    <tr>
        <td>Llanta de repuesto </td>
		<td><?php echo $p5;?> mm</td>
    </tr>
    </table>
    <br />
    <table border="1" width="100%">
    <tr>
        <td colspan="2" align="center"><B>EQUIPO DE CARRETERA *</B></td>
    </tr>
    <tr>
        <td>Gato</td>
		<td><?php echo $e1;?></td>
    </tr>
    <tr>
        <td>Cruceta</td>
		<td><?php echo $e2;?></td>
    </tr>
    <tr>
        <td>Par de señales y tacos</td>
		<td><?php echo $e3;?></td>
    </tr>
    <tr>
        <td>Botiquín de primeros auxilios **</td>
		<td><?php echo $e4;?></td>
    </tr>
    <tr>
        <td>Extintor</td>
		<td><?php echo $e5;?></td>
    </tr>
    <tr>
        <td>Caja de herramienta básica ***</td>
		<td><?php echo $e6;?></td>
    </tr>
    <tr>
        <td>Llanta de repuesto</td>
		<td><?php echo $e7;?></td>
    </tr>
    <tr>
        <td>Linterna</td>
		<td><?php echo $e8;?></td>
    </tr>
    </table>
</td>
</tr>

</table>



<span class="estilo3"><b>NOMBRE DEL INSPECTOR: </b>

<?php 

$nombre_user= mysql_query("SELECT * FROM usuarios WHERE id_usuario = '".$row_informacion['inspectorRegViaje']."'");//hago la consulta a la base de datos para traer las ciudad de la empresa del usuario

$result_user=mysql_fetch_array($nombre_user);
if(strlen($result_user['ruta_firma']) < 5)
{
	$firmaInspector = "firmas/default.jpg";
}
else
{
	$firmaInspector = $result_user['ruta_firma'];
}

echo ''.$result_user['nombres'].'   '.$result_user['apellidos'];?></span><BR>

<table width="100%" border ="1" cellspacing="0" class="estilo1">

   <tr>

  	<td ><?php echo $row_informacion['observaciones']; ?></td>

    <td align="center" valign="bottom" width="50%">

    <table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
	<td align="center"><?php echo '<img src="'.$firmaInspector.'" width="130" height="50" />';


?></td>
	</tr>
  <tr>

    <td align="center">_______________________________________</td>

  </tr>

  <tr>

    <td align="center">Firma Responsable Tecnico</td>

  </tr>

</table>
</td>
</tr>
</table>
<br />
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="estilo3">
<tr>
	<td>
    	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="estilo3">
        <tr>
            <td align="left"><b>* Según Código Nacional de Transito Terrestre, Ley 769 del 6 de agosto de 2002, Articulo 30. </b></td>
        </tr>
        <tr>
            <td align="left"><b>
        ** Recuerde que su botiquín debe contener: antisépticos (alcohol-Isodine), analgésicos (Dolex-aspirina), algodón, gasas estériles, guantes de látex, curitas, vendas, esparadrapo, tijeras con punta redonda y un mini libro de primeros auxilios. No olvide observar las fechas de vencimiento.</b></td>
        </tr>
        <tr>
            <td align="left"><b>*** Como mínimo debe tener: alicates, destornilladores, llave de expansión y llaves fijas. </b></td>
        </tr>
        </table>
    </td>
</tr>
</table>
<br />
<table width="100%" border="1" cellspacing="0" cellpadding="0" class="estilo3">
<tr>
	<td>
    	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="estilo3">
        <tr>
            <td align="center"><b>RECUERDE SIEMPRE LOS DOCUMENTOS Y RESPETAR LAS NORMAS DE TRANSITO</b></td>
        </tr>
        <tr>
            <td align="center"><b>
        Este informe es una inspección sensorial del vehículo y como tal no compromete en nada al CENTRO DE DIAGNOSTICO AUTOMOR, Esta inspección no reemplaza el 
        mantenimiento preventivo o correctivo que se le debe realizar a su vehículo.</b></td>
        </tr>
        
        </table>
    </td>
</tr>
</table>



</body>

</html>

<?php

echo "<script>window.print();</script>";

mysql_free_result($consultaRevisiones);

mysql_free_result($consultaPropietarios);

mysql_free_result($Recordset2);

?>

