<!DOCTYPE html>
<html lang="es-ES">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles</title>
</head>

<body>
    @include ('nav')
    @if (isset($especie))
        <h1>Detalles de la Especie</h1>
        <hr>
        <p><strong>ID:</strong> {{ $especie->id }}</p>
        <p><strong>Nombre científico:</strong> {{ $especie->nombre_cientifico }}</p>
        <p><strong>Tiempo para la adultez:</strong> {{ $especie->tiempo_para_adultez }}</p>
        <p><strong>Región de origen:</strong> {{ $especie->region_origen }}</p>
        <p><strong>Clima:</strong> {{ $especie->clima }}</p>
        <p><strong>Enlace de la descripción:</strong> {{ $especie->enlace_descripcion }}</p>
        <p><strong>Beneficios:</strong> {{ $especie->beneficios }}</p>

    @else
        <p>La especie no existe o ha sido eliminado.</p>
    @endif
</body>

</html>