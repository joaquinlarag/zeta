<?php
$useragent=$_SERVER['HTTP_USER_AGENT'];
if(preg_match('/android.+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|e\-|e\/|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(di|rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|xda(\-|2|g)|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)))
header('Location: http://bgl.cl/movil/');

require_once 'conexion/conexion.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

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
