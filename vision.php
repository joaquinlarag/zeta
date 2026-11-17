<?php
require_once __DIR__ . '/conexion/sitio.php';
zeta_canonizar('vision');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<base href="<?php echo htmlspecialchars(zeta_base() === '' ? '/' : zeta_base() . '/', ENT_QUOTES, 'UTF-8'); ?>">
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

<link rel="stylesheet" type="text/css" href="css/style.css?v=6" />
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

			<div class="derecha-izquierda fading">


        <?php
          require_once __DIR__ . '/conexion/sitio.php';
          $loteVision = zeta_lote_fotos();
          $visionTotal = count(zeta_fotos_vision());
        ?>
        <div class="derecha-imagenes" style="margin:0px 0 0 0" data-cargar="<?php echo htmlspecialchars(zeta_base() . '/vision-fotos.php', ENT_QUOTES, 'UTF-8'); ?>" data-desde="<?php echo min($loteVision, $visionTotal); ?>" data-lote="<?php echo $loteVision; ?>" data-pieza="img" data-fin="<?php echo $visionTotal <= $loteVision ? '1' : '0'; ?>">
          <?php echo zeta_html_fotos_vision(0, $loteVision); ?>
        </div>

              <div class="derecha-informacion">



                  <h1 class="encabezado-seo">Nuestra visión de la arquitectura</h1>
                  <div class="titulo-proyecto">
                    <img src="imagenes/titulo-proyecto.svg" alt="">
                    <div class="titulo-texto">NUESTRA VISIÓN</div>
                  </div>

                  <div class="clear"></div>

                  <div class="contenedor-informacion">
                    <!-- <div class="info-1">
                      NUESTRA VISIÓN
                    </div> -->
                    <div class="info-nosotros">
                      Somos un equipo de profesionales comprometidos con lograr encontrar para cada cliente un proyecto que los identifique y represente.
                    </br></br> Consideramos como valor fundamental que cada construcción logre una integración armónica con el entorno. Preferimos los materiales nobles, con carácter, sin descuidar los detalles y terminaciones. </br></br>Aplicamos en cada proyecto lógicas de sostenibilidad pasivas </br>-emplazamiento inteligente, asoleamiento, ventilación cruzada, aleros, materiales reutilizados, reciclaje de aguas residuales, etc.-</br></br> Y cuando es posible integramos estrategias ecológicas activas </br>–paneles solares, cubiertas vegetales, termo-solares, iluminación inteligente-. Buscamos ante todo lograr una relación de amistad entre todas las personas que participan en el intenso proceso de diseñar y construir cualquier tipo de proyecto.
                    </div>
                  </div>



              </div>

			</div>



    </div> <!--Contenedor-->

<script src="scripts/cargar-mas.js?v=5"></script>

</body>
</html>
