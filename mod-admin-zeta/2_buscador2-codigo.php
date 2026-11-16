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
include_once '2_insertar.php';

if(isset($_REQUEST['txtTitulo']))
	$codigoRequest=($_REQUEST['txtTitulo']);

if(isset($_GET['titulo']))
	$codigoRequest=($_GET['titulo']);

//Borrar Proyecto

if (isset($_GET['eli'])){
	$codigoRequest=$_GET['id'];
	include_once 'conexion/conexion.php';	
	$miconexion = new Conexion();
	//Obtenemos la conexion
	$cn = $miconexion->conectar();	
	$sql="DELETE FROM propiedad WHERE codigo = '$codigoRequest'";
	mysql_query($sql, $cn)or die( "Error en 	consulta: " . mysql_error() );
	header("Location: borrar.php");
}

//Fin Borrar	

$bot = new Proyecto2();

$consulta = $codigoRequest;
$consulta2 = split(' ',$consulta);

$listaBot = $bot->buscarBuscadorCodigocc($consulta2);


	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Administrador Barahona & Cia</title>
        <link href="../imagenes/nuevo/favicon.ico" type="image/x-icon" rel="shortcut icon" />
        <link rel="stylesheet" type="text/css" href="css/style.css"/>
		<link href="nav.css" rel="stylesheet" type="text/css" />

<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,700' rel='stylesheet' type='text/css'>
<script src="ckeditor/ckeditor.js"></script>

    </head>
    <body>

    <div id="contenedor2">

    <div id="admin_header"><div id="cerrar_sesion"><a href="index.php?salir=1">Cerrar Sesión</a></div></div>
        <div id="botonera">
<?php include_once 'botonera.php'; ?>        </div>
    <div id="admin_titulo"><div id="admin_titulo_2">Modificar propiedad</div></div>
    <div id="admin_tablax">

        
        	
                <div id="consulta_cont">
                    <div class="con_nombre">TITULO</div>
                    <div class="sp"></div>
                    <div class="con_propiedad">CÓDIGO</div>
                    <div class="sp"></div>
                    <div class="con_ir">SELECC.</div>
                    <div class="clear"></div>
                    
					<?php
                     if(count($listaBot)>0){
                         for($i=0;$i<(count($listaBot));$i++) {
            
                    ?>            
                    
                    <!--cuerpo-->
                    
                    
                    <div class="cont_nombre"><a href="2_modificarNoticia4.php?id=<?php echo $listaBot[$i]['codigo']; ?>"><?php echo $listaBot[$i]['titulo']; ?></a></div>
                    <div class="sp2"></div>
                    <div class="cont_propiedad"><?php echo $listaBot[$i]['codigo_propiedad']; ?></div> 
                    <div class="sp2"></div>
                    <div class="cont_ir"><a href="2_modificarNoticia4.php?id=<?php echo $listaBot[$i]['codigo']; ?>">IR</a></div> 
                     
                    <!--cuerpo-->
                    
					<?php
                                    }
                    }
                    ?>	                    
                   
                </div>
            
       
        
</div>
                 <div class="clear"></div>

            <div id="admin_footerx"></div>
        </div>

    </body>
</html>
