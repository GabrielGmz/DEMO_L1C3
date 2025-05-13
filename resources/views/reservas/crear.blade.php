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

        input, select {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 100%;
        }

        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
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
        <h2>Reservar: {{ $propiedad->titulo }}</h2>
        <form method="POST" action="{{ route('reservas.store', $propiedad->id) }}" class="form-card">
            @csrf
            <input type="date" name="fecha_inicio" required>
            <input type="date" name="fecha_fin" required>
            <select name="estado" required>
                <option value="pendiente">Pendiente</option>
            </select>
            <button type="submit">Reservar</button>
        </form>
    </div>
</body>
</html>
