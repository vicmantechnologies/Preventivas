
<?php 

//-----------------consulta primaria---------------//
error_reporting(0);
//$fecha_con1 = "2017-12-01";
//$fecha_con2 = "2017-12-01";
//$empresa = "1";
//$empresa_prueba = "TAX EXPRESS S.A";


require("conexion.php");

//consulta de rango
$empresa=mysql_query("select nombre from clientes where id_cliente ='".$empresa."'");
$row_emp=mysql_fetch_array($empresa);

$ruta ='pdf/'.$row_emp['nombre'];
	if(!file_exists($ruta))
	{
		mkdir ($ruta);
		//echo 'Se ha creado el directorio: ' . $ruta;
	} 
	else 
	{
		//echo 'la ruta: ' . $ruta . ' ya existe ';
	}
$cant_pdf = 0;
$query_rango="Select * from revisiones WHERE fecha between '".$fecha_con1."' and '".$fecha_con2."' and empresa = '".$row_emp['nombre']."' and finalizado=1 order by id_rev asc";
//$query_rango="Select * from revisiones WHERE fecha between '".$fecha_con1."' and '".$fecha_con2."' and empresa = '".$empresa_prueba."' and finalizado=1 order by id_rev asc";
$result_convenios=mysql_query($query_rango);
while ($row_convenios=mysql_fetch_array($result_convenios))
{
	$cant_pdf = $cant_pdf +1;
	if(!file_exists($ruta."/".$row_convenios['placa'].".pdf"))
	{
		$texto = "";
//echo "*******".$row_convenios["placa"]."<br>";
	//consulta principal
//$informacion=mysql_query("select * from revisiones where placa like '".$row_convenios['placa']."' order by id_rev desc limit 1");
//$row_convenios=mysql_fetch_array($informacion);

$pista=mysql_query("select * from resultados_pista where id_rel_rev = '".$row_convenios['id_rev']."'");
$row_pista=mysql_fetch_array($pista);

$datos_vehiculo=mysql_query("select * from info_vehiculos where placa like '".$row_convenios['placa']."' limit 1");
$row_vehiculo=mysql_fetch_array($datos_vehiculo);
				
if($row_convenios["sede"]==1)
{ $imagen ='<img src="imagenes/distrital.jpg" width="120" height="45" />';}
elseif($row_convenios['sede']==4 or $row_convenios['sede']==9)
{ $imagen = '<img src="imagenes/previtax.jpg" width="120" height="64" />';}
else
{ $imagen = '<img src="imagenes/Previcar.jpg" width="120" height="64" />';}
				
if($row_convenios['sede']==1)
{ $direccion= '900099168-9<br />Av Calle 19 N 36 - 28<br />
  Bogotá';}
elseif($row_convenios['sede']==4)
{ $direccion= '900111946-3<br />Calle 12 B No.44 - 06/08<br />
  Bogotá';}
elseif($row_convenios['sede']==9)
{ $direccion= '900111946-3<br />Calle 12 B No.44 - 06/08<br />
  Bogotá';}
else
{ $direccion= '900094539-5<br />Carrera 14 B n 119-95<br />
  Bogotá';}
  //------------------------tipo vehiculo--------------------//
  $tipo_veh = "";
  if($row_vehiculo['servicio'] == 1)
		{ $tipo_veh = "PUBLICO";}
		elseif($row_vehiculo['servicio'] == 2)
		{ $tipo_veh = "PARTICULAR";}
		else
		{$tipo_veh = "ESPECIAL";}
  //-----------------------fin tipo vehiculo------------------------//
  //-------------------------clase vehiculo--------------///
  $clase_veh="";
  if($row_vehiculo['clase'] == 1)
		{ $clase_veh = "AUTOMOVIL";}
		elseif($row_vehiculo['clase'] == 2)
		{ $clase_veh = "BUS";}
		elseif($row_vehiculo['clase'] == 3)
		{ $clase_veh = "BUSETA";}
		elseif($row_vehiculo['clase'] == 4)
		{ $clase_veh = "CAMIONETA";}
		elseif($row_vehiculo['clase'] == 5)
		{ $clase_veh = "CAMPERO";}
		else
		{$clase_veh = "MICROBUS";}
  //-----------------------fin clase vehiculo---------//
  //-------------------------combustible-----------------//
  $combustible = "";
		if($row_vehiculo['combustible'] == 1)
		{ $combustible = "GASOLINA";}
		elseif($row_vehiculo['combustible'] == 2)
		{ $combustible = "GAS-GASOLINA";}
		elseif($row_vehiculo['combustible'] == 3)
		{ $combustible = "DIESEL";}
		else
		{$combustible = "ELECTRICO";}
  //---------------------fin combustible--------------------//
//-------------------------------eficacia total----------------------------//
$total_fuerzas=$row_pista['fi1']+$row_pista['fd1']+$row_pista['fi2']+$row_pista['fd2'];
		$total_pesos=(($row_pista['pi1']+$row_pista['pd1']+$row_pista['pi2']+$row_pista['pd2'])*(9.81));
		$eficacia_total=($total_fuerzas/$total_pesos)*100;
		if($eficacia_total>=100)
		{
			$eficacia_total= "99.9";
		}
		else
		{
			$eficacia_total= round($eficacia_total,1);
		}
//--------------------------fin eficacia total-------------------------//		
//-------------------desequilibrio---------------------//
if($row_pista['fi1']>$row_pista['fd1'])
		{
			$desequilibrio1=($row_pista['fi1']-$row_pista['fd1'])/$row_pista['fi1'];
			$desequilibrio1= round($desequilibrio1*100,1);
		}
			else
		{
			$desequilibrio1=($row_pista['fd1']-$row_pista['fi1'])/$row_pista['fd1'];
			$desequilibrio1 = round($desequilibrio1*100,1);
		}
//------------------fin desequilbrio---------------//
//----------------------desequilibrio2-------------//
if($row_pista['fi2']>$row_pista['fd2'])
		{
			$desequilibrio2=($row_pista['fi2']-$row_pista['fd2'])/$row_pista['fi2'];
			$desequilibrio2 = round($desequilibrio2*100,1);
		}
			else
		{
			$desequilibrio2=($row_pista['fd2']-$row_pista['fi2'])/$row_pista['fd2'];
			$desequilibrio2 = round($desequilibrio2*100,1);
		}
//-------------------findesequilibrio2-----------------//
//----------eficiencia auxiliar---------------------//
$eficiencia_auxiliar=($row_pista['fauxi']+$row_pista['fauxd'])/$total_pesos;
$eficiencia_auxiliar = round($eficiencia_auxiliar*100,1);
//------ fin eficiencia auxiliar----------------//
//---------------cod defectos---------------------//
//error_reporting(0);
	$count = 0;
	$cod_defectos = "";
	$defectos=$row_convenios['array_defectos'].''.$row_convenios['array_defectos2'].''.$row_convenios['array_defectos3'].''.$row_convenios['array_defectos4'].''.$row_convenios['array_defectos5'].''.$row_convenios['array_defectos6'];

	$piezas = explode(" ",trim($defectos) );
  	$count = count($piezas);
	for ($j = 0; $j < $count; $j++) 
	{
		$cod_defectos .= $piezas[$j].'<br>';
	}
//---------fin codigo defectos---------------------------//
//------------texto defectos------------------//
$text_defectos = "";
for ($j = 0; $j < $count; $j++) 
{
		$query_Recordset2 = mysql_query("SELECT * FROM defectos WHERE defectos.iddefecto= '".$piezas[$j]."'");
		//$Recordset2 = mysql_query($query_Recordset2, $txmedellin) or die(mysql_error());
		$row_Recordset2 = mysql_fetch_assoc($query_Recordset2);
		
		 $text_defectos .= utf8_encode($row_Recordset2['text_defecto']).'<br>';
}
//----------------fin texto defectos----------//
//--------------------categoria defecto-------//
$categoria_defecto = "";
for ($j = 0; $j < $count; $j++) 
{
		$query_Recordset2 = mysql_query("SELECT * FROM defectos WHERE defectos.iddefecto= '".$piezas[$j]."'");
		//$Recordset2 = mysql_query($query_Recordset2, $txmedellin) or die(mysql_error());
		$row_Recordset2 = mysql_fetch_assoc($query_Recordset2);
		
	if($row_Recordset2['tipo_defecto']=="A" or $row_Recordset2['tipo_defecto']=="B" or $row_Recordset2['tipo_defecto']=="C")
	{$categoria_defect = "MOTOR, CAJA, TRANSMISION <br>";}
	elseif( $row_Recordset2['tipo_defecto']=="F")
	{$categoria_defect = "SUSPENCIÓN Y DIRECCIÓN <br>";}
	elseif( $row_Recordset2['tipo_defecto']=="D" or $row_Recordset2['tipo_defecto']=="E")
	{$categoria_defect = "CARROCERIA Y CABINA <br>";}
	elseif( $row_Recordset2['tipo_defecto']=="G" or $row_Recordset2['tipo_defecto']=="I")
	{$categoria_defect = "FRENOS Y LUCES <br>";}
	elseif( $row_Recordset2['tipo_defecto']=="H")
	{$categoria_defect = "EQUIPO DE CARRETERA <br>";}
	elseif( $row_Recordset2['tipo_defecto']=="J")
	{$categoria_defect = "EMISIONES <br>";}
	elseif( $row_Recordset2['tipo_defecto']=="K")
	{$categoria_defect = "EMISIONES <br>";}
	else
	{ $categoria_defect = "";}
}//FIN FOR
//------------fin categoria texto------------//
//---------contador defectos----------------//
$cont_tipo_b = 0;
$cont_tipo_a = 0;
$def_tipo = "";
for ($j = 0; $j < $count; $j++) 
{
		$query_def = mysql_query("SELECT * FROM defectos WHERE defectos.iddefecto= '".$piezas[$j]."'");
		//$Recordset2 = mysql_query($query_Recordset2, $txmedellin) or die(mysql_error());
		$row_def = mysql_fetch_assoc($query_def);
		
		$def_tipo .= utf8_encode($row_def['defecto_tipo']).'<br>';
		if($row_def['defecto_tipo'] == "B")
		{
			$cont_tipo_b++;
		}
		elseif($row_def['defecto_tipo'] == "A")
		{
			$cont_tipo_a++;
		}
	
}//FIN FOR
//-------fin contador defectos--------------//
//---------------resultado---------------------//
$resultado = "";
if($cont_tipo_b>=5)
{ 
$resultado = "RECHAZADO";
}
elseif($cont_tipo_a>=1)
{
	$resultado = "RECHAZADO";
}
else
{
	$resultado = "APROBADO";
}
//-------------fin resultado-------------------//
//-------------nombre inspector------------------//

$nombre_user= mysql_query("SELECT nombres,apellidos FROM usuarios WHERE id_usuario = '".$row_convenios['inspector']."'");//hago la consulta a la base de datos para traer las ciudad de la empresa del usuario
$result_user=mysql_fetch_array($nombre_user);
$nom_inspector = $result_user['nombres'].'   '.$result_user['apellidos'];
//--------------fin nombre inspector----------------\\
//-----------------------foto-------------//
if($row_convenios['archivo']=="")
{
	$foto ='<img src="fotos/blanco.jpg" width="420" height="240" />';
}
else
{
	$foto ='<img src="'.$row_convenios['archivo'].'" width="420" height="240" />';
}


//-----------------fin foto-------------------//


$texto .="

<div style='width:100%;margin:auto;'>
	<table style='width:100%;border-collapse:collapse'>
        <tr>
            <td style='text-align:left;valign:middle;width:100%;'><p style='font-size:10px;'><b>FORMATO DE RESULTADOS DE LA REVISION PREVENTIVA</b></p></td>
        </tr>
    </table>
	<table style='width:100%;border-collapse:collapse'>
        <tr>
            <td style='text-align:left;valign:middle;width:60%;'><p style='font-size:12px;'><b>FORMATO DE PREVENTIVA No.".$row_convenios['id_rev']."</b></p></td>
			<td style='width:20%;'>".$imagen."</td>
            <td style='width:20%;'>".$direccion."</td>
        </tr>
    </table>
	<table style='width:100%;border-collapse:collapse'>
        
		<tr>
	        <td style='width:100%;text-align:left;'>
	        	<p style='font-size:10px;'><b>A. INFORMACION GENERAL</b></p>
	        </td>
	    </tr>
	    <tr>
	        <td style='width:100%;text-align:left;'>
	        	<p style='font-size:10px;'><b>1. FECHA &nbsp; &nbsp; &nbsp; 2.DATOS DEL PROPIETARIO O TENEDOR DEL VEHICULO</b></p>
	        </td>
	    </tr>
    </table>
	<table style='width:100%;border-collapse:collapse'>
		<tr>
			<td style='width:20%;text-align:left;valing:top;border:2px solid;border-color:black;'>
				<p style='font-size:10px;'><b>Fecha de la Prueba</b><br>".$row_convenios['fecha']."</p>
			</td>
			<td style='width:20%;text-align:left;valing:top;border:2px solid;border-color:black;'>
				<p style='font-size:10px;'><b>Nombre o Razon Social</b><br>". $row_convenios['nombres']." ".$row_convenios['apellidos']."</p>
			</td>
			<td style='width:30%;text-align:left;valing:top;border:2px solid;border-color:black;'>
				<p style='font-size:10px;'><b>Documento</b><br>". $row_convenios['nombres']."</p>
			</td>
			<td style='width:30%;text-align:left;valing:top;border:2px solid;border-color:black;'>
				<p style='font-size:10px;'><b>No</b><br>".$row_convenios['apellidos']."</p>
			</td>
		</tr>
		<tr>
			<td style='border:2px solid;border-color:black;'>
				<p style='font-size:10px;'><b>Direccion</b></p>
			</td>
			<td style='border:2px solid;border-color:black;'>
				<p style='font-size:10px;'><b>Telefono</b></p>
			</td>
			<td style='border:2px solid;border-color:black;'>
				<p style='font-size:10px;'><b>Ciudad</b></p>
			</td>
			<td style='border:2px solid;border-color:black;'>
				<p style='font-size:10px;'><b>Departamento</b></p>
			</td>
		</tr>
	</table>
	<table style='width:100%;border-collapse:collapse'>
	    <tr>
	        <td style='width:100%;text-align:left;'>
	        	<p style='font-size:10px;'><b>3. DATOS DEL VEHICULO</b></p>
	        </td>
	    </tr>
	</table>
	<table style='width:100%;border-collapse:collapse'>
        <col style='width: 14%'>
        <col style='width: 14%'>
        <col style='width: 15%'>
        <col style='width: 15%'>
        <col style='width: 14%'>
        <col style='width: 14%'>
        <col style='width: 14%'>
        <thead>
            <tr>
                <th style='border-bottom:2px solid;border-color:black;'></th>
                <th style='border-bottom:2px solid;border-color:black;'></th>
                <th style='border-bottom:2px solid;border-color:black;'></th>
                <th style='border-bottom:2px solid;border-color:black;'></th>
                <th style='border-bottom:2px solid;border-color:black;'></th>
                <th style='border-bottom:2px solid;border-color:black;'></th>
                <th style='border-bottom:2px solid;border-color:black;'></th>
            </tr>
        </thead>
		<tr>
			<td style='text-align:left;valing:top;border:2px solid;border-color:black;'>
				<p style='font-size:10px;'><b>Placa</b><br>".$row_convenios['placa']."</p>
			</td>
			<td style='text-align:left;valing:top;border:2px solid;border-color:black;'>
				<p style='font-size:10px;'><b>Pais</b><br>Colombia</p>
			</td>
			<td style='text-align:left;valing:top;border:2px solid;border-color:black;'>
				<p style='font-size:10px;'><b>Servicio</b><br>".$tipo_veh."</p>
			</td>
			<td style='text-align:left;valing:top;border:2px solid;border-color:black;'>
				<p style='font-size:10px;'><b></b><br></p>
			</td>
			<td style='text-align:left;valing:top;border:2px solid;border-color:black;'>
				<p style='font-size:10px;'><b>Pais</b><br>COLOMBIA</p>
			</td>
			<td style='text-align:left;valing:top;border:2px solid;border-color:black;'>
				<p style='font-size:10px;'><b>Clase</b><br>".$clase_veh."</p>
			</td>
			<td style='text-align:left;valing:top;border:2px solid;border-color:black;'>
				<p style='font-size:10px;'><b>Marca</b><br>".$row_vehiculo['marca']."</p>
			</td>
		</tr>
		<tr>
			<td style='text-align:left;valing:top;border:2px solid;border-color:black;'>
				<p style='font-size:10px;'><b>Linea</b><br>".$row_vehiculo['linea']."</p>
			</td>
			<td style='text-align:left;valing:top;border:2px solid;border-color:black;'>
				<p style='font-size:10px;'><b>Modelo</b><br>".$row_vehiculo['modelo']."</p>
			</td>
			<td style='text-align:left;valing:top;border:2px solid;border-color:black;'>
				<p style='font-size:10px;'><b>Vencimiento SOAT</b><br>".$row_vehiculo['fin_soat']."</p>
			</td>
			<td style='text-align:left;valing:top;border:2px solid;border-color:black;'>
				<p style='font-size:10px;'><b>Vencimiento RTM</b><br>".$row_vehiculo['fin_rtm']."</p>
			</td>
			<td style='text-align:left;valing:top;border:2px solid;border-color:black;'>
				<p style='font-size:10px;'><b>Kilometraje</b><br>".$row_convenios['kilometraje']."</p>
			</td>
			<td style='text-align:left;valing:top;border:2px solid;border-color:black;'>
				<p style='font-size:10px;'><b>Combustible</b><br>".$combustible."</p>
			</td>
			<td style='text-align:left;valing:top;border:2px solid;border-color:black;'>
				<p style='font-size:10px;'><b>Empresa</b><br>".$row_convenios['empresa']."</p>
			</td>
		</tr>
	</table>
	<table style='width:100%;border-collapse:collapse'>
	    <tr>
	        <td style='width:100%;text-align:left;'>
	        	<p style='font-size:10px;'><b>7.SUSPENCION</b></p>
	        </td>
	    </tr>
	</table>
	<table style='width:100%;border-collapse:collapse;'>
        <col style='width: 20%'>
        <col style='width: 20%'>
        <col style='width: 20%'>
        <col style='width: 20%'>
        <col style='width: 20%'>
        <thead>
            <tr>
                <th style='border-bottom:2px solid;border-color:black;'></th>
                <th style='border-bottom:2px solid;border-color:black;'></th>

                <th style='border-bottom:2px solid;border-color:black;'></th>
                <th style='border-bottom:2px solid;border-color:black;'></th>
                <th style='border-bottom:2px solid;border-color:black;'></th>
            </tr>
        </thead>
        <tr>
            <td style='border:2px solid;border-color:black;'>
                <table style='width:100%;'>
					<tr>
						<td style='width:70%;text-align:center;valing:middle;'>
							<p style='font-size:10px;'><b>Delantera Izquierda</b></p>
						</td>
						<td style='width:30%;text-align:center;valing:middle;'>
							<p style='font-size:10px;'>Valor<br>".$row_pista['adhi1']."</p>
						</td>
					</tr>
                </table>
            </td>
            <td style='border:2px solid;border-color:black;'>
                <table style='width:100%;'>
					<tr>
						<td style='width:70%;text-align:center;valing:middle;'>
							<p style='font-size:10px;'><b>Delantera Derecha</b></p>
						</td>
						<td style='width:30%;text-align:center;valing:middle;'>
							<p style='font-size:10px;'>Valor<br>".$row_pista['adhd1']."</p>
						</td>
					</tr>
                </table>
            </td>
            <td style='border:2px solid;border-color:black;'>
                <table style='width:100%;'>
					<tr>
						<td style='width:70%;text-align:center;valing:middle;'>
							<p style='font-size:10px;'><b>Trasera Izquierda</b></p>
						</td>
						<td style='width:30%;text-align:center;valing:middle;'>
							<p style='font-size:10px;'>Valor<br>".$row_pista['adhi2']."</p>
						</td>
					</tr>
                </table>
            </td>
            <td style='border:2px solid;border-color:black;'>
                <table style='width:100%;'>
					<tr>
						<td style='width:70%;text-align:center;valing:middle;'>
							<p style='font-size:10px;'><b>Trasera Derecha</b></p>
						</td>
						<td style='width:30%;text-align:center;valing:middle;'>
							<p style='font-size:10px;'>Valor<br>".$row_pista['adhd2']."</p>
						</td>
					</tr>
                </table>
            </td>
            <td style='border:2px solid;border-color:black;'>
                <table style='width:100%;'>
			    	<tr>
			        	<td style='width:100%;text-align:center;valing:middle;'>
			        		<p style='font-size:10px;'><b>Minimo</b> &gt;=40 <b>Unidad</b> %</p>
			        	</td>
		        	</tr>
                </table>
            </td>
        </tr>
    </table>
	<table style='width:100%;border-collapse:collapse'>
	    <tr>
	        <td style='width:100%;text-align:left;'>
	        	<p style='font-size:10px;'><b>8.FRENOS</b></p>
	        </td>
	    </tr>
	</table>
	<table style='width:100%;border-collapse:collapse;'>
        <col style='width: 23%'>
        <col style='width: 27%'>
        <col style='width: 27%'>
        <col style='width: 23%'>
        <thead>
            <tr>
                <th style='border-bottom:2px solid;border-color:black;'></th>
                <th style='border-bottom:2px solid;border-color:black;'></th>
                <th style='border-bottom:2px solid;border-color:black;'></th>
                <th style='border-bottom:2px solid;border-color:black;'></th>
            </tr>
        </thead>
        <tr>
            <td rowspan='3' style='border:2px solid;border-color:black;'>
                <table style='width:100%;'>
					<tr>
						<td style='width:38%;'><p style='font-size:10px'>Eficacia Total</p></td>
						<td style='width:31%;'><p style='font-size:10px'>Minimo</p></td>
						<td style='width:31%;'><p style='font-size:10px'>Unidad</p></td>
					</tr>
					<tr>
				        <td style='width:38%;'><p style='font-size:10px'>".$eficacia_total."</p></td>
				        <td style='width:31%;'><p style='font-size:10px'>&gt;=50</p></td>
				        <td style='width:31%;'><p style='font-size:10px'>%</p></td>
					</tr>
                </table>
            </td>
            <td style='border:2px solid;border-color:black;'>
                <table style='width:100%;'>
					<tr>
						<td style='width:36%;'><p style='font-size:10px'></p></td>
						<td style='width:22%;'><p style='font-size:10px'>Fuerza</p></td>
						<td style='width:20%;'><p style='font-size:10px'>Peso</p></td>
						<td style='width:22%;'><p style='font-size:10px'>Unidad</p></td>
					</tr>
                </table>
            </td>
            <td style='border:2px solid;border-color:black;'>
                <table style='width:100%;'>
					<tr>
						<td style='width:36%;'><p style='font-size:10px'></p></td>
						<td style='width:22%;'><p style='font-size:10px'>Fuerza</p></td>
						<td style='width:20%;'><p style='font-size:10px'>Peso</p></td>
						<td style='width:22%;'><p style='font-size:10px'>Unidad</p></td>
					</tr>
                </table>
            </td>
            <td style='border:2px solid;border-color:black;'>
                <table style='width:100%;'>
					<tr>
						<td style='width:38%;'><p style='font-size:10px'>Desequilibrio</p></td>
						<td style='width:31%;'><p style='font-size:10px'>Maximo</p></td>
						<td style='width:31%;'><p style='font-size:10px'>Unidad</p></td>
					</tr>
                </table>
            </td>
        </tr>
        <tr>
            <td style='border:2px solid;border-color:black;'>
                <table style='width:100%;'>
					<tr>
						<td style='width:36%;'><p style='font-size:10px'>Eje 1 Izquierdo</p></td>
						<td style='width:22%;'><p style='font-size:10px'>".$row_pista['fi1']."</p></td>
						<td style='width:20%;'><p style='font-size:10px'>".round(($row_pista['pi1']*9.81),0)."</p></td>
						<td style='width:22%;'><p style='font-size:10px'>N</p></td>
					</tr>
                </table>
            </td>
            <td style='border:2px solid;border-color:black;'>
                <table style='width:100%;'>
					<tr>
						<td style='width:36%;'><p style='font-size:10px'>Eje 1 Derecho</p></td>
						<td style='width:22%;'><p style='font-size:10px'>".$row_pista['fd1']."</p></td>
						<td style='width:20%;'><p style='font-size:10px'>".round(($row_pista['pd1']*9.81),0)."</p></td>
						<td style='width:22%;'><p style='font-size:10px'>N</p></td>
					</tr>
                </table>
            </td>
            <td style='border:2px solid;border-color:black;'>
                <table style='width:100%;'>
					<tr>
						<td style='width:38%;'><p style='font-size:10px'>".$desequilibrio1."</p></td>
						<td style='width:31%;'><p style='font-size:10px'>&lt;= 30</p></td>
						<td style='width:31%;'><p style='font-size:10px'>%</p></td>
					</tr>
                </table>
            </td>
        </tr>
        <tr>
            <td style='border:2px solid;border-color:black;'>
                <table style='width:100%;'>
					<tr>
						<td style='width:36%;'><p style='font-size:10px'>Eje 2 Izquierdo</p></td>
						<td style='width:22%;'><p style='font-size:10px'>".$row_pista['fi2']."</p></td>
						<td style='width:20%;'><p style='font-size:10px'>".round(($row_pista['pi2']*9.81),0)."</p></td>
						<td style='width:22%;'><p style='font-size:10px'>N</p></td>
					</tr>
                </table>
            </td>
            <td style='border:2px solid;border-color:black;'>
                <table style='width:100%;'>
					<tr>
						<td style='width:36%;'><p style='font-size:10px'>Eje 2 Derecho</p></td>
						<td style='width:22%;'><p style='font-size:10px'>".$row_pista['fd2']."</p></td>
						<td style='width:20%;'><p style='font-size:10px'>".round(($row_pista['pd2']*9.81),0)."</p></td>
						<td style='width:22%;'><p style='font-size:10px'>N</p></td>
					</tr>
                </table>
            </td>
            <td style='border:2px solid;border-color:black;'>
                <table style='width:100%;'>
					<tr>
						<td style='width:38%;'><p style='font-size:10px'>".$desequilibrio2."</p></td>
						<td style='width:31%;'><p style='font-size:10px'>&lt;= 30</p></td>
						<td style='width:31%;'><p style='font-size:10px'>%</p></td>
					</tr>
                </table>
            </td>
        </tr>
        <tr>
            <td rowspan='3' style='border:2px solid;border-color:black;'>
                <table style='width:100%;'>
					<tr>
						<td style='width:38%;'><p style='font-size:10px'>Eficacia Aux</p></td>
						<td style='width:31%;'><p style='font-size:10px'>Minimo</p></td>
						<td style='width:31%;'><p style='font-size:10px'>Unidad</p></td>
					</tr>
					<tr>
						<td style='width:38%;'><p style='font-size:10px'>".$eficiencia_auxiliar."</p></td>
				        <td style='width:31%;'><p style='font-size:10px'>&gt;=18</p></td>
				        <td style='width:31%;'><p style='font-size:10px'>%</p></td>
					</tr>
                </table>
            </td>
            <td style='border:2px solid;border-color:black;'>
                <table style='width:100%;'>
					<tr>
						<td style='width:36%;'><p style='font-size:10px'>Eje 3 Izquierdo</p></td>
						<td style='width:22%;'><p style='font-size:10px'>".$row_pista['fi3']."</p></td>
						<td style='width:20%;'><p style='font-size:10px'>".round(($row_pista['pi3']*9.81),0)."</p></td>
						<td style='width:22%;'><p style='font-size:10px'>N</p></td>
					</tr>
                </table>
            </td>
            <td style='border:2px solid;border-color:black;'>
                <table style='width:100%;'>
					<tr>
						<td style='width:36%;'><p style='font-size:10px'>Eje 3 Derecho</p></td>
						<td style='width:22%;'><p style='font-size:10px'>".$row_pista['fd3']."</p></td>
						<td style='width:20%;'><p style='font-size:10px'>".round(($row_pista['pd3']*9.81),0)."</p></td>
						<td style='width:22%;'><p style='font-size:10px'>N</p></td>
					</tr>
                </table>
            </td>
            <td style='border:2px solid;border-color:black;'>
                <table style='width:100%;'>
					<tr>
						<td style='width:38%;'><p style='font-size:10px'></p></td>
						<td style='width:31%;'><p style='font-size:10px'>&lt;= 30</p></td>
						<td style='width:31%;'><p style='font-size:10px'>%</p></td>
					</tr>
                </table>
            </td>
        </tr>
        <tr>
            <td style='border:2px solid;border-color:black;'>
                <table style='width:100%;'>
					<tr>
						<td style='width:36%;'><p style='font-size:10px'>Eje 4 Izquierdo</p></td>
						<td style='width:22%;'><p style='font-size:10px'>".$row_pista['fi4']."</p></td>
						<td style='width:20%;'><p style='font-size:10px'>".round(($row_pista['pi4']*9.81),0)."</p></td>
						<td style='width:22%;'><p style='font-size:10px'>N</p></td>
					</tr>
                </table>
            </td>
            <td style='border:2px solid;border-color:black;'>
                <table style='width:100%;'>
					<tr>
						<td style='width:36%;'><p style='font-size:10px'>Eje 4 Derecho</p></td>
						<td style='width:22%;'><p style='font-size:10px'>".$row_pista['fd4']."</p></td>
						<td style='width:20%;'><p style='font-size:10px'>".round(($row_pista['pd4']*9.81),0)."</p></td>
						<td style='width:22%;'><p style='font-size:10px'>N</p></td>
					</tr>
                </table>
            </td>
            <td style='border:2px solid;border-color:black;'>
                <table style='width:100%;'>
					<tr>
						<td style='width:38%;'><p style='font-size:10px'></p></td>
						<td style='width:31%;'><p style='font-size:10px'>&lt;= 30</p></td>
						<td style='width:31%;'><p style='font-size:10px'>%</p></td>
					</tr>
                </table>
            </td>
        </tr>
        <tr>
            <td style='border:2px solid;border-color:black;'>
                <table style='width:100%;'>
					<tr>
						<td style='width:36%;'><p style='font-size:10px'>Eje 5 Izquierdo</p></td>
						<td style='width:22%;'><p style='font-size:10px'></p></td>
						<td style='width:20%;'><p style='font-size:10px'></p></td>
						<td style='width:22%;'><p style='font-size:10px'>N</p></td>
					</tr>
                </table>
            </td>
            <td style='border:2px solid;border-color:black;'>
                <table style='width:100%;'>
					<tr>
						<td style='width:36%;'><p style='font-size:10px'>Eje 5 Derecho</p></td>
						<td style='width:22%;'><p style='font-size:10px'></p></td>
						<td style='width:20%;'><p style='font-size:10px'></p></td>
						<td style='width:22%;'><p style='font-size:10px'>N</p></td>
					</tr>
                </table>
            </td>
            <td style='border:2px solid;border-color:black;'>
                <table style='width:100%;'>
					<tr>
						<td style='width:38%;'><p style='font-size:10px'></p></td>
						<td style='width:31%;'><p style='font-size:10px'>&lt;=30</p></td>
						<td style='width:31%;'><p style='font-size:10px'>%</p></td>
					</tr>
                </table>
            </td>
        </tr>
    </table>
	<table style='width:100%;border-collapse:collapse'>
	    <tr>
	        <td style='width:100%;text-align:left;'>
	        	<p style='font-size:10px;'><b>9.DESVIACION LATERAL</b></p>
	        </td>
	    </tr>
	</table>
	<table style='width:100%;border-collapse:collapse;'>
        <col style='width: 15%'>
        <col style='width: 15%'>
        <col style='width: 15%'>
        <col style='width: 15%'>
        <col style='width: 15%'>
        <col style='width: 25%'>
        <thead>
            <tr>
                <th style='border-bottom:2px solid;border-color:black;'></th>
                <th style='border-bottom:2px solid;border-color:black;'></th>
                <th style='border-bottom:2px solid;border-color:black;'></th>
                <th style='border-bottom:2px solid;border-color:black;'></th>
                <th style='border-bottom:2px solid;border-color:black;'></th>
                <th style='border-bottom:2px solid;border-color:black;'></th>
            </tr>
        </thead>
		<tr>
			<td style='border:2px solid;border-color:black;'>
				<table width='100%'>
					<tr>
						<td><p style='font-size:10px'>Eje 1</p></td>
					</tr>
				</table>
			</td>
			<td style='border:2px solid;border-color:black;'>
				<table width='100%'>
					<tr>
						<td><p style='font-size:10px'>Eje 2</p></td>
					</tr>
				</table>
			</td>
			<td style='border:2px solid;border-color:black;'>
				<table width='100%'>
					<tr>
						<td><p style='font-size:10px'>Eje 3</p></td>
					</tr>
				</table>
			</td>
			<td style='border:2px solid;border-color:black;'>
				<table width='100%'>
					<tr>
						<td><p style='font-size:10px'>Eje 4</p></td>
					</tr>
				</table>
			</td>
			<td style='border:2px solid;border-color:black;'>
				<table width='100%'>
					<tr>
						<td><p style='font-size:10px'>Eje 5</p></td>
					</tr>
				</table>
			</td>
			<td style='border:2px solid;border-color:black;'>
				<table width='100%'>
					<tr>
						<td><p style='font-size:10px'>Maximo 10 Unidad m/Km</p></td>
					</tr>
				</table>
			</td>
		</tr>
	</table>

	<table style='width:100%;border-collapse:collapse'>
	    <tr>
	        <td style='width:100%;text-align:left;'>
	        	<p style='font-size:10px;'><b>D. DEFECTOS ENCONTRADOS EN LA INSPECCION VISUAL DE ACUERDO CON LOS METODOS Y CRITERIOS DE LA NTC5375</b></p>
	        </td>
	    </tr>
	</table>

	<table style='width:100%;border-collapse:collapse;'>
        <col style='width: 10%'>
        <col style='width: 45%'>
        <col style='width: 25%'>
        <col style='width: 20%'>
        <thead>
            <tr>
                <th style='border-bottom:2px solid;border-color:black;'></th>
                <th style='border-bottom:2px solid;border-color:black;'></th>
                <th style='border-bottom:2px solid;border-color:black;'></th>
                <th style='border-bottom:2px solid;border-color:black;'></th>
            </tr>
        </thead>
		<tr>
		    <td style='border:2px solid;border-color:black;'>Código</td>
		    <td style='border:2px solid;border-color:black;'>Descripción</td>
		    <td style='border:2px solid;border-color:black;'>Grupo</td>
		    <td style='border:2px solid;border-color:black;'>Tipo de Defecto</td>
		</tr>
		<tr>
		    <td style='border:2px solid;border-color:black;'>".$cod_defectos."</td>
		    <td style='border:2px solid;border-color:black;'>".$text_defectos."</td>
		    <td style='border:2px solid;border-color:black;'>".$categoria_defecto."</td>
		    <td style='border:2px solid;border-color:black;'>".$def_tipo."</td>
		</tr>
	</table>

	<table style='width:100%;border-collapse:collapse'>
	    <tr>
	        <td style='width:100%;text-align:left;'>
	        	<p style='font-size:10px;'>Defectos tipo A: Son aquellos defectos graves que implican un peligro inmimente para la seguridad del vehículo, la de otros vehículos, la de sus ocupantes, la de los demas usuarios de la via pública o al ambiente</p>
	        </td>
	    </tr>
	</table>

	<table style='width:100%;border-collapse:collapse'>
	    <tr>
	        <td style='width:100%;text-align:left;'>
	        	<p style='font-size:10px;'>Defectos tipo B: Son aquellos defectos que implican u peligro potencial para la seguridad del vehículo, la de otros vehículos, de sus ocupantes, la de los demás usuarios de la vía públia</p>
	        </td>
	    </tr>
	</table>

	<table style='width:100%;border-collapse:collapse'>
	    <tr>
	        <td style='width:100%;text-align:left;'>
	        	<p style='font-size:10px;'><b>E. RESULTADO INSPECCION PREVENTIVA</b></p>
	        </td>
	    </tr>
	</table>

	<table style='width:100%;border-collapse:collapse;'>
        <col style='width: 60%'>
        <col style='width: 40%'>
        <thead>
            <tr>
                <th style='border-bottom:2px solid;border-color:black;'></th>
                <th style='border-bottom:2px solid;border-color:black;'></th>
            </tr>
        </thead>
		<tr>
			<td style='border:2px solid;border-color:black;'>
				Resultado: <B>".$resultado."</B>
			</td>
			<td style='border:2px solid;border-color:black;'>
				No Consecutivo : ".$row_convenios['id_rev']."
			</td>
		</tr>
	</table>

	<table style='width:100%;border-collapse:collapse'>
	    <tr>
	        <td style='width:100%;text-align:left;'>
	        	<p style='font-size:10px;'><b>NOMBRE DEL INSPECTOR: </b>".$nom_inspector."</p>
	        </td>
	    </tr>
	</table>
	<table style='width:100%;border-collapse:collapse'>
	    <tr>
	        <td style='width:100%;text-align:left;'>
	        	<p style='font-size:10px;'><b>F. COMENTARIOS Y OBSERVACIONES ADICIONALES: ".$row_convenios['observaciones']."</b></p>
	        </td>
	    </tr>
	</table>
	<table style='width:100%;border-collapse:collapse;'>
        <col style='width: 60%'>
        <col style='width: 40%'>
        <thead>
            <tr>
                <th style='border-bottom:2px solid;border-color:black;'></th>
                <th style='border-bottom:2px solid;border-color:black;'></th>
            </tr>
        </thead>
		<tr>
			<td style='border:2px solid;border-color:black;'>".$foto."</td>
			<td style='border:2px solid;border-color:black;'>
				<table width='100%'>
					<tr>
						<td style='height:200px;width:100%;'></td>
					</tr>
					<tr>
						<td style='width:100%;text-align:center;'>________________________</td>
					</tr>
					<tr>
						<td style='width:100%;text-align:center;'>Firma Responsable Tecnico</td>
					</tr>
				</table>
		   	</td>
		</tr>
	  	<tr>
	    	<td colspan='2' style='border:2px solid;border-color:black;'>
	    	<b>La revisión preventiva se limita a comprobar las condiciones actuales del vehículo las cuales son muy similares a una revisión tecnico mecánica, dichas condiciones podrían ser susceptibles a cambios durante la operación normal del vehículo, por tanto posterior a una revisión preventiva el vehículo podría no aprobar la revisión tecnico mecánica obligatoria.</b>
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
</div>
";
$content ="<page>". $texto."</page>" ;

require_once("html2pdf/html2pdf.class.php");

$pdf = new HTML2PDF('P', 'Legal', 'en', true, 'UTF-8', array(5, 5, 5, 5));

$pdf->writeHTML($content);

//$pdf->pdf->IncludeJS('print(TRUE)');

//ob_end_clean();

//$pdf->output('placa'.$i.'.pdf', 'D');
//$pdf->output();
//$pdf->output('pdf/'.$empresa_prueba.'/'.$row_convenios['placa'].'.pdf', 'F');
$pdf->output('pdf/'.$row_emp['nombre'].'/'.$row_convenios['placa'].'.pdf', 'F');
	} 

}
//-------------------fin consulta primaria----------/
?>
<table width="100%" border="2" align="center" bgcolor="#CCCCCC" cellpadding="0" cellspacing="0" bordercolor="#000000">
<tr>
	<td style="font-size:26px;font-weight:bold" align="center">PROCESO CORRECTO.</td>
</tr>
<tr>
	<td style="font-size:26px;font-weight:bold" align="center">SE GENERARON <?PHP echo $cant_pdf." "?> PDF's.</td>
</tr>
<tr>
	<td style="font-size:26px;font-weight:bold" align="center"> CERRAR LA VENTANA...</td>
</tr>
<tr>
	<td align="center"><input name="button" type="button" onclick="window.close();" value="Cerrar esta ventana" /> </td>
</tr>
</table>
<!--<script>windows.close();</script>-->