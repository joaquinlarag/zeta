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

require_once 'conexion/conexion.php';
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

<link href='http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz' rel='stylesheet' type='text/css'>


    </head>
    <body>

    <div id="contenedor2">

    <div id="admin_header"><div id="cerrar_sesion"><a href="index.php?salir=1">Cerrar Sesión</a></div></div>
        <div id="botonera">
         <?php include_once 'botonera.php'; ?>
        </div>
    <div id="admin_titulo"><div id="admin_titulo_2">Modificar propiedades</div></div>
        <div id="admin_tabla">
            <form method="post" action="2_modificarNoticia3.php">
                <div>

                    <table border="0" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px;">
        <tr>
            <td>Propiedades</td>
            <td><select name="id">

              <?php
              $categoria = $_POST['categoria'];
              $sql = "SELECT * FROM propiedades ORDER BY orden";
              $result = $conn->query($sql);

             if ($result->num_rows > 0) {
                 // output data of each row
                 while($row = $result->fetch_assoc()) {
             ?>

                   <OPTION value="<?php echo $row["id"]; ?>"><?php echo $row["nombre"]; ?></OPTION>

              <?php
                 }
             }else{
               ?>

                     <OPTION value="">No hay propiedades en esta categoría</OPTION>

                <?php
                $no_hay = 0;
             }

             $conn->close();
             ?>

                 </select>
             </td>
        </tr>
        <tr>
            <td></td>
            <?php
              if(isset($no_hay)){

                ?>
                <h4 style="margin:20px;">No hay productos, por favor buscar en otra categoría.</h4>
                <?php

              }else{
             ?>
            <td><input type="submit" value="Elegir" name="btnRegistrar" /></td>
          <?php } ?>
                            </tr>
                    </table>
                    </div>
            </form>
    </div>
            <div id="admin_footer"></div>
        </div>

    </body>
</html>
