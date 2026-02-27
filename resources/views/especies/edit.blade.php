<!DOCTYPE html>
<html lang="es-ES">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Especie: {{ $especies->nombre_cientifico }}</title>
    <style>
        :root {
            --error-color: #e74c3c;
            --success-color: #27ae60;
            --primary-color: #2980b9;
        }

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
            color: var(--primary-color);
            text-align: center;
            margin-bottom: 30px;
            font-size: 2rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        /* Alerta de errores */
        .alerta-errores {
            background-color: #fee2e2;
            border-left: 5px solid var(--error-color);
            color: #b91c1c;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 25px;
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

        /* Estilo cuando hay un error en el campo */
        .is-invalid {
            border-color: var(--error-color) !important;
            background-color: #fff6f5;
        }

        input:focus,
        textarea:focus {
            border-color: var(--primary-color);
            outline: none;
            box-shadow: 0 0 8px rgba(41, 128, 185, 0.15);
        }

        .error-msg {
            color: var(--error-color);
            font-size: 0.85em;
            margin-top: 5px;
            font-weight: 500;
            display: block;
        }

        .btn-actualizar {
            grid-column: span 2;
            background-color: var(--primary-color);
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

        .preview-img {
            max-width: 200px;
            border-radius: 8px;
            border: 2px solid #ddd;
            margin-top: 10px;
        }

        @media (max-width: 600px) {
            .grid-form {
                grid-template-columns: 1fr;
            }

            .campo-completo {
                grid-column: span 1;
            }

            .btn-actualizar {
                grid-column: span 1;
            }
        }
    </style>
</head>

<body>

    @include('nav')

    <div class="contenedor">
        <h1>📝 Modificar Especie</h1>

        
        @if ($errors->any())
            <div class="alerta-errores">
                <strong>⚠️ Por favor, revisa los siguientes campos:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('especies.update', $especies->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="grid-form">

                
                <div class="campo-completo">
                    <label for="nombre_cientifico">Nombre Científico:</label>
                    <input type="text" name="nombre_cientifico" id="nombre_cientifico"
                        class="{{ $errors->has('nombre_cientifico') ? 'is-invalid' : '' }}"
                        value="{{ old('nombre_cientifico', $especies->nombre_cientifico) }}" required>
                    @error('nombre_cientifico') <small class="error-msg">{{ $message }}</small> @enderror
                </div>

                
                <div>
                    <label for="tiempo_para_adultez">Tiempo para la Adultez:</label>
                    <input type="text" name="tiempo_para_adultez" id="tiempo_para_adultez"
                        class="{{ $errors->has('tiempo_para_adultez') ? 'is-invalid' : '' }}"
                        value="{{ old('tiempo_para_adultez', $especies->tiempo_para_adultez) }}">
                    @error('tiempo_para_adultez') <small class="error-msg">{{ $message }}</small> @enderror
                </div>

                
                <div>
                    <label for="region_origen">Región de Origen:</label>
                    <input type="text" name="region_origen" id="region_origen"
                        class="{{ $errors->has('region_origen') ? 'is-invalid' : '' }}"
                        value="{{ old('region_origen', $especies->region_origen) }}">
                    @error('region_origen') <small class="error-msg">{{ $message }}</small> @enderror
                </div>

                
                <div>
                    <label for="clima">Clima Ideal:</label>
                    <input type="text" name="clima" id="clima" class="{{ $errors->has('clima') ? 'is-invalid' : '' }}"
                        value="{{ old('clima', $especies->clima) }}">
                    @error('clima') <small class="error-msg">{{ $message }}</small> @enderror
                </div>

               
                <div>
                    <label for="enlace_descripcion">Enlace de Información:</label>
                    <input type="url" name="enlace_descripcion" id="enlace_descripcion"
                        class="{{ $errors->has('enlace_descripcion') ? 'is-invalid' : '' }}"
                        value="{{ old('enlace_descripcion', $especies->enlace_descripcion) }}">
                    @error('enlace_descripcion') <small class="error-msg">{{ $message }}</small> @enderror
                </div>

               
                <div class="campo-completo">
                    <label for="beneficios">Beneficios Ecológicos:</label>
                    <textarea name="beneficios" id="beneficios" rows="4"
                        class="{{ $errors->has('beneficios') ? 'is-invalid' : '' }}">{{ old('beneficios', $especies->beneficios) }}</textarea>
                    @error('beneficios') <small class="error-msg">{{ $message }}</small> @enderror
                </div>
                <div class="campo-completo"
                    style="text-align: center; background: #f9f9f9; padding: 20px; border-radius: 8px;">
                    <label>Vista previa:</label><br>

                    <img id="img-preview"
                        src="{{ $especies->foto_especie ? asset('storage/' . $especies->foto_especie) : 'https://via.placeholder.com/400x300?text=Sin+Imagen' }}"
                        alt="Foto actual" class="preview-img"
                        style="max-width: 300px; border-radius: 8px; margin-bottom: 15px;">

                    <div style="margin-top: 20px;">
                        <label for="foto_especie">Actualizar Imagen de la Especie:</label>
                        <input type="file" name="foto_especie" id="foto_especie" accept="image/*"
                            class="{{ $errors->has('foto_especie') ? 'is-invalid' : '' }}"
                            onchange="previewImage(event)">

                        @error('foto_especie') <small class="error-msg" style="color:red;">{{ $message }}</small>
                        @enderror
                    </div>
                </div>


                <button type="submit" class="btn-actualizar">🚀 Actualizar Cambios</button>
            </div>
        </form>
    </div>

</body>

</html>