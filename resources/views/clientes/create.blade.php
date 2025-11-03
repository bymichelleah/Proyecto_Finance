@extends('layouts.app')
@section('css')
@section('contenido')

@section('titulo', 'Clientes')
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Nuevo Cliente</title>
    <style>
        /* ============================== */
        /* 1. ESTILOS BASE (MOBILE-FIRST) */
        /* ============================== */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            min-height: 100vh;
            margin: 0;
            padding: 1rem; /* Padding general para móviles */
        }
        .main-wrapper {
            max-width: 1280px;
            margin: 0 auto;
            background-color: white;
            /* Sombra más ligera para móvil */
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1); 
            border-radius: 0.75rem; 
            padding: 1.25rem; /* Padding reducido en móvil */
            display: flex;
            flex-direction: column; /* Apilado en móvil */
            gap: 1.5rem; /* Gap reducido */
        }
        .form-col {
            width: 100%; /* Ocupa todo el ancho en móvil */
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
            font-weight: 800;
            color: #1f2937;
            margin-bottom: 1rem; /* mb-4 */
            padding-bottom: 0.75rem; /* pb-3 */
            border-bottom: 1px solid #e5e7eb;
        }
        
        /* Formulario y Grid */
        .form-grid {
            display: grid;
            grid-template-columns: 1fr; /* Una sola columna en móvil */
            gap: 0.75rem; /* Gap más ajustado */
            margin-bottom: 1rem; /* mb-4 */
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
        input, select {
            /* Se mantienen los estilos de relleno de ancho y padding razonable */
            display: block;
            width: 100%;
            margin-top: 0.25rem;
            padding: 0.5rem 0.75rem; /* Padding ajustado */
            background-color: #f3f4f6;
            border: 1px solid #d1d5db;
            border-radius: 0.5rem;
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            font-size: 0.9rem;
            box-sizing: border-box;
        }
        input:focus, select:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.5);
        }
        .error-field {
            border-color: #ef4444 !important;
        }
        
        /* Botones */
        .button-group {
            display: flex;
            flex-direction: column; /* Apilados verticalmente en móvil */
            gap: 0.75rem; /* Espacio ajustado */
            padding-top: 1rem; /* pt-4 */
            border-top: 1px solid #e5e7eb;
            margin-top: 1rem;
        }
        .btn {
            display: flex;
            align-items: center;
            justify-content: center; /* Centrar texto en botón */
            font-weight: 600;
            padding: 0.75rem 1.5rem; /* Más padding para fácil toque */
            border-radius: 0.5rem;
            border: none;
            cursor: pointer;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            transition: background-color 0.15s ease-in-out;
            width: 100%; /* Ocupa todo el ancho */
            box-sizing: border-box;
        }
        .btn-register {
            background-color: #10b981;
            color: white;
        }
        .btn-clear {
            background-color: #e5e7eb;
            color: #374151;
        }
        
        /* Sidebar (Banner y Upload) - Se apilan y ocupan 100% en móvil */
        .banner-container {
            flex-shrink: 0;
            width: 100%;
        }
        .upload-box {
            min-height: 150px; /* Asegurar que tenga un tamaño clickeable */
        }

        /* Errores de Validación (se mantienen funcionales) */
        .error-message {
            background-color: #fee2e2;
            border-left: 4px solid #ef4444;
            color: #b91c1c;
            padding: 0.75rem; /* Ajuste para móvil */
            border-radius: 0.5rem;
            margin-bottom: 1rem;
            font-size: 0.9rem;
        }
        .error-list {
            list-style: disc;
            margin-top: 0.5rem;
            padding-left: 20px;
        }

        /* ============================== */
        /* 2. MEDIA QUERIES (TABLET & DESKTOP) */
        /* ============================== */

        /* Tablet (sm breakpoint) */
        @media (min-width: 640px) {
            .form-grid {
                grid-template-columns: 1fr 1fr; /* Dos columnas en pantallas más anchas */
            }
            .button-group {
                flex-direction: row; /* Botones vuelven a ser horizontales */
                justify-content: flex-start;
                gap: 1rem;
            }
            .btn {
                width: auto; /* Desactivar ancho 100% */
            }
            .error-message {
                padding: 1rem;
            }
        }

        /* Desktop (lg breakpoint) */
        @media (min-width: 1024px) {
            body {
                padding: 0px /* Más padding alrededor */
            }
            .main-wrapper {
                flex-direction: row; /* Diseño de dos columnas */
                padding: 2.5rem;
                gap: 2rem;
                box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            }
            .form-col {
                width: 66.666%; /* 2/3 */
            }
            .sidebar-col {
                width: 33.333%; /* 1/3 */
            }
            h1 {
                font-size: 1.875rem; /* Vuelve al tamaño de desktop */
                margin-bottom: 1.5rem;
                padding-bottom: 1rem;
            }
            input, select {
                padding: 0.625rem 0.75rem;
            }
        }
    </style>
