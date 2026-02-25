<!DOCTYPE html>
<html lang="es-ES">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles</title>
    <style>
        /* Estilos Base para Botones */
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 12px 22px;
            border: none;
            border-radius: 8px;
            /* Un poco más redondeado para que sea moderno */
            cursor: pointer;
            font-weight: bold;
            font-size: 15px;
            text-decoration: none;
            /* Por si usas <a> */
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
        }

        /* Variaciones de Color */
        .btn-unirse {
            background-color: #27ae60;
            color: white;
        }

        .btn-unirse:hover {
            background-color: #219150;
        }

        .btn-abandonar {
            background-color: #95a5a6;
            color: white;
        }

        .btn-abandonar:hover {
            background-color: #7f8c8d;
        }

        /* Botón de Editar (Azul) */
        .btn-editar {
            background-color: #2980b9;
            color: white;
        }

        .btn-editar:hover {
            background-color: #2471a3;
        }

        /* Sección de Participantes */
        .participantes-lista {
            background: #f9f9f9;
            padding: 20px;
            border-radius: 12px;
            margin-top: 25px;
            border: 1px solid #eee;
        }

        .badge-user {
            display: inline-block;
            background: #fff;
            border: 1px solid #e0e0e0;
            padding: 6px 14px;
            border-radius: 20px;
            margin: 4px;
            font-size: 0.9em;
            color: #555;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.02);
        }

        /* Contenedor de acciones para alinear botones */
        .acciones-grupo {
            display: flex;
            gap: 15px;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }
    </style>
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

        <div class="acciones-contenedor">
            <a href="{{ route('especies.edit', $especie->id) }}" class="btn btn-editar">
                <span>✏️</span> Editar Información de la Especie
            </a>
        </div>

    @else
        <p>La especie no existe o ha sido eliminado.</p>
    @endif
</body>

</html>