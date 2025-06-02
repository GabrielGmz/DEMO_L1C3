<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ReserPlace</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #000000;
            color: white;
            font-family: sans-serif;
            box-sizing: border-box;
        }

        nav {
            background-color: #005eff;
            padding: 16px 32px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }

        nav .logo {
            font-size: 1.25rem;
            font-weight: bold;
        }

        nav .links {
            display: flex;
            gap: 20px;
            align-items: center;
        }

        nav a {
            color: white;
            text-decoration: none;
            font-weight: bold;
            transition: opacity 0.3s;
        }

        nav a:hover {
            opacity: 0.8;
        }

        nav form {
            margin: 0;
        }

        nav button {
            background-color: #f56565;
            color: white;
            font-weight: bold;
            padding: 8px 16px;
            border-radius: 4px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        nav button:hover {
            background-color: #e53e3e;
        }

        .content {
            padding: 20px;
        }
    </style>
</head>
<body>
    <nav>
        <div class="logo">RESERPLACE</div>
        <div class="links">
            <a href="{{ route('propiedades.index') }}">Propiedades</a>
            <a href="{{ route('reservas.index') }}">Reservas</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit">Logout</button>
            </form>
        </div>
    </nav>

    <div class="content">
        @yield('content')
    </div>
</body>
</html>

