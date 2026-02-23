<div class="contenedor">
    @include('nav')

    <h2 style="font-family: Arial, sans-serif; color: #34495e;">Lista de Usuarios</h2>

    <table
        style="width: 100%; border-collapse: collapse; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 13px; border: 1px solid #ccc; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
        <thead>
            <tr style="background-color: #34495e; color: white; text-align: left;">
                <th style="padding: 10px; border: 1px solid #ddd;">ID</th>
                <th style="padding: 10px; border: 1px solid #ddd;">Avatar</th>
                <th style="padding: 10px; border: 1px solid #ddd;">Nick</th>
                <th style="padding: 10px; border: 1px solid #ddd;">Nombre</th>
                <th style="padding: 10px; border: 1px solid #ddd;">Email</th>
                <th style="padding: 10px; border: 1px solid #ddd;">Ubicación</th>
                <th style="padding: 10px; border: 1px solid #ddd; text-align: center;">Karma</th>
                <th style="padding: 10px; border: 1px solid #ddd;">Tipo</th>
                <th style="padding: 10px; border: 1px solid #ddd; text-align: center;">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($usuarios as $usuario)
                <tr style="background-color: {{ $loop->index % 2 == 0 ? '#ffffff' : '#f9f9f9' }};">
                    <td style="padding: 8px; border: 1px solid #ddd; text-align: center;">{{ $usuario->id }}</td>

                    <td style="padding: 8px; border: 1px solid #ddd; text-align: center;">
                        @if($usuario->avatar)
                            <img src="{{ asset('storage/' . $usuario->avatar) }}"
                                style="width: 40px; height: 40px; border-radius: 50%; object-fit: cover;">
                        @else
                            <img src="https://ui-avatars.com/api/?name={{ urlencode($usuario->nombre) }}&background=random&color=fff"
                                style="width: 40px; height: 40px; border-radius: 50%;">
                        @endif
                    </td>

                    <td style="padding: 8px; border: 1px solid #ddd; font-weight: bold; color: #2980b9;">
                        {{ $usuario->nick }}
                    </td>

                    <td style="padding: 8px; border: 1px solid #ddd;">{{ $usuario->nombre ?? 'N/A' }}</td>

                    <td style="padding: 8px; border: 1px solid #ddd;">{{ $usuario->email }}</td>

                    <td style="padding: 8px; border: 1px solid #ddd;">{{ $usuario->ubicacion ?? 'Desconocida' }}</td>

                    <td style="padding: 8px; border: 1px solid #ddd; text-align: center;">
                        <span style="background: #eee; padding: 2px 8px; border-radius: 10px;">{{ $usuario->karma }}</span>
                    </td>

                    <td style="padding: 8px; border: 1px solid #ddd;">
                        <small style="text-transform: uppercase; color: #7f8c8d;">{{ $usuario->tipo ?? 'User' }}</small>
                    </td>

                    <td style="padding: 8px; border: 1px solid #ddd; text-align: center;">
                        <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST"
                            onsubmit="return confirm('¿Estás seguro?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                style="background-color: #e74c3c; color: white; border: none; padding: 5px 10px; border-radius: 3px; cursor: pointer;">
                                Eliminar
                            </button>
                        </form>
                    </td>
                    <td style="padding: 8px; border: 1px solid #ddd;"><a href="{{ url(path: 'usuarios/' . $usuario->id) }}">Ver detalles</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>