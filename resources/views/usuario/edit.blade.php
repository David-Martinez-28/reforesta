<!DOCTYPE html>
<html lang="es-ES">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar usuario</title>
    <style>
        /* Estilos Base */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f2f5;
            color: #333;
            line-height: 1.6;
        }

        /* Contenedor del Formulario */
        .contenedor {
            max-width: 500px;
            margin: 50px auto;
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
        }

        h1 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 25px;
            font-size: 24px;
        }

        /* Estilos de los inputs y labels */
        label {
            display: block;
            font-weight: 600;
            margin-bottom: 8px;
            color: #555;
            font-size: 14px;
        }

        input[type="text"],
        input[type="email"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 15px;
            transition: border-color 0.3s, box-shadow 0.3s;
        }

        input:focus {
            outline: none;
            border-color: #3498db;
            box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.2);
        }

        /* Botón de actualizar */
        .crear {
            width: 100%;
            background-color: #2ecc71;
            color: white;
            padding: 14px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s;
            margin-top: 10px;
        }

        .crear:hover {
            background-color: #27ae60;
        }

        /* Mejora para móviles */
        @media (max-width: 600px) {
            .contenedor {
                width: 90%;
                margin: 20px auto;
                padding: 20px;
            }
        }
    </style>
</head>

<body>
    @include('nav')
    
    <div class="contenedor">
        <h1>Modificar usuario</h1>

        <form action="{{ route('usuarios.update', $usuario->id) }}" method="POST">
            @csrf
            @method("PUT")

            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="nombre" value="{{ $usuario->nombre }}">

            <label for="nick">Nickname</label>
            <input type="text" name="nick" id="nick" class="nick" value="{{ $usuario->nick }}">

            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="email" value="{{ $usuario->email }}">

            <label for="ubicacion">Ubicación</label>
            <input type="text" name="ubicacion" id="ubicacion" class="ubicacion" value="{{ $usuario->ubicacion }}">

            <label for="avatar">URL del Avatar</label>
            <input type="text" name="avatar" id="avatar" class="avatar" value="{{ $usuario->avatar }}">

            <label for="tipo">Tipo de usuario</label>
            <input type="text" name="tipo" id="tipo" class="tipo" value="{{ $usuario->tipo }}">

            <button type="submit" class="crear">Actualizar usuario</button>
        </form>
    </div>
</body>

</html>