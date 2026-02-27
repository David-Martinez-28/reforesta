<!DOCTYPE html>
<html lang="es-ES">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar evento</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f7f6;
            color: #333;
            margin: 0;
        }

        .contenedor {
            max-width: 800px;
            margin: 40px auto;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #27ae60;
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #f0f0f0;
            padding-bottom: 10px;
        }

        .grid-form {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .campo-completo {
            grid-column: span 2;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #2c3e50;
            font-size: 0.9em;
        }

        input[type="text"],
        input[type="date"],
        input[type="url"],
        textarea,
        select {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 6px;
            box-sizing: border-box;
            font-size: 14px;
        }

        select[multiple] {
            height: 150px;
        }

        input:focus,
        textarea:focus,
        select:focus {
            border-color: #27ae60;
            outline: none;
            box-shadow: 0 0 5px rgba(39, 174, 96, 0.2);
        }

        .error-msg {
            color: #e74c3c;
            font-size: 0.8em;
            margin-top: 5px;
            display: block;
        }

        .btn-guardar {
            grid-column: span 2;
            background-color: #27ae60;
            color: white;
            border: none;
            padding: 15px;
            border-radius: 6px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s;
            margin-top: 10px;
        }

        .btn-guardar:hover {
            background-color: #219150;
        }

        hr {
            border: 0;
            border-top: 1px solid #eee;
            margin: 20px 0;
            grid-column: span 2;
        }

        .ayuda {
            color: #7f8c8d;
            font-size: 0.85em;
            margin-bottom: 10px;
        }

        .img-preview {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
        }
    </style>
</head>

<body>
    <div>
        @include('nav')
        <div class="contenedor">
            <h1>Modificar evento</h1>

          
            <form action="{{ route('eventos.update', $eventos->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="grid-form">
                    <div class="campo-completo">
                        <label for="nombre">Nombre del evento:</label>
                        <input type="text" name="nombre" id="nombre" value="{{ old('nombre', $eventos->nombre) }}"
                            placeholder="Ej: Reforestación Sierra Norte">
                        @error('nombre') <small class="error-msg">{{ $message }}</small> @enderror
                    </div>

                    <div>
                        <label for="ubicacion">Ubicación:</label>
                        <input type="text" name="ubicacion" id="ubicacion"
                            value="{{ old('ubicacion', $eventos->ubicacion) }}" placeholder="Ciudad o Coordenadas">
                        @error('ubicacion') <small class="error-msg">{{ $message }}</small> @enderror
                    </div>

                    <div>
                        <label for="fecha">Fecha del Evento:</label>
                        <input type="date" name="fecha" id="fecha" value="{{ old('fecha', $eventos->fecha) }}">
                        @error('fecha') <small class="error-msg">{{ $message }}</small> @enderror
                    </div>

                    <div>
                        <label for="tipo_terreno">Tipo de Terreno:</label>
                        <select name="tipo_terreno" id="tipo_terreno">
                            <option value="" disabled>Selecciona uno...</option>
                            @php $terreno = old('tipo_terreno', $eventos->tipo_terreno); @endphp
                            <option value="Bosque" {{ $terreno == 'Bosque' ? 'selected' : '' }}>🌲 Bosque</option>
                            <option value="Urbano" {{ $terreno == 'Urbano' ? 'selected' : '' }}>🏙️ Urbano</option>
                            <option value="Montaña" {{ $terreno == 'Montaña' ? 'selected' : '' }}>⛰️ Montaña</option>
                            <option value="Costa" {{ $terreno == 'Costa' ? 'selected' : '' }}>🏖️ Costa / Litoral</option>
                            <option value="Selva" {{ $terreno == 'Selva' ? 'selected' : '' }}>🌿 Selva</option>
                        </select>
                        @error('tipo_terreno') <small class="error-msg">{{ $message }}</small> @enderror
                    </div>

                    <div>
                        <label for="tipo_evento">Tipo de Evento:</label>
                        <select name="tipo_evento" id="tipo_evento">
                            <option value="" disabled>Selecciona uno...</option>
                            @php $tipo = old('tipo_evento', $eventos->tipo_evento); @endphp
                            <option value="Plantación" {{ $tipo == 'Plantación' ? 'selected' : '' }}>🌱 Plantación
                            </option>
                            <option value="Limpieza" {{ $tipo == 'Limpieza' ? 'selected' : '' }}>🧹 Limpieza</option>
                            <option value="Mantenimiento" {{ $tipo == 'Mantenimiento' ? 'selected' : '' }}>🔧
                                Mantenimiento</option>
                            <option value="Taller Educativo" {{ $tipo == 'Taller Educativo' ? 'selected' : '' }}>📚 Taller
                                Educativo</option>
                        </select>
                        @error('tipo_evento') <small class="error-msg">{{ $message }}</small> @enderror
                    </div>

                    <div class="campo-completo">
                        <label for="descripcion">Descripción:</label>
                        <textarea name="descripcion" id="descripcion" rows="3"
                            placeholder="Detalles sobre la actividad...">{{ old('descripcion', $eventos->descripcion) }}</textarea>
                        @error('descripcion') <small class="error-msg">{{ $message }}</small> @enderror
                    </div>

                    <hr>

                    <div class="campo-completo">
                        <label for="especies">Especies involucradas:</label>
                        <p class="ayuda">(Mantén presionado Ctrl / Cmd para seleccionar varias)</p>
                        <select name="especies[]" id="especies" multiple>
                            @foreach($especies as $especie)
                                                    <option value="{{ $especie->id }}" {{ (is_array(old('especies')) && in_array($especie->id, old('especies'))) ||
                                (!is_array(old('especies')) && $eventos->especies->contains($especie->id)) ? 'selected' : '' }}>
                                                        🌿 {{ $especie->nombre_cientifico }}
                                                    </option>
                            @endforeach
                        </select>
                        @error('especies') <small class="error-msg">{{ $message }}</small> @enderror
                    </div>

                    <div class="seccion-avatar">
                        
                        @if($eventos->imagen)
                            <div style="margin-bottom: 10px;">
                                <p class="ayuda">Imagen actual:</p>
                               
                                <img src="{{ asset('storage/' . $eventos->imagen) }}" alt="Portada" class="img-preview">
                            </div>
                        @endif

                        <label for="avatar">Foto de Perfil (Avatar)</label>
                        <p class="instruccion">Sube una imagen cuadrada para mejores resultados.</p>

                        
                        <input type="file" name="imagen" id="avatar" accept="image/*">

                        @error('imagen')
                            <span class="error-msg">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit" class="btn-guardar">Guardar cambios</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>