<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reservar</title>
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
            color: #fff;
        }

        .container {
            height: 100vh;
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

        input, select {
            padding: 0.8rem;
            border: 1px solid #ccc;
            border-radius: 0.5rem;
            width: 100%;
            margin-bottom: 1rem;
            font-size: 1rem;
            background-color: #fff;
            color: #000;
        }

        button {
            padding: 0.8rem;
            width: 100%;
            background-color: #007bff;
            color: white;
            font-weight: bold;
            border: none;
            border-radius: 0.5rem;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-wrapper">
            <h2>Reservar: {{ $propiedad->titulo }}</h2>
            <form method="POST" action="{{ route('reservas.store', $propiedad->id) }}">
                @csrf
                <input type="date" name="fecha_inicio" required>
                <input type="date" name="fecha_fin" required>
                <select name="estado" required>
                    <option value="pendiente" selected>Pendiente</option>
                </select>
                <button type="submit">Confirmar Reserva</button>
            </form>
        </div>
    </div>
</body>
</html>
