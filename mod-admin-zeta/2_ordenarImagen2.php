<?php
include("conexion/conexion.php");
// aquí ordenaremos los articulos con ajax

// array con el nuevo orden de nuestros registros
$articulos_ordenados 	= $_POST['articulo'];

$pos = 1;
foreach ($articulos_ordenados as $key) {



	// ::::::::CONEXION:::::::

	$sql = "UPDATE imagenes SET orden = " . $pos . " WHERE id = " . $key;
	$result = $conn->query($sql);

	// ::::::::CONEXION:::::::

	$pos++;
}

echo "Los articulos se ordenaron con exito";
?>
