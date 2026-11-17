<?php
require_once __DIR__ . '/conexion/sitio.php';
zeta_canonizar('');
require_once 'conexion/conexion.php';
zeta_asegurar_slug($conn);
$zeta_es_portada = true;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//ES" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="es" xml:lang="es" xmlns="https://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />

<title>Zeta Arquitectos</title>

<!--:::::::::::::META::::::::::::-->

<link href="imagenes/ico/favicon.ico" type="image/x-icon" rel="shortcut icon" />

<link rel="apple-touch-icon" sizes="180x180" href="ico/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="ico/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="ico/favicon-16x16.png">
<link rel="mask-icon" href="ico/safari-pinned-tab.svg" color="#5bbad5">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="theme-color" content="#ffffff">

<meta name="description" content="Somos un equipo de profesionales comprometidos con lograr encontrar para cada cliente un proyecto que los identifique y represente. Consideramos como valor fundamental que cada construcción logre una integración armónica con el entorno." />

<meta name="keywords" content="Zeta Arquitectos" />

<meta property="og:type" content="website" />

<meta property="og:title" content="Zeta Arquitectos" />

<meta property="og:image" content="http://www.zetaarquitectos.cl/z/imagenes/fb.png" />

<meta property="og:image:width" content="1200" />

<meta property="og:image:height" content="800" />

<meta property="og:description" content="Somos un equipo de profesionales comprometidos con lograr encontrar para cada cliente un proyecto que los identifique y represente. Consideramos como valor fundamental que cada construcción logre una integración armónica con el entorno." />

<meta property="og:url" content="http://www.zetaarquitectos.cl/z/" />

<!--:::::::::::::META::::::::::::-->

<link rel="stylesheet" type="text/css" href="css/style.css?v=8" />
<link rel="stylesheet" type="text/css" href="css/reset.css" />
<?php include __DIR__ . '/conexion/fuente.php'; ?>


<!--:::::::::::::CARRUSEL:::::::::::-->

        <link rel="stylesheet" type="text/css" href="css/slider_home.css"/>
        <link rel="stylesheet" href="themes/default/default.css" type="text/css" media="screen" />
        <link rel="stylesheet" href="scripts/nivo-slider.css" type="text/css" media="screen" />
        <script type="text/javascript" src="scripts/jquery-1.7.1.min.js"></script>
        <script type="text/javascript" src="scripts/jquery.nivo.slider.pack.js"></script>
        <script type="text/javascript" src="scripts/jquery.nivo.slider.js"></script>

<!--:::::::::::::CARRUSEL:::::::::::-->





</head>
<body>

    <div id="contenedor">
      <?php include('botonera.php'); ?>


			<div class="contenedor-derecha fading">


				<?php
					$loteObras = zeta_lote_obras();
					$obras = zeta_listar_obras($conn, 0, $loteObras);
				?>
				<div class="container" data-cargar="<?php echo htmlspecialchars(zeta_base() . '/obras.php', ENT_QUOTES, 'UTF-8'); ?>" data-desde="<?php echo count($obras); ?>" data-lote="<?php echo $loteObras; ?>" data-pieza=".item" data-fin="<?php echo count($obras) < $loteObras ? '1' : '0'; ?>">
					<?php
						foreach ($obras as $row) {
							echo zeta_html_item_obra($row);
						}
					?>
				</div>


			</div>
    </div> <!--Contenedor-->

<script src="scripts/cargar-mas.js?v=4"></script>

</body>
</html>
