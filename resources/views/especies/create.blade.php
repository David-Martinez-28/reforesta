<!DOCTYPE html>
<html lang="es-ES">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Nueva Especie</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f7f6;
            color: #333;
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
        input[type="url"],
        textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 6px;
            box-sizing: border-box;
            font-size: 14px;
        }

        input:focus {
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
    </style>
</head>

<body>

    @include('nav')

    <div class="contenedor">
        <h1>🌿 Registrar Especie</h1>

        <form action="{{ route('especies.store') }}" method="POST">
            @csrf

            <div class="grid-form">

                <div class="campo-completo">
                    <label for="nombre_cientifico">Nombre Científico (Único):</label>
                    <input type="text" name="nombre_cientifico" id="nombre_cientifico"
                        value="{{ old('nombre_cientifico') }}" placeholder="Ej: Quercus robur">
                    @error('nombre_cientifico') <small class="error-msg">{{ $message }}</small> @enderror
                </div>


                <div>
                    <label for="tiempo_para_adultez">Tiempo para la Adultez:</label>
                    <input type="text" name="tiempo_para_adultez" id="tiempo_para_adultez"
                        value="{{ old('tiempo_para_adultez') }}" placeholder="Ej: 20-30 años">
                    @error('tiempo_para_adultez') <small class="error-msg">{{ $message }}</small> @enderror
                </div>


                <div>
                    <label for="region_origen">Región de Origen:</label>
                    <input type="text" name="region_origen" id="region_origen" value="{{ old('region_origen') }}"
                        placeholder="Ej: Europa, Norte de África">
                </div>


                <div>
                    <label for="clima">Clima Ideal:</label>
                    <input type="text" name="clima" id="clima" value="{{ old('clima') }}"
                        placeholder="Ej: Templado, Humedad media">
                </div>


                <div>
                    <label for="enlace_descripcion">Enlace de Información (Wiki):</label>
                    <input type="url" name="enlace_descripcion" id="enlace_descripcion"
                        value="{{ old('enlace_descripcion') }}" placeholder="https://es.wikipedia.org/...">
                </div>


                <div class="campo-completo">
                    <label for="beneficios">Beneficios Ecológicos:</label>
                    <textarea name="beneficios" id="beneficios" rows="3"
                        placeholder="Ej: Fomenta la biodiversidad, resistente a sequías...">{{ old('beneficios') }}</textarea>
                </div>

                <hr>


                <div class="campo-completo">
                    <label for="foto_especie">URL de la Imagen:</label>
                    <input type="text" name="foto_especie" id="foto_especie"
                        value="{{ old('foto_especie', 'https://via.placeholder.com/400x300?text=Sin+Imagen') }}">
                    @error('foto_especie') <small class="error-msg">{{ $message }}</small> @enderror
                </div>

                <button type="submit" class="btn-guardar">Registrar Especie en la Base de Datos</button>
            </div>
        </form>
    </div>

</body>

</html>