@extends('layouts.app')
@section('css')
@section('contenido')

@section('titulo', 'Clientes')
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cliente: {{ $cliente->nombre }} {{ $cliente->apellido }}</title>
    <style>
        /* ============================== */
        /* ESTILOS BASE (MOBILE-FIRST) */
        /* ============================== */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4; /* Fondo gris claro */
            min-height: 100vh;
            margin: 0;
            padding: 1rem; /* Padding general para móviles */
        }
        .main-wrapper {
            max-width: 1280px;
            margin: 0 auto;
            display: flex;
            flex-direction: column; /* Columna por defecto (móvil) */
            gap: 2rem;
        }
        .form-col {
            background-color: white;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1); /* Sombra más suave en móvil */
            border-radius: 0.75rem;
            padding: 1.5rem; /* Padding reducido en móvil */
            width: 100%;
        }
        .sidebar-col {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
            width: 100%;
        }

        /* Tipografía y Encabezado */
        h1 {
            font-size: 1.5rem; /* Título más pequeño en móvil */
            font-weight: bold;
            color: #1f2937;
            margin-bottom: 0.5rem;
        }
        header p {
            font-size: 0.875rem; /* Subtítulo más pequeño en móvil */
            color: #6b7280;
            margin-bottom: 1rem;
            padding-bottom: 0.75rem;
            border-bottom: 1px solid #e5e7eb;
        }

        /* Formulario y Grid */
        .form-grid {
            display: grid;
            grid-template-columns: 1fr; /* Una columna por defecto */
            gap: 1rem;
            margin-bottom: 1rem;
        }
        .full-width {
            grid-column: 1 / -1;
        }
        
        /* Estilos de Campos de Entrada */
        label {
            display: block;
            font-size: 0.875rem;
            font-weight: 500;
            color: #374151;
            margin-bottom: 0.25rem;
        }
        input, select, textarea {
            /* ... (Estilos de campo ya eran responsivos) ... */
            display: block;
            width: 100%;
            margin-top: 0.25rem;
            padding: 0.625rem 0.75rem;
            background-color: #f3f4f6;
            border: 1px solid #d1d5db;
            border-radius: 0.5rem;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
        }
        input:focus, select:focus, textarea:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.25);
        }
        
        /* Botones */
        .button-group {
            display: flex;
            justify-content: space-between; /* Ajustado para que los botones llenen el ancho en móvil */
            gap: 0.75rem;
            padding-top: 1.5rem;
            border-top: 1px solid #e5e7eb;
            margin-top: 1.5rem;
        }
        .btn {
            font-weight: 600;
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
            border: none;
            cursor: pointer;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: background-color 0.15s;
            flex-grow: 1; /* Permite que los botones se estiren en móvil */
            text-align: center;
            text-decoration: none; /* Para el <a> Cancelar */
        }
        .btn-update {
            background-color: #4f46e5;
            color: white;
        }
        .btn-cancel {
            background-color: #d1d5db;
            color: #1f2937;
        }

        /* ============================== */
        /* MEDIA QUERY (TABLET & DESKTOP) */
        /* ============================== */
        @media (min-width: 80%) { /* breakpoint sm */
            .form-grid {
                grid-template-columns: 1fr 1fr; /* Dos columnas en pantallas más anchas */
            }
            .button-group {
                justify-content: flex-end; /* Vuelve a alinear a la derecha en tablet/desktop */
                flex-grow: 0;
            }
            .btn {
                flex-grow: 0; /* Desactiva el estiramiento en desktop */
                padding: 0.5rem 1.5rem;
            }
        }

        @media (min-width: 1024px) { /* breakpoint lg */
            body {
                padding: 2.5rem 1.5rem; /* Más padding en desktop */
            }
            .main-wrapper {
                flex-direction: row; /* Diseño de dos columnas */
            }
            .form-col {
                width: 66.666%; /* 2/3 */
                padding: 2.5rem;
                box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
            }
            .sidebar-col {
                width: 33.333%; /* 1/3 */
            }
            h1 {
                font-size: 1.875rem;
            }
        }

        /* Otros Estilos (Sin cambios importantes en responsive) */
        .date-input-wrapper { position: relative; }
        .date-icon { position: absolute; right: 0.75rem; top: 50%; transform: translateY(-50%); color: #6b7280; pointer-events: none; margin-top: 0.125rem; }
        .banner-container { background-color: #e5e7eb; border-radius: 0.5rem; overflow: hidden; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); }
        .banner-image { width: 100%; height: auto; display: block; }
        .banner-note { padding: 1rem; background-color: #f3e8ff; color: #6d28d9; font-size: 0.875rem; }
        .upload-box { background-color: #3b82f6; color: white; padding: 1.5rem; border-radius: 0.5rem; text-align: center; cursor: pointer; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); display: flex; flex-direction: column; align-items: center; justify-content: center; min-height: 150px; transition: background-color 0.15s; }
        .upload-box:hover { background-color: #2563eb; }
        .upload-icon { font-size: 3rem; margin-bottom: 0.75rem; }
        .upload-text-main { font-weight: bold; font-size: 1.125rem; }
        .upload-text-sub { font-size: 0.875rem; color: #bfdbfe; }
        .error-message { background-color: #fee2e2; border-left: 4px solid #ef4444; color: #b91c1c; padding: 1rem; border-radius: 0.5rem; margin-bottom: 1.5rem; }
        .error-list { list-style: disc; margin-top: 0.5rem; padding-left: 20px; }
    </style>
</head>
<body>
    
<div class="main-wrapper">
    
    <div class="form-col">
        
        <header>
            <h1>Editar Cliente Existente ✏️</h1>
            <p>Modificando a: **{{ $cliente->nombre }} {{ $cliente->apellido }}** (ID: {{ $cliente->id }}).</p>
        </header>

        @if ($errors->any())
            <div class="error-message">
                <p style="font-weight: bold;">¡Error de Validación!</p>
                <ul class="error-list">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('clientes.update', $cliente->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-grid">
                
                <div>
                    <label for="nombre">Nombre</label>
                    <input type="text" id="nombre" name="nombre" value="{{ old('nombre', $cliente->nombre) }}" required>
                </div>
                <div>
                    <label for="apellido">Apellido</label>
                    <input type="text" id="apellido" name="apellido" value="{{ old('apellido', $cliente->apellido) }}" required>
                </div>

                <div>
                    <label for="n_documento">N° Documento</label>
                    <input type="text" id="n_documento" name="n_documento" value="{{ old('n_documento', $cliente->n_documento) }}" required>
                </div>
                <div>
                    <label for="telefono">Teléfono</label>
                    <input type="tel" id="telefono" name="telefono" value="{{ old('telefono', $cliente->telefono) }}">
                </div>
                
                <div>
                    <label for="correo_electronico">Correo Electrónico</label>
                    <input type="email" id="correo_electronico" name="correo_electronico" value="{{ old('correo_electronico', $cliente->correo_electronico) }}" required>
                </div>
                <div>
                    <label for="ocupacion">Ocupación</label>
                    <input type="text" id="ocupacion" name="ocupacion" value="{{ old('ocupacion', $cliente->ocupacion) }}">
                </div>
                
                <div>
                    <label for="provincia">Provincia</label>
                    <input type="text" id="provincia" name="provincia" value="{{ old('provincia', $cliente->provincia) }}" required>
                </div>
                <div>
                    <label for="distrito">Distrito</label>
                    <input type="text" id="distrito" name="distrito" value="{{ old('distrito', $cliente->distrito) }}" required>
                </div>
                
                <div class="full-width">
                    <label for="direccion">Dirección Completa</label>
                    <textarea id="direccion" name="direccion" rows="2" required>{{ old('direccion', $cliente->direccion) }}</textarea>
                </div>

                <div>
                    <label for="estado">Estado</label>
                    <select id="estado" name="estado" required>
                        <option value="Activado" {{ old('estado', $cliente->estado) == 'Activado' ? 'selected' : '' }}>Activado</option>
                        <option value="Inactivo" {{ old('estado', $cliente->estado) == 'Inactivo' ? 'selected' : '' }}>Inactivo</option>
                        <option value="Pendiente" {{ old('estado', $cliente->estado) == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
                    </select>
                </div>

                <div>
                    <label for="producto_adquirido_id">Producto Adquirido</label>
                    <select id="producto_adquirido_id" name="producto_adquirido_id">
                        <option value="">-- Seleccione un Producto (Opcional) --</option>
                        @if(isset($productos))
                            @foreach($productos as $producto)
                                <option value="{{ $producto->id }}" {{ old('producto_adquirido_id', $cliente->producto_adquirido_id) == $producto->id ? 'selected' : '' }}>
                                    {{ $producto->producto }}
                                </option>
                            @endforeach
                        @endif
                    </select>
                </div>
                
                <div>
                    <label for="fecha_creacion">Fecha de Creación</label>
                    <div class="date-input-wrapper">
                        <input type="date" id="fecha_creacion" name="fecha_creacion" value="{{ old('fecha_creacion', $cliente->created_at->toDateString()) }}" readonly>
                        <span class="date-icon">🗓️</span>
                    </div>
                </div>

            </div>
            
            <div class="button-group">
                <a href="{{ route('clientes.index') }}" class="btn btn-cancel">
                    Cancelar
                </a>
                <button type="submit" class="btn btn-update">
                    Actualizar Cliente
                </button>
            </div>
        </form>

    </div>

    <div class="sidebar-col">
        
        <div class="banner-container">
            <img src="https://via.placeholder.com/400x300/F0F0F0/888888?text=Banner+Publicitario" alt="Banner Publicitario" class="banner-image">
            <div class="banner-note">
                Espacio publicitario.
            </div>
        </div>

        <div class="upload-box" onclick="document.getElementById('file-upload').click()">
            <span class="upload-icon">☁️</span>
            <p class="upload-text-main">Subir Nueva Imagen</p>
            <p class="upload-text-sub">La imagen actual será reemplazada.</p>
            <input id="file-upload" name="profile_image" type="file" style="display: none;" accept="image/*">
        </div>
    </div>

</div>

</body>
</html>

@endsection