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
        /* Estilos Globales y Contenedores */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4; /* bg-gray-100 */
            min-height: 100vh;
            margin: 0;
        }
        .main-wrapper {
            max-width: 1280px; /* max-w-6xl */
            margin: 0 auto; /* mx-auto */
            background-color: white;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04); /* shadow-2xl */
            border-radius: 0.75rem; /* rounded-xl */
            padding: 1.5rem; /* p-6 */
            display: flex;
            flex-direction: column;
            gap: 2rem; /* gap-8 */
        }
        @media (min-width: 1024px) {
            .main-wrapper {
                flex-direction: row; /* lg:flex-row */
                padding: 2.5rem; /* lg:p-10 */
            }
            .form-col {
                width: 66.666%; /* lg:w-2/3 */
            }
            .sidebar-col {
                width: 33.333%; /* lg:w-1/3 */
            }
        }
        
        /* Tipografía y Encabezado */
        h1 {
            font-size: 1.875rem; /* text-3xl */
            font-weight: 800; /* font-extrabold */
            color: #1f2937; /* text-gray-800 */
            margin-bottom: 1.5rem; /* mb-6 */
            padding-bottom: 1rem; /* pb-4 */
        }
        
        /* Formulario y Grid */
        .form-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 1rem; /* gap-4 */
            margin-bottom: 1.5rem; /* mb-6 */
        }
        @media (min-width: 640px) {
            .form-grid {
                grid-template-columns: 1fr 1fr; /* sm:grid-cols-2 */
            }
        }
        .full-width {
            grid-column: 1 / -1; /* sm:col-span-2 */
        }
        
        /* Estilos de Campos de Entrada */
        label {
            display: block;
            font-size: 0.875rem; /* text-sm */
            font-weight: 500; /* font-medium */
            color: #374151; /* text-gray-700 */
            margin-bottom: 0.25rem;
        }
        input, select {
            display: block;
            width: 100%;
            margin-top: 0.25rem; /* mt-1 */
            padding: 0.625rem 0.75rem; /* p-2.5 */
            background-color: #f3f4f6; /* bg-gray-100 */
            border: 1px solid #d1d5db; /* border-gray-300 */
            border-radius: 0.5rem; /* rounded-lg */
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05); /* shadow-sm */
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
        }
        input:focus, select:focus {
            outline: none;
            border-color: #3b82f6; /* focus:border-blue-500 */
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.5); /* focus:ring-blue-500 */
        }
        .error-field {
            border-color: #ef4444 !important; /* border-red-500 */
        }
        .date-input-wrapper {
            position: relative;
        }
        .date-icon {
            position: absolute;
            right: 0.75rem;
            top: 50%;
            transform: translateY(-50%);
            color: #6b7280; /* text-gray-500 */
            pointer-events: none;
            margin-top: 0.125rem; /* mt-2.5 */
        }

        /* Botones */
        .button-group {
            display: flex;
            gap: 1rem; /* space-x-4 */
            padding-top: 1.5rem; /* pt-6 */
            border-top: 1px solid #e5e7eb; /* border-t */
            margin-top: 1rem; /* mt-4 */
        }
        .btn {
            display: flex;
            align-items: center;
            font-weight: 600; /* font-semibold */
            padding: 0.5rem 1.5rem; /* py-2 px-6 */
            border-radius: 0.5rem; /* rounded-lg */
            border: none;
            cursor: pointer;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06); /* shadow */
            transition: background-color 0.15s ease-in-out; /* transition duration-150 ease-in-out */
        }
        .btn-register {
            background-color: #10b981; /* bg-green-500 */
            color: white;
        }
        .btn-register:hover {
            background-color: #059669; /* hover:bg-green-600 */
        }
        .btn-clear {
            background-color: #e5e7eb; /* bg-gray-200 */
            color: #374151; /* text-gray-700 */
        }
        .btn-clear:hover {
            background-color: #d1d5db; /* hover:bg-gray-300 */
        }
        
        /* Sidebar (Banner y Upload) */
        .sidebar-col {
            display: flex;
            flex-direction: column;
            gap: 1.5rem; /* space-y-6 */
        }
        .banner-container {
            background-color: #e5e7eb; /* bg-gray-200 */
            border-radius: 0.5rem; /* rounded-lg */
            overflow: hidden;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1); /* shadow-md */
            flex-shrink: 0;
            width: 100%;
        }
        .banner-image {
            width: 100%;
            height: auto;
            display: block;
        }
        .banner-note {
            padding: 1rem; /* p-4 */
            background-color: #f3e8ff; /* bg-purple-100 */
            color: #6d28d9; /* text-purple-800 */
            font-size: 0.875rem; /* text-sm */
        }
        .upload-box {
            flex-grow: 1; /* flex-grow */
            background-color: #3b82f6; /* bg-blue-500 */
            color: white;
            padding: 1.5rem; /* p-6 */
            border-radius: 0.5rem; /* rounded-lg */
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            cursor: pointer;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1); /* shadow-md */
            transition: background-color 0.15s ease-in-out;
        }
        .upload-box:hover {
            background-color: #2563eb; /* hover:bg-blue-600 */
        }
        .upload-icon {
            font-size: 3rem; /* text-6xl (ajustado) */
            margin-bottom: 0.75rem; /* mb-3 */
        }
        .upload-text-main {
            font-weight: 600; /* font-semibold */
            font-size: 1.125rem; /* text-lg */
        }
        .upload-text-sub {
            font-size: 0.875rem; /* text-sm */
            color: rgba(219, 234, 254, 0.8); /* Ajuste para text-blue-100 */
        }
        
        /* Errores de Validación */
        .error-message {
            background-color: #fee2e2; /* bg-red-100 */
            border-left: 4px solid #ef4444; /* border-l-4 border-red-500 */
            color: #b91c1c; /* text-red-700 */
            padding: 1rem; /* p-4 */
            border-radius: 0.5rem; /* rounded-lg */
            margin-bottom: 1.5rem; /* mb-6 */
        }
        .error-list {
            list-style: disc;
            margin-top: 0.5rem;
            padding-left: 20px;
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
</body>
</html>
@endsection