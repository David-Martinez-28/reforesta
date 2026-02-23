<!DOCTYPE html>
<html lang="es-ES">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear especie</title>
</head>
<body>
    <div>
    @include ('nav')
        <div class="contenedor">
            <h1>Registrar especie</h1>
            <form action="{{ route(name: 'especies.store') }}" method="POST">
                @csrf

                <label for="nombre_cientifico">Nombre Científico: </label><br>
                <input type="text" name="nombre_cientifico" class="nombre_cientifico"><br><br>

                <label for="tiempo_para_adultez">Tiempo para la Adultez: </label><br>
                <input type="text" name="tiempo_para_adultez" class="tiempo_para_adultez"><br><br>

                <label for="region_origen">Región de origen: </label><br>
                <input type="text" name="region_origen" class="region_origen"><br><br>

                <label for="clima">Clima: </label><br>
                <input type="text" name="clima" class="clima"><br><br>

                <label for="enlace_descripcion">Enlace de la descripción: </label><br>
                <input type="text" name="enlace_descripcion" class="enlace_descripcion"><br><br>

                <label for="foto_especie">Imagen de la especie: </label><br>
                <input type="text" name="foto_especie" class="foto_especie" value="https://uvn-brightspot.s3.amazonaws.com/assets/vixes/btg/curiosidades.batanga.com/files/5-especies-de-plantas-exoticas-1.jpg"><br><br>

                <label for="beneficios">Beneficios: </label><br>
                <input type="text" name="beneficios" class="beneficios"><br><br>

                <button type="submit" class="crear">Crear</button>
            </form>
        </div>
    </div>
</body>
</html>