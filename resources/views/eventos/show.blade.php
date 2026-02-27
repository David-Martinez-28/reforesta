<!DOCTYPE html>
<html lang="es-ES">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Evento</title>
    <style>
        .btn { padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; font-weight: bold; text-decoration: none; display: inline-block; }
        .btn-unirse { background-color: #27ae60; color: white; }
        .btn-abandonar { background-color: #95a5a6; color: white; }
        .btn-edit { background-color: #3498db; color: white; margin-top: 10px; }
        
        .event-container { display: flex; flex-wrap: wrap; gap: 40px; margin-top: 20px; }
        .event-info { flex: 2; min-width: 300px; }
        .event-sidebar { flex: 1; min-width: 250px; }

        .participantes-lista { background: #f9f9f9; padding: 15px; border-radius: 8px; border: 1px solid #eee; }
        .badge-user { display: inline-flex; align-items: center; background: #fff; border: 1px solid #ddd; padding: 5px 12px; border-radius: 20px; margin: 5px; font-size: 0.9em; gap: 8px; }
        .avatar-img { width: 25px; height: 25px; border-radius: 50%; object-fit: cover; border: 1px solid #ddd; }
        .avatar-placeholder { width: 25px; height: 25px; border-radius: 50%; background: #eee; display: flex; align-items: center; justify-content: center; font-size: 10px; color: #999; }
    </style>
</head>
<body>
    @include('nav')

    <div class="container" style="padding: 20px; max-width: 1200px; margin: auto;">
        @if (isset($evento))
            <h1>{{ $evento->nombre }}</h1>
            <hr>

            <div class="event-container">
                <div class="event-info">
                    <p><strong>Descripción:</strong> {{ $evento->descripcion }}</p>
                    <p><strong>📍 Ubicación:</strong> {{ $evento->ubicacion }}</p>
                    <p><strong>📅 Fecha:</strong> {{ \Carbon\Carbon::parse($evento->fecha)->format('d/m/Y') }}</p>
                    <p><strong>🌱 Terreno:</strong> {{ $evento->tipo_terreno }}</p>
                    <p><strong>🏷️ Tipo:</strong> {{ $evento->tipo_evento }}</p>

                    <div style="margin-top: 20px; display: flex; flex-direction: column; gap: 10px; align-items: flex-start;">
                        @auth
                            
                            @if ($evento->asistentes->contains(auth()->id()))
                                <form action="{{ route('usuarios.desunirse') }}" method="POST">
                                    @csrf @method('PATCH')
                                    <input type="hidden" name="evento_id" value="{{ $evento->id }}">
                                    <button type="submit" class="btn btn-abandonar">Abandonar evento</button>
                                </form>
                            @else
                                <form action="{{ route('usuarios.unirse') }}" method="POST">
                                    @csrf @method('PATCH')
                                    <input type="hidden" name="evento_id" value="{{ $evento->id }}">
                                    <button type="submit" class="btn btn-unirse">Unirse al evento</button>
                                </form>
                            @endif
                            @if (auth()->id() === $evento->id_anfitrion)
                                <a href="{{ route('eventos.edit', $evento->id) }}" class="btn btn-edit">Modificar datos</a>
                            @endif
                        @else
                            <p><i>Para unirte a este evento debes <a href="{{ route('login') }}">iniciar sesión</a>.</i></p>
                        @endauth
                    </div>
                </div>

                <div class="event-sidebar">
                    <div class="participantes-lista">
                        <h3>Participantes ({{ $evento->asistentes->count() }})</h3>
                        <div style="display: flex; flex-wrap: wrap;">
                            @forelse ($evento->asistentes as $asistente)
                                <div class="badge-user">
                                    @if($asistente->avatar)
                                        <img src="{{ asset('storage/' . $asistente->avatar) }}" alt="Avatar" class="avatar-img">
                                    @else
                                        <div class="avatar-placeholder">?</div>
                                    @endif
                                    <strong>{{ $asistente->nick }}</strong>
                                </div>
                            @empty
                                <p style="color: #999;">Aún no hay participantes. ¡Sé el primero!</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        @else
            <p>El evento no existe o ha sido eliminado.</p>
        @endif
    </div>
</body>
</html>