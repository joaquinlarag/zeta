(function () {
  if (!window.Lenis) {
    return;
  }

  var lenis = null;
  var modo = "";
  var columnaActual = null;
  var observar = null;

  function columna() {
    return document.querySelector(".contenedor-derecha, .derecha-izquierda");
  }

  function esVentana() {
    return window.matchMedia("(max-width: 900px)").matches;
  }

  function alCargar(evento) {
    if (lenis && evento.target && evento.target.tagName === "IMG") {
      lenis.resize();
    }
  }

  function crear() {
    if (lenis) {
      lenis.destroy();
      lenis = null;
    }
    if (observar) {
      observar.disconnect();
      observar = null;
    }
    if (columnaActual) {
      columnaActual.removeEventListener("load", alCargar, true);
      columnaActual = null;
    }

    var ventana = esVentana();
    var caja = columna();
    if (!ventana && !caja) {
      modo = "";
      return;
    }

    lenis = new Lenis({
      wrapper: ventana ? window : caja,
      content: ventana ? document.documentElement : caja,
      autoRaf: true,
      lerp: 0.05,
      smoothWheel: true,
      syncTouch: false,
      overscroll: false
    });
    modo = ventana ? "ventana" : "columna";

    if (!ventana) {
      columnaActual = caja;
      observar = new MutationObserver(function () {
        lenis.resize();
      });
      observar.observe(caja, { childList: true, subtree: true });
      caja.addEventListener("load", alCargar, true);
    }
  }

  var espera;
  window.addEventListener("resize", function () {
    window.clearTimeout(espera);
    espera = window.setTimeout(function () {
      var siguiente = esVentana() ? "ventana" : "columna";
      if (siguiente !== modo) {
        crear();
      } else if (lenis) {
        lenis.resize();
      }
    }, 150);
  });

  crear();
})();
