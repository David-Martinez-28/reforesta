<!DOCTYPE html>
<html lang="es-ES">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar evento</title>
</head>

<body>
    <div>
        @include('nav')
        <div class="contenedor">
            <h1>Modificar evento</h1>

            <form action="{{ route('eventos.update', $eventos->id) }}" method="POST">
                @csrf
                @method("PUT")

                <label for="nombre">Nombre: </label><br>
                <input type="text" name="nombre" class="nombre" value="{{ $eventos->nombre }}"><br><br>

                <label for="descripcion">Descripción: </label><br>
                <input type="text" name="descripcion" class="descripcion" value="{{ $eventos->descripcion }}"><br><br>

                <label for="ubicacion">Ubicación: </label><br>
                <input type="text" name="ubicacion" class="ubicacion" value="{{ $eventos->ubicacion }}"><br><br>

                <label for="fecha">Fecha: </label><br>
                <input type="text" name="fecha" class="fecha" value="{{ $eventos->fecha }}"><br><br>

                <label for="tipo_terreno">Tipo de terreno: </label><br>
                <input type="text" name="tipo_terreno" class="tipo_terreno"
                    value="{{ $eventos->tipo_terreno }}"><br><br>

                <label for="tipo_evento">Tipo de evento: </label><br>
                <input type="text" name="tipo_evento" class="tipo_evento" value="{{ $eventos->tipo_evento }}"><br><br>

                <label for="imagen">Imagen: </label><br>
                <input type="text" name="imagen" class="imagen" value="{{ $eventos->imagen }}"><br><br>

                <button type="submit" class="crear">Actualizar evento</button>
            </form>
        </div>
    </div>
</body>

</html>