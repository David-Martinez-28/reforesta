<!DOCTYPE html>
<html lang="es-ES">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Usuario</title>
    <style>
        /* Reset y estilos base */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            background-color: #f0f2f5;
            color: #1c1e21;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* Contenedor de la tarjeta */
        .profile-container {
            max-width: 500px;
            width: 90%;
            margin: 50px auto;
            background: #ffffff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 22px;
            color: #333;
            margin-bottom: 10px;
            text-align: center;
        }

        hr {
            border: none;
            height: 1px;
            background-color: #e5e5e5;
            margin-bottom: 25px;
        }

        /* Filas de datos */
        .info-row {
            display: flex;
            justify-content: space-between;
            padding: 12px 0;
            border-bottom: 1px solid #f0f0f0;
        }

        .info-row:last-of-type {
            border-bottom: none;
        }

        .label {
            font-weight: 700;
            color: #65676b;
            text-transform: uppercase;
            font-size: 12px;
            letter-spacing: 0.5px;
        }

        .value {
            color: #050505;
            font-weight: 500;
        }

        /* Botón de acción */
        .btn-edit {
            display: block;
            width: 100%;
            background-color: #007bff;
            color: white;
            border: none;
            padding: 12px;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.2s ease;
            margin-top: 30px;
            text-decoration: none;
            text-align: center;
        }

        .btn-edit:hover {
            background-color: #0056b3;
        }

        /* Mensaje si no existe */
        .no-user {
            text-align: center;
            padding: 40px;
            color: #888;
        }
    </style>
</head>

<body>
    @include ('nav')

    <div class="profile-container">
        @if (isset($usuario))
            <h1>Detalles del Usuario</h1>
            <hr>
            
            <div class="info-row">
                <span class="label">ID</span>
                <span class="value">{{ $usuario->id }}</span>
            </div>
            <div class="info-row">
                <span class="label">Nombre</span>
                <span class="value">{{ $usuario->nombre }}</span>
            </div>
            <div class="info-row">
                <span class="label">Nick</span>
                <span class="value">{{ $usuario->nick }}</span>
            </div>
            <div class="info-row">
                <span class="label">Email</span>
                <span class="value">{{ $usuario->email }}</span>
            </div>
            <div class="info-row">
                <span class="label">Ubicación</span>
                <span class="value">{{ $usuario->ubicacion }}</span>
            </div>
            <div class="info-row">
                <span class="label">Karma</span>
                <span class="value">{{ $usuario->karma }}</span>
            </div>
            <div class="info-row">
                <span class="label">Tipo</span>
                <span class="value">{{ $usuario->tipo }}</span>
            </div>
            <div class="info-row">
                <span class="label">Creacion</span>
                <span class="value">{{ $usuario->created_at }}</span>
            </div>

            @if (auth()->check() && auth()->id() === $usuario->id)
                <form action="{{ route('usuarios.edit', $usuario->id) }}" method="GET">
                    <button type="submit" class="btn-edit">Modificar datos</button>
                </form>
            @endif
        @else
            <p class="no-user">El usuario no existe o ha sido eliminado.</p>
        @endif
    </div>
</body>

</html>