<!DOCTYPE html>
<html lang="es-ES">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear usuario</title>
    <style>
        .error-message {
            color: red;
            font-size: 0.8em;
        }

        .input-error {
            border: 1px solid red;
        }

        .contenedor {
            padding: 20px;
            font-family: sans-serif;
        }
    </style>
</head>

<body>
    <div>
        @include('nav')
        <div class="contenedor">
            <h1>Registrar usuario</h1>

            @if ($errors->any())
                <div style="background: #fee; color: red; padding: 10px; border-radius: 5px; margin-bottom: 20px;">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- IMPORTANTE: Se añade enctype para permitir la subida del avatar --}}
            <form action="{{ route('usuarios.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <label>Nombre:</label><br>
                <input type="text" name="nombre" value="{{ old('nombre') }}"><br>
                @error('nombre') <small style="color:red">{{ $message }}</small> @enderror<br>

                <label>Nickname:</label><br>
                <input type="text" name="nick" value="{{ old('nick') }}"><br>
                @error('nick') <small style="color:red">{{ $message }}</small> @enderror<br>

                <label>Email:</label><br>
                <input type="text" name="email" value="{{ old('email') }}"><br>
                @error('email') <small style="color:red">{{ $message }}</small> @enderror<br>

                <label>Contraseña:</label><br>
                <input type="password" name="password"><br>
                @error('password') <small style="color:red">{{ $message }}</small> @enderror<br>

                <label>Confirmar Contraseña:</label><br>
                <input type="password" name="password_confirmation"><br><br>

                <label>Ubicación:</label><br>
                <input type="text" name="ubicacion" value="{{ old('ubicacion') }}"><br><br>

                <label>Foto de Perfil (Avatar):</label><br>
                <input type="file" name="avatar" accept="image/*"><br>
                @error('avatar') <small style="color:red">{{ $message }}</small> @enderror<br>

                <button type="submit" style="margin-top: 10px; padding: 10px 20px; cursor: pointer;">
                    Crear Usuario
                </button>
            </form>
        </div>
    </div>
</body>

</html>