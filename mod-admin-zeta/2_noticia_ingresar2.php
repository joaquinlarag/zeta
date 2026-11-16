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

?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>:::Administrador Zeta Arquitectos:::</title>
        <link href="../imagenes/ico/favicon.ico" type="image/x-icon" rel="shortcut icon" />
        <link rel="stylesheet" type="text/css" href="css/style.css"/>
		<link href="nav.css" rel="stylesheet" type="text/css" />
<script src="ckeditor/ckeditor.js"></script>
<link href='http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz' rel='stylesheet' type='text/css'>

<!-- FANCYBOX -->

<link rel="stylesheet" href="../fancybox/jquery.fancybox-1.3.4.css" type="text/css" media="screen" />

<!--:::::::::::::BOTONERA:::::::::::-->

<script type="text/javascript" src="../fancybox/jquery.min.js"></script>

<script type="text/javascript" src="../fancybox/jquery.fancybox-1.3.4.pack.js"></script>

<script type="text/javascript" src="../fancybox/jquery.easing-1.3.pack.js"></script>

<script type="text/javascript" src="../fancybox/jquery.mousewheel-3.0.4.pack.js"></script>

<script type="text/javascript">

$(document).ready(function() {

	/* This is basic - uses default settings */

	$("a#single_image").fancybox();

  $(document).ready(function() {
    $(".iframe").fancybox({
        type: 'iframe'
    });
});

	/* Using custom settings */

	$("a#inline").fancybox({
		'hideOnContentClick': true
	});

	/* Apply fancybox to multiple items */

	// $("a[rel=example_group]").fancybox({
	// 		'transitionIn'		: 'none',
	// 		'transitionOut'		: 'none',
	// 		'titlePosition' 	: 'over',
	// 		'titleFormat'       : function(title, currentArray, currentIndex, currentOpts) {
	// 		    return '<span id="fancybox-title-over">Image ' +  (currentIndex + 1) + ' / ' + currentArray.length + ' ' + title + '</span>';
	// 		}
	// 	});

	$("a[rel=example_group]").fancybox({
		// 'transitionIn'	:	'elastic',
		// 'transitionOut'	:	'elastic',
		'speedIn'		:	300,
		'speedOut'		:	300,
		'overlayShow'	:	true
	});

});

</script>

<!-- FANCYBOX -->

    </head>
    <body>

    <div id="contenedor2">

    <div id="admin_header"><div id="cerrar_sesion"><a href="index.php?salir=1">Cerrar Sesión</a></div></div>
        <div id="botonera">
         <?php include_once 'botonera.php'; ?>
        </div>
    <div id="admin_titulo"><div id="admin_titulo_2">Ingresar propiedad</div></div>
    <div id="admin_tabla">
        <form method="post" action="2_noticia_ingresar3.php" enctype="multipart/form-data">
            <div>
                <table>

                  <tr bgcolor="#F6F6F6">
                      <td>Nombre</td>
                      <td><input type="text" name="nombre" value="" /></td>
                  </tr>

                  <tr>
                      <td>Arquitecto</td>
                      <td><input type="text" name="arquitecto" value="" /></td>
                  </tr>
                  <tr bgcolor="#F6F6F6">
                      <td>Colaboradores</td>
                      <td><input type="text" name="colaboradores" value="" /></td>
                  </tr>
                  <tr>
                      <td>Iluminacion</td>
                      <td><input type="text" name="iluminacion" value="" /></td>
                  </tr>
                  <tr bgcolor="#F6F6F6">
                      <td>Ubicación</td>
                      <td><input type="text" name="ubicacion" value="" /></td>
                  </tr>
                  <tr>
                      <td>Año de proyecto</td>
                      <td><input type="text" name="ano_proyecto" value="" /></td>
                  </tr>
                  <tr bgcolor="#F6F6F6">
                      <td>Año de construcción</td>
                      <td><input type="text" name="ano_construccion" value="" /></td>
                  </tr>
                  <tr>
                      <td>Superficie Construída</td>
                      <td><input type="text" name="superficie_construida" value="" /></td>
                  </tr>
                  <tr bgcolor="#F6F6F6">
                      <td>Ing Estructural</td>
                      <td><input type="text" name="ing_estructural" value="" /></td>
                  </tr>
                  <tr>
                      <td>Construcción</td>
                      <td><input type="text" name="construccion" value="" /></td>
                  </tr>
                  <tr bgcolor="#F6F6F6">
                      <td>Materialidad</td>
                      <td><input type="text" name="materialidad" value="" /></td>
                  </tr>
                  <tr>
                      <td>Fotografia</td>
                      <td><input type="text" name="fotografia" value="" /></td>
                  </tr>

    <tr bgcolor="#F6F6F6">
        <td>Descripción</td>
        <td><textarea type="text" name="descripcion"></textarea></td>

    </tr>


    <tr>
        <td>Imagen <span style="text-transform:lowercase;">(1200x800px max. 500kb)</span></td>
        <td><input type="file" name="imagen" /></td>
    </tr>

    <tr bgcolor="#F6F6F6">
            <td>Estado</td>
            <td><select name="estado">

                 <OPTION value="Terminada" selected="selected">Terminada</OPTION>
                 <OPTION value="proceso">En proceso</OPTION>

                 </select>
             </td>
        </tr>

    <tr>
        <td></td>
        <td><input type="submit" value="Registrar" name="btnRegistrar" /></td>
    </tr>
                </table>
                </div>
        </form>
        		<script>

			CKEDITOR.replace( 'descripcion', {
				uiColor: '#999999',

			});

		</script>

        <script>

			CKEDITOR.replace( 'txtEquipamiento', {
				uiColor: '#999999',

			});

		</script>
</div>
            <div id="admin_footer"></div>
        </div>

    </body>
</html>
