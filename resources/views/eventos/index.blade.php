<div style="overflow-x: auto; padding: 20px;">
    @include('nav')

    <h2 style="font-family: sans-serif; color: #2c3e50;">Listado de Eventos</h2>

    <table style="width: 100%; border-collapse: collapse; font-family: sans-serif; margin-top: 20px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); border-radius: 8px; overflow: hidden;">
        <thead>
            <tr style="background-color: #27ae60; color: white; text-align: left;">
                <th style="padding: 12px; border: 1px solid #ddd;">ID</th>
                <th style="padding: 12px; border: 1px solid #ddd;">Imagen</th>
                <th style="padding: 12px; border: 1px solid #ddd;">Evento / Anfitrión</th>
                <th style="padding: 12px; border: 1px solid #ddd; text-align: center;">Participantes</th>
                <th style="padding: 12px; border: 1px solid #ddd;">Especies a Plantar</th>
                <th style="padding: 12px; border: 1px solid #ddd;">Ubicación y Fecha</th>
                <th style="padding: 12px; border: 1px solid #ddd; text-align: center;">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($eventos as $evento)
                <tr style="border-bottom: 1px solid #eee; background-color: {{ $loop->even ? '#fdfdfd' : '#ffffff' }}; transition: background 0.2s;"
                    onmouseover="this.style.backgroundColor='#f1f8f4'"
                    onmouseout="this.style.backgroundColor='{{ $loop->even ? '#fdfdfd' : '#ffffff' }}'">

                    {{-- ID --}}
                    <td style="padding: 10px; border: 1px solid #ddd; text-align: center; font-weight: bold;">
                        {{ $evento->id }}
                    </td>

                    {{-- Imagen del Evento --}}
                    <td style="padding: 10px; border: 1px solid #ddd; text-align: center;">
                        @if($evento->imagen)
                            <img src="{{ asset('storage/' . $evento->imagen) }}" alt="Foto"
                                style="width: 70px; height: 50px; object-fit: cover; border-radius: 4px; border: 1px solid #eee;">
                        @else
                            <span style="color: #999; font-size: 11px; font-style: italic;">Sin imagen</span>
                        @endif
                    </td>

                    {{-- Nombre y Nick del Anfitrión --}}
                    <td style="padding: 10px; border: 1px solid #ddd;">
                        <span style="font-weight: bold; display: block; color: #2c3e50;">{{ $evento->nombre }}</span>
                        
                        <div style="display: flex; align-items: center; gap: 8px; margin-top: 5px;">
                            {{-- Avatar del Anfitrión --}}
                            @if($evento->anfitrion && $evento->anfitrion->avatar)
                                <img src="{{ asset('storage/' . $evento->anfitrion->avatar) }}" 
                                     alt="Avatar" 
                                     style="width: 24px; height: 24px; border-radius: 50%; object-fit: cover; border: 1px solid #ddd;">
                            @else
                                <span style="font-size: 14px;">👤</span>
                            @endif

                            <small style="color: #7f8c8d;">
                                Anfitrión: <span style="color: #27ae60; font-weight: bold;">{{ $evento->anfitrion->nick ?? 'N/A' }}</span>
                            </small>
                        </div>
                    </td>

                    {{-- Contador de Participantes --}}
                    <td style="padding: 10px; border: 1px solid #ddd; text-align: center;">
                        <div style="background: #e8f4fd; color: #2980b9; padding: 5px 12px; border-radius: 20px; font-weight: bold; font-size: 0.9em; display: inline-block;">
                            👤 {{ $evento->asistentes->count() }}
                        </div>
                    </td>

                    {{-- Especies --}}
                    <td style="padding: 10px; border: 1px solid #ddd;">
                        @foreach($evento->especies as $especie)
                            <a href="{{ route('especies.show', $especie->id) }}" style="text-decoration: none;">
                                <div style="font-size: 0.8em; color: #27ae60; background: #f0f9f4; padding: 3px 6px; border-radius: 4px; margin-bottom: 3px; border-left: 3px solid #2ecc71;">
                                    🌿 {{ $especie->nombre_cientifico }}
                                </div>
                            </a>
                        @endforeach
                    </td>

                    {{-- Ubicación --}}
                    <td style="padding: 10px; border: 1px solid #ddd;">
                        <div style="font-size: 0.9em;">📍 {{ $evento->ubicacion ?? 'Pendiente' }}</div>
                        <div style="font-size: 0.85em; color: #7f8c8d;">📅
                            {{ $evento->fecha ? \Carbon\Carbon::parse($evento->fecha)->format('d/m/Y') : 'Sin fecha' }}
                        </div>
                    </td>

                    {{-- Acciones --}}
                    <td style="padding: 10px; border: 1px solid #ddd; text-align: center;">
                        <div style="display: flex; flex-direction: column; gap: 5px; align-items: center;">
                            <a href="{{ route('eventos.show', $evento->id) }}"
                                style="text-decoration: none; color: white; background: #3498db; padding: 5px 12px; border-radius: 4px; font-size: 0.85em; width: 80px; text-align: center;">Ver más</a>

                            @if(auth()->check() && auth()->id() == $evento->id_anfitrion)
                                <form action="{{ route('eventos.destroy', $evento->id) }}" method="post"
                                    onsubmit="return confirm('¿Seguro que quieres eliminar este evento?')">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit"
                                        style="background: #e74c3c; color: white; border: none; padding: 5px 12px; border-radius: 4px; font-size: 0.85em; cursor: pointer; width: 80px;">Eliminar</button>
                                </form>
                            @endif
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>