<?php
require_once 'conexion/conexion.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />

<title>Zeta Arquitectos</title>

<!--:::::::::::::META::::::::::::-->

<link href="imagenes/favicon.ico" type="image/x-icon" rel="shortcut icon" />

<meta name="description" content="Más de 15 años prestando servicios de comercialización de activos, transporte, maquinaria y vehículos" />

<meta name="keywords" content="Camiones, buses, bus, veículos liviando, maquinaria, semiremolques, maquinarias industriales" />

<meta property="og:type" content="website" />

<meta property="og:title" content="BLG" />

<meta property="og:image" content="http://www.bgl.cl/imagenes/logo.jpg" />

<meta property="og:description" content="Más de 15 años prestando servicios de comercialización de activos, transporte, maquinaria y vehículos" />

<meta property="og:url" content="http://www.bgl.cl" />

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





</head>
<body>

    <div id="contenedor">
			

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





                    <div class="b-description_readmore js-description_readmore">
                        <?php echo $row["descripcion_2"]; ?>
                    </div>
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


                  </div>


                  <?php

              				}
              			}

              		?>

              </div>

			</div>



    </div> <!--Contenedor-->




</body>
</html>
