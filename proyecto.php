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

        <?php
          $loteFotos = zeta_lote_fotos();
          $fotos = zeta_listar_fotos($conn, $row['id'], 0, $loteFotos);
        ?>
        <div class="derecha-imagenes" data-cargar="<?php echo htmlspecialchars(zeta_base() . '/fotos.php?id=' . (int) $row['id'], ENT_QUOTES, 'UTF-8'); ?>" data-desde="<?php echo count($fotos); ?>" data-lote="<?php echo $loteFotos; ?>" data-pieza="img" data-fin="<?php echo count($fotos) < $loteFotos ? '1' : '0'; ?>">
          <?php
            foreach ($fotos as $iFoto => $archivo) {
              echo zeta_html_foto($archivo, $iFoto === 0, zeta_alt_proyecto($row['nombre'], $row['ubicacion'], $iFoto === 0));
            }
          ?>
        </div>

              <div class="derecha-informacion">



                  <div class="titulo-proyecto">
                    <img src="imagenes/titulo-proyecto.svg" alt="">
                    <h1 class="titulo-texto"><?php echo htmlspecialchars($row["nombre"], ENT_QUOTES, 'UTF-8'); ?></h1>
                  </div>

                  <div class="clear"></div>

                  <?php echo zeta_html_nav($anterior, $siguiente, false); ?>

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

<script src="scripts/cargar-mas.js?v=4"></script>

</body>
</html>
