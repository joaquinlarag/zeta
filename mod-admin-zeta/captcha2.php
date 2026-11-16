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
$secretKey = "6LdgblYUAAAAAHl8WyXH_F6T9jFOUnQo2BKboTYZ";
$ip = $_SERVER['REMOTE_ADDR'];
$response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);
$responseKeys = json_decode($response,true);
if(intval($responseKeys["success"]) !== 1) {


  ?>
  <script>
  alert('Error ReCaptcha.');
  window.location.href="captcha1.php";
  </script>

  <?php


} else {

echo "Todo bien";


}/*Captcha*/
?>
