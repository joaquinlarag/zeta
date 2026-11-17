<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />


<link rel="stylesheet" href="css/style.css" />
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />

<title>Zeta Arquitectos - Móvil</title>

<!--:::::::::::::META::::::::::::-->

<link href="../imagenes/ico/favicon.ico" type="image/x-icon" rel="shortcut icon" />

<link rel="apple-touch-icon" sizes="180x180" href="../ico/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="../ico/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="../ico/favicon-16x16.png">
<link rel="mask-icon" href="../ico/safari-pinned-tab.svg" color="#5bbad5">
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

<!--:::BOTONERA:::-->

<link rel="stylesheet" href="botonera/responsive-nav.css">
<link rel="stylesheet" href="botonera/styles.css">
<script src="botonera/responsive-nav.js"></script>


<!--:::BOTONERA:::-->

<link rel="stylesheet" type="text/css" href="slick/slick.css"/>
<link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>
</head>

<body>
	<div class="contenedor">
        <!--<aside class="index">
        	<div class="logo-tempo"><img src="imagenes/logo-tempo.jpg" height="100%" /></div>
        </aside>-->

        <section class="main">

          <div class="menu-fixed">

          	<div class="menu">
                <div class="botonera">
                	<?php include_once("botonera-movil.php") ?>
                </div>
            </div>

            <aside class="proyecto-cont">
        		    <a href="index.php"><div class="logo-pe"><img src="../imagenes/logo-zeta.svg" alt="Zeta Arquitectos — Inicio" /></div></a>
            </aside>

          </div>

            <div class="barra-abajo">



              <div class="contenedor-derecha fading">


                <div class="container" style="margin-top:0px; margin-bottom:62px;">

                  <div class="derecha-informacion" style="margin-top:40px;">



                      <h1 class="encabezado-seo">Equipo de Zeta Arquitectos</h1>
                      <div class="titulo-proyecto">
                        <img src="../imagenes/titulo-proyecto.svg" alt="">
                        <div class="titulo-texto">EQUIPO</div>
                      </div>

                      <div class="clear"></div>

                      <div class="contenedor-informacion">
                        <!-- <div class="info-1">
                          Frase:
                        </div> -->
                        <div class="info-nosotros">
                          « La arquitectura es cuestión de armonías, una pura creación del espíritu. Empleando piedra, madera, hormigón, se construyen casas, palacios; eso es construcción: el ingeniero trabajando; pero en un instante, tocas mi corazón, me haces bien, me siento feliz y digo: esto es hermoso, esto es arquitectura, el arte entra en mí. »</br></br>

    Le Corbusier
                        </div>

                      </div>




                  </div>

                  <div class="equipo-item">
                      <div class="equipo-nombre">
                        Daniel Buzeta
                      </div>
                      <img src="../imagenes/equipo-01.png" width="100%" alt="Daniel Buzeta">
                      <div class="equipo-titulo">
                        Arquitecto
                      </div>
                      <div class="equipo-descripcion">
												Pontificia Universidad Católica</br>
			                  de Chile  2011</br>
			                  Master en Arquitectura

                      </div>
                  </div>
                  <div class="equipo-item">
                      <div class="equipo-nombre">
                        NICOLE BARKOS
                      </div>
                      <img src="../imagenes/equipo-02.png" width="100%" alt="Nicole Barkos">
                      <div class="equipo-titulo">
                        Arquitecta
                      </div>
                      <div class="equipo-descripcion">
												Universidad Central 2008</br>
			                  Especialidad en Patrimonio.
                      </div>
                  </div>
                  <div class="equipo-item">
                      <div class="equipo-nombre">
                        NATALIA MOYANO
                      </div>
                      <img src="../imagenes/equipo-03.png" width="100%" alt="Natalia Moyano">
                      <div class="equipo-titulo">
                        Ingeniera Agrónoma
                      </div>
                      <div class="equipo-descripcion">
												Pontificia Universidad Católica</br>
			                  de Chile 2017</br>
			                  Mención Administración de Empresas.
                      </div>
                  </div>

                  <div class="equipo-item">
                      <div class="equipo-nombre">

                      </div>
                      <img src="../imagenes/equipo-04.svg" width="100%" alt="">
                      <div class="equipo-titulo">

                      </div>
                      <div class="equipo-descripcion">

                      </div>
                  </div>




                </div>



              </div>

            </div>

        </section>
        <footer>
			<?php include('footer.php'); ?>
        </footer>
    </div>



<script>
      var navigation = responsiveNav(".nav-collapse", {
        animate: true,                    // Boolean: Use CSS3 transitions, true or false
        transition: 284,                  // Integer: Speed of the transition, in milliseconds
        label: "Menu",                    // String: Label for the navigation toggle
        insert: "after",                  // String: Insert the toggle before or after the navigation
        customToggle: "",                 // Selector: Specify the ID of a custom toggle
        closeOnNavClick: false,           // Boolean: Close the navigation when one of the links are clicked
        openPos: "relative",              // String: Position of the opened nav, relative or static
        navClass: "nav-collapse",         // String: Default CSS class. If changed, you need to edit the CSS too!
        navActiveClass: "js-nav-active",  // String: Class that is added to <html> element when nav is active
        jsClass: "js",                    // String: 'JS enabled' class which is added to <html> element
        init: function(){},               // Function: Init callback
        open: function(){},               // Function: Open callback
        close: function(){}               // Function: Close callback
      });
    </script>
<script type="text/javascript" src="slick/jquery-1.11.0.min.js"></script>
  <script type="text/javascript" src="slick/jquery-migrate-1.2.1.min.js"></script>
  <script type="text/javascript" src="slick/slick.min.js"></script>

  <script type="text/javascript">
    $(document).ready(function(){
      $('.carrusel').slick({
		infinite: true,
		speed: 500,
		fade: true,
		cssEase: 'linear',
		dots:false,
		autoplay:true
      });
    });
  </script>
</body>
</html>
