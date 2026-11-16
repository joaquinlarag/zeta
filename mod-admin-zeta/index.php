<?php
session_start();
if(!empty($_GET['salir']) && $_GET['salir'] == 1)
{
	session_destroy();
	session_unset();
}

if(isset($_GET['error']))
{
	?>
<script type="text/javascript">

		alert("Usuario o contraseña incorrectas");

</script>
    <?php
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../imagenes/ico/favicon.ico" type="image/x-icon" rel="shortcut icon" />
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<title>::: Administrador Zeta Arquitectos :::</title>
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/jquery.Rut.min.js" type="text/javascript"></script>
<script type="text/javascript">
function valida(){
	if(document.formulario.usuario.value == ""){
		alert("Ingresa el usuario");
		document.formulario.usuario.focus();
		return false;
	}
	if(document.formulario.pass.value == ""){
		alert("Ingresa la contraseña");
		document.formulario.pass.focus();
		return false;
	}
	return true;
}

</script>
<script src='https://www.google.com/recaptcha/api.js'></script>
</head>

<body style="background:#fff;">
<div id="login_index">
    <form id="formu" method="post" name="formulario" action="conectado.php" onsubmit="return valida(this);" >

    <div class="input-user">
        <INPUT TYPE="text" NAME="usuario" MAXLENGTH="16" id="usuario_v" class="texto">
    </div>

    <div class="clear"></div>


    <div class="input-user">
            <INPUT TYPE="password" NAME="pass" MAXLENGTH="14" id="pass_v" class="texto">

    </div>

    <div id="captchasd">
			<div class="g-recaptcha" data-sitekey="6Ldy4Z4UAAAAAKFCRa5X0aXg_DWsW_f_3QwmuKxM"></div>

    </div>

    <div class="input-user">
    <input type="submit" value="INGRESAR" />
    </div>
	<div class="clear"></div>
	<div class="mensaje"><?php if(isset($mensaje)){ echo $mensaje;} ?></div>

	</form>
</div>
</body>
</html>
