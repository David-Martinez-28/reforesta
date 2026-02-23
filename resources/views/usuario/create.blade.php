<!DOCTYPE html>
<html lang="es-ES">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario - Reforesta</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f7f6;
            color: #333;
            margin: 0;
        }

        .contenedor {
            max-width: 600px;
            margin: 50px auto;
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #2d5a27;
            text-align: center;
        }

        label {
            font-weight: bold;
            display: block;
            margin-top: 15px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="url"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .seccion-avatar {
            background: #f0f4f0;
            border: 2px dashed #99bc94;
            padding: 15px;
            border-radius: 6px;
            margin-top: 20px;
        }

        .error {
            color: #b91c1c;
            font-size: 0.85em;
            margin-top: 5px;
            display: block;
        }

        button {
            background-color: #2d5a27;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
            margin-top: 25px;
            transition: background 0.3s;
        }

        button:hover {
            background-color: #1e3d1a;
        }

        .separador {
            text-align: center;
            margin: 10px 0;
            font-size: 0.9em;
            color: #666;
            font-weight: bold;
        }
    </style>
</head>

<body>
    @include('nav')

    <div class="contenedor">
        <h1>Crear Nuevo Usuario</h1>

        <form action="{{ route('usuarios.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- Datos Personales --}}
            <label for="nombre">Nombre Completo</label>
            <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}" placeholder="Ej: Juan Pérez">
            @error('nombre') <span class="error">{{ $message }}</span> @enderror

            <label for="nick">Nickname (Usuario)</label>
            <input type="text" name="nick" id="nick" value="{{ old('nick') }}" placeholder="Ej: juanito99">
            @error('nick') <span class="error">{{ $message }}</span> @enderror

            <label for="email">Correo Electrónico</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="correo@ejemplo.com">
            @error('email') <span class="error">{{ $message }}</span> @enderror

            <label for="password">Contraseña</label>
            <input type="password" name="password" id="password">
            @error('password') <span class="error">{{ $message }}</span> @enderror

            <label for="password_confirmation">Confirmar Contraseña</label>
            <input type="password" name="password_confirmation" id="password_confirmation">

            <label for="ubicacion">Ubicación</label>
            <input type="text" name="ubicacion" id="ubicacion" value="{{ old('ubicacion') }}"
                placeholder="Ciudad, País">


            <div class="seccion-avatar">
                <label>Foto de Perfil (Avatar)</label>

                <p style="font-size: 0.8em; color: #555; margin-bottom: 10px;">Puedes subir un archivo o pegar una URL
                    directa.</p>

                <input type="file" name="avatar" accept="image/*">
                @error('avatar') <span class="error">{{ $message }}</span> @enderror



            </div>

            <button type="submit">Registrar Usuario</button>
        </form>
    </div>
</body>

</html>