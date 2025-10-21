@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/productos.css') }}">
@endsection

@section('contenido')
<section class="editar-producto">
    <section class="formulario-editar">
        <h2>
            Editar / Producto
            <img src="{{ asset('img/productos/Frame 1.png') }}" alt="icono">
        </h2>
        <form action="{{ route('productos.update', $producto->id) }}" method="POST">
            @csrf
            @method('PUT')

            <section class="campos">
                <div class="mb-3">
                    <label>Producto</label>
                    <input type="text" name="producto" class="form-control" value="{{ $producto->producto }}">
                </div>

                <div class="mb-3">
                    <label>Tipo</label>
                    <select name="tipo" class="form-control">
                        <option value="cuenta_ahorros" {{ $producto->tipo == 'cuenta_ahorros' ? 'selected' : '' }}>Cuenta de ahorros</option>
                        <option value="tarjeta_debito" {{ $producto->tipo == 'tarjeta_debito' ? 'selected' : '' }}>Tarjeta de débito</option>
                        <option value="credito_personal" {{ $producto->tipo == 'credito_personal' ? 'selected' : '' }}>Crédito personal</option>
                        <option value="tarjeta_credito" {{ $producto->tipo == 'tarjeta_credito' ? 'selected' : '' }}>Tarjeta de crédito</option>
                    </select>
                </div>

            </section>

            <section class="campos">
                <div class="mb-3">
                    <label>Tasa de Interés</label>
                    <input type="number" name="tasa_interes" class="form-control" value="{{ $producto->tasa_interes }}">
                </div>

                <div class="mb-3">
                    <label>Plazo en Meses</label>
                    <input type="number" name="plazo_meses" class="form-control" value="{{ $producto->plazo_meses }}">
                </div>
            </section>

            <section class="campos">
                <div class="mb-3">
                    <label>Monto Mínimo</label>
                    <input type="number" name="monto_minimo" class="form-control" value="{{ $producto->monto_minimo }}">
                </div>

                <div class="mb-3">
                    <label>Monto Máximo</label>
                    <input type="number" name="monto_maximo" class="form-control" value="{{ $producto->monto_maximo }}">
                </div>
            </section>

            <section class="campos">
                <div class="mb-3">
                    <label>Estado</label>
                    <select name="estado">
                        <option value="activo" {{ $producto->estado == 'activo' ? 'selected' : '' }}>Activo</option>
                        <option value="inactivo" {{ $producto->estado == 'inactivo' ? 'selected' : '' }}>Inactivo</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label>Descripción</label>
                    <textarea name="descripcion">{{ $producto->descripcion }}</textarea>
                </div>
            </section>

            <label for="fileUpload" class="upload-box">
                <img src="https://img.icons8.com/ios-filled/50/ffffff/upload.png" alt="Ícono de subir">
                <p class="bold">Click Para subir</p>
                <p>La imagen no debe pesar más de 2 MB</p>
            </label>
            <input type="file" id="fileUpload" accept="image/*">

            <section class="editar-botones">
                <button class="boton-actualizar" type="submit">
                    <img src="{{ asset('img/productos/editar.png') }}" alt="icono">
                    Editar
                </button>
                <a class="boton-eliminar-formulario" href="{{ route('productos.index') }}">Cancelar</a>
            </section>

        </form>
    </section>
    <img src="{{ asset('img/productos/Frame 2.png') }}" alt="icono">
</section>
@endsection