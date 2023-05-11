<?php
session_start();
error_reporting(0);

header("Content-Type: application/vnd.ms-excel");
header('Content-Type: text/html; charset=utf-8');
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("content-disposition: attachment;filename=ReporteRTM.xls");

?>
<HTML LANG="es">
<TITLE>::. VENCIMIENTO RTM .::</TITLE>
</head>
<body>

<TABLE BORDER=1 align="center" CELLPADDING=1 CELLSPACING=1>
<thead>
	<tr>
	<td colspan="10">INFORME REGISTROS DEL <?php echo $_POST['fecha_con1']; ?> AL <?php echo $_POST['fecha_con2']; ?></td>
</tr>
	<tr>
        <th>FECHA VENCIMIENTO</th>
        <th>PLACA</th>
        <th>MARCA</th>
        <th>LINEA</th>
        <th>MODELO</th>
        <th>EMPRESA</th>
        <th>NOM PROPIETARIO</th>
        <th>APE PROPIATARIO</th>
        <th>TELEFONO</th>
        <th>CORREO</th>
	</tr>
</thead>

<?PHP

require('./conexion/conexion.php');

$data=mysql_query("SELECT * FROM info_vehiculos where fin_rtm between '".$_POST['fecha_con1']."' AND '".$_POST['fecha_con2']."' order by fin_rtm ASC") or die(mysql_error());
			
					while( $row = mysql_fetch_array($data)) 
					{
						$data2=mysql_query("SELECT nombres,apellidos,empresa FROM revisiones where placa= '".$row['placa']."' order by id_rev DESC limit 1") or die(mysql_error());
						$row2 = mysql_fetch_array($data2);
					echo "<tr>
                      <td>".$row['fin_rtm']."</td>
                      <td>".$row['placa']."</td>
                      <td>".$row['marca']."</td>
					  <td>".$row['linea']."</td>
                      <td>".$row['modelo']."</td>
					  <td>".$row2['empresa']."</td>
					  <td>".$row2['nombres']."</td>
					  <td>".$row2['apellidos']."</td>
					  <td>".$row['tel_prop']."</td>
					  <td>".$row['correo']."</td>
                    </tr>";
					}
?>
</table>
</body>
</html>