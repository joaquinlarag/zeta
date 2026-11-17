<?php
function zeta_base() {
    $dir = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME']));
    if (substr($dir, -6) === '/movil') {
        $dir = dirname($dir);
    }
    if ($dir === '/' || $dir === '.' || $dir === '') {
        return '';
    }
    return rtrim($dir, '/');
}

function zeta_es_movil() {
    $useragent = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '';
    return (preg_match('/android.+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|e\-|e\/|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(di|rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|xda(\-|2|g)|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)));
}

function zeta_redirigir_movil($ruta) {
    if (!zeta_es_movil()) {
        return;
    }
    header('Location: ' . zeta_base() . $ruta);
    exit;
}

function zeta_slug($nombre) {
    $texto = trim((string) $nombre);
    if (function_exists('iconv')) {
        $convertido = iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $texto);
        if ($convertido !== false) {
            $texto = $convertido;
        }
    }
    $texto = strtolower($texto);
    $texto = str_replace(array("'", '`', '´', '^', '~'), '', $texto);
    $texto = preg_replace('/[^a-z0-9]+/', '-', $texto);
    $texto = trim($texto, '-');
    if ($texto === '') {
        $texto = 'proyecto';
    }
    return $texto;
}

function zeta_slug_libre($conn, $base, $exceptoId = 0) {
    $slug = $base;
    $n = 2;
    $exceptoId = (int) $exceptoId;
    while (true) {
        $stmt = $conn->prepare('SELECT id FROM propiedades WHERE slug = ? AND id <> ? LIMIT 1');
        $stmt->bind_param('si', $slug, $exceptoId);
        $stmt->execute();
        $stmt->store_result();
        $existe = $stmt->num_rows > 0;
        $stmt->close();
        if (!$existe) {
            return $slug;
        }
        $slug = $base . '-' . $n;
        $n++;
    }
}

function zeta_asegurar_slug($conn) {
    static $listo = false;
    if ($listo) {
        return;
    }
    $listo = true;

    $col = $conn->query("SHOW COLUMNS FROM propiedades LIKE 'slug'");
    if (!$col || $col->num_rows === 0) {
        if (!$conn->query("ALTER TABLE propiedades ADD COLUMN slug VARCHAR(191) NULL")) {
            return;
        }
    }

    $vacios = $conn->query("SELECT id, nombre FROM propiedades WHERE slug IS NULL OR slug = ''");
    if ($vacios) {
        while ($fila = $vacios->fetch_assoc()) {
            $id = (int) $fila['id'];
            $slug = zeta_slug_libre($conn, zeta_slug($fila['nombre']), $id);
            $stmt = $conn->prepare('UPDATE propiedades SET slug = ? WHERE id = ?');
            $stmt->bind_param('si', $slug, $id);
            $stmt->execute();
            $stmt->close();
        }
    }

    $idx = $conn->query("SHOW INDEX FROM propiedades WHERE Key_name = 'slug_unico'");
    if ($idx && $idx->num_rows === 0) {
        $conn->query("ALTER TABLE propiedades ADD UNIQUE KEY slug_unico (slug)");
    }
}

function zeta_obra($conn) {
    zeta_asegurar_slug($conn);
    if (!empty($_GET['slug'])) {
        $slug = (string) $_GET['slug'];
        if (!preg_match('/^[a-z0-9-]+$/', $slug)) {
            return null;
        }
        $stmt = $conn->prepare('SELECT * FROM propiedades WHERE slug = ? LIMIT 1');
        $stmt->bind_param('s', $slug);
    } elseif (isset($_GET['id']) && ctype_digit((string) $_GET['id'])) {
        $id = (int) $_GET['id'];
        $stmt = $conn->prepare('SELECT * FROM propiedades WHERE id = ? LIMIT 1');
        $stmt->bind_param('i', $id);
    } else {
        return null;
    }
    $stmt->execute();
    $resultado = $stmt->get_result();
    $fila = $resultado ? $resultado->fetch_assoc() : null;
    $stmt->close();
    return $fila ? $fila : null;
}

function zeta_vecinos($conn, $idActual) {
    $sql = "SELECT id, slug, nombre FROM propiedades ORDER BY CASE WHEN tipo IN ('Terminada', 'Terminado') THEN 0 ELSE 1 END, orden ASC, id ASC";
    $resultado = $conn->query($sql);
    $lista = array();
    if ($resultado) {
        while ($fila = $resultado->fetch_assoc()) {
            $lista[] = $fila;
        }
    }
    $anterior = null;
    $siguiente = null;
    foreach ($lista as $i => $item) {
        if ((int) $item['id'] === (int) $idActual) {
            if ($i > 0) {
                $anterior = $lista[$i - 1];
            }
            if ($i < count($lista) - 1) {
                $siguiente = $lista[$i + 1];
            }
            break;
        }
    }
    return array($anterior, $siguiente);
}

function zeta_href($pagina = '') {
    $base = zeta_base();
    $raiz = ($base === '' ? '' : $base);
    if ($pagina === '') {
        return $raiz === '' ? '/' : $raiz . '/';
    }
    return $raiz . '/' . $pagina . '/';
}

function zeta_canonizar($pagina = '') {
    if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] !== 'GET') {
        return;
    }
    $ruta = parse_url(isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '/', PHP_URL_PATH);
    if ($ruta === null || $ruta === false) {
        return;
    }
    $destino = zeta_href($pagina);
    if ($ruta !== $destino) {
        header('Location: ' . $destino, true, 301);
        exit;
    }
}

