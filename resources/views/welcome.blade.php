<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Bienvenido a RESERPLACE</title>
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
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #ffffff;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .container {
            text-align: center;
            padding: 2rem;
            background-color: rgba(255, 255, 255, 0.05);
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(255, 255, 255, 0.05);
        }

        h1 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            color: #cccccc;
        }

        a {
            display: inline-block;
            margin: 0 10px;
            padding: 12px 24px;
            font-size: 1rem;
            background-color: #3490dc;
            color: #ffffff;
            text-decoration: none;
            border-radius: 8px;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        a:hover {
            background-color: #1d72b8;
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <h1>RESERPLACE</h1>
    <div class="container">
        <h1>Bienvenido a <strong>RESERPLACE 🏠</strong></h1>
        <p>Registrate o inicia sesion para reservar y gestionar reservas de propiedades</p>

        <a href="{{ route('login') }}">Iniciar Sesión</a>
        <a href="{{ route('register') }}">Registrarse</a>
    </div>
</body>
</html>
