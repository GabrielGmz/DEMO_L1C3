<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
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
            min-height: 100vh;
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
            max-width: 400px;
        }

        h2 {
            text-align: center;
            margin-bottom: 1.5rem;
            font-size: 1.5rem;
        }

        label {
            display: block;
            font-size: 0.95rem;
            font-weight: 500;
            margin-bottom: 0.4rem;
        }

        input, select {
            width: 100%;
            padding: 0.6rem 0.75rem;
            border-radius: 0.5rem;
            border: 1px solid #818cf8;
            background-color: #1e1e1e;
            color: white;
            margin-bottom: 1.2rem;
        }

        input::placeholder {
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
            text-align: center;
            margin-top: 1.2rem;
            font-size: 0.875rem;
        }

        .link a {
            color: #818cf8;
            text-decoration: underline;
            transition: color 0.2s ease;
        }

        .link a:hover {
            color: #a5b4fc;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <h2>Registrarse</h2>
            <form method="POST" action="{{ route('register.submit') }}">
                @csrf

                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" placeholder="Nombre" required>

                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="Email" required>

                <label for="password">Contraseña</label>
                <input type="password" name="password" id="password" placeholder="Contraseña" required>

                <label for="rol">Rol</label>
                <select name="rol" id="rol" required>
                    <option value="cliente">Cliente</option>
                    <option value="propietario">Propietario</option>
                </select>

                <button type="submit">Registrarse</button>

                <div class="link">
                    <a href="{{ route('login') }}">¿Ya tienes una cuenta? Inicia sesión</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