function zeta_href_obra($slug, $id, $enMovil = false) {
    if ($slug !== null && $slug !== '') {
        $ruta = 'proyectos/' . $slug . '/';
        return $enMovil ? '../' . $ruta : $ruta;
    }
    return 'proyecto.php?id=' . (int) $id;
}

function zeta_lote_obras() {
    return 8;
}

function zeta_lote_fotos() {
    return 4;
}

function zeta_listar_obras($conn, $desde, $cantidad) {
    $desde = max(0, (int) $desde);
    $cantidad = max(1, min(24, (int) $cantidad));
    $sql = "SELECT id, nombre, slug, tipo, imagen, ano_proyecto, ubicacion FROM propiedades
            WHERE tipo IN ('Terminada', 'Terminado', 'proceso')
            ORDER BY CASE WHEN tipo IN ('Terminada', 'Terminado') THEN 0 ELSE 1 END, orden ASC, id ASC
            LIMIT $cantidad OFFSET $desde";
    $result = $conn->query($sql);
    $filas = array();
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $filas[] = $row;
        }
    }
    return $filas;
}

function zeta_html_encabezado_obra($row) {
    $html = '<h2 class="ontitulo">' . htmlspecialchars((string) $row['nombre'], ENT_QUOTES, 'UTF-8');
    if (isset($row['tipo']) && $row['tipo'] === 'proceso') {
        $html .= '<span> (en obra)</span>';
    }
    $html .= '</h2>';
    if (isset($row['ubicacion']) && trim((string) $row['ubicacion']) !== '') {
        $html .= '<p class="onubicacion">' . htmlspecialchars(trim((string) $row['ubicacion']), ENT_QUOTES, 'UTF-8') . '</p>';
    }
    if (isset($row['ano_proyecto']) && trim((string) $row['ano_proyecto']) !== '') {
        $html .= '<p class="onano">' . htmlspecialchars(trim((string) $row['ano_proyecto']), ENT_QUOTES, 'UTF-8') . '</p>';
    }
    return $html;
}

function zeta_alt_proyecto($nombre, $ubicacion = '', $incluirUbicacion = true) {
    $alt = trim((string) $nombre);
    if ($incluirUbicacion && trim((string) $ubicacion) !== '') {
        $alt .= ', ' . trim((string) $ubicacion);
    }
    return $alt;
}

function zeta_html_dato($etiqueta, $valor) {
    if ($valor === null || (string) $valor === '') {
        return '';
    }
    return '<dt class="info-1">' . htmlspecialchars($etiqueta, ENT_QUOTES, 'UTF-8') . '</dt>'
        . '<dd class="info-2">' . htmlspecialchars((string) $valor, ENT_QUOTES, 'UTF-8') . '</dd>';
}

