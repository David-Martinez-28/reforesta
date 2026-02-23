<!DOCTYPE html>
<html lang="es-ES">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar usuario</title>
</head>

<body>
    <div>
        @include('nav')
        <div class="contenedor">
            <h1>Modificar usuario</h1>

            <form action="{{ route('usuarios.update', $usuario->id) }}" method="POST">
                @csrf
                @method("PUT")

                <label for="nombre">Nombre: </label><br>
                <input type="text" name="nombre" class="nombre" value="{{ $usuario->nombre }}"><br><br>

                <label for="nick">Nickname: </label><br>
                <input type="text" name="nick" class="nick" value="{{ $usuario->nick }}"><br><br>

                <label for="email">Email: </label><br>
                <input type="email" name="email" class="email" value="{{ $usuario->email }}"><br><br>

                <label for="ubicacion">Ubicación: </label><br>
                <input type="text" name="ubicacion" class="ubicacion" value="{{ $usuario->email }}"><br><br>

                <label for="avatar">Avatar: </label><br>
                <input type="text" name="avatar" class="avatar" value="{{ $usuario->avatar }}"><br><br>

                <label for="tipo">Tipo: </label><br>
                <input type="text" name="tipo" class="tipo" value="{{ $usuario->tipo }}"><br><br>

                <button type="submit" class="crear">Actualizar usuario</button>
            </form>
        </div>
    </div>
</body>

</html>