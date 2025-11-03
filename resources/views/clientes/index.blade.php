@extends('layouts.app')

@section('titulo', 'Clientes')

@section('css')
{{-- Se asume que tendrás un archivo CSS para estilos personalizados, similar al de productos. --}}

<link rel="stylesheet" href="{{ asset('css/clientes.css') }}">
@endsection

@section('contenido')

<section class="modulo-clientes">
<section class="contenido-clientes">
<section class="titulo-clientes">
<h1>Clientes Registrados</h1>
<p class="info">En esta sección encontrarás la información de todos nuestros clientes registrados en el sistema financiero.</p>
</section>

    <!-- Banner Informativo (adaptado de la estructura de productos) -->
    <p class="nota">
        {{-- Usando un placeholder de imagen similar al de productos --}}
        <img src="{{ asset('img/productos/bxs-message-square-detail.svg.png') }}" alt="icono">
        Puedes visualizar sus datos, editar su información o gestionar sus productos adquiridos de manera rápida y segura.
    </p>
</section>

<!-- Sección de Mensajes de Sesión -->
@if (session('success'))
    <div class="mensaje-exito">
        <p>{{ session('success') }}</p>
    </div>
@endif
@if (session('error'))
    <div class="mensaje-error">
        <p>{{ session('error') }}</p>
    </div>
@endif

<!-- Filtros y Acciones (adaptado de la estructura de productos) -->
<section class="filtros">
    <input type="text" placeholder="Buscar Cliente">
    <section class="botones">
        <a class="filtar" href="">
            <img src="{{ asset('img/productos/bx-filter.svg.png') }}" alt="">
            Filtrar
        </a>
        <a class="listar" href="">
            <img src="{{ asset('img/productos/bx-list-ul.svg.png') }}" alt="">
            Listar
        </a>
        <a class="crear-nuevo" href="{{ route('clientes.create') }}">
            <img src="{{ asset('img/clientes/bxs-user-add.svg.png') }}" alt="">
            Crear Nuevo
        </a>
    </section>
</section>

<!-- Tabla de Clientes -->
@if($clientes->isEmpty())
    <div class="sin-registros">
        <p>No hay clientes registrados aún. ¡Crea el primero!</p>
    </div>
@else
    <table cellpadding="10">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre Completo</th>
                <th>Correo Electrónico</th>
                <th>Teléfono</th>
                <th>Estado</th>
                <th>Fecha Registro</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clientes as $cliente)
                <tr>
                    <td>{{ $cliente->id }}</td>
                    <td>{{ $cliente->nombre }} {{ $cliente->apellido }}</td>
                    <td>{{ $cliente->correo_electronico }}</td>
                    <td>{{ $cliente->telefono ?? 'N/A' }}</td>
                    <td class="estado-{{ strtolower($cliente->estado) }}">
                        {{-- Simulación del punto de estado --}}
                        <span class="punto-estado"></span>
                        {{ $cliente->estado }}
                    </td>
                    <td>{{ \Carbon\Carbon::parse($cliente->created_at)->format('d/m/Y') }}</td>
                    <td>
                        <!-- Botón Editar -->
                        <a class="boton-editar" href="{{ route('clientes.edit', $cliente->id) }}">
                            <img src="{{ asset('img/productos/bx-edit-alt.svg.png') }}" alt="icono">
                        </a>

                        <!-- Botón Eliminar (con confirmación simple) -->
                        <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            {{-- NOTA: Se mantiene la sintaxis de confirmación por ser parte del código original de productos. --}}
                            <button class="boton-eliminar" type="submit"
                                onclick="return confirm('¿Estás seguro de eliminar este registro?')">
                                <img src="{{ asset('img/productos/bx-trash.svg.png') }}" alt="icono">
                            </button>
                        </form>

                        <!-- Botón Detalles (Ver) -->
                         <!--<a class="boton-ver" href="#">
                            <img src="{{ asset('img/clientes/bx-show.svg.png') }}" alt="Ver Detalles">
                        </a> -->
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif


</section>
@endsection