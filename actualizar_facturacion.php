<?php
require("conexion/conexion.php");
	$result= "select * from revisiones where id_rev>0 ";

	$resultado=mysql_query($result);

 
 $fact=1;
 while ($row = mysql_fetch_array($resultado))//consulta
	{	
		mysql_query("UPDATE revisiones set id_fac='".$fact."',sede=9 where id_rev like '".$row["id_rev"]."' ");
		$fact = $fact+1;	
	}
?>
