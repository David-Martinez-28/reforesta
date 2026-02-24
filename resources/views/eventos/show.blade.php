<!DOCTYPE html>
<html lang="es-ES">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Evento</title>
    <style>
        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
        }

        .btn-unirse {
            background-color: #27ae60;
            color: white;
        }

        .btn-abandonar {
            background-color: #95a5a6;
            color: white;
        }

        .participantes-lista {
            background: #f9f9f9;
            padding: 15px;
            border-radius: 8px;
            margin-top: 20px;
        }

        .badge-user {
            display: inline-block;
            background: #fff;
            border: 1px solid #ddd;
            padding: 5px 10px;
            border-radius: 20px;
            margin: 3px;
            font-size: 0.9em;
        }
    </style>
</head>

<body>
    @include('nav')

    @if (isset($evento))
        <h1>{{ $evento->nombre }}</h1>
        <hr>

        <div style="display: flex; gap: 40px;">
            <div style="flex: 1;">
                <p><strong>Descripción:</strong> {{ $evento->descripcion }}</p>
                <p><strong>📍 Ubicación:</strong> {{ $evento->ubicacion }}</p>
                <p><strong>📅 Fecha:</strong> {{ \Carbon\Carbon::parse($evento->fecha)->format('d/m/Y') }}</p>
                <p><strong>🌱 Terreno:</strong> {{ $evento->tipo_terreno }}</p>
                <p><strong>🏷️ Tipo:</strong> {{ $evento->tipo_evento }}</p>

                <div style="margin-top: 20px;">
                    @if (auth()->check())
                        @if ($evento->asistentes->contains(auth()->id()))
                            <form action="{{ route('usuarios.desunirse') }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="evento_id" value="{{ $evento->id }}">
                                <button type="submit" class="btn btn-abandonar">Abandonar evento</button>
                            </form>
                        @else
                            <form action="{{ route('usuarios.unirse') }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="evento_id" value="{{ $evento->id }}"> <button type="submit"
                                    class="btn btn-unirse">Unirse al evento</button>
                            </form>
                        @endif
                    @else
                        <p><i>Para unirte a este evento debes <a href="{{ route('login') }}">iniciar sesión</a>.</i></p>
                    @endif
                </div>
            </div>

            <div style="flex: 1;">
                <div class="participantes-lista">
                    <h3>Participantes ({{ $evento->asistentes->count() }})</h3>
                    @forelse ($evento->asistentes as $asistente)
                        <span class="badge-user">👤 {{ $asistente->nombre }} ({{ $asistente->nick }})</span>
                    @empty
                        <p style="color: #999;">Aún no hay participantes inscritos. ¡Sé el primero!</p>
                    @endforelse
                </div>
            </div>
        </div>

    @else
        <p>El evento no existe o ha sido eliminado.</p>
    @endif
</body>

</html>