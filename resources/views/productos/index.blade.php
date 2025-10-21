@extends('layouts.app')

@section('titulo', 'Productos')

@section('css')
<link rel="stylesheet" href="{{ asset('css/productos.css') }}">
@endsection

@section('contenido')
<section class="modulo-productos">
    <section class="contenido-productos">
        <section class="titulo-productos">
            <h1>Productos Registrados</h1>
            <p class="info">En esta sección encontrarás la información de todos nuestros productos registrados en el sistema financiero.</p>
        </section>

        <p class="nota">
            <img src="{{ asset('img/productos/bxs-message-square-detail.svg.png') }}" alt="icono">
            Puedes visualizar sus datos, editar su información o gestionar los productos registrado de manera rápida y segura.
        </p>
    </section>

    <section class="filtros">
        <input type="text" placeholder="Buscar Producto">
        <section class="botones">
            <a class="filtar" href="">
                <img src="{{ asset('img/productos/bx-filter.svg.png') }}" alt="icono">
                Filtrar
            </a>
            <a class="listar" href="">
                <img src="{{ asset('img/productos/bx-list-ul.svg.png') }}" alt="icono">
                Listar
            </a>
            <a class="crear-nuevo" href="{{ route('productos.create') }}">
                <img src="{{ asset('img/productos/bxs-book-add.svg.png') }}" alt="icono">
                Crear Nuevo
            </a>
        </section>
    </section>

    <table cellpadding="10">
        <thead>
            <tr>
                <th>Código</th>
                <th>Producto</th>
                <th>Tipo</th>
                <th>Tasa<br>Interés %</th>
                <th>Plazo de <br> meses</th>
                <th>Monto Mínimo</th>
                <th>Monto Máximo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productos as $producto)
            <tr>
                <td>{{ $producto->id }}</td>
                <td>{{ $producto->producto }}</td>
                <td>{{ $producto->tipo }}</td>
                <td>{{ $producto->tasa_interes }}</td>
                <td>{{ $producto->plazo_meses }}</td>
                <td class="minimo" style="display:flex; align-items:center; justify-content:center; gap:6px;">
                    {{ $producto->monto_minimo }}
                    <img src="{{ asset('img/productos/bxs-arrow-from-top.svg.png') }}" alt="icono">
                </td>
                <td class="maximo" style="align-items:center;">
                    {{ $producto->monto_maximo }}
                    <img src="{{ asset('img/productos/bxs-arrow-from-bottom.svg.png') }}" alt="icono">
                </td>
                <td>
                    <!-- Botón Editar -->
                    <a class="boton-editar" href="{{ route('productos.editar', $producto->id) }}">
                        <img src="{{ asset('img/productos/bx-edit-alt.svg.png') }}" alt="icono">
                    </a>


                    <!-- Botón Eliminar -->
                    <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button class="boton-eliminar" type="submit"
                            onclick="return confirm('¿Estás seguro de eliminar este registro?')">
                            <img src="{{ asset('img/productos/bx-trash.svg.png') }}" alt="icono">
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</section>
@endsection