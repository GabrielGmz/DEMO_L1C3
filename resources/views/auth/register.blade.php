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
            padding: 1.9rem;
        }

        .card {
            background-color: rgba(255, 255, 255, 0.1);
            padding: 2rem;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 320px;
        }

        h2 {
            font-size: 1.5rem;
            font-weight: 700;
            text-align: center;
            margin-bottom: 1.5rem;
        }

        label {
            display: block;
            font-size: 0.875rem;
            font-weight: 500;
            color: white;
            margin-bottom: 0.25rem;
        }

        input, select {
            display: block;
            width: 100%;
            padding: 0.5rem 0.75rem;
            border: 1px solid #d1d5db;
            border-radius: 0.375rem;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
            outline: none;
            margin-bottom: 1rem;
        }

        button {
            width: 100%;
            background-color: #4f46e5;
            color: #ffffff;
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            border: none;
            cursor: pointer;
            font-weight: 500;
        }

        button:hover {
            background-color: #4338ca;
        }

        .link {
            text-align: center;
            margin-top: 1rem;
            color: #4f46e5;
            text-decoration: underline;
            font-size: 0.875rem;
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
                <input type="text" name="nombre" id="nombre" placeholder="Nombre">

                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="Email">

                <label for="password">Contraseña</label>
                <input type="password" name="password" id="password" placeholder="Contraseña">

                <label for="rol">Rol</label>
                <select name="rol" id="rol">
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
