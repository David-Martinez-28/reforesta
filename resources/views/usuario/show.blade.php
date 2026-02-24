<!DOCTYPE html>
<html lang="es-ES">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles</title>
</head>

<body>
    @include ('nav')
    @if (isset($usuario))
        <h1>Detalles del Usuario</h1>
        <hr>
        <p><strong>ID:</strong> {{ $usuario->id }}</p>
        <p><strong>Nombre:</strong> {{ $usuario->nombre }}</p>
        <p><strong>Nick:</strong> {{ $usuario->nick }}</p>
        <p><strong>Email:</strong> {{ $usuario->email }}</p>
        <p><strong>Ubicación:</strong> {{ $usuario->ubicacion }}</p>
        <p><strong>Karma:</strong> {{ $usuario->karma }}</p>
        <p><strong>Tipo:</strong> {{ $usuario->tipo }}</p>
        
        @if (auth()->check() && auth()->id() === $usuario->id)
            <form action="{{ route('usuarios.edit', $usuario->id) }}" method="GET">
                <button type="submit">Modificar datos</button>
            </form>
        @endif
    @else
        <p>El usuario no existe o ha sido eliminado.</p>
    @endif
</body>

</html>