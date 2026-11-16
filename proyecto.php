<?php
require_once __DIR__ . '/conexion/sitio.php';
require_once 'conexion/conexion.php';
$row = zeta_obra($conn);
if ($row && isset($_GET['id']) && !isset($_GET['slug']) && $row['slug'] !== '') {
    header('Location: ' . zeta_base() . '/proyectos/' . $row['slug'] . '/', true, 301);
    exit;
}
if ($row && isset($_GET['slug'])) {
    $ruta = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    if (substr($ruta, -1) !== '/') {
        header('Location: ' . zeta_base() . '/proyectos/' . $row['slug'] . '/', true, 301);
        exit;
    }
}
$anterior = null;
$siguiente = null;
if ($row) {
    list($anterior, $siguiente) = zeta_vecinos($conn, $row['id']);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//ES" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="es" xml:lang="es" xmlns="http://www.w3.org/1999/xhtml">
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

<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.js"></script>
<script type="text/javascript" src="scripts/readmore.js"></script>

<script type="text/javascript">

</script> -->




        <!-- <script type="text/javascript">

        $(document).ready(function() {
        $("#toggle").click(function() {
          var elem = $("#toggle").text();
          if (elem == "+") {
            //Stuff to do when btn is in the read more state
            $("#toggle").text("-");
            $("#text").slideDown();
          } else {
            //Stuff to do when btn is in the read less state
            $("#toggle").text("+");
            $("#text").slideUp();
          }
        });
        });


        </script> -->
<!--:::::::::::::CARRUSEL:::::::::::-->
<script src="https://code.jquery.com/jquery-1.12.4.min.js" ></script>
<script src="scripts/jquery.morelines.js"></script>
<script>
    $(function() {
      $('.js-description_readmore').moreLines({
        linecount: 2,
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

    <div id="contenedor">
			<?php include('botonera.php'); ?>

			<div class="derecha-izquierda fading">

        <?php
          if ($row) {
        ?>

        <div class="derecha-imagenes">


							<img class="margen" src="uploads/<?php echo ($row["imagen"]);?>" width="100%" alt="">

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

              <img src="uploads/<?php echo ($row2["imagen"]);?>" width="100%" alt="">

              <?php

                  }
                }

              ?>


        </div>

              <div class="derecha-informacion">



                  <div class="titulo-proyecto">
                    <img src="imagenes/titulo-proyecto.svg" alt="">
                    <div class="titulo-texto"><?php echo ($row["nombre"]);?></div>
                  </div>

                  <div class="clear"></div>

                  <?php echo zeta_html_nav($anterior, $siguiente, false); ?>

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
                    <div class="info-2">


                          <?php echo $row["descripcion"]; ?>
                      

                    </div>

                    <!-- <div class="altook">

                      <div class="b-description_readmore js-description_readmore">
                          <?php //echo $row["descripcion"]; ?>
                      </div>

                    </div> -->

                    <?php } ?>

                  </div>

              </div>
        <?php
          } else {
        ?>
              <p class="nav-obras">Esta obra no está publicada.</p>
        <?php
          }
        ?>

			</div>



    </div> <!--Contenedor-->




</body>
</html>
