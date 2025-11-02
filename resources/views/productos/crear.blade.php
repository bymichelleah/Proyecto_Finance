@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/productos.css') }}">
@endsection

@section('contenido')
<section class="editar-producto">
    <section class="formulario-editar">
        <h2>
            Crear / Producto
            <img src="{{ asset('img/productos/Frame 1.png') }}" alt="icono">
        </h2>

        {{-- Mensaje de éxito --}}
        @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        {{-- Errores --}}
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul style="margin:0;">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('productos.store') }}" method="POST">
            @csrf
            <section class="campos">
                <div class="mb-3">
                    <label>Producto</label>
                    <input type="text" name="producto" class="form-control" value="{{ old('producto') }}">
                </div>

                <div class="mb-3">
                    <label>Tipo</label>
                    <select name="tipo" class="form-control">
                        <option value="cuenta_ahorros" {{ old('tipo')=='cuenta_ahorros'?'selected':'' }}>Cuenta de ahorros</option>
                        <option value="tarjeta_debito" {{ old('tipo')=='tarjeta_debito'?'selected':'' }}>Tarjeta de débito</option>
                        <option value="credito_personal" {{ old('tipo')=='credito_personal'?'selected':'' }}>Crédito personal</option>
                        <option value="tarjeta_credito" {{ old('tipo')=='tarjeta_credito'?'selected':'' }}>Tarjeta de crédito</option>
                    </select>
                </div>
            </section>

            <section class="campos">
                <div class="mb-3">
                    <label>Tasa de interés (%)</label>
                    <input type="number" step="0.01" name="tasa_interes" value="{{ old('tasa_interes') }}">
                </div>

                <div class="mb-3">
                    <label>Plazo (meses)</label>
                    <input type="number" name="plazo_meses" value="{{ old('plazo_meses') }}">
                </div>
            </section>
            <section class="campos">
                <div class="mb-3">
                    <label>Monto mínimo</label>
                    <input type="number" step="0.01" name="monto_minimo" value="{{ old('monto_minimo') }}">
                </div>

                <div class="mb-3">
                    <label>Monto máximo</label>
                    <input type="number" step="0.01" name="monto_maximo" value="{{ old('monto_maximo') }}">
                </div>
            </section>
            <section class="campos">
                <div class="mb-3">
                    <label>Estado</label>
                    <select name="estado">
                        <option value="activo" {{ old('estado')=='activo'?'selected':'' }}>Activo</option>
                        <option value="inactivo" {{ old('estado')=='inactivo'?'selected':'' }}>Inactivo</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label>Descripción</label>
                    <textarea name="descripcion">{{ old('descripcion') }}</textarea>
                </div>
            </section>

            <label for="fileUpload" class="upload-box">
                <img src="https://img.icons8.com/ios-filled/50/ffffff/upload.png" alt="Ícono de subir">
                <p class="bold">Click Para subir</p>
                <p>La imagen no debe pesar más de 2 MB</p>
            </label>
            <input type="file" id="fileUpload" accept="image/*">

            <section class="editar-botones">
                <button class="boton-crear" type="submit" class="btn btn-success">
                    <img src="{{ asset('img/productos/bxs-book-add.svg.png') }}" alt="icono">
                    Registrar</button>
                <a class="boton-eliminar-formulario" href="{{ route('productos.index') }}" class="btn btn-secondary">Cancelar</a>
            </section>
        </form>
    </section>
    <img src="{{ asset('img/productos/Frame 3.png') }}" alt="icono">
</section>
@endsection