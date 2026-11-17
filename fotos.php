<?php
require_once __DIR__ . '/conexion/sitio.php';
require_once __DIR__ . '/conexion/conexion.php';

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
$desde = isset($_GET['desde']) ? (int) $_GET['desde'] : 0;
$fotos = $id > 0 ? zeta_listar_fotos($conn, $id, $desde, zeta_lote_fotos()) : array();
$nombre = '';
$ubicacion = '';
if ($id > 0) {
    $res = $conn->query("SELECT nombre, ubicacion FROM propiedades WHERE id=$id LIMIT 1");
    if ($res && ($fila = $res->fetch_assoc())) {
        $nombre = (string) $fila['nombre'];
        $ubicacion = (string) $fila['ubicacion'];
    }
}

header('Content-Type: text/html; charset=UTF-8');
foreach ($fotos as $i => $archivo) {
    $esPrimera = $desde === 0 && $i === 0;
    echo zeta_html_foto($archivo, $esPrimera, zeta_alt_proyecto($nombre, $ubicacion, $esPrimera));
}
