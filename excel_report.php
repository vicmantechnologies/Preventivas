<?php
session_start();//activa secion y pide conectividad entrre pagina y pagina

error_reporting(0);
//Exportar datos de php a Excel
header("Content-Type: application/vnd.ms-excel");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("content-disposition: attachment;filename=ReporteEmpresa_$empresa.xls");
?>
<HTML LANG="es">
<TITLE>::. REPORTE OTR .::</TITLE>
</head>
<body>

<TABLE BORDER=1 align="center" CELLPADDING=1 CELLSPACING=1>
<TR>
	<TD colspan="9">INFORME  COMPRENDIDO ENTRE EL <?php echo $fecha_con1; ?> AL <?php echo $fecha_con2; ?> EMPRESA <?php echo "".$empresa; ?> 	</TD>
</TR>


<TR>
	<TD  >FECHA</TD>
    <TD  >HORA</TD>
	<TD  >PLACA</TD>
    <TD  >NOMBRES</TD>
    <TD  >APELLIDOS</TD>
    <TD  >EMPRESA</TD>
    <TD  >CONDUCTOR</TD>
    <TD  >CELULAR</TD>
    <TD  >KILOMETRAJE</TD>
    
</TR>

<?php
require('conexion/conexion.php');
//consultamos primero en aprobados
	$result= "select fecha,hora,placa,nombres,apellidos,conductor,celular,kilometraje from revisiones where empresa='".$_POST['empresa']."' and fecha between '".$_POST['fecha_con1']."' and '".$_POST['fecha_con2']."' order by fecha asc";
	$resultado=mysql_query($result);
	
 while ($row = mysql_fetch_array($resultado))//consulta
{	
	



//imprimimos el renglon	
	echo '<tr><td align="center">'.$row["fecha"].'</td><td align="center">'.$row["hora"].'</td><td align="center">'.$row["placa"].'</td><td align="center">'.$row["nombres"].'</td><td align="center">'.$row["apellidos"].'</td><td align="center">'.$_POST['empresa'].'</td><td align="center">'.$row["conductor"].'</td><td align="center">'.$row["celular"].'</td><td align="center">'.$row["kilometraje"].'</td></tr>';
	
}

echo "<div align='center'><br>";

//echo 'El valor total anulado: $'.$valor_anulado.' pesos';
?>
</table>
<BR><BR></p></p>

</body>


</html>