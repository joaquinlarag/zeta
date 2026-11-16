<?php

$captcha;
if(isset($_POST['g-recaptcha-response'])){
  $captcha=$_POST['g-recaptcha-response'];
}
if(!$captcha){
  ?>
  <script>
  alert('Por favor hacer clic en ReCaptcha');
  window.location.href="index.php";
  </script>

  <?php
  exit;
}
$secretKey = "6Ldy4Z4UAAAAAGUEF9zH5ElF3aPdj9jjwDbom4fH";
$ip = $_SERVER['REMOTE_ADDR'];
$response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);
$responseKeys = json_decode($response,true);
if(intval($responseKeys["success"]) !== 1) {


  ?>
  <script>
  alert('Error ReCaptcha.');
  window.location.href="index.php";
  </script>

  <?php


} else {

session_start();
include_once("conexion/conexion.php");

// $sql = "SELECT * FROM usuarios";
// $result = $conn->query($sql);
//
// if ($result->num_rows > 0) {
//     // output data of each row
//     while($row = $result->fetch_assoc()) {
//
//       echo $row["usuario"]. " " .$row["clave"] ;

      // conexion

      $pass=$_POST['pass'];
      $usuario=$_POST['usuario'];
      $sql="SELECT * FROM usuarios WHERE usuario LIKE '%$usuario'";
      $result = $conn->query($sql);
      $sql2="SELECT * FROM usuarios WHERE clave LIKE '%$pass'";
      $result2 = $conn->query($sql2);


      if ($result->num_rows > 0)
      {
        if ($result->num_rows > 0)
        {
        $_SESSION['name'] = 'cantarias_sess';
        //asigno un nombre a la sesión para poder guardar diferentes datos
        $_SESSION["autentificado"]= "SI";
        //defino la sesión que demuestra que el usuario está autorizado
        $_SESSION["ultimoAcceso"]= date("Y-n-j H:i:s");
        //defino la fecha y hora de inicio de sesión en formato aaaa-mm-dd hh:mm:ss
        header("Location: 2_noticia_ingresar2.php");
        }
        else
        {
        header("Location: index.php?error=1");
        }
      }
      else
      {
      header("Location: index.php?error=1");
      }

      // conexion

  //     }
  // }

$conn->close();



}/*Captcha*/
?>
