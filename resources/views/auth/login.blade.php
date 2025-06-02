<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
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
            padding: 20px;
        }

        .card {
            background-color: rgba(255, 255, 255, 0.08);
            padding: 2rem;
            border-radius: 0.75rem;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
            width: 100%;
            max-width: 360px;
        }

        h2 {
            text-align: center;
            margin-bottom: 1.5rem;
            font-size: 1.5rem;
        }

        label {
            font-size: 0.95rem;
            font-weight: 500;
        }

        .form-control {
            width: 100%;
            padding: 0.6rem 0.75rem;
            border-radius: 0.5rem;
            border: 1px solid #818cf8;
            margin-top: 0.3rem;
            margin-bottom: 1.2rem;
            background-color: #1e1e1e;
            color: white;
        }

        .form-control::placeholder {
            color: #aaa;
        }

        button {
            width: 100%;
            background-color: #4f46e5;
            color: white;
            padding: 0.6rem;
            border: none;
            border-radius: 0.5rem;
            font-weight: bold;
            font-size: 1rem;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #4338ca;
        }

        .link {
            display: block;
            margin-top: 1.2rem;
            font-size: 0.875rem;
            text-align: center;
            color: #818cf8;
            text-decoration: underline;
            transition: color 0.2s ease;
        }

        .link:hover {
            color: #a5b4fc;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <h2>Iniciar sesión</h2>
            <form method="POST" action="{{ route('login.submit') }}">
                @csrf
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Email" required>

                <label for="password">Contraseña</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Contraseña" required>

                <button type="submit">Iniciar sesión</button>

                <a href="{{ route('register') }}" class="link">¿No tienes una cuenta? Regístrate</a>
            </form>
        </div>
    </div>
</body>
</html>
