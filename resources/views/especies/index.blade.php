<div>
    <div style="overflow-x: auto;">
        <table
            style="width: 100%; border-collapse: collapse; font-family: 'Segoe UI', sans-serif; margin-top: 20px; background: #fff; border-radius: 8px; overflow: hidden;">
            <thead>
                <tr style="background-color: #2c3e50; color: white; text-align: left;">
                    <th style="padding: 15px; border: 1px solid #34495e;">ID</th>
                    <th style="padding: 15px; border: 1px solid #34495e;">Especie</th>
                    <th style="padding: 15px; border: 1px solid #34495e;">Origen & Clima</th>
                    <th style="padding: 15px; border: 1px solid #34495e;">Maduración</th>
                    <th style="padding: 15px; border: 1px solid #34495e;">Beneficios</th>
                    <th style="padding: 15px; border: 1px solid #34495e; text-align: center;">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($especies as $especie)
                    <tr style="border-bottom: 1px solid #eee; transition: background 0.3s;"
                        onmouseover="this.style.backgroundColor='#f9f9f9'"
                        onmouseout="this.style.backgroundColor='transparent'">
                        <td style="padding: 12px; text-align: center; color: #7f8c8d;">{{ $especie->id }}</td>
                        <td style="padding: 12px;">
                            <div style="display: flex; align-items: center;">
                                <img src="{{ $especie->foto_especie ? asset('storage/' . $especie->foto_especie) : asset('images/placeholder-tree.png') }}"
                                    style="width: 50px; height: 50px; border-radius: 50%; object-fit: cover; margin-right: 15px; border: 2px solid #ecf0f1;">
                                <span
                                    style="font-weight: 600; font-style: italic; color: #27ae60;">{{ $especie->nombre_cientifico }}</span>
                            </div>
                        </td>
                        <td style="padding: 12px;">
                            <small style="display: block; color: #34495e;">🌍
                                {{ $especie->region_origen ?? 'Desconocida' }}</small>
                            <small style="display: block; color: #2980b9;">☁️
                                {{ $especie->clima ?? 'No especificado' }}</small>
                        </td>
                        <td style="padding: 12px; font-size: 0.9em;">
                            ⏳ {{ $especie->tiempo_para_adultez ?? 'N/A' }}
                        </td>
                        <td style="padding: 12px; font-size: 0.85em; max-width: 200px; color: #555;">
                            {{ Str::limit($especie->beneficios, 60) }}
                        </td>
                        <td style="padding: 12px; text-align: center;">
                            @if($especie->enlace_descripcion)
                                <a href="{{ $especie->enlace_descripcion }}" target="_blank"
                                    style="text-decoration: none; color: #3498db; font-size: 1.2em;" title="Ver ficha técnica">
                                    📄
                                </a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>