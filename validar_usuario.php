<?php
session_start();
?>

<?php

//require_once("funciones.php");
//do_html_header("");

require("conexion.php");

$usuario = strtolower($_POST["usuario"]);//convierte toda a minuscula
$password = strtolower( $_POST["pass"]);

if($usuario!= "" && $password!= "")//miramos si usuario es diferente de vacio lo mismo password
{
	$sql = mysql_query('SELECT id_usuario,nivel_usuario, estado,usuario, password FROM usuarios WHERE usuario="'.$usuario.'"');//hago la consulta a la base de datos comparando el cmapo usuario
	if($f= mysql_fetch_array($sql))//si esta consulta es verdadera hacemos lo siguiente
	{
		if($f["password"] == $password and $f["estado"] == 'Activo')//se mira queel pasword digitado sea igual al password de la base de datos
		{
			$_SESSION["k_username"] = $f['id_usuario'];//creo seccion y le otorgo nombre al alias es decir busco en la base de datos el usuario que se registro y se lo paso al alias k_username
			echo '<p><center>Has sido logueado correctamente '.$_SESSION['k_username'].' ';
			
			if($f["nivel_usuario"]=='Administrador')
				{echo ' usted ingreso como administrador del sistema <p>';
				echo "<script language=\"javascript\">\n";
				echo 'window.location="administrador/principal_user.php"';
				echo "</script>";
				}
				
			else if ($f["nivel_usuario"]=='Operario')
				{echo ' usted ingreso como Operador del sistema <p>';
				echo "<script language=\"javascript\">\n";
				echo 'window.location="clientes/principal_cliente.php"';
				echo "</script>";
				}
				
			else if ($f["nivel_usuario"]=='Usuario')
				{echo ' usted ingreso como Usuario del sistema <p>';
				echo "<script language=\"javascript\">\n";
				echo 'window.location="principal_user.php"';
				echo "</script>";
				}
				
				else if ($f["nivel_usuario"]=='Inspector')
				{echo ' usted ingreso como Inspecor del sistema <p>';
				echo "<script language=\"javascript\">\n";
				echo 'window.location="inspector/principal_inspector.php"';
				echo "</script>";
				}
				
			echo '<a href="ingreso.html">Index</a></p>';
		}
		
		else
		{	echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";
			echo "<font color='#FFFFFF' size=4>".'Password incorrecto o usuario Inactivo en el Sistema';echo "<br>";
			echo "<font color='#FFFFFF' size=4>".'<a href="index.php">Click aqui para regresar </a></p>';
			echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";
		} 
	}
	
	else
	{
	echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";	
	echo"<font color='#FFFFFF' size=3>";
		echo 'Usuario no existente en la base de datos ';echo "<br>";
		echo '<a href="ingreso.php">Click aca para Regresar</a></p>';echo "<br>";echo "<br>";
	}

}
else
{echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";	echo "<br>";	
	echo"<font color='#FFFFFF' size=4>";
		echo 'No ha ingresado ningun dato intente nuevamente. ';echo "<br>";
		echo "<font color='#FFFFFF' size=4>".'<a href="ingreso.php">Click aqui para regresar </a></p>';
		echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";
		}
echo "<br>";echo "<br>";

?>