<?php
require_once '../conexion/conexion.php';
require_once '../conexion/sitio.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />


<link rel="stylesheet" href="css/style.css?id=3245435fgd" />
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
<link rel="stylesheet" href="botonera/styles.css?id=1029g3skdfjfhd">
<script src="botonera/responsive-nav.js"></script>


<!--:::BOTONERA:::-->

<link rel="stylesheet" type="text/css" href="slick/slick.css"/>
<link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>

<!--:::::::::::::CARRUSEL:::::::::::-->
<script src="https://code.jquery.com/jquery-1.12.4.min.js" ></script>
<script src="../scripts/jquery.morelines.js"></script>
<script>
    $(function() {
      $('.js-description_readmore').moreLines({
        linecount: 3,
        baseclass: 'b-description',
        basejsclass: 'js-description',
        classspecific: '_readmore',
        buttontxtmore: "+",
        buttontxtless: "-",
        animationspeed: 550
      });
    });
  </script>

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


                <div class="container">

                  <?php
                    $row = zeta_obra($conn);
                    $anterior = null;
                    $siguiente = null;
                    if ($row) {
                        list($anterior, $siguiente) = zeta_vecinos($conn, $row['id']);
                  ?>

                  <div class="item">
                    <a>
                      <img src="../uploads/<?php echo ($row["imagen"]);?>" width="100%" alt="<?php echo htmlspecialchars(zeta_alt_proyecto($row['nombre'], $row['ubicacion']), ENT_QUOTES, 'UTF-8'); ?>">
                    </a>
                  </div>

                </div>

                <div class="derecha-informacion">



                    <div class="titulo-proyecto">
                      <img src="../imagenes/titulo-proyecto.svg" alt="">
                      <h1 class="titulo-texto"><?php echo htmlspecialchars($row["nombre"], ENT_QUOTES, 'UTF-8'); ?></h1>
                    </div>

                    <div class="clear"></div>

                    <?php echo zeta_html_nav($anterior, $siguiente, true); ?>

                    <div class="contenedor-informacion">

                      <dl class="ficha-datos">
                      <?php
                        echo zeta_html_dato('Arquitectos', $row['arquitecto']);
                        echo zeta_html_dato('Colaboradores', $row['colaboradores']);
                        echo zeta_html_dato('Iluminación', $row['iluminacion']);
                        echo zeta_html_dato('Ubicación:', $row['ubicacion']);
                        echo zeta_html_dato('Año proyecto:', $row['ano_proyecto']);
                        echo zeta_html_dato('Año construcción:', $row['ano_construccion']);
                        echo zeta_html_dato('Superficie construida:', $row['superficie_construida']);
                        echo zeta_html_dato('Ing Estructural:', $row['ing_estructural']);
                        echo zeta_html_dato('Construcción:', $row['construccion']);
                        echo zeta_html_dato('Materialidad:', $row['materialidad']);
                        echo zeta_html_dato('Fotografía:', $row['fotografia']);
                      ?>
                      </dl>

											<?php if($row["descripcion"] != ""){ ?>

	                    <h2 class="info-1">Descripción:</h2>
	                    <div class="altook">

	                      <div class="b-description_readmore js-description_readmore">
	                          <?php echo $row["descripcion"]; ?>
	                      </div>

	                    </div>

	                    <?php } ?>





                    </div>
                    <div class="imagenes-extra">


                    <?php
                      $id_propiedad = (int) $row["id"];
                      $sql2 = "SELECT * FROM imagenes WHERE id_propiedad=$id_propiedad ORDER BY orden ASC";
                      $result2 = $conn->query($sql2);
                      $i2 = 0;
                      if ($result2->num_rows > 0) {
                          // output data of each row
                          while($row2 = $result2->fetch_assoc()) {
                            $i2 = $i2 + 1;
                    ?>

                    <img src="../uploads/<?php echo ($row2["imagen"]);?>" width="100%" alt="<?php echo htmlspecialchars($row["nombre"], ENT_QUOTES, "UTF-8"); ?>">

                    <?php

                        }
                      }

                    ?>

                    </div>

                    <?php
                			}
                		?>

                </div>

              </div>

            </div>
						<div class="linea-separar"></div>
						<div class="volver-proyecto">
							<a href="index.php">Volver a proyectos</a>
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

</body>
</html>
