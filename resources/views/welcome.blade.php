<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Bienvenido a LaravelBnB</title>
    <style>
        body {
            font-family: sans-serif;
            text-align: center;
            padding: 50px;
        }
        h1 { font-size: 2em; }
        a {
            display: inline-block;
            margin: 10px;
            padding: 10px 20px;
            background-color: #3490dc;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        a:hover {
            background-color: #2779bd;
        }
    </style>
</head>
<body>
    <h1>Bienvenido a LaravelBnB 🏠</h1>
    <p>Plataforma de reservas tipo Airbnb hecha en Laravel 12</p>

    <a href="{{ route('login') }}">Iniciar Sesión</a>
    <a href="{{ route('register') }}">Registrarse</a>
</body>
</html>
