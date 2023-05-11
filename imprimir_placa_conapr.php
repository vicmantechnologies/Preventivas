<?php
session_start();
error_reporting(0);
//consulta principal
require("conexion.php");
$informacion=mysql_query("select * from revisiones where placa like '".$placa_revision."' order by id_rev desc limit 1");
$row_informacion=mysql_fetch_array($informacion);

$pista=mysql_query("select * from resultados_pista where id_rel_rev = '".$row_informacion['id_rev']."'");
$row_pista=mysql_fetch_array($pista);

$datos_vehiculo=mysql_query("select * from info_vehiculos where placa like '".$placa_revision."' limit 1");
$row_vehiculo=mysql_fetch_array($datos_vehiculo);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Imprimir Reporte Vehículos</title>

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
<!--
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
-->
</style>
</head>
<body>
<span class="estilo3"><b>FORMATO DE RESULTADOS DE LA REVISION PREVENTIVA</b></span>
<table width="100%" class="estilo1" cellpadding="0" cellspacing="0">
<tr><td></td>
<td  colspan="2" align="center"><b>RED PREVICAR</b></td></tr>
  <tr>
  <td width="57%" height="66"><span class="estilo4"><B>FORMATO DE PREVENTIVA No. <?php echo $row_informacion['id_rev']; ?></B></span></td>
  <td width="26%" align="center"><?php 
				
if($row_informacion['sede']==1)
{ echo '<img src="imagenes/distrital.jpg" width="120" height="45" />';}
elseif($row_informacion['sede']==4)
{ echo '<img src="imagenes/previtax.jpg" width="120" height="64" />';}
elseif($row_informacion['sede']==9)
{ echo '<img src="imagenes/preventax.jpg" width="120" height="64" />';}
else
{ echo '<img src="imagenes/Previcar.jpg" width="120" height="64" />';}
?></td>
  <td width="17%"><?php 
				
