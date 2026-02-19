<div>

    <table
        style="width: 100%; border-collapse: collapse; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 13px; border: 1px solid #ccc;">
        <thead>
            <tr style="background-color: #34495e; color: white; text-align: left;">
                <th style="padding: 10px; border: 1px solid #ddd;">ID</th>
                <th style="padding: 10px; border: 1px solid #ddd;">Avatar</th>
                <th style="padding: 10px; border: 1px solid #ddd;">Nick</th>
                <th style="padding: 10px; border: 1px solid #ddd;">Nombre</th>
                <th style="padding: 10px; border: 1px solid #ddd;">Email</th>
                <th style="padding: 10px; border: 1px solid #ddd;">Ubicación</th>
                <th style="padding: 10px; border: 1px solid #ddd;">Karma</th>
                <th style="padding: 10px; border: 1px solid #ddd;">Tipo</th>

                </tr>
        </thead>
        <tbody>
            @foreach($usuarios as $usuario)
                <tr style="background-color: {{ $loop->index % 2 == 0 ? '#ffffff' : '#f9f9f9' }};">
                    <td style="padding: 8px; border: 1px solid #ddd; text-align: center;">{{ $usuario->id }}</td>
                    <td style="padding: 8px; border: 1px solid #ddd; text-align: center;">
                        @if($usuario->avatar)
                            <img src="{{ asset('storage/' . $usuario->avatar) }}" alt="Avatar"
                                style="width: 30px; height: 30px; border-radius: 50%;">
                        @else
                            <span title="Sin avatar">🚫</span>
                        @endif
                    </td>
                    <td style="padding: 8px; border: 1px solid #ddd; font-weight: bold; color: #2980b9;">
                        {{ $usuario->nick }}</td>
                    <td style="padding: 8px; border: 1px solid #ddd;">{{ $usuario->nombre ?? 'N/A' }}</td>
                    <td style="padding: 8px; border: 1px solid #ddd;">{{ $usuario->email }}</td>
                    <td style="padding: 8px; border: 1px solid #ddd;">{{ $usuario->ubicacion ?? 'Desconocida' }}</td>
                    <td style="padding: 8px; border: 1px solid #ddd; text-align: center; font-weight: bold;">
                        {{ $usuario->karma }}</td>
                    <td style="padding: 8px; border: 1px solid #ddd;">{{ $usuario->tipo ?? 'User' }}</td>
                    
                    
                </tr>
            @endforeach
        </tbody>
    </table>
</div>