<?php
header('Content-type: text/html; charset=utf-8');
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

$codigoPro = $_REQUEST['txtCodigo'];
$titulo = $_REQUEST['titulo'];

//:::::::::::::::::::::::::::..Imagen:::::::::::::::::::::::::::::::::::


	if($_FILES['imagen']['name']!="")
	{

	$numeroAleatorio = rand(11111, 99999);
	$nameimagen = $_FILES['imagen']['name'];
	$nuevonombre = $numeroAleatorio.$_FILES['imagen']['name'];
	$tamanoimagen = $_FILES['imagen']['size'];
	$tamanodef = 10000000;
	$tmpimagen = $_FILES['imagen']['tmp_name'];
	$extimagen = pathinfo($nameimagen);
	$ext = array("pdf", "PDF");
	$urlnueva = "../pdf/".$nuevonombre;


	if(is_uploaded_file($tmpimagen))
	{
		if(in_array(strtolower($extimagen['extension']),$ext))
		{
			if($tamanoimagen<$tamanodef)
			{
			copy($tmpimagen,$urlnueva);

      // INGRESAR A LA BASE DE DATOS

      include_once("conexion/conexion.php");

      $sql = "INSERT INTO tecnicas VALUES(NULL, '$codigoPro', '$titulo', '$nuevonombre', '-1000')";
      mysqli_set_charset($conn,"utf8");
      if ($conn->query($sql) === TRUE) {
          ?>
          <script>
            alert("El archivo se agregó correctamente");
          </script>
          <?php
      } else {
          ?>
          <script>
            alert("Error, intente nuevamente más tarde");
          </script>
          <?php
          // echo "Error: " . $sql . "<br>" . $conn->error;
      }

      // INGRESAR A LA BASE DE DATOS

			}
			else
			{
				echo "Tama�o del archivo muy pesado";
			}
		}
		else
		{
			echo "Error: Solo imagenes con formato (PDF)";
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
<script src="ckeditor/ckeditor.js"></script>
<link href='http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz' rel='stylesheet' type='text/css'>


    </head>
    <body>

    <div id="contenedor2">

    <div id="admin_header"><div id="cerrar_sesion"><a href="index.php?salir=1">Cerrar Sesión</a></div></div>
        <div id="botonera">
			<?php include_once 'botonera.php'; ?>
		</div>
    <div id="admin_titulo"><div id="admin_titulo_2">Ingresar PDF Técnicas</div></div>
    <div id="admin_tabla">

<!-- <h1 style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:14px; font-weight:100;  height: 50px; margin-left: 34px;">Se Agregó la imagen satisfactoriamente</h1> -->

         <div>
        	<a class="btn" href="2_modificarNoticia3.php?id=<?php echo $_REQUEST['txtCodigo'];?>">Volver</a>
        </div>
		</div>
            <div id="admin_footer"></div>
        </div>
    </div>
    </body>
</html>
