<div>
    <table
        style="width: 100%; border-collapse: collapse; font-family: sans-serif; margin-top: 20px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
        <thead>
            <tr style="background-color: #27ae60; color: white; text-align: left;">
                <th style="padding: 12px; border: 1px solid #ddd;">ID</th>
                <th style="padding: 12px; border: 1px solid #ddd;">Imagen</th>
                <th style="padding: 12px; border: 1px solid #ddd;">Nombre</th>
                <th style="padding: 12px; border: 1px solid #ddd;">Descripción</th>
                <th style="padding: 12px; border: 1px solid #ddd;">Ubicación</th>
                <th style="padding: 12px; border: 1px solid #ddd;">Fecha</th>
                <th style="padding: 12px; border: 1px solid #ddd;">Terreno / Evento</th>
                <th style="padding: 12px; border: 1px solid #ddd;">Anfitrión ID</th>
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
                    <td style="padding: 10px; border: 1px solid #ddd; font-weight: bold;">{{ $evento->nombre }}</td>
                    <td style="padding: 10px; border: 1px solid #ddd; font-size: 0.9em;">
                        {{ Str::limit($evento->descripcion, 50) ?? '---' }}</td>
                    <td style="padding: 10px; border: 1px solid #ddd;">📍 {{ $evento->ubicacion ?? 'No definida' }}</td>
                    <td style="padding: 10px; border: 1px solid #ddd; white-space: nowrap;">
                        {{ $evento->fecha ? \Carbon\Carbon::parse($evento->fecha)->format('d/m/Y') : 'Pendiente' }}
                    </td>
                    <td style="padding: 10px; border: 1px solid #ddd;">
                        <small><strong>Tipo:</strong> {{ $evento->tipo_evento }}</small><br>
                        <small><strong>Suelo:</strong> {{ $evento->tipo_terreno }}</small>
                    </td>
                    <td style="padding: 10px; border: 1px solid #ddd; text-align: center; color: #7f8c8d;">
                        #{{ $evento->id_anfitrion }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>