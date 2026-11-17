<?php
require_once __DIR__ . '/conexion/sitio.php';
require_once __DIR__ . '/conexion/conexion.php';
zeta_asegurar_slug($conn);

$desde = isset($_GET['desde']) ? (int) $_GET['desde'] : 0;
$obras = zeta_listar_obras($conn, $desde, zeta_lote_obras());

header('Content-Type: text/html; charset=UTF-8');
foreach ($obras as $row) {
    echo zeta_html_item_obra($row);
}
