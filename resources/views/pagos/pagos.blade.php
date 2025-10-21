<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Pagos Registrados</title>

  <!-- CSS personalizado -->
  <link rel="stylesheet" href="{{ asset('css/pagos.css') }}">
</head>
<body>

  <main class="page">

    <header class="page-header">
      <h1 class="page-title">Pagos Registrados</h1>
      <p class="page-sub">En esta sección encontrarás la información de todos nuestros pagos registrados en el sistema financiero.</p>

      <div class="info-pill">
        <span class="pill-icon" aria-hidden="true">
          <!-- icono simple -->
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect x="3" y="5" width="18" height="14" rx="4" fill="#ffffff" opacity="0.15"/>
            <path d="M8 9H16M8 13H13" stroke="#fff" stroke-width="1.6" stroke-linecap="round"/>
          </svg>
        </span>
        <span class="pill-text">Puedes visualizar sus datos, editar su información o gestionar los productos registrado de manera rápida y segura.</span>
      </div>
    </header>

    <section class="table-wrap">
      <table class="pagos-table" role="table" aria-label="Listado de pagos">
        <thead>
          <tr>
            <th>Código</th>
            <th>Cliente</th>
            <th>Producto</th>
            <th>Tipo</th>
            <th>Fecha de Pago</th>
            <th>Monto Minimo</th>
            <th>Monto Maximo</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          @forelse($pagos as $pago)
            <tr>
              <td>{{ $pago->codigo }}</td>
              <td>{{ $pago->cliente }}</td>
              <td>{{ $pago->producto }}</td>
              <td>{{ $pago->tipo }}</td>
              <td>{{ $pago->fecha_pago ? \Carbon\Carbon::parse($pago->fecha_pago)->format('d/m/Y') : '' }}</td>
              <td class="monto-min">S/. {{ number_format($pago->monto_minimo, 0, '.', '') }}
                <span class="icon-down" aria-hidden="true">
                  <!-- flecha roja abajo -->
                  <svg width="12" height="12" viewBox="0 0 24 24"><path d="M12 5v14M5 12l7 7 7-7" fill="none" stroke="#e74c3c" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </span>
              </td>
              <td class="monto-max">S/. {{ number_format($pago->monto_maximo, 0, '.', '') }}
                <span class="icon-up" aria-hidden="true">
                  <!-- flecha verde arriba -->
                  <svg width="12" height="12" viewBox="0 0 24 24"><path d="M12 19V5M5 12l7-7 7 7" fill="none" stroke="#27ae60" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </span>
              </td>
              <td>
                <!-- ojo: pasamos id como string para evitar errores de JS/VSCode -->
                <button class="accion-ojo" onclick="verDetalle('{{ $pago->id }}')" aria-label="Ver detalle">
                  <!-- icono ojo -->
                  <svg width="20" height="20" viewBox="0 0 24 24" fill="none"><path d="M2 12s4-7 10-7 10 7 10 7-4 7-10 7S2 12 2 12z" stroke="#333" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/><circle cx="12" cy="12" r="3" stroke="#333" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </button>
              </td>
            </tr>
          @empty
            <tr><td colspan="8" style="text-align:center;padding:30px 0">No hay pagos registrados.</td></tr>
          @endforelse
        </tbody>
      </table>
    </section>
  </main>

  <!-- POPUP / MODAL (rediseñado) -->
<div id="popup" class="popup hidden" role="dialog" aria-modal="true" aria-hidden="true">
  <div class="popup-backdrop" onclick="cerrarPopup()"></div>
  <div class="popup-card" role="document">

    <header class="popup-header">
      <img src="/img/perfil_pagos.jpeg" alt="Pago" class="popup-img">
      <h2 class="popup-title">Pago Registrado</h2>
    </header>

    <div class="popup-body">
      <p><strong>Código:</strong> <span id="detalle-codigo">001</span></p>
      <p><strong>Cliente:</strong> <span id="detalle-cliente">Ana López</span></p>
      <p><strong>Producto:</strong> <span id="detalle-producto">Tarjeta de Débito</span></p>
      <p><strong>Tipo de Producto:</strong> <span id="detalle-tipo">Ahorro</span></p>
      <p><strong>Fecha de Pago:</strong> <span id="detalle-fecha">25/12/2025</span></p>
      <p><strong>Monto mínimo:</strong> <span id="detalle-min">1200</span></p>
      <p><strong>Monto máximo:</strong> <span id="detalle-max">3200</span></p>
      <p><strong>Estado:</strong> <span id="detalle-estado">Pendiente</span></p>
    </div>

    <footer class="popup-footer">
      <a id="btn-descargar" class="btn btn-primary" href="#">
        Descargar
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
          <polyline points="7 10 12 15 17 10"/>
          <line x1="12" y1="15" x2="12" y2="3"/>
        </svg>
      </a>
      <button class="btn btn-secondary" onclick="cerrarPopup()">Regresar</button>
    </footer>

  </div>
</div>


  <!-- JS personalizado -->
  <script src="{{ asset('js/pagos.js') }}"></script>
</body>
</html>


