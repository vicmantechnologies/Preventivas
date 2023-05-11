<?php
session_start();
require('conexion/conexion.php');
//include("webregistro.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
<?php

$resultado=mysql_query("select id_rev,empresa from revisiones");
 while ($row = mysql_fetch_array($resultado))//consulta
{
	$resultado2=mysql_query("select v_prev_t from clientes where  nombre = '".$row["empresa"]."'");
	$row2 = mysql_fetch_array($resultado2);
	mysql_query("update revisiones set valor = '".$row2["v_prev_t"]."' where id_rev = '".$row["id_rev"]."'");
}
?>

</body>
</html>