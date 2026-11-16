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

header('Content-type: text/html; charset=utf-8');

include_once 'conexion/conexion.php';

if(isset($_REQUEST['id']))
	$codigoRequest=($_REQUEST['id']);

if(isset($_GET['id']))
	$codigoRequest=($_GET['id']);



if(isset($_REQUEST['txtOpcion']))
	$opcion = ($_REQUEST['txtOpcion']);

if(isset($_GET['opc']))
	$opcion = ($_GET['opc']);

//Borrar Proyecto

if (isset($_GET['eli'])){

  // ELIMINAR EN LA BASE DE DATOS

  $sql = "DELETE FROM propiedades WHERE id = '$codigoRequest'";
  mysqli_set_charset($conn,"utf8");
  if ($conn->query($sql) === TRUE) {
      header("Location: borrar.php");
  } else {
      ?>
      <script>
        alert("Error en la eliminación de la propiedad, por favor intente más tarde");
      </script>
      <?php
      //echo "Error: " . $sql . "<br>" . $conn->error;
  }

  // ELIMINAR A LA BASE DE DATOS

}

//Fin Borrar


//Borrar Imagen

if (isset($_GET['fot'])){


	$id_img = 	$_GET['fot'];

  // ELIMINAR EN LA BASE DE DATOS

  $sql = "DELETE FROM imagenes WHERE id = '$id_img'";
  mysqli_set_charset($conn,"utf8");
  if ($conn->query($sql) === TRUE) {
    ?>
    <script>
      alert("La imagen fué eliminada correctamente");
    </script>
    <?php
  } else {
      ?>
      <script>
        alert("Error en la eliminación de la imagen, por favor intente más tarde");
      </script>
      <?php
      //echo "Error: " . $sql . "<br>" . $conn->error;
  }

  // ELIMINAR A LA BASE DE DATOS

}

