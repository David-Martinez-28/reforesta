<!DOCTYPE html>
<html lang="es-ES">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles</title>
</head>

<body>
    @include ('nav')
    @if (isset($evento))
        <h1>Detalles del Evento</h1>
        <hr>
        <p><strong>ID:</strong> {{ $evento->id }}</p>
        <p><strong>Nombre:</strong> {{ $evento->nombre }}</p>
        <p><strong>Descripción:</strong> {{ $evento->descripcion }}</p>
        <p><strong>Ubicación:</strong> {{ $evento->ubicacion }}</p>
        <p><strong>Fecha:</strong> {{ $evento->fecha }}</p>
        <p><strong>Tipo de terreno:</strong> {{ $evento->tipo_terreno }}</p>
        <p><strong>Tipo de evento:</strong> {{ $evento->tipo_evento }}</p>

        <form action="{{ route('usuarios.unirse') }}" method="POST">
            @csrf
            @method('PATCH')
            <button type="submit" class="crear">Unirse al evento</button>
        </form>

    @else
        <p>El evento no existe o ha sido eliminado.</p>
    @endif
</body>

</html>