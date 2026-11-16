<?php
//iniciamos la sesión
session_start();

if(isset($_SESSION["autentificado"]))
{

//antes de hacer los cálculos, compruebo que el usuario está logueado
//utilizamos el mismo script que antes
if ($_SESSION["autentificado"] != "SI") {
    //si no está logueado lo envío a la página de autentificación
    header("Location: index.php");
} else {
    //sino, calculamos el tiempo transcurrido
    $subtituloGuardada = $_SESSION["ultimoAcceso"];
    $ahora = date("Y-n-j H:i:s");
    $tiempo_transcurrido = (strtotime($ahora)-strtotime($subtituloGuardada));
    //comparamos el tiempo transcurrido
     if($tiempo_transcurrido >=1200) {
     //si pasaron 10 minutos o más
      session_destroy(); // destruyo la sesión
      header("Location: index.php"); //envío al usuario a la pag. de autenticación
      //sino, actualizo la subtitulo de la sesión
    }else {
    $_SESSION["ultimoAcceso"] = $ahora;
   }
}
//Fin Sesion
}else{
	header("Location: index.php");
}

$ok=1;
$codigo = $_REQUEST['txtCodigo'];


if($ok==1)
{
	$codigoPro = ($_REQUEST['txtCodigo']);
	$numeroAleatorio = rand(11111, 99999);
	$nameimagen = $_FILES['imagen']['name'];
	$nuevonombre = $numeroAleatorio.$_FILES['imagen']['name'];
	$tamañoimagen = $_FILES['imagen']['size'];
	$tamañodef = 2000000;
	$tmpimagen = $_FILES['imagen']['tmp_name'];
	$extimagen = pathinfo($nameimagen);
	$ext = array("png", "jpg","bmp");
	$urlnueva = "../imagenes/productos/thumb/".$nuevonombre;


	if(is_uploaded_file($tmpimagen))
	{
		if(in_array(strtolower($extimagen['extension']),$ext))
		{
			if($tamañoimagen<$tamañodef)
			{
			copy($tmpimagen,$urlnueva);


      // INGRESAR A LA BASE DE DATOS

      include_once("conexion/conexion.php");

      $sql = "UPDATE productos SET thumb='$nuevonombre' WHERE id=$codigo";
      mysqli_set_charset($conn,"utf8");
      if ($conn->query($sql) === TRUE) {
          $mensaje = "La imagen se agregó correctamente";
      } else {
          $mensaje = "Error en la carga de la imagen, por favor intente más tarde";
          echo "Error: " . $sql . "<br>" . $conn->error;
      }

      // INGRESAR A LA BASE DE DATOS

			}
			else
			{
				echo "Tamaño del archivo muy pesado";
			}
		}
		else
		{
			echo "Error: Solo imagenes con formato (jpg, png o bmp)";
		}
	}
}





//::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::






?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>:::Administrador Zeta Arquitectos:::</title>
        <link rel="stylesheet" type="text/css" href="css/style.css"/>
		<link href="nav.css" rel="stylesheet" type="text/css" />

<link href='http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz' rel='stylesheet' type='text/css'>


    </head>
    <body>

    <div id="contenedor2">

    <div id="admin_header"><div id="cerrar_sesion"><a href="index.php?salir=1">Cerrar Sesión</a></div></div>
        <div id="botonera">
<?php include_once 'botonera.php'; ?>        </div>
    <div id="admin_titulo"><div id="admin_titulo_2">Modificar imagen Thumb</div></div>
    <div id="admin_tabla">
    	<h1 style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:14px; font-weight:100;"><?php echo $mensaje; ?></h1>
                <form method="post" action="2_modificarNoticia3.php">
            <div>
                <table border="0" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px;">

    <tr>
        <td></td>
	        <input type="hidden" value="<?php echo $codigo; ?>" name="id"/>
        <td><input type="submit" value="Volver" name="btnRegistrar" /></td>
                        </tr>
                </table>
                </div>
        </form>

</div>
            <div id="admin_footer"></div>
        </div>

    </body>
</html>
