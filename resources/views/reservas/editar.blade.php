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
            background-color: #000000;
            font-family: sans-serif;
            color: white;
        }

        .container {
            height: 100vh;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            text-align: center;
            padding: 1rem;
        }

        h2 {
            margin-bottom: 1.5rem;
            font-size: 1.5rem;
        }

        .form-card {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 300px;
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        input {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 100%;
        }

        button, a.cancel-link {
            padding: 10px 20px;
            text-align: center;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover, .cancel-link:hover {
            background-color: #0056b3;
        }

        .alert {
            background-color: #ffcccc;
            color: #ff0000;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
        }

        .alert ul {
            margin: 0;
            padding-left: 20px;
            text-align: left;
            color: #ff0000;
        }

        .btn-group {
            display: flex;
            gap: 10px;
            justify-content: center;
        }
    </style>
</head>
<body>
    <div class="container">
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

        <form action="{{ route('reservas.update', $reserva->id) }}" method="POST" class="form-card">
            @csrf
            @method('PUT')

            <input type="date" name="fecha_inicio" value="{{ old('fecha_inicio', $reserva->fecha_inicio) }}" required>
            <input type="date" name="fecha_fin" value="{{ old('fecha_fin', $reserva->fecha_fin) }}" required>

            <div class="btn-group">
                <button type="submit">Guardar Cambios</button>
                <a href="{{ route('reservas.index') }}" class="cancel-link">Cancelar</a>
            </div>
        </form>
    </div>
</body>
</html>
