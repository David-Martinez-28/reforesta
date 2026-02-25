<!DOCTYPE html>
<html lang="es-ES">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario - Reforesta</title>
    <style>
        /* Estilos base consistentes con el resto del proyecto */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f7f6;
            color: #333;
            margin: 0;
        }

        .contenedor {
            max-width: 700px; /* Tamaño intermedio ideal */
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
        input[type="email"],
        input[type="password"],
        input[type="file"] {
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

        .seccion-avatar {
            grid-column: span 2;
            background: #f9fbf9;
            border: 2px dashed #27ae60;
            padding: 20px;
            border-radius: 8px;
            margin-top: 10px;
            text-align: center;
        }

        .error-msg {
            color: #e74c3c;
            font-size: 0.8em;
            margin-top: 5px;
            display: block;
        }

        .btn-registro {
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
            margin-top: 15px;
        }

        .btn-registro:hover {
            background-color: #219150;
        }

        .instruccion {
            font-size: 0.85em;
            color: #7f8c8d;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    @include('nav')

    <div class="contenedor">
        <h1>👤 Crear Nuevo Usuario</h1>

        <form action="{{ route('usuarios.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="grid-form">
                <div class="campo-completo">
                    <label for="nombre">Nombre Completo</label>
                    <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}" placeholder="Ej: Juan Pérez">
                    @error('nombre') <span class="error-msg">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="nick">Nickname (Usuario)</label>
                    <input type="text" name="nick" id="nick" value="{{ old('nick') }}" placeholder="Ej: juanito99">
                    @error('nick') <span class="error-msg">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="email">Correo Electrónico</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="correo@ejemplo.com">
                    @error('email') <span class="error-msg">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="password">Contraseña</label>
                    <input type="password" name="password" id="password" placeholder="Mín. 8 caracteres">
                    @error('password') <span class="error-msg">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="password_confirmation">Confirmar Contraseña</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Repite la contraseña">
                </div>

                <div class="campo-completo">
                    <label for="ubicacion">Ubicación</label>
                    <input type="text" name="ubicacion" id="ubicacion" value="{{ old('ubicacion') }}" placeholder="Ciudad, País">
                </div>

                <div class="seccion-avatar">
                    <label>Foto de Perfil (Avatar)</label>
                    <p class="instruccion">Sube una imagen cuadrada para mejores resultados.</p>
                    <input type="file" name="avatar" id="avatar" accept="image/*">
                    @error('avatar') <span class="error-msg">{{ $message }}</span> @enderror
                </div>

                <button type="submit" class="btn-registro">Finalizar Registro</button>
            </div>
        </form>
    </div>
</body>

</html>