<!DOCTYPE html>
<html lang="es-ES">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Especie: {{ $especie->nombre_cientifico }}</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f7f6;
            color: #333;
            line-height: 1.6;
        }

        .contenedor {
            max-width: 850px;
            margin: 40px auto;
            background: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
        }

        h1 {
            color: #2980b9;
            text-align: center;
            margin-bottom: 30px;
            font-size: 2rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .grid-form {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 25px;
        }

        .campo-completo {
            grid-column: span 2;
        }

        label {
            display: block;
            font-weight: 600;
            margin-bottom: 8px;
            color: #34495e;
            font-size: 0.95em;
        }

        input[type="text"],
        input[type="url"],
        textarea {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            box-sizing: border-box;
            font-size: 15px;
            transition: all 0.3s ease;
        }

        input:focus,
        textarea:focus {
            border-color: #2980b9;
            outline: none;
            box-shadow: 0 0 8px rgba(41, 128, 185, 0.15);
        }

        .error-msg {
            color: #e74c3c;
            font-size: 0.85em;
            margin-top: 5px;
            font-weight: 500;
        }

        .btn-actualizar {
            grid-column: span 2;
            background-color: #2980b9;
            color: white;
            border: none;
            padding: 18px;
            border-radius: 8px;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            transition: transform 0.2s, background 0.3s;
            margin-top: 20px;
            box-shadow: 0 4px 12px rgba(41, 128, 185, 0.3);
        }

        .btn-actualizar:hover {
            background-color: #2171a3;
            transform: translateY(-2px);
        }

        hr {
            border: 0;
            border-top: 2px solid #f8f9fa;
            margin: 10px 0;
            grid-column: span 2;
        }

        .preview-img-container {
            grid-column: span 2;
            text-align: center;
        }

        .preview-img {
            max-width: 200px;
            border-radius: 8px;
            border: 2px solid #ddd;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>

    @include('nav')

    <div class="contenedor">
        <h1>📝 Modificar Especie</h1>

        <form action="{{ route('especies.update', $especie->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT') <div class="grid-form">

                <div class="campo-completo">
                    <label for="nombre_cientifico">Nombre Científico:</label>
                    <input type="text" name="nombre_cientifico" id="nombre_cientifico"
                        value="{{ old('nombre_cientifico', $especie->nombre_cientifico) }}" required>
                    @error('nombre_cientifico') <small class="error-msg">{{ $message }}</small> @enderror
                </div>

                <div>
                    <label for="tiempo_para_adultez">Tiempo para la Adultez:</label>
                    <input type="text" name="tiempo_para_adultez" id="tiempo_para_adultez"
                        value="{{ old('tiempo_para_adultez', $especie->tiempo_para_adultez) }}">
                    @error('tiempo_para_adultez') <small class="error-msg">{{ $message }}</small> @enderror
                </div>

                <div>
                    <label for="region_origen">Región de Origen:</label>
                    <input type="text" name="region_origen" id="region_origen"
                        value="{{ old('region_origen', $especie->region_origen) }}">
                    @error('region_origen') <small class="error-msg">{{ $message }}</small> @enderror
                </div>

                <div>
                    <label for="clima">Clima Ideal:</label>
                    <input type="text" name="clima" id="clima" value="{{ old('clima', $especie->clima) }}">
                    @error('clima') <small class="error-msg">{{ $message }}</small> @enderror
                </div>

                <div>
                    <label for="enlace_descripcion">Enlace de Información:</label>
                    <input type="url" name="enlace_descripcion" id="enlace_descripcion"
                        value="{{ old('enlace_descripcion', $especie->enlace_descripcion) }}">
                    @error('enlace_descripcion') <small class="error-msg">{{ $message }}</small> @enderror
                </div>

                <div class="campo-completo">
                    <label for="beneficios">Beneficios Ecológicos:</label>
                    <textarea name="beneficios" id="beneficios"
                        rows="4">{{ old('beneficios', $especie->beneficios) }}</textarea>
                    @error('beneficios') <small class="error-msg">{{ $message }}</small> @enderror
                </div>

                <hr>

                <div class="preview-img-container">
                    <label>Vista previa actual:</label><br>
                    <img src="{{ $especie->foto_especie }}" alt="Foto actual" class="preview-img">
                </div>

                <div class="campo-completo">
                    <label for="foto_especie">Actualizar URL de la Imagen:</label>
                    <input type="url" name="foto_especie" id="foto_especie"
                        value="{{ old('foto_especie', $especie->foto_especie) }}">
                    @error('foto_especie') <small class="error-msg">{{ $message }}</small> @enderror
                </div>

                <button type="submit" class="btn-actualizar">Actualizar Cambios</button>
            </div>
        </form>
    </div>

</body>

</html>