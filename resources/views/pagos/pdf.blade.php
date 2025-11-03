<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Comprobante de Pago</title>
  <style>
    body {
      font-family: DejaVu Sans, Arial, sans-serif;
      color: #222;
      font-size: 14px;
      margin: 40px;
    }

    /* === ENCABEZADO === */
    .encabezado {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 40px;
    }

    .documento-box {
      border: 2px solid #5a5cd6;
      border-radius: 12px;
      padding: 20px 25px;
      text-align: center;
      width: 180px;
    }
    .documento-box h3 {
      margin: 0;
      font-size: 15px;
      font-weight: 700;
      color: #1f1f1f;
    }

    .info-pago {
      text-align: left;
      line-height: 1.6;
      font-size: 15px;
    }
    .info-pago strong {
      font-weight: 600;
    }

    .logo-area {
      text-align: right;
    }
    .logo-area img {
      width: 120px;
      
    }

    /* === INFORMACIÓN PRINCIPAL === */
    .empresa {
      margin-top: 40px;
    }
    .empresa h1 {
      color: #4b4fc1;
      margin-bottom: 8px;
      font-size: 32px;
    }
    .empresa p {
      font-size: 15px;
      color: #333;
    }

    /* === TARJETA DE DETALLES === */
    .card {
      border: 1px solid #ccc;
      border-radius: 10px;
      padding: 24px 28px;
      margin-top: 30px;
      background: #fafafa;
    }
    .row {
      display: flex;
      justify-content: space-between;
      margin-bottom: 10px;
    }
    .label {
      font-weight: 700;
      color: #333;
      width: 180px;
    }

    /* === PIE DE PÁGINA === */
    .footer {
      text-align: center;
      margin-top: 40px;
      font-size: 13px;
      color: #555;
    }
  </style>
</head>
<body>
  <!-- ENCABEZADO -->
  <div class="encabezado">
    <div class="documento-box">
      <h3>DOCUMENTO<br>DE PAGO</h3>
    </div>

    <div class="info-pago">
      <p><strong>Número:</strong> #N°{{ $pago->codigo }}</p>
      <p><strong>Fecha:</strong> {{ $pago->fecha_pago ? \Carbon\Carbon::parse($pago->fecha_pago)->format('d/m/y') : '' }}</p>
    </div>

    <div class="logo-area">
      <img src="{{ public_path('img/logo_finance.png') }}" alt="Finance Logo">
    </div>
  </div>

  <!-- INFORMACIÓN EMPRESA -->
  <div class="empresa">
    <h1>FINANCE</h1>
    <p>Financiera dedicada a otorgar créditos empresariales y personales a nivel nacional</p>
  </div>

  <!-- DETALLE DEL PAGO -->
  <div class="card">
    <div class="row"><div class="label">Código:</div><div>{{ $pago->codigo }}</div></div>
    <div class="row"><div class="label">Cliente:</div><div>{{ $pago->cliente }}</div></div>
    <div class="row"><div class="label">Producto:</div><div>{{ $pago->producto }}</div></div>
    <div class="row"><div class="label">Tipo:</div><div>{{ $pago->tipo }}</div></div>
    <div class="row"><div class="label">Fecha de Pago:</div><div>{{ $pago->fecha_pago ? \Carbon\Carbon::parse($pago->fecha_pago)->format('d/m/Y') : '' }}</div></div>
    <div class="row"><div class="label">Monto Mínimo:</div><div>S/. {{ number_format($pago->monto_minimo, 2) }}</div></div>
    <div class="row"><div class="label">Monto Máximo:</div><div>S/. {{ number_format($pago->monto_maximo, 2) }}</div></div>
  </div>

  <div class="footer">
    <p>© {{ date('Y') }} FINANCE - Todos los derechos reservados</p>
  </div>
</body>
</html>



