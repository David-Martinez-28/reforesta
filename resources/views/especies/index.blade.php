<div style="margin-top: 20px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); border-radius: 8px; overflow: hidden;">
    @include('nav')
<div style="overflow-x: auto;">
        <table style="width: 100%; border-collapse: collapse; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: #fff;">
            <thead>
                <tr style="background-color: #2c3e50; color: white; text-align: left;">
                    <th style="padding: 15px; border-bottom: 2px solid #27ae60;">ID</th>
                    <th style="padding: 15px; border-bottom: 2px solid #27ae60;">Especie</th>
                    <th style="padding: 15px; border-bottom: 2px solid #27ae60;">Origen & Clima</th>
                    <th style="padding: 15px; border-bottom: 2px solid #27ae60;">Maduración</th>
                    <th style="padding: 15px; border-bottom: 2px solid #27ae60;">Beneficios</th>
                    <th style="padding: 15px; border-bottom: 2px solid #27ae60; text-align: center;">Ficha</th>
                </tr>
            </thead>
            <tbody>
                @foreach($especies as $especie)
                    <tr style="border-bottom: 1px solid #eee; transition: background 0.3s;"
                        onmouseover="this.style.backgroundColor='#f1f9f4'"
                        onmouseout="this.style.backgroundColor='transparent'">
                        <td style="padding: 12px; text-align: center; color: #95a5a6; font-weight: bold;">
                            {{ $especie->id }}
                        </td>
                        <td style="padding: 12px;">
                            <div style="display: flex; align-items: center;">
                                {{-- Lógica para detectar si es URL de Faker o archivo local --}}
                                @php
                                    $urlImagen = Str::startsWith($especie->foto_especie, 'http')
                                        ? $especie->foto_especie
                                        : asset('storage/' . $especie->foto_especie);
                                @endphp
                                <img src="{{ $especie->foto_especie ? $urlImagen : asset('images/placeholder.png') }}"
                                    style="width: 45px; height: 45px; border-radius: 8px; object-fit: cover; margin-right: 12px; border: 1px solid #ddd;">
                                <span style="font-weight: 600; color: #27ae60; font-style: italic;">
                                    {{ $especie->nombre_cientifico }}
                                </span>
                            </div>
                        </td>
                        <td style="padding: 12px;">
                            <div style="font-size: 0.9em; color: #34495e;">📍 {{ $especie->region_origen }}</div>
                            <div style="font-size: 0.8em; color: #7f8c8d;">☁️ {{ $especie->clima }}</div>
                        </td>
                        <td style="padding: 12px;">
                            <span
                                style="background: #e8f5e9; color: #2e7d32; padding: 4px 8px; border-radius: 4px; font-size: 0.85em; font-weight: 500;">
                                ⏳ {{ $especie->tiempo_para_adultez }}
                            </span>
                        </td>
                        <td style="padding: 12px; font-size: 0.85em; color: #555; max-width: 250px;">
                            {{ Str::limit($especie->beneficios, 70) }}
                        </td>
                        <td style="padding: 12px; text-align: center;">
                            @if($especie->enlace_descripcion)
                                <a href="{{ $especie->enlace_descripcion }}" target="_blank"
                                    style="display: inline-block; padding: 6px 10px; background: #3498db; color: white; border-radius: 4px; text-decoration: none; font-size: 0.8em;">
                                    Ver más
                                </a>
                            @endif
                        </td>
                        <td style="padding: 8px; border: 1px solid #ddd;">
                            <form action="{{ route('especies.destroy', $especie->id) }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button type="submit">Eliminar</button>
                            </form>
                        </td>
                        <td style="padding: 8px; border: 1px solid #ddd;">
                            <a href="{{ url(path: 'especies/' . $especie->id) }}">Ver detalles</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>