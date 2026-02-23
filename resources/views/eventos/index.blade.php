<div style="overflow-x: auto;">
    @if(auth()->check())
    @endif
    <table style="width: 100%; border-collapse: collapse; font-family: sans-serif; margin-top: 20px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
        <thead>
            <tr style="background-color: #27ae60; color: white; text-align: left;">
                <th style="padding: 12px; border: 1px solid #ddd;">ID</th>
                <th style="padding: 12px; border: 1px solid #ddd;">Imagen</th>
                <th style="padding: 12px; border: 1px solid #ddd;">Evento</th>
                <th style="padding: 12px; border: 1px solid #ddd;">Especies a Plantar</th>
                <th style="padding: 12px; border: 1px solid #ddd;">Ubicación</th>
                <th style="padding: 12px; border: 1px solid #ddd;">Fecha</th>
                <th style="padding: 12px; border: 1px solid #ddd;">Terreno</th>
            </tr>
        </thead>
        <tbody>
            @foreach($eventos as $evento)
                <tr style="border-bottom: 1px solid #eee; background-color: {{ $loop->even ? '#fdfdfd' : '#ffffff' }};">
                    <td style="padding: 10px; border: 1px solid #ddd; text-align: center;">{{ $evento->id }}</td>
                    <td style="padding: 10px; border: 1px solid #ddd; text-align: center;">
                        @if($evento->imagen)
                            <img src="{{ asset('storage/' . $evento->imagen) }}" alt="Foto"
                                style="width: 60px; height: 40px; object-fit: cover; border-radius: 4px;">
                        @else
                            <span style="color: #999; font-size: 11px;">Sin foto</span>
                        @endif
                    </td>
                    <td style="padding: 10px; border: 1px solid #ddd;">
                        <span style="font-weight: bold; display: block;">{{ $evento->nombre }}</span>
                        <small style="color: #7f8c8d;">Anfitrión: #{{ $evento->id_anfitrion }}</small>
                    </td>
                    
                    <td style="padding: 10px; border: 1px solid #ddd;">
                        @if($evento->especies->count() > 0)
                            @foreach($evento->especies as $especie)
                                <div style="display: flex; align-items: center; margin-bottom: 4px; background: #f0f9f4; padding: 4px; border-radius: 4px; border-left: 3px solid #2ecc71;">
                                    <span style="font-size: 0.85em; color: #27ae60; font-style: italic;">
                                        🌿 {{ $especie->nombre_cientifico }}
                                    </span>
                                </div>
                            @endforeach
                        @else
                            <span style="color: #bdc3c7; font-size: 0.8em; font-style: italic;">No hay especies asignadas</span>
                        @endif
                    </td>

                    <td style="padding: 10px; border: 1px solid #ddd;">📍 {{ $evento->ubicacion ?? 'No definida' }}</td>
                    <td style="padding: 10px; border: 1px solid #ddd; white-space: nowrap;">
                        {{ $evento->fecha ? \Carbon\Carbon::parse($evento->fecha)->format('d/m/Y') : 'Pendiente' }}
                    </td>
                    <td style="padding: 10px; border: 1px solid #ddd;">
                        <small><strong>Tipo:</strong> {{ $evento->tipo_evento }}</small><br>
                        <small><strong>Suelo:</strong> {{ $evento->tipo_terreno }}</small>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>