<!DOCTYPE html>
<html lang="es-ES">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar especie</title>
</head>

<body>
    <div>
        @include('nav')
        <div class="contenedor">
            <h1>Modificar especie</h1>

            <form action="{{ route('especies.update', $especies->id) }}" method="POST">
                @csrf
                @method("PUT")

                <label for="nombre_cientifico">Nombre Científico: </label><br>
                <input type="text" name="nombre_cientifico" class="nombre_cientifico" value="{{ $especies->nombre_cientifico }}"><br><br>

                <label for="tiempo_para_adultez">Tiempo para la Adultez: </label><br>
                <input type="text" name="tiempo_para_adultez" class="tiempo_para_adultez" value="{{ $especies->tiempo_para_adultez }}"><br><br>

                <label for="region_origen">Región de origen: </label><br>
                <input type="text" name="region_origen" class="region_origen" value="{{ $especies->region_origen }}"><br><br>

                <label for="clima">Clima: </label><br>
                <input type="text" name="clima" class="clima" value="{{ $especies->clima }}"><br><br>

                <label for="enlace_descripcion">Enlace de la descripción: </label><br>
                <input type="text" name="enlace_descripcion" class="enlace_descripcion" value="{{ $especies->enlace_descripcion }}"><br><br>

                <label for="foto_especie">Imagen de la especie: </label><br>
                <input type="text" name="foto_especie" class="foto_especie" value="{{ $especies->foto_especie }}"><br><br>

                <label for="beneficios">Beneficios: </label><br>
                <input type="text" name="beneficios" class="beneficios" value="{{ $especies->beneficios }}"><br><br>

                <button type="submit" class="crear">Actualizar especie</button>
            </form>
        </div>
    </div>
</body>

</html>