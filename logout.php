<?php
session_start();
// Borramos toda la sesion
session_destroy();
//echo 'Ha terminado la session <p><a href="index.php">index</a></p>';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Refresh" content="1;url=index.php">
<script language="javascript">setTimeout("self.close();",0)</script>
</head>
<body>
</body>
</html>
