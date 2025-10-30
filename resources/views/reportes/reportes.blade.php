@extends('layouts.app')

@section('css')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="{{ asset('css/reportes.css') }}">
@endsection

@section('contenido')
<section class="modulo-reportes">
    <section class="titulo-productos">
            <h1>Reportes Registrados</h1>
            <p class="info">En esta sección encontrarás la información de todo los reportes en gráficos en el sistema financiero.</p>
    </section>

    <div style="padding: 20px; display: grid; grid-template-columns: repeat(2, 1fr); gap: 30px; width: 60rem">
        
        {{-- Gráfico 1: Distribución de Productos Financieros Activos --}}
        <div class="card" style="background: #fff; padding: 20px; border-radius: 12px; box-shadow: 0 0 10px #ddd; background-color: #c8c8ffff">
            <h3 style="margin-bottom: 15px;">Distribución de Productos Financieros Activos</h3>
            <canvas id="productosChart" width="200" height="200"></canvas>
        </div>

        {{-- Gráfico 2: Pagos por sede o región --}}
        <div class="card" style="background: #fff; padding: 20px; border-radius: 12px; box-shadow: 0 0 10px #ddd; background-color: #c8c8ffff">
            <h3 style="margin-bottom: 15px;">Pagos por Sede o Región</h3>
            <canvas id="sedesChart" width="300" height="300" style="background-color: #ffffffff""></canvas>
        </div>

        {{-- Gráfico 3: Ingresos mensuales --}}
        <div class="card" style="background: #fff; padding: 20px; border-radius: 12px; box-shadow: 0 0 10px #ddd; grid-column: span 2;background-color: #c8c8ffff" >
            <h3 style="margin-bottom: 15px;">Ingresos Mensuales</h3>
            <canvas id="ingresosChart" width="600" height="250"></canvas>
        </div>
    </div>
</section>

<script>
    // === Gráfico 1: Productos ===
    const productosCtx = document.getElementById('productosChart');
    new Chart(productosCtx, {
        type: 'doughnut',
        data: {
            labels: ['Créditos', 'Ahorros', 'Inversiones', 'Seguros', 'Tarjetas'],
            datasets: [{
                data: [35, 25, 15, 10, 15],
                backgroundColor: ['#2D2D6F', '#4FE3C1', '#F7A8E3', '#F9E27D', '#E5E5F7'],
            }]
        },
        options: {
            plugins: { legend: { position: 'bottom' } }
        }
    });

    // === Gráfico 2: Pagos por sede ===
    const sedesCtx = document.getElementById('sedesChart');
    new Chart(sedesCtx, {
        type: 'bar',
        data: {
            labels: ['Lima', 'Arequipa', 'Cusco', 'Trujillo', 'Piura'],
            datasets: [{
                label: 'Pagos (S/)',
                data: [ 7200, 9000, 6500, 12000, 8400],
                backgroundColor:['#2D2D6F', '#4FE3C1', '#F7A8E3', '#F9E27D', '#E5E5F7']
            }]
        },
        options: {
            scales: {
                y: { beginAtZero: true }
            }
        }
    });

    // === Gráfico 3: Ingresos mensuales ===
    const ingresosCtx = document.getElementById('ingresosChart');
    new Chart(ingresosCtx, {
        type: 'line',
        data: {
            labels: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Set', 'Oct'],
            datasets: [{
                label: 'Ingresos Mensuales (S/)',
                data: [8500, 9200, 8900, 11000, 10400, 9500, 12000, 12800, 11600, 13800],
                borderColor: '#2D2D6F',
                fill: false,
                tension: 0.3
            }]
        },
        options: {
            scales: {
                y: { beginAtZero: false }
            }
        }
    });
</script>
@endsection