if($row_informacion['sede']==1)
{ echo '900099168-9<br />Av Calle 19 N 36 - 28<br />
  Bogotá';}
elseif($row_informacion['sede']==4 or $row_informacion['sede']==9)
{ echo '900111946-3<br />Calle 12 B No.44 - 06/08<br />
  Bogotá';}
else
{ echo '900094539-5<br />Carrera 14 B n 119-95<br />
  Bogotá';}
?></td></tr>
</table>
<span class="estilo3"><b>A. INFORMACION GENERAL</b></span><BR />  
<span class="estilo1">1. FECHA &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  2.DATOS DEL PROPIETARIO O TENEDOR DEL VEHICULO</span> <br>
<table width="100%" border ="1" cellspacing="0" cellpadding="0" class="estilo1">

<tr><td>Fecha de la Prueba <br>
  <?php echo $row_informacion['fecha']; ?></td>
<td >Nombre o Razon Social<br><?php echo $row_informacion['nombres'].' '.$row_informacion['apellidos']; ?></td>
<td >Documento <br><?php echo $row_informacion['tipo_doc']; ?></td>
<td >No<br />
  <?php echo $row_informacion['documento']; ?></td></tr>
</table>

<table width="100%" border ="1" cellspacing="0" cellpadding="0" class="estilo1">

<tr><td>Direccion<br><?php echo $row_informacion['direccion']; ?></td><td>Telefono<br><?php echo $row_informacion['telefono']; ?></td><td>Ciudad<br><?php echo $row_informacion['ciudad']; ?></td><td>Departamento<br><?php echo $row_consultaPropietarios['departamento']; ?></td></tr>

</table>
<div align="center"><span class="estilo1">3. DATOS DEL VEHICULO</span>
</div>
<table width="101%" border ="1" cellspacing="0" cellpadding="0" class="estilo1">
        <tr>
        <td>Placa<br><?php echo $row_informacion['placa']; ?></td>
        <td>Pais<br>Colombia</td>
        <td>Servicio<br><?php 
		if($row_vehiculo[servicio] == 1)
		{ echo "PUBLICO";}
		elseif($row_vehiculo[servicio] == 2)
		{ echo "PARTICULAR";}
		else
		{echo "ESPECIAL";}
		?></td>
        <td><br></td>
        <td>Pais<br>COLOMBIA</td>
        <td>Clase<br><?php 
		if($row_vehiculo[clase] == 1)
		{ echo "AUTOMOVIL";}
		elseif($row_vehiculo[clase] == 2)
		{ echo "BUS";}
		elseif($row_vehiculo[clase] == 3)
		{ echo "BUSETA";}
		elseif($row_vehiculo[clase] == 4)
		{ echo "CAMIONETA";}
		elseif($row_vehiculo[clase] == 5)
		{ echo "CAMPERO";}
		else
		{echo "MICROBUS";}
		?></td>
        <td>Marca<br><?php echo $row_vehiculo['marca']; ?></td>
        <td>Linea<br> <?php echo $row_vehiculo['linea']; ?></td>
        </tr>
</table>
<table width="101%" border ="1" cellspacing="0" cellpadding="0" class="estilo1">
        <tr>
        <td>Modelo<br><?php echo $row_vehiculo['modelo']; ?></td>
        <td>Vencimiento SOAT<br><?php echo $row_vehiculo['fin_soat']; ?></td>
        <td>Vencimiento RTM<br><?php echo $row_vehiculo['fin_rtm']; ?></td>
        <td>Kilometraje<br><?php echo $row_informacion['kilometraje']; ?></td>
        <td>Combustible<br><?php 
		if($row_vehiculo[combustible] == 1)
		{ echo "GASOLINA";}
		elseif($row_vehiculo[combustible] == 2)
		{ echo "GAS-GASOLINA";}
		elseif($row_vehiculo[combustible] == 3)
		{ echo "DIESEL";}
		else
		{echo "ELECTRICO";}
		?></td>
        <td>Empresa<br><?php echo $row_informacion['empresa']; ?></td>
        </tr>
</table>
<!--
<table width="100%" border ="1" cellspacing="0" class="estilo1" cellpadding="0">
        <tr>
        <td>No Motor<br>N/A</td>
        <td>Tipo de Motor<br>N/A</td>
        <td>Cilindraje<br>N/A</td>
        <td>Kilometraje<br>N/A</td>
        <td>Numero de Sillas<br>N/A</td>
        <td>Vidrios Polarizados<br> N/A</td>
        <td>Blindaje<br> N/A</td>
        </tr>
</table>
-->
<span class="estilo3"><b><!--B. RESULTADOS DE LA INSPECCION MECANIZADA REALIZADA DE ACUERDO CON LOS METODOS DEFINIDOS EN LA NTC5375</b></span><br>
<table class="estilo1"><tr><td>Nota: Todo valor Medido seguido de simbolo *, indica un defecto encontrado</td></tr></table>
<table class="estilo1" width="100%" cellpadding="0" cellspacing="0"><tr><td width="20%">4. Emisiones Audibles  </td><td width="55%"> 5. Intensidad e Inclinacion de las luces bajas  </td> <td width="25%"> 6.Suma de la intensidad de todas las luces</td></tr></table>

<table class="estilo1" width="100%" border="1" cellpadding="0" cellspacing="0"><tr>
<td width="20%"><table width="100%" border="0" cellpadding="0" cellspacing="0" >
  <tr>
    <td>&nbsp;</td>
    <td align="center">Valor</td>
    <td align="center">Maximo</td>
    <td align="center">Valor</td>
  </tr>
  <tr>
    <td>Ruido Escape</td>
    <td align="center"><?php 
	
	//$emisiones=mysql_query("select * from emisiones where id_rel like '".$row_consultaRevisiones['idrevisiones']."' order by id_emisiones desc limit 1");
	//$row_emisiones=mysql_fetch_array($emisiones);
	echo $row_emisiones[ruido];
	if($row_emisiones[hc]==0 and $row_emisiones[co]==0)
	{
		$tem_gases="";
		$rpm_gases="";
		$hc="";
		$co="";
		$co2="";
		$o2="";
		$tem_diesel=$row_emisiones[temperatura];
		$rpm_diesel=$row_emisiones[rpm];
		$opacidad=$row_emisiones[opacidad];
	}
	else
	{
		$tem_gases=$row_emisiones[temperatura];
		$rpm_gases=$row_emisiones[rpm];
		$hc=$row_emisiones[hc];
		$co=$row_emisiones[co];
		$co2=$row_emisiones[co2];
		$o2=$row_emisiones[o2];
		$tem_diesel="";
		$rpm_diesel="";
		$opacidad="";
	}
	?></td>
    <td>&nbsp;</td>
    <td align="center">dBA</td>
  </tr>
</table>
</td>

<td width="55%">
<table width="98%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td>&nbsp;</td>
    <td>Intensidad</td>
    <td>Minimo</td>
    <td>Unidad</td>
    <td>Inclinacion</td>
    <td>Rango</td>
    <td>Unidad</td>
  </tr>
  <tr>
    <td>Baja Derecha</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>Klux</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>%</td>
  </tr>
  <tr>
    <td>Baja Izquierda</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>Klux</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>%</td>
  </tr>
</table>


</td>

<td width="25%">
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td>Intensidad</td>
    <td>Maximo</td>
    <td>Unidad</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>Klux</td>
  </tr>
</table>
</td>
</tr>
</table>
-->
<table align="center" class="estilo1"><tr><td>7.Supension  </td></tr></table>

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

<table align="center" class="estilo1"><tr><td>8.Frenos  </td></tr></table>
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
		$total_pesos=(($row_pista['pi1']+$row_pista['pd1']+$row_pista['pi2']+$row_pista['pd2'])*(9.81));
		$eficacia_total=($total_fuerzas/$total_pesos)*100;
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
		   $eficiencia_auxiliar=($row_pista['fauxi']+$row_pista['fauxd'])/$total_pesos;
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
<tr><td>9.Desviacion Lateral  </td></tr></table>
<table align="center" class="estilo1" width="100%" border="1" cellspacing="0" cellpadding="0">
<tr>
<td width="15%"><table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td>Eje 1</td>
    <td>&nbsp;</td>
  </tr>
</table>
</td>

<td width="15%"><table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td>Eje 2</td>
    <td>&nbsp;</td>
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
<table align="center" class="estilo1"><tr>
  <td width="147">11.a Vehiculos con ciclo OTTO  </td></tr></table>

<table width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td width="10%"><table width="100%" border="0" class="estilo1">
      <tr>
        <td align="center">Temp</td>
        <td align="center">RPM</td>
      </tr>
      <tr>
        <td align="center">°C</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td align="center"><?php echo $tem_gases;?></td>
        <td align="center"><?php echo $rpm_gases;?></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table></td>
    <td width="18%"><table width="100%" border="0" class="estilo1">
      <tr>
        <td colspan="3" align="center">Monoxido de Carbono (CO)</td>
       
      </tr>
      <tr>
        <td align="center">Valor</td>
        <td align="center">Norma</td>
        <td align="center">Unidad</td>
      </tr>
      <tr>
        <td align="center"><?php echo $co;?></td>
        <td align="center">&lt;=10</td>
        <td align="center">%</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td align="center">&lt;=10</td>
        <td align="center">%</td>
      </tr>
    </table></td>
    <td width="18%"><table width="100%" border="0" class="estilo1">
      <tr>
        <td colspan="4" align="center">Dioxido de Carbono (CO2)</td>
      </tr>
      <tr>
        <td align="center">CO2</td>
        <td align="center">Valor</td>
        <td align="center">Norma</td>
        <td align="center">Unidad</td>
      </tr>
      <tr>
        <td align="center">Ralenti</td>
        <td align="center"><?php echo $co2;?></td>
        <td align="center">&gt;=7.0</td>
        <td align="center">%</td>
      </tr>
      <tr>
        <td align="center">Crucero</td>
        <td>&nbsp;</td>
        <td align="center">&gt;=7.0</td>
        <td align="center">%</td>
      </tr>
    </table></td>
    <td width="18%"><table width="100%" border="0" class="estilo1">
      <tr>
        <td colspan="4" align="center">Oxigeno (O2)</td>
      </tr>
      <tr>
        <td align="center">O2</td>
        <td align="center">Valor</td>
        <td align="center">Norma</td>
        <td align="center">Unidad</td>
      </tr>
      <tr>
        <td align="center">Ralenti</td>
        <td align="center"><?php echo $o2;?></td>
        <td align="center">&lt;=5.0</td>
        <td align="center">%</td>
      </tr>
      <tr>
        <td align="center">Crucero</td>
        <td>&nbsp;</td>
        <td align="center">&lt;=5.0</td>
        <td align="center">%</td>
      </tr>
    </table></td>
    <td width="18%"><table width="100%" border="0" class="estilo1">
      <tr>
        <td colspan="4" align="center">Hidrocarburo (como hexano)(HC)</td>
      </tr>
      <tr>
        <td align="center">HC</td>
        <td align="center">Valor</td>
        <td align="center">Norma</td>
        <td align="center">Unidad</td>
      </tr>
      <tr>
        <td align="center">Ralenti</td>
        <td align="center"><?php echo $hc?></td>
        <td align="center">&lt;=200.0</td>
        <td align="center">ppm</td>
      </tr>
      <tr>
        <td align="center">Crucero</td>
        <td>&nbsp;</td>
        <td align="center">&lt;=200.0</td>
        <td align="center">ppm</td>
      </tr>
    </table></td>
    <td width="18%"><table width="100%" border="0" class="estilo1">
      <tr>
        <td colspan="4" align="center">Oxido Nitroso (NOx)</td>
      </tr>
      <tr>
        <td align="center">HO</td>
        <td align="center">Valor</td>
        <td align="center">Norma</td>
        <td align="center">Unidad</td>
      </tr>
      <tr>
        <td align="center">Ralenti</td>
        <td>&nbsp;</td>
        <td align="center">&lt;=g21</td>
        <td align="center">%</td>
      </tr>
      <tr>
        <td align="center">Crucero</td>
        <td>&nbsp;</td>
        <td align="center">&lt;=g23</td>
        <td align="center">%</td>
      </tr>
    </table></td>
  </tr>
</table>
<table align="center" class="estilo1"><tr>
  <td width="195">11.b Vehiculos a Diesel (OPACIDAD)</td></tr></table>
  <table width="100%" border="1" cellspacing="0" class="estilo1" cellpadding="0">
  <tr>
    <td width="10%"><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td>Temperatura</td>
        <td>RPM</td>
      </tr>
      <tr>
        <td>°C <?php echo $tem_diesel;?></td>
        <td><?php echo $rpm_diesel;?></td>
      </tr>
    </table></td>
    <td width="18%"><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td align="center">Ciclo 1</td>
        <td align="center">Unidad</td>
      </tr>
      <tr>
        <td align="center">&nbsp;</td>
        <td align="center">%</td>
      </tr>
    </table></td>
    <td width="18%"><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td align="center">Ciclo 2</td>
        <td align="center">Unidad</td>
      </tr>
      <tr>
        <td align="center">&nbsp;</td>
        <td align="center">%</td>
      </tr>
    </table></td>
    <td width="18%"><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td align="center">Ciclo 3</td>
        <td align="center">Unidad</td>
      </tr>
      <tr>
        <td align="center">&nbsp;</td>
        <td align="center">%</td>
      </tr>
    </table></td>
    <td width="18%"><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td align="center">Ciclo 4</td>
        <td align="center">Unidad</td>
      </tr>
      <tr>
        <td align="center">&nbsp;</td>
        <td align="center">%</td>
      </tr>
    </table></td>
    <td width="18%"><table width="100%" border="0" class="estilo1" cellpadding="0" cellspacing="0">
      <tr>
        <td align="left">Valor</td>
        <td align="center">Norma</td>
        <td align="center">Unidad</td>
      </tr>
      <tr>
        <td>Resultado &nbsp;&nbsp;&nbsp; <?php echo $opacidad;?></td>
        <td align="center">&lt;=</td>
        <td align="center">%</td>
      </tr>
    </table></td>
  </tr>
</table>

<table align="center" class="estilo1">
  <tr>
<td>12. Vehiculos a Diesel(Opacidad)  </td></tr></table>
-->
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
<span class="estilo3"><b>D. DEFECTOS ENCONTRADOS EN LA INSPECCION VISUAL DE ACUERDO CON LOS METODOS Y CRITERIOS DE LA NTC5375</b></span>
<table align="center" class="estilo1" width="100%" border ="1" cellspacing="0" cellpadding="0" >

<tr align="center">
    <td>Código</td>
    <td>Descripción</td>
    <td>Grupo</td>
    <td>Tipo de Defecto</td>
</tr>
<tr>
    <td>
	<?php 
	error_reporting(0);
	$count = 0;
	$defectos=$row_informacion['array_defectos'].''.$row_informacion['array_defectos2'].''.$row_informacion['array_defectos3'].''.$row_informacion['array_defectos4'].''.$row_informacion['array_defectos5'].''.$row_informacion['array_defectos6'];

	$piezas = explode(" ",trim($defectos) );
  	$count = count($piezas);
	for ($j = 0; $j < $count; $j++) 
	{
		echo $piezas[$j].'<br>';
	}
	?></td>
    <td><?php 
		for ($j = 0; $j < $count; $j++) {
		//mysql_select_db($database_txmedellin, $txmedellin);
		$query_Recordset2 = mysql_query("SELECT * FROM defectos WHERE defectos.iddefecto= '".$piezas[$j]."'");
		//$Recordset2 = mysql_query($query_Recordset2, $txmedellin) or die(mysql_error());
		$row_Recordset2 = mysql_fetch_assoc($query_Recordset2);
		
		 echo utf8_encode($row_Recordset2['text_defecto']).'<br>';
			}
 		?></td>
    <td><?PHP
	for ($j = 0; $j < $count; $j++) 
	{
		$query_Recordset2 = mysql_query("SELECT * FROM defectos WHERE defectos.iddefecto= '".$piezas[$j]."'");
		//$Recordset2 = mysql_query($query_Recordset2, $txmedellin) or die(mysql_error());
		$row_Recordset2 = mysql_fetch_assoc($query_Recordset2);
		
		 if($row_Recordset2['tipo_defecto']=="A" or $row_Recordset2['tipo_defecto']=="B" or $row_Recordset2['tipo_defecto']=="C")
	{echo "MOTOR, CAJA, TRANSMISION <br>";}
	elseif( $row_Recordset2['tipo_defecto']=="F")
	{echo "SUSPENCIÓN Y DIRECCIÓN <br>";}
	elseif( $row_Recordset2['tipo_defecto']=="D" or $row_Recordset2['tipo_defecto']=="E")
	{echo "CARROCERIA Y CABINA <br>";}
	elseif( $row_Recordset2['tipo_defecto']=="G" or $row_Recordset2['tipo_defecto']=="I")
	{echo "FRENOS Y LUCES <br>";}
	elseif( $row_Recordset2['tipo_defecto']=="H")
	{echo "EQUIPO DE CARRETERA <br>";}
	elseif( $row_Recordset2['tipo_defecto']=="J")
	{echo "EMISIONES <br>";}
	elseif( $row_Recordset2['tipo_defecto']=="K")
	{echo "EMISIONES <br>";}
	else
	{ echo "";}
	
	}//FIN FOR
	
	?></td>
    <td><?PHP
	$cont_tipo_b = 0;
	$cont_tipo_a = 0;
	for ($j = 0; $j < $count; $j++) 
	{
		$query_def = mysql_query("SELECT * FROM defectos WHERE defectos.iddefecto= '".$piezas[$j]."'");
		//$Recordset2 = mysql_query($query_Recordset2, $txmedellin) or die(mysql_error());
		$row_def = mysql_fetch_assoc($query_def);
		
		echo utf8_encode($row_def['defecto_tipo']).'<br>';
		if($row_def['defecto_tipo'] == "B")
		{
			$cont_tipo_b++;
		}
		elseif($row_def['defecto_tipo'] == "A")
		{
			$cont_tipo_a++;
		}
	
	}//FIN FOR
	
	?></td>
</tr>
</table>
<!--
<span class="estilo3"><b>D1. DEFECTOS ENCONTRADOS EN LA INSPECCION VISUAL DE LOS VEHICULOS UTILIZADOS PRA IMPARTIR APRENDISAJE AUTOMOVILISTICO</b></span>

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
<table class="estilo1">
<tr><td>Defectos tipo A: Son aquellos defectos graves que implican un peligro inmimente para la seguridad del vehículo, la de otros vehículos, la de sus ocupantes, la de los demas usuarios de la via pública o al ambiente</td></tr>
</table>
<table class="estilo1">
<tr><td>Defectos tipo B: Son aquellos defectos que implican u peligro potencial para la seguridad del vehículo, la de otros vehículos, de sus ocupantes, la de los demás usuarios de la vía públia</td></tr>
</table>

<span class="estilo3"><b>E. RESULTADO INSPECCION PREVENTIVA</b></span>
<table align="center" class="estilo1" width="100%" border ="1" cellspacing="0">
<tr><td>Resultado:  <span class="estilo4"><B><?php  
if($cont_tipo_b>=5)
{ 
echo "RECHAZADO";
}
elseif($cont_tipo_a>=1)
{
	echo "RECHAZADO";
}
else
{
	echo "APROBADO";
}
?></B></span> </td>
<td>No Consecutivo : <?php echo $row_informacion['id_rev']; ?></td></tr>
</table>
<!--
<table align="center" class="estilo1" width="100%" border ="1" cellspacing="0">
<tr><td>E1. Cumple con las adaptaciones para vehículos de ensenanza auto movilistica?  N/A</td></tr>
</TABLE>
-->

<span class="estilo3"><b>NOMBRE DEL INSPECTOR: </b>
<?php 
$nombre_user= mysql_query("SELECT * FROM usuarios WHERE id_usuario = '".$row_informacion['inspector']."'");//hago la consulta a la base de datos para traer las ciudad de la empresa del usuario
$result_user=mysql_fetch_array($nombre_user);
echo ''.$result_user['nombres'].'   '.$result_user['apellidos'];?></span><BR>
<span class="estilo3"><b>F. COMENTARIOS Y OBSERVACIONES ADICIONALES: <?php echo $row_informacion['observaciones']; ?></b></span><BR>
<!--<span class="estilo3"><b>VENCIMIENTO SOAT:   <?php echo $row_consultaRevisiones['N_int_taxi']; ?><BR>
   VENCIMIENTO RTMyEC:   <?php echo $row_consultaRevisiones['N_taller_cal_tax']; ?> <BR>
   PLAZO:   <?php echo $row_consultaRevisiones['N_calcomania']; ?><BR>
   OBSERVACIONES:<?php echo $row_consultaRevisiones['observaciones']; ?><BR>
   
   G. NOMBRE Y FIRMA DEL DIRECTOR TECNICO AUTORIZADO POR EL REPRESENTANTE LEGAL DEL CDA: <BR>
   <BR>
   H. NOMBRE DEL OPERARIO QUE REALIZO LA REVISION TECNICOMECANICA Y DE EMISIONES CONTAMINANTES:<b><?php 
   $informacion_inspector=mysql_query("select nombres,apellidos from usuarios where id_usuario like '".$row_informacion['inspector']."' limit 1");
$row_informacion_inspector=mysql_fetch_array($informacion_inspector);
echo $row_informacion_inspector['nombres'].' '.$row_informacion_inspector['apellidos'] ?></b><BR>
</b></span>
-->   
   <table width="100%" border ="1" cellspacing="0" class="estilo1">
   <tr>
  	<td align="center">
       <img src='<?php echo $row_informacion['archivo']; ?>' border='0' width='400' height='240'>

    </td>
    <td align="center" valign="bottom" width="50%">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
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
   <table width="100%" border="1" cellspacing="0" cellpadding="0" class="estilo3">
  <tr>
    <td><b>La revisión preventiva se limita a comprobar las condiciones actuales del vehículo las cuales son muy similares a una revisión tecnico mecánica, dichas condiciones podrían ser susceptibles a cambios durante la operación normal del vehículo, por tanto posterior a una revisión preventiva el vehículo podría no aprobar la revisión tecnico mecánica obligatoria.</b>
Estimado Cliente el CDA le da la bienvenida a nuestras instalaciones
Le Recomendamos:
-	El Cda no se hace responsable de los daños ocasionados en los vehículos durante la inspección ya que ninguna de las pruebas exceden las condiciones normales de operación y funcionamiento en las vías.
-	El Cda no se responsabiliza por objetos de valor dejados dentro del vehículo.
-	Una vez prestado el servicio de inspección  no se hará devolución del dinero por ningún motivo. 
-	El Cda no se hace responsable por vehículos que no sean retirados de nuestras instalaciones al terminar el horario laboral
-	Revise su vehículo antes de ser retirado de nuestras instalaciones, no se aceptan reclamos una vez haya salido del Centro de diagnóstico. 

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
