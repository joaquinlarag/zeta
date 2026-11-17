<?php
require_once __DIR__ . '/conexion/sitio.php';

$desde = isset($_GET['desde']) ? (int) $_GET['desde'] : 0;

header('Content-Type: text/html; charset=UTF-8');
echo zeta_html_fotos_vision($desde, zeta_lote_fotos());
