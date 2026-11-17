<?php
if (!function_exists('zeta_href')) {
    require_once __DIR__ . '/conexion/sitio.php';
}
?>
<div class="contenedor-izquierda">

  <div class="logo-zeta">
    <a href="<?php echo htmlspecialchars(zeta_href(''), ENT_QUOTES, 'UTF-8'); ?>">
    <img src="imagenes/logo-zeta.svg" alt="Zeta Arquitectos — Inicio">
    </a>
  </div>

  <div class="lateral">

  <div id="botonera_menu">
    <ul>
      <li><a href="<?php echo htmlspecialchars(zeta_href(''), ENT_QUOTES, 'UTF-8'); ?>">Proyectos</a></li>
      <li><a href="<?php echo htmlspecialchars(zeta_href('equipo'), ENT_QUOTES, 'UTF-8'); ?>">Equipo</a></li>
      <li><a href="<?php echo htmlspecialchars(zeta_href('vision'), ENT_QUOTES, 'UTF-8'); ?>">Visión</a></li>
    </ul>
  </div>

  <div class="presentacion">
    <?php if (!empty($zeta_es_portada)) { ?>
    <h1 class="presentacion-lugar">Estudio de Arquitectura y Construcción en Pichilemu, Chile</h1>
    <?php } else { ?>
    <p class="presentacion-lugar">Estudio de Arquitectura y Construcción en Pichilemu, Chile</p>
    <?php } ?>
    <p class="presentacion-texto">Oficina dirigida por Daniel Buzeta, dedicada al desarrollo de proyectos residenciales, educacionales e inmobiliarios.</p>
  </div>

  <div class="contacto-lateral">
    <a class="contacto-instagram" href="https://www.instagram.com/zarquitecto" target="_blank" rel="noopener noreferrer">Instagram @zarquitecto</a>
    <a class="contacto-mail" href="mailto:daniel@zarquitectos.cl">daniel@zarquitectos.cl</a>
    <a class="contacto-mail" href="tel:+56982489716">+569 8248 9716</a>

  </div>

  <div class="iso">
    <div class="iso-icono">
      <img src="imagenes/iso.svg" alt="">
    </div>
    <div class="iso-texto">2026</div>
  </div>

  <div class="nu">
    <a href="http://www.losneurona.cl/" target="_blank" rel="noopener noreferrer">
      <span class="nu-texto">Desarrollado por</span>
      <span class="nu-icono"><img src="imagenes/nu.svg" alt=""></span>
    </a>
  </div>

  </div>

</div>
