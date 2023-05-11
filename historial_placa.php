<?php
session_start();
require_once("funciones.php");
cabecera($_SESSION['usuario']);
contenido();
?>
<style type="text/css">

        .mitabla table {
            font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
            font-size: 12px;
            margin: 45px;
            width: 960px;
            text-align: left;
            border-collapse: collapse;
        }

        .mitabla th {
            font-size: 12px;
            font-weight: bold;
            padding: 8px;
            background: #b9c9fe;
            border-top: 4px solid #aabcfe;
            border-bottom: 1px solid #fff;
            color: #039;
        }

        .mitabla td {
            padding: 8px;
            background: #e8edff;
            border-bottom: 1px solid #fff;
            color: #669;
            border-top: 1px solid transparent;
            font-size: 12px
        }

        .mitabla tr:hover td {
            background: #d0dafd;
            color: #339;
        }
    </style>


  <h1></h1>
<form name="nuevo_usuario" class="iform2" id="principal" method="POST">

  		  <p align="center" class="Estilo9">HISTORIAL DE PLACAS - SIPCO</p>
<!--Esta tabla hace el maco exterio por eso el border esta en 2 se crea tabla de 2filas y 1 sola columna--><p align="center"><font color="green" size="2"> </font></p>
<BR />

<table border="0" cellpadding="0" cellspacing="0" width="75%" bordercolorlight="#CCCCCC" bordercolordark="#FFFFFF" bgcolor="#FDFBFF"align="center" class="Estilo5">
           <tr>
           		<td>BUSCAR INFORMACIÓN DE CLIENTES</td>
           </tr>
           <tr>
           		<td>
                
                <table width="70%" border="0"  class="Estilo6" align="center" >
   
  <BR>

      <tr>
    <td>Placa</td>
    <td>
      <input type="text" class="itext2" name="placa_consulta" id="placa_consulta"  size="20" onKeyUp="this.value=this.value.toUpperCase()"  />
      <input type="hidden" name="id_usuario" value="<?php echo $nombreuser["id_usuario"] ?>" readonly/></td>
    </tr>
</table>
</td>
</tr>
</table>
  
  <p align="center">
  <input name="enviar" type="submit" class="ibutton2" id="enviar" value="Buscar" />
      <input name="action" type="hidden" value="upload" />
    <input type='button' class="ibutton2" value='Salir' name='cerrar' onClick="(location='principal_user.php');" >
  </p>
  
  <!--/*resultado del la consulta*/-->
  <?php 
  if ($_POST["action"] == "upload") 
  {
	
	$informacion=mysql_query("select * from revisiones where placa like '".$_POST["placa_consulta"]."' order by id_rev desc ");
	$resultados=mysql_num_rows($informacion);
	if($resultados==0)
	{
		echo '<div align="center">EL VEHÍCULO NO REGISTRA REVISIONES PREVENTIVAS</div>';
	}
	else
	{
		
        echo "<table class='mitabla' valign='top' align='center' cellpadding='2' cellspacing='0' width='100%' border = '1'>";//Dibujo abecera de tabla
        echo "<tr><th align='center'>FEHA</th><th align='center'>PLACA</th><th align='center'>EMPRESA</th><th align='center'>PROPIETARIO</th><th align='center'>ACCION</th></tr> \n";
        while ($row = mysql_fetch_array($informacion))//consulta
        {
			echo '<tr><td align="center">'.$row["fecha"].'</td><td align="center">'.$row["placa"].'</td><td align="center">'.$row["empresa"].'</td><td align="center">'.$row["nombres"].' '.$row["apellidos"].'</td><td align="center">';
			?>
            <p><a href="javascript:void(0)" onclick="window.open('<?php echo "imprimir.php?id_revision=$row[id_rev]";?>','','width=700,height=400,noresize')">Imprimir</a><br>
			<!--echo "<tr><td align='center'><a href='javascript:void(0)' onclick='window.open('pop/popup.html','','width=700,height=400,noresize')'>Imprimir</a></td></tr>";-->
            <?php
			echo '</td></tr>';
		}
		echo "</table>";
	}

	
}
	?>
  </form>
  
  

<!-- end .content --></div>
<?php
footer();
?>