//Borrar Imagen



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
<script src="ckeditor/ckeditor.js"></script>

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
<?php include_once 'botonera.php'; ?>        </div>
    <div id="admin_titulo"><div id="admin_titulo_2">Modificar propiedades</div></div>



    <div id="admin_tabla">

        <form method="post" action="2_modificarNoticia4.php" enctype="multipart/form-data">
 	    <table border="0" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px;">

        <!-- ::::::::::COMIENZA CONEXION::::::::: -->


        <?php
        $sql = "SELECT * FROM propiedades WHERE id=$codigoRequest";
        $result = $conn->query($sql);

       if ($result->num_rows > 0) {
           // output data of each row
           while($row = $result->fetch_assoc()) {
       ?>

    <tr>
        <td>Imagen</td>
        <?php if(($row['imagen'])!= ""){?>
            	<td><a class="btn4" href="#">
                	<input type="hidden" name="imagen_si" value="1" />
                	<input type="hidden" name="imagen" value="<?php echo ($row['imagen']); ?>" />
                	<img src="../uploads/<?php echo ($row['imagen']);?>" width="100"/></a><a class="btn3" href="2_modificarImagen.php?codigo=<?php echo ($row['id']);?>">Cambiar Imagen</a></td>


            <?php }else{?>
            	<input type="hidden" name="imagen_si" value="2" />
            	<td><input type="file" name="imagen" /></td>
            <?php }?>

    </tr>



        <td><input type="hidden" name="id" value="<?php echo ($row['id']);?>" /></td>


    <tr>
        <td>Nombre</td>
        <td><input type="text" name="nombre" value="<?php echo ($row['nombre']);?>" /></td>
    </tr>

    <tr>
        <td>Arquitecto</td>
        <td><input type="text" name="arquitecto" value="<?php echo ($row['arquitecto']);?>" /></td>
    </tr>
    <tr>
        <td>Colaboradores</td>
        <td><input type="text" name="colaboradores" value="<?php echo ($row['colaboradores']);?>" /></td>
    </tr>
    <tr>
        <td>Iluminacion</td>
        <td><input type="text" name="iluminacion" value="<?php echo ($row['iluminacion']);?>" /></td>
    </tr>
    <tr>
        <td>Ubicación</td>
        <td><input type="text" name="ubicacion" value="<?php echo ($row['ubicacion']);?>" /></td>
    </tr>
    <tr>
        <td>Año de proyecto</td>
        <td><input type="text" name="ano_proyecto" value="<?php echo ($row['ano_proyecto']);?>" /></td>
    </tr>
    <tr>
        <td>Año de construcción</td>
        <td><input type="text" name="ano_construccion" value="<?php echo ($row['ano_construccion']);?>" /></td>
    </tr>
    <tr>
        <td>Superficie Construída</td>
        <td><input type="text" name="superficie_construida" value="<?php echo ($row['superficie_construida']);?>" /></td>
    </tr>
    <tr>
        <td>Ing Estructural</td>
        <td><input type="text" name="ing_estructural" value="<?php echo ($row['ing_estructural']);?>" /></td>
    </tr>
    <tr>
        <td>Construcción</td>
        <td><input type="text" name="construccion" value="<?php echo ($row['construccion']);?>" /></td>
    </tr>
    <tr>
        <td>Materialidad</td>
        <td><input type="text" name="materialidad" value="<?php echo ($row['materialidad']);?>" /></td>
    </tr>
    <tr>
        <td>Fotografia</td>
        <td><input type="text" name="fotografia" value="<?php echo ($row['fotografia']);?>" /></td>
    </tr>

    <tr>
        <td>Descripción</td>
        <td><textarea type="text" name="descripcion"><?php
        $reemplazo = str_replace("imagenes/", "../imagenes/", $row["descripcion"]);
        echo $reemplazo;
        ?></textarea></td>

    </tr>

    <tr>
            <td>Estado</td>
            <td><select name="estado">

                 <?php if(($row['tipo'])== "Terminada"){?>

                 <OPTION value="Terminada" selected="selected">Terminada</OPTION>
                 <OPTION value="proceso">En proceso</OPTION>



                  <?php }else{?>

                  <OPTION value="proceso" selected="selected">En proceso</OPTION>
                  <OPTION value="Terminada">Terminada</OPTION>

                  <?php }?>
                 </select>
             </td>
        </tr>



    <tr>
        <td></td>
        <td><input type="submit" value="Modificar" name="btnRegistrar" /></td>

    </tr>

    <tr>
        <td height="30" style=" font-size:12px;"><a class="btn2" href="https://zetaarquitectos.cl/proyecto.php?id=<?php echo $codigoRequest; ?>" target="_blank">Ir a la propiedad</a>
        </td>
    </tr>

    <tr>
        <td height="30" style=" font-size:12px;"><a style="background:#c20404;" class="btn2" href="2_modificarNoticia3.php?id=<?php echo $codigoRequest; ?>&eli=borrar" target="_blank">Borrar propiedad</a>
		</td>
    </tr>



    <!--::::::::::::::::Imagenes Adicionales::::::::::::::::::::.-->

      <tr bgcolor="#F0F0F0" >
    			<td height="30" style=" font-weight:bold; font-size:12px;">Imagenes adicionales</td>
                <td height="30" style=" font-size:12px;"><a class="btn2" href="2_nuevaImagen.php?codigo=<?php echo $codigoRequest; ?>">Ingresar</a>
                <a class="btn2" href="2_ordenarImagen.php?codigo=<?php echo $codigoRequest; ?>">Ordenar</a></td>
    		</tr>




        <?php

        $sql2 = "SELECT * FROM imagenes WHERE id_propiedad=$codigoRequest ORDER BY orden";
        $result2 = $conn->query($sql2);

        if ($result2->num_rows > 0) {
           // output data of each row
           while($row2 = $result2->fetch_assoc()) {
        ?>

        <tr>
    		<td height="80">
                <span style="margin-bottom:5px;">

                    <img src="../uploads/<?php echo ($row2['imagen']);?>" width="100"/>
                </span>
            </td>
            <td>
            <a class="boton"href="2_modificarNoticia3.php?id=<?php echo $codigoRequest; ?>&amp;fot=<?php echo ($row2['id']);?>">Eliminar foto</a>
            </td>
         </tr>


         <?php
            }
        }else{

        ?>


         <tr>

           	<td height="30">No hay imagenes adicionales</td>

           </tr>


         <?php } ?> <!-- Cierre imagenes adicionales -->





    <!--::::::::::::::::Imagenes Adicionales::::::::::::::::::::.-->






    <?php
       }
   }

   $conn->close();
   ?>

    <!-- ::::::::::TERMINA CONEXION::::::::: -->

    </table>



        </form>



                		<script>

			CKEDITOR.replace( 'descripcion', {
				uiColor: '#999999',
				// toolbar: [
				// 	[ 'Bold', 'Italic', 'Link', 'Unlink', 'Maximize' ],
				// 	[ 'FontSize', 'TextColor', 'BGColor' ]
				// ]
			});

		</script>

        <script>

			CKEDITOR.replace( 'txtEquipamiento', {
				uiColor: '#999999',
				toolbar: [
					[ 'Bold', 'Italic', 'Link', 'Unlink', 'Maximize' ],
					[ 'FontSize', 'TextColor', 'BGColor' ]
				]
			});

		</script>
</div>
            <div id="admin_footer"></div>
        </div>

    </body>
</html>
