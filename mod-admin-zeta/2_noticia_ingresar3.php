<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
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

header('Content-type: text/html; charset=utf-8');
//:::::::::::::::::::::::::::..Imagen:::::::::::::::::::::::::::::::::::
$ok = $_FILES['imagen']['name'];
$nuevonombre = "";
if($ok!="")
{
	$numeroAleatorio = rand(11111, 99999);

	$nameimagen = $_FILES['imagen']['name'];
	$nuevonombre = $numeroAleatorio.$_FILES['imagen']['name'];
	$tamañoimagen = $_FILES['imagen']['size'];
	$tamañodef = 2000000;
	$tmpimagen = $_FILES['imagen']['tmp_name'];
	$extimagen = pathinfo($nameimagen);
	$ext = array("png", "jpg","bmp");
	$urlnueva = "../uploads/".$nuevonombre;


	if(is_uploaded_file($tmpimagen))
	{
		if(in_array(strtolower($extimagen['extension']),$ext))
		{
			if($tamañoimagen<$tamañodef)
			{
			copy($tmpimagen,$urlnueva);


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


$nombre=$_REQUEST['nombre'];
$arquitecto=$_REQUEST['arquitecto'];
$colaboradores=$_REQUEST['colaboradores'];
$iluminacion=$_REQUEST['iluminacion'];
$ubicacion=$_REQUEST['ubicacion'];
$ano_proyecto=$_REQUEST['ano_proyecto'];
$ano_construccion=$_REQUEST['ano_construccion'];
$superficie_construida=$_REQUEST['superficie_construida'];
$ing_estructural=$_REQUEST['ing_estructural'];
$construccion=$_REQUEST['construccion'];
$materialidad=$_REQUEST['materialidad'];
$fotografia=$_REQUEST['fotografia'];
$tipo = $_REQUEST['estado'];
$descripcion = $_REQUEST['descripcion'];
$imagen = $nuevonombre;
$dateTime = new DateTime("now", new DateTimeZone('America/Santiago'));
$mysqldate = $dateTime->format("Y-m-d H:i:s");
$fecha = $mysqldate;
$orden = 1;

include_once("conexion/conexion.php");
include_once("../conexion/sitio.php");
zeta_asegurar_slug($conn);
$slug = zeta_slug_libre($conn, zeta_slug($nombre));

// INSERTAR EN LA BASE DE DATOS

$sql = "INSERT INTO propiedades (id, nombre, slug, tipo, arquitecto, colaboradores, iluminacion, ubicacion, ano_proyecto, ano_construccion, superficie_construida, ing_estructural, construccion, materialidad, fotografia, descripcion, imagen, orden)
VALUES (NULL, '$nombre', '$slug', '$tipo', '$arquitecto', '$colaboradores', '$iluminacion', '$ubicacion', '$ano_proyecto', '$ano_construccion', '$superficie_construida', '$ing_estructural', '$construccion', '$materialidad', '$fotografia', '$descripcion', '$imagen', $orden)";
mysqli_set_charset($conn,"utf8");
if ($conn->query($sql) === TRUE) {
    $mensaje = "La propiedades se agregó correctamente";
} else {
    $mensaje = "Error en la carga de la propiedad, por favor intente más tarde";
    //echo "Error: " . $sql . "<br>" . $conn->error;
}





    $sql = "SELECT MAX(id) FROM propiedades";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

          $numero = $row['MAX(id)'];

      }
    }

    $conn->close();
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
<?php include_once 'botonera.php'; ?>        </div>
    <div id="admin_titulo"><div id="admin_titulo_2">Ingresar propiedad</div></div>
    <div id="admin_tabla">
          <h4>
          <?php echo $mensaje; ?>.</br>
          Para agregar imágenes a la galería, click en el siguiente botón.
			</h4><br />


           <a class="btn" href="2_modificarNoticia3.php?id=<?php echo $numero; ?>">Ir a la propiedad</a>

           </div>
            <div id="admin_footer"></div>
        </div>

    </body>
</html>
