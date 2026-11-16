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

$nada = 0;
$codigo = ($_GET['codigo']);
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
    <div id="admin_titulo"><div id="admin_titulo_2">Ingresar PDF Técnicas</div></div>
    <div id="admin_tabla">



        <form method="post" action="2_nuevaMarketing2.php" enctype="multipart/form-data">

                <table border="0" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px;">


    <tr>
        <td>Título</td>
        <td><input type="text" name="titulo" value=""></td>
    </tr>
    <tr>
        <td>Tamaño Optimo Imagen</td>
        <td>200px X 200px</td>
    </tr>
    <tr>
        <td>Imagen</td>
        <td><input type="file" name="imagen"></td>
    </tr>
    <tr>
        <td>PDF</td>
        <td><input type="file" name="pdf"></td>
    </tr>



    <tr>

        <td></td>
        <input name="txtCodigo" type="hidden" value="<?php echo $codigo; ?>" />
        <td><input type="submit" value="Agregar Imagen" name="btnRegistrar" /></td>
    </tr>



        </table>
        </form>

		</div>
            <div id="admin_footer"></div>
        </div>
    </div>
    </body>
</html>
