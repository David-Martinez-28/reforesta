<!DOCTYPE html>
<html lang="es-ES">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar evento</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary-color: #6366f1;
            --primary-hover: #4f46e5;
            --bg-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --glass-bg: rgba(255, 255, 255, 0.95);
            --text-main: #1f2937;
            --text-muted: #6b7280;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--bg-gradient);
            background-attachment: fixed;
            margin: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            color: var(--text-main);
        }

        .contenedor {
            max-width: 500px;
            margin: 50px auto;
            background: var(--glass-bg);
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }

        h1 {
            margin-top: 0;
            font-weight: 600;
            text-align: center;
            color: var(--primary-color);
            font-size: 1.8rem;
            margin-bottom: 30px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            font-weight: 600;
            font-size: 0.9rem;
            margin-bottom: 8px;
            color: var(--text-main);
        }

        input[type="text"] {
            padding: 12px 15px;
            border: 2px solid #e5e7eb;
            border-radius: 10px;
            font-size: 1rem;
            transition: all 0.3s ease;
            outline: none;
            margin-bottom: 20px;
        }

        input[type="text"]:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.1);
        }

        button.crear {
            background-color: var(--primary-color);
            color: white;
            padding: 14px;
            border: none;
            border-radius: 10px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.3s, transform 0.2s;
            margin-top: 10px;
        }

        button.crear:hover {
            background-color: var(--primary-hover);
            transform: translateY(-2px);
        }

        button.crear:active {
            transform: translateY(0);
        }

        input[type="text"]::placeholder {
            color: var(--text-muted);
        }

        @media (max-width: 480px) {
            .contenedor {
                margin: 20px;
                padding: 25px;
            }
        }
    </style>
</head>

<body>
    <div>
        @include('nav')
        <div class="contenedor">
            <h1>Modificar evento</h1>

            <form action="{{ route('eventos.update', $eventos->id) }}" method="POST">
                @csrf
                @method("PUT")

                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" class="nombre" value="{{ $eventos->nombre }}">

                <label for="descripcion">Descripción</label>
                <input type="text" name="descripcion" class="descripcion" value="{{ $eventos->descripcion }}">

                <label for="ubicacion">Ubicación</label>
                <input type="text" name="ubicacion" class="ubicacion" value="{{ $eventos->ubicacion }}">

                <label for="fecha">Fecha</label>
                <input type="text" name="fecha" class="fecha" value="{{ $eventos->fecha }}">

                <label for="tipo_terreno">Tipo de terreno</label>
                <input type="text" name="tipo_terreno" class="tipo_terreno" value="{{ $eventos->tipo_terreno }}">

                <label for="tipo_evento">Tipo de evento</label>
                <input type="text" name="tipo_evento" class="tipo_evento" value="{{ $eventos->tipo_evento }}">

                <label for="imagen">URL de la Imagen</label>
                <input type="text" name="imagen" class="imagen" value="{{ $eventos->imagen }}">

                <button type="submit" class="crear">Actualizar evento</button>
            </form>
        </div>
    </div>
</body>

</html>