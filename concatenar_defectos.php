<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>
<!--<body onLoad="setTimeout('window.close()',5000)">-->
<body>
<?php 
error_reporting(0);
//echo $CheckboxGroup1;

if ($_SERVER["REQUEST_METHOD"] == "POST") {  
    $numero=$_POST["CheckboxGroup1"];
    $count = count($numero);
    for ($i = 0; $i < $count; $i++) {
        //echo  $numero[$i];
		
    }
	 $total = implode(" ",$numero);
}
echo 'informacion registrada la ventana se cerrara en5 segundos';
echo $total;
 ?>
</body>
</html>