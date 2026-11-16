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

$codigo = $_GET['codigo'];
include_once 'conexion/conexion.php';
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

<script type="text/javascript" src="jquery/jquery.js"></script>
<script type="text/javascript" src="jquery/jquery-ui-1.8.12.custom.min.js"></script>

<style type="text/css">


.cabecera{
     background: #4A3C31;
     border-bottom: 5px solid #69AD3C;
     width: 100%;
 }
.cabecera img{
     margin:40px 0 0 30px;
 }
.content{
	padding-top:20px;
	width:260px;
}
ul{
	list-style:none;
	margin:0;
	padding:0
}
ul li.ordeno{

	font-family: 'Open Sans', sans-serif;
	font-size:12px;
	display:block;
	background:#444;
	color:#fff;
	margin-top:3px;
	padding:10px 6px 6px 6px;
	cursor:move;
  width:150px;
}
.ui-state-highlight{ background: #EFEFEF; border:15px solid #CCC; margin-top:5px;}
.msg{
	color:#0C0;
	font:normal 14px Tahoma;
	margin-bottom:20px;
}

</style>
<script type="text/javascript">
$(document).ready(function(){
	$("ul#articulos").sortable({ placeholder: "ui-state-highlight",opacity: 0.6, cursor: 'move', update: function() {
		var order = $(this).sortable("serialize");
		$.post("2_ordenarImagen2.php", order, function(respuesta){
			$(".msg").html(respuesta).fadeIn("fast").fadeOut(4500);
		});
	}
	});
});</script>
</head>

<body>

    <div id="contenedor2">

    <div id="admin_header"><div id="cerrar_sesion"><a href="index.php?salir=1">Cerrar Sesión</a></div></div>
        <div id="botonera">
<?php include_once 'botonera.php'; ?>        </div>
    <div id="admin_titulo"><div id="admin_titulo_2">Ordenar Imágenes</div></div>
    <div id="admin_tabla" style=" margin-top:5px;">

<div class="content">

     <div class="msg"></div>
	<ul id="articulos">
    	<?php
      // ::::::::CONEXION:::::::

      $sql2 = "SELECT * FROM imagenes WHERE id_propiedad='$codigo' ORDER BY orden ASC";
      $result2 = $conn->query($sql2);

      if ($result2->num_rows > 0) {
         // output data of each row
         while($row2 = $result2->fetch_assoc()) {

      // ::::::::CONEXION:::::::
			?>

			<li class="ordeno" id="articulo-<?php echo $row2['id'] ?>"><img src="../uploads/<?php echo $row2['imagen'] ?>" width="100"/></li>
			<?php
    		}
      }
		?>
    </ul>

</div>
<div style="display:block; margin-top:10px;">
        	<a class="btn" href="2_modificarNoticia3.php?id=<?php echo $_GET['codigo']; ?>">Volver</a>
        </div>
        <div class="clear"></div>
</div>
            <div id="admin_footer"></div>
        </div>

    </body>
</html>
