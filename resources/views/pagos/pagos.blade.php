@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/pagos.css') }}">
@endsection

@section('contenido')
<main class="page">
  <header class="page-header">
    <h1 class="page-title">Pagos Registrados</h1>
    <p class="page-sub">
      En esta sección encontrarás la información de todos nuestros pagos registrados en el sistema financiero.
    </p>

    <div class="info-pill">
      <span class="pill-icon" aria-hidden="true">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none">
          <rect x="3" y="5" width="18" height="14" rx="4" fill="#ffffff" opacity="0.15"/>
          <path d="M8 9H16M8 13H13" stroke="#fff" stroke-width="1.6" stroke-linecap="round"/>
        </svg>
      </span>
      <span class="pill-text">
        Puedes visualizar sus datos, editar su información o gestionar los productos registrados de manera rápida y segura.
      </span>
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
          <th>Monto Mínimo</th>
          <th>Monto Máximo</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        @forelse($pagos as $pago)
<tr>
  <td data-label="Código">{{ $pago->codigo }}</td>
  <td data-label="Cliente">{{ $pago->cliente }}</td>
  <td data-label="Producto">{{ $pago->producto }}</td>
  <td data-label="Tipo">{{ $pago->tipo }}</td>
  <td data-label="Fecha de Pago">{{ $pago->fecha_pago ? \Carbon\Carbon::parse($pago->fecha_pago)->format('d/m/Y') : '' }}</td>
  <td data-label="Monto Mínimo">S/. {{ number_format($pago->monto_minimo, 0, '.', '') }}</td>
  <td data-label="Monto Máximo">S/. {{ number_format($pago->monto_maximo, 0, '.', '') }}</td>
  <td data-label="Acciones">
    <button class="accion-ojo" onclick="verDetalle('{{ $pago->id }}')" aria-label="Ver detalle">
      <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
        <path d="M2 12s4-7 10-7 10 7 10 7-4 7-10 7S2 12 2 12z" stroke="#333" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/>
        <circle cx="12" cy="12" r="3" stroke="#333" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/>
      </svg>
    </button>
  </td>
</tr>

        @empty
          <tr><td colspan="8" class="text-center py-4">No hay pagos registrados.</td></tr>
        @endforelse
      </tbody>
    </table>
  </section>
</main>

<!-- POPUP -->
<div id="popup" class="popup hidden" role="dialog" aria-modal="true" aria-hidden="true">
  <div class="popup-backdrop" onclick="cerrarPopup()"></div>
  <div class="popup-card">
    <header class="popup-header">
      <img src="/img/perfil_pagos.jpeg" alt="Pago" class="popup-img">
      <h2 class="popup-title">Pago Registrado</h2>
    </header>
    <div class="popup-body">
      <p><strong>Código:</strong> <span id="detalle-codigo"></span></p>
      <p><strong>Cliente:</strong> <span id="detalle-cliente"></span></p>
      <p><strong>Producto:</strong> <span id="detalle-producto"></span></p>
      <p><strong>Tipo:</strong> <span id="detalle-tipo"></span></p>
      <p><strong>Fecha:</strong> <span id="detalle-fecha"></span></p>
      <p><strong>Monto mínimo:</strong> <span id="detalle-min"></span></p>
      <p><strong>Monto máximo:</strong> <span id="detalle-max"></span></p>
      <p><strong>Estado:</strong> <span id="detalle-estado"></span></p>
    </div>
    <footer class="popup-footer">
      <a id="btn-descargar" class="btn btn-primary" href="#">Descargar</a>
      <button class="btn btn-secondary" onclick="cerrarPopup()">Regresar</button>
    </footer>
  </div>
</div>

@endsection

@push('scripts')
<script src="{{ asset('js/pagos.js') }}"></script>




