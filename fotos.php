<?php
require_once __DIR__ . '/conexion/sitio.php';
require_once __DIR__ . '/conexion/conexion.php';

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
$desde = isset($_GET['desde']) ? (int) $_GET['desde'] : 0;
$fotos = $id > 0 ? zeta_listar_fotos($conn, $id, $desde, zeta_lote_fotos()) : array();

header('Content-Type: text/html; charset=UTF-8');
foreach ($fotos as $i => $archivo) {
    echo zeta_html_foto($archivo, $desde === 0 && $i === 0);
}
