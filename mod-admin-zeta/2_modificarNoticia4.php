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

//:::::::::::::::::::::::::::..Imagen:::::::::::::::::::::::::::::::::::


if((isset($_FILES['imagen']))&& ($_REQUEST['imagen_si'] == 2))
{
	if($_FILES['imagen']['name']!="")
	{

	$numeroAleatorio = rand(11111, 99999);
	$nameimagen = $_FILES['imagen']['name'];
	$nuevonombre = $numeroAleatorio.$_FILES['imagen']['name'];
	$tamanoimagen = $_FILES['imagen']['size'];
	$tamanodef = 2000000;
	$tmpimagen = $_FILES['imagen']['tmp_name'];
	$extimagen = pathinfo($nameimagen);
	$ext = array("png", "jpg","bmp");
	$urlnueva = "../uploads/".$nuevonombre;


	if(is_uploaded_file($tmpimagen))
	{
		if(in_array(strtolower($extimagen['extension']),$ext))
		{
			if($tamanoimagen<$tamanodef)
			{
			copy($tmpimagen,$urlnueva);


			}
			else
			{
				echo "Tama�o del archivo muy pesado";
			}
		}
		else
		{
			echo "Error: Solo imagenes con formato (jpg, png o bmp)";
		}
	}
	}
}


//::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::


$id=$_REQUEST['id'];
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
$reemplazo = str_replace("../imagenes/", "imagenes/", $_REQUEST["descripcion"]);
$descripcion=$reemplazo;
$estado=$_REQUEST['estado'];


// IMAGEN PRINCIPAL

if((isset($_FILES['imagen']))&& ($_REQUEST['imagen_si'] == 2))
{
	if($_FILES['imagen']['name']!="")
	{
		$imagen=$nuevonombre;

	}
	else
	{
		$imagen = "";

	}
}

if((isset($_REQUEST['imagen'])) && ($_REQUEST['imagen_si'] == 1)){
	$imagen = $_REQUEST['imagen'];
}

// IMAGEN PRINCIPAL




// INGRESAR A LA BASE DE DATOS

include_once("conexion/conexion.php");
include_once("../conexion/sitio.php");

$sql = "UPDATE propiedades Set nombre='$nombre', tipo='$estado', arquitecto='$arquitecto', colaboradores='$colaboradores', iluminacion='$iluminacion', ubicacion='$ubicacion', ano_proyecto='$ano_proyecto', ano_construccion='$ano_construccion', superficie_construida='$superficie_construida', ing_estructural='$ing_estructural', construccion='$construccion', materialidad='$materialidad', fotografia='$fotografia', descripcion='$descripcion', imagen='$imagen' WHERE id=$id";
mysqli_set_charset($conn,"utf8");
if ($conn->query($sql) === TRUE) {
    $mensaje = "El producto se modificó correctamente";
    zeta_asegurar_slug($conn);
    $idObra = (int) $id;
    $slugActual = $conn->query("SELECT slug FROM propiedades WHERE id=$idObra");
    $filaSlug = $slugActual ? $slugActual->fetch_assoc() : null;
    if ($filaSlug && ($filaSlug['slug'] === null || $filaSlug['slug'] === '')) {
        $slugNuevo = zeta_slug_libre($conn, zeta_slug($nombre), $idObra);
        $stmtSlug = $conn->prepare('UPDATE propiedades SET slug = ? WHERE id = ?');
        $stmtSlug->bind_param('si', $slugNuevo, $idObra);
        $stmtSlug->execute();
        $stmtSlug->close();
    }
} else {
    $mensaje = "Error en la carga del producto, por favor intente más tarde";
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// INGRESAR A LA BASE DE DATOS

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
    <div id="admin_titulo"><div id="admin_titulo_2">Modificar propiedad</div></div>
    <div id="admin_tabla">
    	<h4><?php echo $mensaje ?></h4>
            <div>
        	<a class="btn" href="2_modificarNoticia3.php?id=<?php echo $_REQUEST['id']; ?>">Volver a modificar</a>
        </div>

         <div>
        	<a class="btn" href="https://zetaarquitectos.cl/proyecto.php?id=<?php echo $_REQUEST['id']; ?>" target="_blank">Ir a la propiedad</a>
        </div>
</div>
            <div id="admin_footer"></div>
        </div>

    </body>
</html>
