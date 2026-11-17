(function () {
  var cajas = document.querySelectorAll('[data-cargar]');
  for (var i = 0; i < cajas.length; i++) {
    preparar(cajas[i]);
  }

  function preparar(caja) {
    if (caja.getAttribute('data-fin') === '1') {
      return;
    }

    var aviso = document.createElement('div');
    aviso.className = 'cargar-mas';
    aviso.style.cssText = 'width:100%;height:1px;clear:both;';
    caja.appendChild(aviso);

    var desde = parseInt(caja.getAttribute('data-desde'), 10) || 0;
    var lote = parseInt(caja.getAttribute('data-lote'), 10) || 8;
    var pieza = caja.getAttribute('data-pieza') || '.item';
    var url = caja.getAttribute('data-cargar');
    var fin = false;
    var cargando = false;
    var listo = false;

    function fotosDe(nodo) {
      return nodo.querySelectorAll('img[src*="uploads/"], img[src*="imagenes/nosotros/"]');
    }

    function esperar(imgs, hecho) {
      var falta = imgs.length;
      function listo() {
        requestAnimationFrame(function () {
          requestAnimationFrame(hecho);
        });
      }
      if (!falta) {
        listo();
        return;
      }
      function uno() {
        falta -= 1;
        if (falta === 0) {
          listo();
        }
      }
      for (var n = 0; n < imgs.length; n++) {
        if (imgs[n].complete) {
          uno();
        } else {
          imgs[n].addEventListener('load', uno);
          imgs[n].addEventListener('error', uno);
        }
      }
    }

    function limiteVisible() {
      var el = caja.parentElement;
      while (el) {
        var y = window.getComputedStyle(el).overflowY;
        if ((y === 'auto' || y === 'scroll') && el.scrollHeight > el.clientHeight + 8) {
          return el.getBoundingClientRect().bottom;
        }
        el = el.parentElement;
      }
      return window.innerHeight;
    }

    function cerca() {
      return aviso.getBoundingClientRect().top - limiteVisible() < 280;
    }

    function escuchar() {
      var el = caja.parentElement;
      while (el) {
        var y = window.getComputedStyle(el).overflowY;
        if (y === 'auto' || y === 'scroll') {
          el.addEventListener('scroll', intentar, { passive: true });
        }
        el = el.parentElement;
      }
      window.addEventListener('scroll', intentar, { passive: true });
    }

    function intentar() {
      if (listo && cerca()) {
        cargar();
      }
    }

    function cargar() {
      if (!listo || fin || cargando || !cerca()) {
        return;
      }
      cargando = true;
      var sep = url.indexOf('?') === -1 ? '?' : '&';
      fetch(url + sep + 'desde=' + desde, { credentials: 'same-origin' })
        .then(function (res) { return res.text(); })
        .then(function (html) {
          var limpio = html.replace(/^\s+|\s+$/g, '');
          if (!limpio) {
            fin = true;
            if (aviso.parentNode) {
              aviso.parentNode.removeChild(aviso);
            }
            return;
          }
          var antes = caja.querySelectorAll(pieza).length;
          aviso.insertAdjacentHTML('beforebegin', limpio);
          var todos = caja.querySelectorAll(pieza);
          var agregados = todos.length - antes;
          desde += agregados;
          if (agregados < lote) {
            fin = true;
            if (aviso.parentNode) {
              aviso.parentNode.removeChild(aviso);
            }
          }
          var nuevas = [];
          for (var n = antes; n < todos.length; n++) {
            if (todos[n].tagName === 'IMG') {
              nuevas.push(todos[n]);
            } else if (todos[n].querySelectorAll) {
              var internas = todos[n].querySelectorAll('img[src*="uploads/"]');
              for (var j = 0; j < internas.length; j++) {
                nuevas.push(internas[j]);
              }
            }
          }
          cargando = false;
          esperar(nuevas, intentar);
        })
        .catch(function () {
          cargando = false;
        });
    }

    escuchar();
    esperar(fotosDe(caja), function () {
      listo = true;
      intentar();
    });
  }
})();
