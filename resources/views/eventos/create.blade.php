<!DOCTYPE html>
<html lang="es-ES">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear evento</title>
</head>
<body>
    <div>
    @include ('nav')
        <div class="contenedor">
            <h1>Registrar evento</h1>
            <form action="{{ route(name: 'eventos.store') }}" method="POST">
                @csrf

                <label for="nombre">Nombre: </label><br>
                <input type="text" name="nombre" class="nombre"><br><br>

                <label for="descripcion">Descripción: </label><br>
                <input type="text" name="descripcion" class="descripcion"><br><br>

                <label for="ubicacion">Ubicación: </label><br>
                <input type="text" name="ubicacion" class="ubicacion"><br><br>

                <label for="fecha">Fecha: </label><br>
                <input type="text" name="fecha" class="fecha"><br><br>

                <label for="tipo_terreno">Tipo de terreno: </label><br>
                <input type="text" name="tipo_terreno" class="tipo_terreno"><br><br>

                <label for="tipo_evento">Tipo de evento: </label><br>
                <input type="text" name="tipo_evento" class="tipo_evento"><br><br>

                <label for="imagen">Imagen: </label><br>
                <input type="text" name="imagen" class="imagen" value="https://unomasunoteam.com/wp-content/uploads/2021/05/huella_verde.jpg"><br><br>

                <button type="submit" class="crear">Crear</button>
            </form>
        </div>
    </div>
</body>
</html>