<!DOCTYPE html>
<html lang="es-ES">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Usuario</title>
    <style>
        .contenedor-perfil { max-width: 600px; margin: 30px auto; background: #fff; padding: 25px; border-radius: 10px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); font-family: sans-serif; }
        .campo { margin-bottom: 18px; }
        label { display: block; font-weight: bold; margin-bottom: 5px; color: #333; }
        input[type="text"], input[type="email"], select { width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; box-sizing: border-box; }
        .img-preview { width: 120px; height: 120px; object-fit: cover; border-radius: 50%; border: 3px solid #27ae60; margin-top: 5px; }
        .error-msg { color: #e74c3c; font-size: 0.85em; margin-top: 5px; display: block; }
        .btn-update { background-color: #27ae60; color: white; padding: 12px 20px; border: none; border-radius: 5px; cursor: pointer; width: 100%; font-size: 16px; font-weight: bold; }
        .btn-update:hover { background-color: #219150; }
        .ayuda { font-size: 0.85em; color: #666; margin-bottom: 10px; }
    </style>
</head>
<body>

@include('nav')

<div class="contenedor-perfil">
    <h1>Modificar usuario</h1>

    <form action="{{ route('usuarios.update', $usuario->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="campo">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" value="{{ old('nombre', $usuario->nombre) }}">
            @error('nombre') <span class="error-msg">{{ $message }}</span> @enderror
        </div>

        <div class="campo">
            <label for="nick">Nickname</label>
            <input type="text" name="nick" id="nick" value="{{ old('nick', $usuario->nick) }}">
            @error('nick') <span class="error-msg">{{ $message }}</span> @enderror
        </div>

        <div class="campo">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email', $usuario->email) }}">
            @error('email') <span class="error-msg">{{ $message }}</span> @enderror
        </div>

        <div class="campo">
            <label for="ubicacion">Ubicación</label>
            <input type="text" name="ubicacion" id="ubicacion" value="{{ old('ubicacion', $usuario->ubicacion) }}">
            @error('ubicacion') <span class="error-msg">{{ $message }}</span> @enderror
        </div>

        <div class="campo">
            <label for="tipo">Tipo de usuario</label>
            <select name="tipo" id="tipo">
                <option value="user" {{ old('tipo', $usuario->tipo) == 'user' ? 'selected' : '' }}>Usuario Estándar</option>
                <option value="admin" {{ old('tipo', $usuario->tipo) == 'admin' ? 'selected' : '' }}>Administrador</option>
            </select>
            @error('tipo') <span class="error-msg">{{ $message }}</span> @enderror
        </div>

        <div class="campo">
            <label>Foto de Perfil (Avatar)</label>
            
            @if($usuario->avatar)
                <div style="margin-bottom: 10px;">
                    <p class="ayuda">Avatar actual:</p>
                    <img src="{{ filter_var($usuario->avatar, FILTER_VALIDATE_URL) ? $usuario->avatar : asset('storage/' . $usuario->avatar) }}" 
                         alt="Avatar" class="img-preview">
                </div>
            @endif

            <p class="ayuda">Sube una imagen cuadrada para mejores resultados. El archivo debe ser una imagen (jpg, png, etc.).</p>
            <input type="file" name="avatar" id="avatar" accept="image/*">
            @error('avatar') <span class="error-msg">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="btn-update">Guardar Cambios</button>
    </form>
</div>

</body>
</html>