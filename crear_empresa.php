<?php

session_start();

require_once("funciones.php");

cabecera($_SESSION['usuario']);

contenido();

?>

<?php 

$status = "";

if ($_POST["action"] == "upload"){
    $telefono = "1";
    $cant_vehiculos = "0";
    $sql = "INSERT INTO clientes(nombre,direccion,telefono,responsable,ciudad,nit,v_rtm_m,v_prev_m,v_rtm_t,v_prev_t,v_rtm_l,v_prev_l,v_rtm_c1,v_prev_c1,v_rtm_c2,v_prev_c2,v_rtm_b,v_prev_b,v_rtm_p,v_prev_p,observaciones,fecha,convenio_insert,nom_comercial,ruta,par_automotor,emp_convenio)VALUES('".$_POST["empresa"]."','".$direccion."','".$telefono."','".$responsable."','".$_POST["ciudad"]."','".$nit."','".$_POST["valor_preventiva"]."','".$_POST["valor_preventiva"]."','".$_POST["valor_preventiva"]."','".$_POST["valor_preventiva"]."','".$_POST["valor_preventiva"]."','".$_POST["valor_preventiva"]."','".$_POST["valor_preventiva"]."','".$_POST["valor_preventiva"]."','".$_POST["valor_preventiva"]."','".$_POST["valor_preventiva"]."','".$_POST["valor_preventiva"]."','".$_POST["valor_preventiva"]."','".$_POST["valor_preventiva"]."','".$_POST["valor_preventiva"]."','".$observaciones."','".date("Y-m-d")."','".$_SESSION["k_username"]."','".$nom_comercial."','".$destino."','".$cant_vehiculos."','".$emp_convenio."')";
    $resultado=mysql_query($sql) or die("Client ".mysql_error());
    $sql2="insert into empresas (id,nom_empresa) values (NULL,'".$_POST["empresa"]."')";
    $resultado2=mysql_query($sql2) or die (mysql_error());
    $sql3="insert into usuarios (nom_empresa) values ('".$_POST["empresa"]."')";
    $resultado3=mysql_query($sql3);}
?>
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<div class="content">
    <h1></h1>
    <form name="nuevo_usuario" class="iform2" id="principal" method="POST" onSubmit="return validarEmpresa();">
        <p align="center" class="Estilo9">CREAR EMPRESA - SIVEC</p>
        <!--Esta tabla hace el maco exterio por eso el border esta en 2 se crea tabla de 2filas y 1 sola columna-->
        <p align="center">
            <font color="green" size="2"> <?php if ($_POST["action"] == "upload") {

	if($error_contrasena==1)
	{ echo 'Las contraseñas no coinciden intente nuevamente';}
	else {
	$consulta_nom_user=mysql_query("Select usuario from usuarios where id_usuario like '".$_SESSION["k_username"]."'");	
	$nom_user=mysql_fetch_array($consulta_nom_user);
	echo "El Empresa '".$_POST["empresa"]."' ha sido creada de manera satisfactoria.<br />"; }}?></font>
        </p>
        <BR />
        <table border="0" cellpadding="0" cellspacing="0" width="95%" bordercolorlight="#CCCCCC"
            bordercolordark="#FFFFFF" bgcolor="#FDFBFF" align="center" class="Estilo5">
            <tr>
                <td>EMPRESA NUEVA</td>
            </tr>
            <tr>
                <td>
                    <table width="70%" border="0" class="Estilo6" align="center">
                        <BR>
                        <tr>
                            <td>Nombre Empresa</td>
                            <td>
                                <?php  
                                  $consulta_nusuario=mysql_query("select usuario,id_usuario from usuarios where id_usuario='".$_SESSION["k_username"]."'");
                                  $nombreuser=mysql_fetch_array($consulta_nusuario);
                                ?>

                                <span id="sprytextfield1">
                                    <input type="text" class="itext2" name="empresa" id="empresa" size="20"
                                        onKeyUp="this.value=this.value.toUpperCase()" />

                                    <span class="textfieldRequiredMsg">Se necesita un valor.</span></span> <input
                                    type="hidden" name="id_usuario" value="<?php echo $nombreuser["id_usuario"] ?>"
                                    readonly />
                            </td>
                        </tr>

                        <tr>
                            <td>Valor</td>
                            <td>
                                <label for="informacion"><span id="sprytextfield2">
                                        <input class="itext2" type="text" name="valor_preventiva"
                                            id="valor_preventiva" />

                                        <span class="textfieldRequiredMsg">Se necesita un valor.</span><span
                                            class="textfieldInvalidFormatMsg">Formato no válido.</span><span
                                            class="textfieldMinCharsMsg">No se cumple el mínimo de caracteres
                                            requerido.</span><span class="textfieldMaxCharsMsg">Se ha superado el número
                                            máximo de caracteres.</span>
                                    </span>
                                </label>
                            </td>
                        </tr>

                        <tr>
                            <td>Ciudad</td>
                            <td><span class="Campos">

                                    <?php
  //Conexion con la base
  require("conexion.php");

  //selección de la base de datos con la que vamos a trabajar
  mysql_select_db("preventivas");

  $consulta_empresa="select empresa,nivel_usuario from usuarios where usuario like '".$_SESSION['k_username']."'";
  $resultado_empresa=mysql_query($consulta_empresa);
  $filas=mysql_fetch_array($resultado_empresa);

  //creamos consulta para verificar si es administrador mostrar todos los productos sino soo mostramos productos correspondientes a la empresa donde esta registrado
  if($filas['nivel_usuario']=='Administrador') {
      $sSQL11="Select nom_ciudad from ciudades limit 3";
      $result11=mysql_query($sSQL11);
    } else {
      //Creamos la sentencia SQL y la ejecutamos
        $sSQL11="Select nom_ciudad from ciudades limit 3";
        $result11=mysql_query($sSQL11);
    }

    echo '<select class="iselect2" name="ciudad" >';
      //echo "<option value='0'>Elegir Empresa</option>";
      //Generamos el menu desplegable
    while ($row11=mysql_fetch_array($result11))
    {
      echo '<option>'.$row11["nom_ciudad"];
    }
