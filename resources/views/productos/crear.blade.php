@extends('layouts.app')

@section('contenido')
<div class="container">
    <h2>Crear nuevo producto</h2>

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

        <div class="mb-3">
            <label>Producto</label>
            <input type="text" name="producto" value="{{ old('producto') }}">
        </div>

        <div class="mb-3">
            <label>Tipo</label>
            <select name="tipo">
                <option value="cuenta_ahorros" {{ old('tipo')=='cuenta_ahorros'?'selected':'' }}>Cuenta de ahorros</option>
                <option value="tarjeta_debito" {{ old('tipo')=='tarjeta_debito'?'selected':'' }}>Tarjeta de débito</option>
                <option value="credito_personal" {{ old('tipo')=='credito_personal'?'selected':'' }}>Crédito personal</option>
                <option value="tarjeta_credito" {{ old('tipo')=='tarjeta_credito'?'selected':'' }}>Tarjeta de crédito</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Tasa de interés (%)</label>
            <input type="number" step="0.01" name="tasa_interes" value="{{ old('tasa_interes') }}">
        </div>

        <div class="mb-3">
            <label>Plazo (meses)</label>
            <input type="number" name="plazo_meses" value="{{ old('plazo_meses') }}">
        </div>

        <div class="mb-3">
            <label>Monto mínimo</label>
            <input type="number" step="0.01" name="monto_minimo" value="{{ old('monto_minimo') }}">
        </div>

        <div class="mb-3">
            <label>Monto máximo</label>
            <input type="number" step="0.01" name="monto_maximo" value="{{ old('monto_maximo') }}">
        </div>

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

        <button type="submit" class="btn btn-success">Crear</button>
        <a href="{{ route('productos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