</head>
<body>
    <div class="main-wrapper">
        
        <div class="form-col">
            <header>
                <h1>Crear / Cliente 👥</h1>
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

            <form action="{{ route('clientes.store') }}" method="POST">
                @csrf

                <div class="form-grid">
                    
                    <div>
                        <label for="nombre">Nombre</label>
                        <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}" required 
                            class="@error('nombre') error-field @enderror" placeholder="Ingrese nombre">
                    </div>

                    <div>
                        <label for="apellido">Apellido</label>
                        <input type="text" id="apellido" name="apellido" value="{{ old('apellido') }}" required 
                            class="@error('apellido') error-field @enderror" placeholder="Ingrese apellido">
                    </div>

                    <div>
                        <label for="n_documento">N° Documento</label>
                        <input type="text" id="n_documento" name="n_documento" value="{{ old('n_documento') }}" required 
                            class="@error('n_documento') error-field @enderror" placeholder="Ingrese n° de documento">
                    </div>

                    <div>
                        <label for="telefono">Teléfono</label>
                        <input type="tel" id="telefono" name="telefono" value="{{ old('telefono') }}" 
                            class="@error('telefono') error-field @enderror" placeholder="Ingrese n° de teléfono">
                    </div>
                    
                    <div>
                        <label for="ocupacion">Ocupación</label>
                        <input type="text" id="ocupacion" name="ocupacion" value="{{ old('ocupacion') }}" 
                            class="@error('ocupacion') error-field @enderror" placeholder="Ingrese ocupación">
                    </div>

                    <div>
                        <label for="correo_electronico">Correo Electrónico</label>
                        <input type="email" id="correo_electronico" name="correo_electronico" value="{{ old('correo_electronico') }}" required
                            class="@error('correo_electronico') error-field @enderror" placeholder="ingrese@gmail.com">
                    </div>
                    
                    <div>
                        <label for="provincia">Provincia</label>
                        <input type="text" id="provincia" name="provincia" value="{{ old('provincia') }}" required 
                            class="@error('provincia') error-field @enderror" placeholder="Ingrese provincia">
                    </div>

                    <div>
                        <label for="distrito">Distrito</label>
                        <input type="text" id="distrito" name="distrito" value="{{ old('distrito') }}" required 
                            class="@error('distrito') error-field @enderror" placeholder="Ingrese distrito">
                    </div>
                    
                    <div class="full-width">
                        <label for="direccion">Dirección</label>
                        <input id="direccion" name="direccion" value="{{ old('direccion') }}" required
                            class="@error('direccion') error-field @enderror" placeholder="Ingrese dirección">
                    </div>

                    <div>
                        <label for="estado">Estado</label>
                        <select id="estado" name="estado" required 
                            class="@error('estado') error-field @enderror">
                            <option value="" selected>Ninguno</option>
                            <option value="Activado" {{ old('estado') == 'Activado' ? 'selected' : '' }}>Activado</option>
                            <option value="Inactivo" {{ old('estado') == 'Inactivo' ? 'selected' : '' }}>Inactivo</option>
                            <option value="Pendiente" {{ old('estado') == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
                        </select>
                    </div>

                    <div>
                        <label for="producto_adquirido_id">Producto Adquirido</label>
                        <select id="producto_adquirido_id" name="producto_adquirido_id"
                            class="@error('producto_adquirido_id') error-field @enderror">
                            <option value="" selected>Ninguno</option>
                            @if(isset($productos))
                                @foreach($productos as $producto)
                                    <option value="{{ $producto->id }}" {{ old('producto_adquirido_id') == $producto->id ? 'selected' : '' }}>
                                        {{ $producto->producto }}
                                    </option>
                                @endforeach
                            @endif
                        </select>
                    </div>


                </div>
                
                <div class="button-group">
                    <button type="submit" class="btn btn-register">
                        ➕ Registrar
                    </button>
                    <button type="button" class="btn btn-clear">
                        Limpiar
                    </button>
                </div>
            </form>
        </div>

        <div class="sidebar-col">
            <div class="banner-container">
                <img src="https://via.placeholder.com/400x300/F0F0F0/888888?text=Banner+Publicitario" alt="Banner Publicitario" class="banner-image">
                <div class="banner-note">
                    Anuncio de prueba, reemplaza esta imagen con tu publicidad real.
                </div>
            </div>

            <div class="upload-box" onclick="document.getElementById('file-upload').click()">
                <span class="upload-icon">☁️</span>
                <p class="upload-text-main">Click Para Subir</p>
                <p class="upload-text-sub">La imagen no debe pesar más de 2 MB</p>
                <input id="file-upload" name="profile_image" type="file" style="display: none;" accept="image/*">
            </div>
        </div>

    </div>

    <script>
        // Simple script para la función "Limpiar"
        document.querySelector('.btn-clear').addEventListener('click', function() {
            document.querySelector('form').reset();
            // Opcional: remover clases de error
            document.querySelectorAll('.error-field').forEach(function(el) {
                el.classList.remove('error-field');
            });
        });
    </script>
</body>
</html>
@endsection