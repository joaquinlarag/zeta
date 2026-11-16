<?php
$useragent=$_SERVER['HTTP_USER_AGENT'];
if(preg_match('/android.+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|e\-|e\/|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(di|rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|xda(\-|2|g)|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)))
header('Location: http://bgl.cl/movil/');

require_once 'conexion/conexion.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//ES" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="es" xml:lang="es" xmlns="http://www.w3.org/1999/xhtml">
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
          $id=$_GET['id'];
          $sql = "SELECT * FROM propiedades WHERE id=$id ORDER BY orden ASC";
          $result = $conn->query($sql);
          $i = 0;
          if ($result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_assoc()) {
                $i = $i + 1;
        ?>

        <div class="derecha-imagenes">


							<img class="margen" src="uploads/<?php echo ($row["imagen"]);?>" width="100%" alt="">

              <?php
                $id_propiedad = $row["id"];
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

                    <?php

                				}
                			}

                		?>





                  </div>


              </div>

			</div>



    </div> <!--Contenedor-->




</body>
</html>
