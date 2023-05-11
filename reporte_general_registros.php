<?php
session_start();
require('conexion/conexion.php');
//include("webregistro.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Informe Punto</title>
</head>
<style>
.h2{
line-height: 10px;
}
</style>
<style>
H1.SaltoDePagina
{
PAGE-BREAK-BEFORE: always
}
</style>
<body>

<table border="1" width="100%" height="950" cellspacing="0"  bordercolor="#000000" cellpadding="4" >
    <tr>
      <td  valign="top" ><!--Coloco el cabezote en la parte superior-->
            <table border="1" width="100%" align="center"  cellspacing="0"  bordercolor="#000000" cellpadding="4" >
                <tr>
                	<td rowspan="3" width="24%">&nbsp;</td>
       	      <td rowspan="3" width="52%" align="center"><b><font face="Times New Roman, Times, serif">REPORTE  GENERAL REGISTROS</font></b></td>
               		<td width="24%">Código: </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                </tr>   
            </table>
            
        <table border="0" width="100%" id="table1" >
             
             <tr><td>&nbsp;</td></tr> 
              
          <tr>
                <td align="left" width="33%">FECHA (AA/MM/DD): <?php echo $fecha_con1;?> </td>
                <td align="left" width="33%">PUNTO: <?php 
				$generado_por=mysql_query("select usuarios.empresa,usuarios.nombres,ciudades.* from usuarios,ciudades where id_usuario like '".$_SESSION['k_username']."' and usuarios.empresa=ciudades.nom_cda");
$row_generado=mysql_fetch_array($generado_por);
//$consulta_sede=mysql_query("select * from sede where id like '".$row_generado['id_sede']."'");
//$row_sede=mysql_fetch_array($consulta_sede);


echo ''.$row_generado["empresa"];
$anulado=0;
				?> </td>
                <td align="left" width="34%">GENERADO POR: <?php 
//$row_generado=mysql_fetch_array($generado_por);
echo ' '.$row_generado["nombres"];
 ?></td>
          </tr>
              
              
       	  </table>
            <table border="0" width="100%" id="table1" >
              <tr>
                <td align="center">________________________________________________________________________________________________</td>
              </tr>
              <tr><td> <?php
			  //----------------hacemos consulta a tabla registros para traer la informacion-------------------//
$result= "select * from revisiones where fecha between '".$_GET['fecha_con1']."' and '".$_GET['fecha_con2']."' AND sede like '".$row_generado["id_ciudad"]."' order by id_REV asc";
$resultado=mysql_query($result);

 echo "<tr><table valign='top' align='center' cellpadding='3' cellspacing='0' width='100%' border = '1'> </tr>\n";//Dibujo abecera de tabla
	echo "<tr><td align='center'>No.</td><td align='center'>Factura CDA</td><td align='center'>No Preventiva</td><td align='center'>PLACA</td><td align='center'>FECHA</td><td align='center'>EMPRESA</td><td align='center'>NOMBRE CLIENTE</td><td align='center'>TIPO REVISION</td><td align='center'>USUARIO QUE REGISTRA</td></tr> \n";
 //ciclo paraa consultar e imprimir la tabala con registros
 
 
 while ($row = mysql_fetch_array($resultado))//consulta
{	
			$cantidades=$cantidades+1;
			error_reporting(0);// borra los errores y peligros he imprimo renglon por renglon las coincidencias con la busqueda

			if($row["estado"]=='ACTIVO')//miro si es aprovado o rechazado
			{
				$dinero=$row["valor_cobrar"]+$dinero;
			}
			elseif($row["estado"]=='INACTIVO')
			{
				$anulado=$row["valor_cobrar"]+$anulado;
			}
	//buscamos nombre del usuario
	$usuario_fact=mysql_query("select nombres,apellidos from usuarios where id_usuario like '".$row[usuario]."'");
$row_usuario_fact=mysql_fetch_array($usuario_fact);
//imprimimos info
			echo '<tr><td align="center">'.$cantidades.'</td><td align="center">'.$row["factura"].'</td><td align="center">'.$row["id_rev"].'</td><td align="center">'.$row["placa"].'</td><td align="center">'.$row["fecha"].'</td><td align="center">'.$row["empresa"].'</td><td align="center">'.$row["nombres"].'</td><td align="left">PREVENTIVA</td><td align="center">'.$row_usuario_fact["nombres"].'</td></tr>';

}//cierra el while

 echo "<script>window.print();</script>";
 ?> </td></tr>
              
        	</table>
<!--tabla con el valor total entregado y anulado
<br />
<table width="30%" border="1" cellspacing="0" bordercolor="#000000">
  <tr>
    <td align="center">ITEM</td>
    <td align="center">VALOR</td>
  </tr>
  <tr>
    <td>Total Recibido</td>
    <td align="right"><?php echo $cantidades*20000?></td>
  </tr>
  <tr>
    <td>Total Anulado</td>
    <td align="right"><?php echo $anulado?></td>
  </tr>
</table>

</table>--><!--tabla princiapla-->

</body>
</html>