<?php
session_start();
error_reporting();
@ $db=mysql_pconnect("localhost:3306","root","123456");
if (!$db)
{echo " Critical Error: No se ha podido conectar a la bd. Por favor prueba de nuevo.";
exit;
}
else
{
mysql_select_db("holdingn_preventivas");
}
?>