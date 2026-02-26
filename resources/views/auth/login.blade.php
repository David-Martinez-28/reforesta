<!DOCTYPE html>
<html lang="es-ES">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <style>
        /* Estilos globales compartidos */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f7f6;
            color: #333;
            margin: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .contenedor-login {
            max-width: 450px;
            /* Más estrecho para el login */
            margin: 60px auto;
            background: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #27ae60;
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #f0f0f0;
            padding-bottom: 10px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 8px;
            color: #2c3e50;
            font-size: 0.9em;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 6px;
            box-sizing: border-box;
            font-size: 14px;
            transition: border-color 0.3s;
        }

        input:focus {
            border-color: #27ae60;
            outline: none;
            box-shadow: 0 0 5px rgba(39, 174, 96, 0.2);
        }

        .btn-enviar {
            width: 100%;
            background-color: #27ae60;
            color: white;
            border: none;
            padding: 15px;
            border-radius: 6px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s;
            margin-top: 10px;
        }

        .btn-enviar:hover {
            background-color: #219150;
        }

        .error-msg {
            color: #e74c3c;
            font-size: 0.85em;
            margin-top: 5px;
            display: block;
        }
    </style>
</head>

<body>
    @include('nav')

    <div class="contenedor-login">
        <h1>🔐 Login</h1>

        @if ($errors->has('error_auth'))
            <div
                style="color: white; background: #e74c3c; padding: 10px; margin-bottom: 15px; border-radius: 5px; font-size: 14px;">
                {{ $errors->first('error_auth') }}
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="login">Email:</label>
                <input type="text" name="login" id="login" value="{{ old('login') }}"
                    style="{{ $errors->has('login') ? 'border-color: red;' : '' }}">

                @error('login') <small class="error-msg">{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" name="password" id="password">
                @error('password') <small class="error-msg">{{ $message }}</small> @enderror
            </div>

            <button type="submit" class="btn-enviar">Entrar al Sistema</button>
        </form>
    </div>
</body>

</html>