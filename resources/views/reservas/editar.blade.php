<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Reserva</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html, body {
            height: 100%;
            width: 100%;
            background-color: #000;
            font-family: sans-serif;
            color: white;
        }

        .container {
            min-height: 100vh;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 1.5rem;
        }

        .form-wrapper {
            background-color: rgba(255, 255, 255, 0.06);
            padding: 2rem;
            border-radius: 1rem;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.4);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        h2 {
            font-size: 1.8rem;
            margin-bottom: 1.5rem;
            color: #ffffff;
        }

        input {
            padding: 0.8rem;
            width: 100%;
            border: 1px solid #ccc;
            border-radius: 0.5rem;
            margin-bottom: 1rem;
            font-size: 1rem;
            background-color: #fff;
            color: #000;
        }

        .btn-group {
            display: flex;
            justify-content: space-between;
            gap: 10px;
        }

        button,
        .cancel-link {
            flex: 1;
            padding: 0.8rem;
            text-align: center;
            background-color: #007bff;
            color: white;
            font-weight: bold;
            border: none;
            border-radius: 0.5rem;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover,
        .cancel-link:hover {
            background-color: #0056b3;
        }

        .alert {
            background-color: #ff4c4c;
            color: white;
            padding: 10px;
            border-radius: 0.5rem;
            margin-bottom: 15px;
            text-align: left;
        }

        .alert ul {
            padding-left: 1.2rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-wrapper">
            <h2>Editar Reserva</h2>

            @if ($errors->any())
                <div class="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('reservas.update', $reserva->id) }}" method="POST">
                @csrf
                @method('PUT')

                <input type="date" name="fecha_inicio" value="{{ old('fecha_inicio', $reserva->fecha_inicio) }}" required>
                <input type="date" name="fecha_fin" value="{{ old('fecha_fin', $reserva->fecha_fin) }}" required>

                <div class="btn-group">
                    <button type="submit">Guardar</button>
                    <a href="{{ route('reservas.index') }}" class="cancel-link">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
