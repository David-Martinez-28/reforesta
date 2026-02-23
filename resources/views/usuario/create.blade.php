<!DOCTYPE html>
<html lang="es-ES">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear usuario</title>
</head>
<body>
    <div>
    @include ('nav')
        <div class="contenedor">
            <h1>Registrar usuario</h1>
            <form action="{{ route(name: 'usuario.store') }}" method="POST">
                @csrf

                <label for="nombre">Nombre: </label><br>
                <input type="text" name="nombre" class="nombre"><br><br>

                <label for="nick">Nickname: </label><br>
                <input type="text" name="nick" class="nick"><br><br>

                <label for="email">Email: </label><br>
                <input type="text" name="email" class="email"><br><br>

                <label for="password">Contraseña: </label><br>
                <input type="password" name="nick" class="nick"><br><br>

                <label for="ubicacion">Ubicación: </label><br>
                <input type="text" name="ubicacion" class="ubicacion"><br><br>

                <label for="karma">Karma: </label><br>
                <input type="text" name="karma" class="karma"><br><br>

                <label for="avatar">Avatar: </label><br>
                <input type="text" name="avatar" class="avatar" value="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSRHQZdf6yzAMHPmGEEvzm_ey75ZdVUWjCRJA&s"><br><br>

                <label for="tipo">Tipo: </label><br>
                <input type="text" name="tipo" class="tipo"><br><br>

                <button type="submit" class="crear">Crear</button>
            </form>
        </div>
    </div>
</body>
</html>