?>

                                    <script type="text/javascript">
                                    // Función para validar el campo "Nombre Empresa"
                                    function validarEmpresa() {
                                        var empresa = document.getElementById('empresa').value;
                                        if (empresa.length < 3) {
                                            Swal.fire({
                                                icon: 'warning',
                                                title: 'Lo sentimos',
                                                text: 'La empresa a crear requiere minimo 3 caracteres',
                                                allowOutsideClick: false


                                            })
                                            return false;
                                        }
                                        return true;
                                    }
                                    </script>
                                    <?php
  // Comprobar si se ha enviado el formulario
  if (isset($_POST['submit'])) {
    // Validar el campo "Nombre Empresa"
    $empresa = $_POST['empresa'];
    if (strlen($empresa) < 3) {
      echo '<script>alert("El nombre de la empresa debe tener al menos 3 caracteres.");</script>';
    } else {
      // Insertar empresa en la base de datos
      $sql = "INSERT INTO empresas (nom_empresa) VALUES ('$empresa')";
      $resultado = mysql_query($sql);
    }
  }
?>
                                </span></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        </p>
        <p align="center">

            <input name="enviar" type="submit" class="Search" id="enviar" value="Guardar" />
            <input name="action" type="hidden" value="upload" />
            <input type='reset' class="Search3" value='Limpiar Datos' name='limpiar'>
            <input type='button' class="Search2" value='Salir' name='cerrar' onClick="(location='principal.php');">
        </p>
        <br><br>
    </form>
    <!-- end .content -->
</div>

<?php

footer();

?>

<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none", {
    validateOn: ["change"]
});

var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "integer", {
    minChars: 5,
    maxChars: 6,
    validateOn: ["change"]
});
</script>

<style>
.search {
    table {
        border-collapse: collapse;
        width: 100%;
    }

    th,
    td {
        text-align: left;
        padding: 8px;
    }

    th {
        background-color: #ddd;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    tr:hover {
        background-color: #ddd;
    }

    $light-grey: #434343;
    $dark-grey: #212121;
    $blue: #566787;
    $margin-bottom: 15px;

    display: inline-block;
    justify-content: center;
    background: #135ca7;
    color: white;
    border: none;

    padding: 5px;
    font-weight: 100;
    font-size: 12px;
    width: 80px;

    border-radius: 5px;
    transition: all 0.8s linear;
    cursor: pointer;

    &:hover {
        background: #212121(#00adee; , 20%);
    }

    animation: slideDown 0.7s $globalDelay+.35s $easeOutCust both,
    fadeIn .2s $globalDelay+.3s $easeInQuad both,
    blink 2.0s linear infinite;
}

.search2 {
    table {
        border-collapse: collapse;
        width: 100%;
    }

    th,
    td {
        text-align: left;
        padding: 8px;
    }

    th {
        background-color: #ddd;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    tr:hover {
        background-color: #ddd;
    }

    $light-grey: #434343;
    $dark-grey: #212121;
    $margin-bottom: 15px;

    display: inline-block;
    justify-content: center;
    background: #ff0000;
    color: white;
    border: none;

    padding: 5px;
    font-weight: 100;
    font-size: 12px;
    width: 80px;

    border-radius: 5px;
    transition: all 0.8s linear;
    cursor: pointer;

    &:hover {
        background: #ff0000(#00adee; , 20%);
    }

    animation: slideDown 0.7s $globalDelay+.35s $easeOutCust both,
    fadeIn .2s $globalDelay+.3s $easeInQuad both,
    blink 2.0s linear infinite;
}

.search3 {
    table {
        border-collapse: collapse;
        width: 100%;
    }

    th,
    td {
        text-align: left;
        padding: 8px;
    }

    th {
        background-color: #ddd;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    tr:hover {
        background-color: #ddd;
    }

    $light-grey: #434343;
    $dark-grey: #212121;
    $margin-bottom: 15px;

    display: inline-block;
    justify-content: center;
    background: #dcdcdc;
    color: black;
    border: none;

    padding: 5px;
    font-weight: 100;
    font-size: 12px;
    width: 80px;

    border-radius: 5px;
    transition: all 0.8s linear;
    cursor: pointer;

    &:hover {
        background: #ffffff(#00adee; , 20%);
    }

    animation: slideDown 0.7s $globalDelay+.35s $easeOutCust both,
    fadeIn .2s $globalDelay+.3s $easeInQuad both,
    blink 2.0s linear infinite;
}
</style>