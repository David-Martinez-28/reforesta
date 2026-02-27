<style>
    img {
        background-color: #f0f0f0;
        color: transparent;
    }
</style>

<div
    style="margin-top: 20px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); border-radius: 12px; overflow: hidden; background: #fff; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
    @include('nav')
    <div style="overflow-x: auto;">
        <table style="width: 100%; border-collapse: collapse; background: #fff;">
            <thead>
                <tr style="background-color: #2c3e50; color: white; text-align: left;">
                    <th style="padding: 15px; border-bottom: 3px solid #27ae60;">ID</th>
                    <th style="padding: 15px; border-bottom: 3px solid #27ae60;">Especie</th>
                    <th style="padding: 15px; border-bottom: 3px solid #27ae60;">Origen & Clima</th>
                    <th style="padding: 15px; border-bottom: 3px solid #27ae60;">Maduración</th>
                    <th style="padding: 15px; border-bottom: 3px solid #27ae60;">Beneficios</th>
                    <th style="padding: 15px; border-bottom: 3px solid #27ae60; text-align: center;">Ficha</th>
                    <th style="padding: 15px; border-bottom: 3px solid #27ae60; text-align: center;">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($especies as $especie)
                    <tr style="border-bottom: 1px solid #eee; transition: background 0.3s;"
                        onmouseover="this.style.backgroundColor='#f1f9f4'"
                        onmouseout="this.style.backgroundColor='transparent'">

                        <td style="padding: 12px; text-align: center; color: #95a5a6; font-weight: bold;">
                            #{{ $especie->id }}
                        </td>

                        <td style="padding: 12px;">
                            <div style="display: flex; align-items: center;">
                                @php
                                   
                                    $urlImagen = $especie->foto_especie;
                                    if ($urlImagen && !Str::startsWith($urlImagen, ['http://', 'https://'])) {
                                        $urlImagen = asset('storage/' . $urlImagen);
                                    }
                                    $urlFinal = $urlImagen ?: asset('images/placeholder.png');
                                @endphp
                                <img src="{{ $urlFinal }}" alt="{{ $especie->nombre_cientifico }}"
                                    style="width: 50px; height: 50px; border-radius: 8px; object-fit: cover; margin-right: 12px; border: 1px solid #eee; box-shadow: 0 2px 5px rgba(0,0,0,0.05);">
                                <div>
                                    <div style="font-weight: 600; color: #27ae60; font-style: italic; font-size: 1.05em;">
                                        {{ $especie->nombre_cientifico }}
                                    </div>
                                </div>
                            </div>
                        </td>

                        <td style="padding: 12px;">
                            <div style="font-size: 0.9em; color: #34495e;">📍 {{ $especie->region_origen ?: 'No definida' }}
                            </div>
                            <div style="font-size: 0.8em; color: #7f8c8d;">☁️ {{ $especie->clima ?: 'No especificado' }}
                            </div>
                        </td>

                        <td style="padding: 12px;">
                            <span
                                style="background: #e8f5e9; color: #2e7d32; padding: 4px 10px; border-radius: 20px; font-size: 0.8em; font-weight: 600; border: 1px solid #c8e6c9; white-space: nowrap;">
                                ⏳ {{ $especie->tiempo_para_adultez }}
                            </span>
                        </td>

                        <td style="padding: 12px; font-size: 0.85em; color: #555; max-width: 200px;">
                            {{ Str::limit($especie->beneficios, 60, '...') }}
                        </td>

                        <td style="padding: 12px; text-align: center;">
                            @if($especie->enlace_descripcion)
                                <a href="{{ $especie->enlace_descripcion }}" target="_blank" title="Ver en Wikipedia/Wiki"
                                    style="text-decoration: none; color: #3498db; font-size: 1.2em;">
                                    🌐
                                </a>
                            @else
                                <span style="filter: grayscale(1); opacity: 0.3;">🌐</span>
                            @endif
                        </td>

                        <td style="padding: 12px; text-align: center;">
                            <div style="display: flex; gap: 8px; justify-content: center;">
                                <a href="{{ route('especies.show', $especie->id) }}"
                                    style="background: #27ae60; color: white; padding: 6px 10px; border-radius: 4px; text-decoration: none; font-size: 0.75em; font-weight: bold;">
                                    Ver
                                </a>

                                <form action="{{ route('especies.destroy', $especie->id) }}" method="post"
                                    style="margin:0;">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit"
                                        style="padding: 6px 10px; background: #e74c3c; color: white; border: none; border-radius: 4px; cursor: pointer; font-size: 0.75em; font-weight: bold;"
                                        onclick="return confirm('¿Eliminar {{ $especie->nombre_cientifico }}? 🌱')">
                                        Borrar
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" style="padding: 30px; text-align: center; color: #95a5a6;">
                            No hay especies registradas todavía. <a href="{{ route('especies.create') }}">Registrar la
                                primera</a>.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>