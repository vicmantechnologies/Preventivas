<?php
//Exportar datos de php a Excel
header("Content-Type: application/vnd.ms-excel");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("content-disposition: attachment;filename=ReporteVencimientos.xls");
?>
<HTML LANG="es">
<TITLE>::. Exportacion de Datos .::</TITLE>
</head>
<body>

<TABLE BORDER=1 align="center" CELLPADDING=1 CELLSPACING=1>
<TR>
	<TD colspan="14">INFORME GENERAL VENCIMIENTOS DEL  <?php echo $_POST['fecha']; ?> AL <?php echo $_POST['fecha2']; ?>	</TD>
</TR>


<TR>
	<TD  >No. REVISION</TD>
    <TD  >FECHA PREVENTIVA</TD>
    <TD  >HORA PREVENTIVA</TD>
    <TD  >PLACA</TD>
    <TD  >NOMBRES</TD>
    <TD  >APELLIDOS</TD>
    <TD  >TEL PROPIETARIO</TD>
    <TD  >EMPRESA</TD>
    <TD  >CONDUCTOR</TD>
    <TD  >CELULAR</TD>
    <TD  >VENCIMIENTO SOAT</TD>
    <TD  >VENCIMIENTO RTM</TD>
</TR>

<?php
//require("conexion.php");
@ $db=mysql_pconnect("localhost","root","123456");
if (!$db)
{echo " Critical Error: No se ha podido conectar a la bd. Por favor prueba de nuevo.";
exit;
}
mysql_select_db("data_preventivas");
	$consulta=mysql_query("select * from revisiones,info_vehiculos where fecha between '".$_POST['fecha']."' and '".$_POST['fecha2']."' and revisiones.placa = info_vehiculos.placa and sede=9 order by fecha DESC");
	
 while ($row = mysql_fetch_array($consulta))//consulta
{	
	

	echo '<tr><td align="center">'.$row["id_rev"].'</td><td align="center">'.$row["fecha"].'</td><td align="center">'.$row["hora"].'</td><td align="center">'.$row["placa"].'</td><td align="center">'.$row["nombres"].'</td><td align="center">'.$row["apellidos"].'</td><td align="center">'.$row["tel_prop"].'</td><td align="center">'.$row["empresa"].'</td><td align="center">'.$row["conductor"].'</td><td align="center">'.$row["celular"].'</td><td align="center">'.$row["fin_soat"].'</td><td align="center">'.$row["fin_rtm"].'</td></tr>';
	
}

echo "<div align='center'><br>";
echo 'REPORTE VENCIMIENTOS PREVENTIVAS<br>';
mysql_close($db);
//echo 'El valor total anulado: $'.$valor_anulado.' pesos';
?>
</table>
<BR><BR></p></p>

</body>


</html>