<!DOCTYPE html>
<html lang="es-ES">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear evento</title>
</head>

<body>
    @include('nav')

    <div>
        <h1>Registrar evento</h1>

        <form action="{{ route('eventos.store') }}" method="POST">
            @csrf

            <label for="nombre">Nombre del evento:</label><br>
            <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}"><br>
            @error('nombre') <small>{{ $message }}</small> @enderror
            <br>

            <label for="descripcion">Descripción:</label><br>
            <textarea name="descripcion" id="descripcion">{{ old('descripcion') }}</textarea><br>
            @error('descripcion') <small>{{ $message }}</small> @enderror
            <br>

            <label for="ubicacion">Ubicación:</label><br>
            <input type="text" name="ubicacion" id="ubicacion" value="{{ old('ubicacion') }}"><br>
            @error('ubicacion') <small>{{ $message }}</small> @enderror
            <br>

            <label for="fecha">Fecha:</label><br>
            <input type="date" name="fecha" id="fecha" value="{{ old('fecha') }}"><br>
            @error('fecha') <small>{{ $message }}</small> @enderror
            <br>

            <label for="tipo_terreno">Tipo de terreno:</label><br>
            <input type="text" name="tipo_terreno" id="tipo_terreno" value="{{ old('tipo_terreno') }}"><br>
            @error('tipo_terreno') <small>{{ $message }}</small> @enderror
            <br>

            <label for="tipo_evento">Tipo de evento:</label><br>
            <input type="text" name="tipo_evento" id="tipo_evento" value="{{ old('tipo_evento') }}"><br>
            @error('tipo_evento') <small>{{ $message }}</small> @enderror
            <br>

            <label for="imagen">URL de la imagen:</label><br>
            <input type="text" name="imagen" id="imagen"
                value="{{ old('imagen', 'https://unomasunoteam.com/wp-content/uploads/2021/05/huella_verde.jpg') }}"><br>
            @error('imagen') <small>{{ $message }}</small> @enderror
            <br>

            <hr>

            <h3>Selecciona las especies para el evento:</h3>
            <p><small>(Mantén presionado Ctrl o Cmd para seleccionar varias)</small></p>

            <select name="especies[]" id="especies" multiple size="8">
                @foreach($especies as $especie)
                    <option value="{{ $especie->id }}" {{ (is_array(old('especies')) && in_array($especie->id, old('especies'))) ? 'selected' : '' }}>
                        🌿 {{ $especie->nombre_cientifico }} ({{ $especie->nombre_comun }})
                    </option>
                @endforeach
            </select><br>
            @error('especies') <small>{{ $message }}</small> @enderror
            @error('especies.*') <small>Alguna de las especies seleccionadas no es válida.</small> @enderror

            <br><br>

            <button type="submit">Crear Evento</button>
        </form>
    </div>
</body>

</html>