<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        /* Elimina todo margen/padding y asegura fondo negro */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html, body {
            height: 100%;
            width: 100%;
            background-color: #000000;
            font-family: sans-serif;
            color: white;
        }

        .container {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card {
            background-color: rgba(255, 255, 255, 0.1);
            padding: 2rem;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 320px;
        }

        .form-control {
            width: 100%;
            padding: 0.5rem 0.75rem;
            border-radius: 0.375rem;
            border: 1px solid #d1d5db;
            margin-top: 0.25rem;
            margin-bottom: 1rem;
        }

        button {
            width: 100%;
            background-color: #4f46e5;
            color: white;
            padding: 0.5rem;
            border: none;
            border-radius: 0.375rem;
            cursor: pointer;
            font-weight: 500;
        }

        button:hover {
            background-color: #4338ca;
        }

        .link {
            display: block;
            margin-top: 1rem;
            font-size: 0.875rem;
            text-align: center;
            color: #818cf8;
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <h2 style="text-align: center; margin-bottom: 1.5rem;">Iniciar sesión</h2>
            <form method="POST" action="{{ route('login.submit') }}">
                @csrf
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Email">

                <label for="password">Contraseña</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Contraseña">

                <button type="submit">Iniciar sesión</button>

                <a href="{{ route('register') }}" class="link">¿No tienes una cuenta? Regístrate</a>
            </form>
        </div>
    </div>
</body>
</html>
