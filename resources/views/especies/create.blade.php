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
            <form action="{{ route('especies.store') }}" method="POST">
                @csrf

                <label for="nombre_cientifico">Nombre Científico: </label><br>
                <input type="text" name="nombre_cientifico" class="nombre_cientifico"
                    value="{{ old('nombre_cientifico') }}"><br>
                @error('nombre_cientifico')
                    <small style="color: red;">{{ $message }}</small>
                @enderror
                <br>

                <label for="tiempo_para_adultez">Tiempo para la Adultez: </label><br>
                <input type="text" name="tiempo_para_adultez" class="tiempo_para_adultez"
                    value="{{ old('tiempo_para_adultez') }}"><br>
                @error('tiempo_para_adultez')
                    <small style="color: red;">{{ $message }}</small>
                @enderror
                <br>

                <label for="foto_especie">Imagen de la especie: </label><br>
                <input type="text" name="foto_especie" class="foto_especie"
                    value="{{ old('foto_especie', 'https://uvn-brightspot.s3.amazonaws.com/...') }}"><br>
                @error('foto_especie')
                    <small style="color: red;">{{ $message }}</small>
                @enderror
                <br>

                <button type="submit" class="crear">Crear</button>
            </form>
        </div>
    </div>
</body>

</html>