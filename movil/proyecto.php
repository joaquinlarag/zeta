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
        		    <a href="index.php"><div class="logo-pe"><img src="../imagenes/logo-zeta.svg" heigth="80px" /></div></a>
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
                      <img src="../uploads/<?php echo ($row["imagen"]);?>" width="100%" alt="">
                    </a>
                  </div>

                </div>

                <div class="derecha-informacion">



                    <div class="titulo-proyecto">
                      <img src="../imagenes/titulo-proyecto.svg" alt="">
                      <div class="titulo-texto"><?php echo ($row["nombre"]);?></div>
                    </div>

                    <div class="clear"></div>

                    <?php echo zeta_html_nav($anterior, $siguiente, true); ?>

                    <div class="contenedor-informacion">

                      <?php if($row["arquitecto"] != ""){ ?>

                        <div class="info-1">
                          Arquitectos
                        </div>
                        <div class="info-2">
                          <?php echo ($row["arquitecto"]);?>
                        </div>

                      <?php } ?>

                      <?php if($row["colaboradores"] != ""){ ?>

                        <div class="info-1">
                          Colaboradores
                        </div>
                        <div class="info-2">
                          <?php echo ($row["colaboradores"]);?>
                        </div>

                      <?php } ?>

                      <?php if($row["iluminacion"] != ""){ ?>

                        <div class="info-1">
                          Iluminación
                        </div>
                        <div class="info-2">
                          <?php echo ($row["iluminacion"]);?>
                        </div>

                      <?php } ?>

                      <?php if($row["ubicacion"] != ""){ ?>

                      <div class="info-1">
                        Ubicación:
                      </div>
                      <div class="info-2">
                        <?php echo ($row["ubicacion"]);?>
                      </div>

                      <?php } ?>

                      <?php if($row["ano_proyecto"] != ""){ ?>

                      <div class="info-1">
                        Año proyecto:
                      </div>
                      <div class="info-2">
                        <?php echo ($row["ano_proyecto"]);?>
                      </div>

                      <?php } ?>

                      <?php if($row["ano_construccion"] != ""){ ?>

                      <div class="info-1">
                        Año construcción:
                      </div>
                      <div class="info-2">
                        <?php echo ($row["ano_construccion"]);?>
                      </div>

                      <?php } ?>

                      <?php if($row["superficie_construida"] != ""){ ?>

                      <div class="info-1">
                        Superficie construida:
                      </div>
                      <div class="info-2">
                          <?php echo ($row["superficie_construida"]);?>
                      </div>

                      <?php } ?>

                      <?php if($row["ing_estructural"] != ""){ ?>

                      <div class="info-1">
                        Ing Estructural:
                      </div>
                      <div class="info-2">
                        <?php echo ($row["ing_estructural"]);?>
                      </div>

                      <?php } ?>

                      <?php if($row["construccion"] != ""){ ?>

                      <div class="info-1">
                        Construcción:
                      </div>
                      <div class="info-2">
                        <?php echo ($row["construccion"]);?>
                      </div>

                      <?php } ?>

                      <?php if($row["materialidad"] != ""){ ?>

                      <div class="info-1">
                        Materialidad:
                      </div>
                      <div class="info-2">
                        <?php echo ($row["materialidad"]);?>
                      </div>

                      <?php } ?>

                      <?php if($row["fotografia"] != ""){ ?>

                      <div class="info-1">
                        Fotografía:
                      </div>
                      <div class="info-2">
                        <?php echo ($row["fotografia"]);?>
                      </div>

                      <?php } ?>

											<?php if($row["descripcion"] != ""){ ?>

	                    <div class="info-1">
	                      Descripción:
	                    </div>
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

                    <img src="../uploads/<?php echo ($row2["imagen"]);?>" width="100%" alt="">

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