function zeta_html_item_obra($row, $enMovil = false) {
    $prefijo = $enMovil ? '../' : '';
    $href = htmlspecialchars(zeta_href_obra(isset($row['slug']) ? $row['slug'] : '', $row['id'], $enMovil), ENT_QUOTES, 'UTF-8');
    $img = htmlspecialchars((string) $row['imagen'], ENT_QUOTES, 'UTF-8');
    $alt = htmlspecialchars(zeta_alt_proyecto(isset($row['nombre']) ? $row['nombre'] : '', isset($row['ubicacion']) ? $row['ubicacion'] : ''), ENT_QUOTES, 'UTF-8');
    return '<div class="item">'
        . '<a href="' . $href . '">'
        . '<div class="onimg"><div class="oncaja">' . zeta_html_encabezado_obra($row) . '</div></div>'
        . '<img src="' . $prefijo . 'uploads/' . $img . '" width="100%" alt="' . $alt . '">'
        . '</a></div>';
}

function zeta_listar_fotos($conn, $id, $desde, $cantidad) {
    $id = (int) $id;
    $desde = max(0, (int) $desde);
    $cantidad = max(1, min(12, (int) $cantidad));
    $fotos = array();
    $prop = $conn->query("SELECT imagen FROM propiedades WHERE id=$id");
    if ($prop && ($row = $prop->fetch_assoc()) && $row['imagen'] !== '') {
        $fotos[] = $row['imagen'];
    }
    $galeria = $conn->query("SELECT imagen FROM imagenes WHERE id_propiedad=$id AND imagen<>'' ORDER BY orden ASC, id ASC");
    if ($galeria) {
        while ($foto = $galeria->fetch_assoc()) {
            $fotos[] = $foto['imagen'];
        }
    }
    return array_slice($fotos, $desde, $cantidad);
}

function zeta_fotos_vision() {
    static $lista = null;
    if ($lista !== null) {
        return $lista;
    }
    $rutas = glob(__DIR__ . '/../imagenes/nosotros/Equipo_*.jpg');
    if (!$rutas) {
        $lista = array();
        return $lista;
    }
    natsort($rutas);
    $lista = array();
    foreach ($rutas as $ruta) {
        $nombre = basename($ruta);
        if ($nombre === 'Equipo_16.jpg') {
            continue;
        }
        $lista[] = 'imagenes/nosotros/' . $nombre;
    }
    return $lista;
}

function zeta_html_fotos_vision($desde, $cantidad) {
    $todas = zeta_fotos_vision();
    $total = count($todas);
    $desde = max(0, (int) $desde);
    $cantidad = max(1, min(12, (int) $cantidad));
    $html = '';
    foreach (array_slice($todas, $desde, $cantidad) as $i => $ruta) {
        $indice = $desde + $i;
        $src = htmlspecialchars($ruta, ENT_QUOTES, 'UTF-8');
        $estilos = array();
        if ($indice === 0) {
            $estilos[] = 'margin-top:40px';
        }
        if ($indice === $total - 1) {
            $estilos[] = 'margin-bottom:40px';
        }
        $style = $estilos ? ' style="' . implode(';', $estilos) . ';"' : '';
        $html .= '<img' . $style . ' src="' . $src . '" width="100%" alt="">';
    }
    return $html;
}

function zeta_html_foto($archivo, $esPrimera, $alt = '') {
    $src = htmlspecialchars('uploads/' . $archivo, ENT_QUOTES, 'UTF-8');
    $clase = $esPrimera ? ' class="margen"' : '';
    $altAttr = htmlspecialchars((string) $alt, ENT_QUOTES, 'UTF-8');
    return '<img' . $clase . ' src="' . $src . '" width="100%" alt="' . $altAttr . '">';
}

function zeta_html_nav($anterior, $siguiente, $enMovil = false) {
    if (!$anterior && !$siguiente) {
        return '';
    }
    $html = '<div class="nav-obras">';
    if ($anterior) {
        $url = zeta_href_obra($anterior['slug'], $anterior['id'], $enMovil);
        $html .= '<a class="nav-obra-anterior" href="' . htmlspecialchars($url, ENT_QUOTES, 'UTF-8') . '">Anterior: ' . htmlspecialchars($anterior['nombre'], ENT_QUOTES, 'UTF-8') . '</a>';
    }
    if ($siguiente) {
        $url = zeta_href_obra($siguiente['slug'], $siguiente['id'], $enMovil);
        $html .= '<a class="nav-obra-siguiente" href="' . htmlspecialchars($url, ENT_QUOTES, 'UTF-8') . '">Siguiente: ' . htmlspecialchars($siguiente['nombre'], ENT_QUOTES, 'UTF-8') . '</a>';
    }
    $html .= '</div>';
    return $html;
}
