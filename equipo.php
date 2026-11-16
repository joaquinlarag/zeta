<?php
require_once __DIR__ . '/conexion/sitio.php';
zeta_redirigir_movil('/movil/equipo.php');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Zeta Arquitectos</title>

<!--:::::::::::::META::::::::::::-->

<link href="imagenes/ico/favicon.ico" type="image/x-icon" rel="shortcut icon" />

<link rel="apple-touch-icon" sizes="180x180" href="ico/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="ico/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="ico/favicon-16x16.png">
<link rel="manifest" href="ico/site.webmanifest">
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

<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="stylesheet" type="text/css" href="css/reset.css" />


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


        <div class="derecha-imagenes">


          <div class="container" style="margin-top:62px; margin-bottom:62px;">

            <div class="equipo-item">
                <div class="equipo-nombre">
                  Daniel Buzeta
                </div>
                <img src="imagenes/equipo-01.png" width="100%" alt="">
                <div class="equipo-titulo">
                  Arquitecto:
                </div>
                <div class="equipo-descripcion">
                  Master en Arquitectura</br>
Pontificia Universidad Católica</br>
de Chile  2011
                </div>
            </div>
            <div class="equipo-item">
                <div class="equipo-nombre">
                   NICOLE BARKOS
                </div>
                <img src="imagenes/equipo-02.png" width="100%" alt="">
                <div class="equipo-titulo">
                  Arquitecta:
                </div>
                <div class="equipo-descripcion">
                  Especialidad en Patrimonio. </br>
Universidad Central 2008
                </div>
            </div>
            <div class="equipo-item">
                <div class="equipo-nombre">
                  NATALIA MOYANO
                </div>
                <img src="imagenes/equipo-03.png" width="100%" alt="">
                <div class="equipo-titulo">
                  Ingeniera Agrónoma:
                </div>
                <div class="equipo-descripcion">
                  Mención Administración de Empresas.</br>
Pontificia Universidad Católica</br>
de Chile 2017
                </div>
            </div>

            <div class="equipo-item">
                <div class="equipo-nombre">

                </div>
                <img src="imagenes/equipo-04.svg" width="100%" alt="">
                <div class="equipo-titulo">

                </div>
                <div class="equipo-descripcion">

                </div>
            </div>




          </div>

        </div>

              <div class="derecha-informacion">



                  <div class="titulo-proyecto">
                    <img src="imagenes/titulo-proyecto.svg" alt="">
                    <div class="titulo-texto">EQUIPO</div>
                  </div>

                  <div class="clear"></div>

                  <div class="contenedor-informacion">
                    <div class="info-1">
                      Frase:
                    </div>
                    <div class="info-nosotros">
                      « La arquitectura es cuestión de armonías, una pura creación del espíritu. Empleando piedra, madera, hormigón, se construyen casas, palacios; eso es construcción: el ingeniero trabajando; pero en un instante, tocas mi corazón, me haces bien, me siento feliz y digo: esto es hermoso, esto es arquitectura, el arte entra en mí. »</br></br>

Le Corbusier
                    </div>
                  </div>



              </div>

			</div>



    </div> <!--Contenedor-->




</body>
</html>
