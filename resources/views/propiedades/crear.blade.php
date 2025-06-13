@extends('layouts.app')

@section('content')
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    html, body {
        height: 100%;
        background-color: #000000;
        color: white;
        font-family: sans-serif;
    }

    .crear-container {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        padding: 1rem;
    }

    .crear-form-wrapper {
        background-color: rgba(255, 255, 255, 0.08);
        padding: 2rem;
        border-radius: 0.75rem;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
        width: 100%;
        max-width: 480px;
    }

    .crear-form-wrapper h1 {
        font-size: 1.7rem;
        font-weight: bold;
        text-align: center;
        margin-bottom: 1.5rem;
        color: #ffffff;
    }

    .crear-form-wrapper input,
    .crear-form-wrapper textarea,
    .crear-form-wrapper select {
        width: 100%;
        padding: 0.65rem 0.75rem;
        margin-bottom: 1.1rem;
        border: 1px solid #818cf8;
        border-radius: 0.5rem;
        font-size: 1rem;
        background-color: #1e1e1e;
        color: white;
    }

    .crear-form-wrapper input::placeholder,
    .crear-form-wrapper textarea::placeholder {
        color: #aaa;
    }

    .crear-form-wrapper button {
        width: 100%;
        padding: 0.7rem;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 0.5rem;
        font-size: 1rem;
        font-weight: bold;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .crear-form-wrapper button:hover {
        background-color: #0056b3;
    }
</style>

<div class="crear-container">
    <div class="crear-form-wrapper">
        <h1>Crear Propiedad</h1>
        <form method="POST" action="{{ route('propiedades.store') }}" enctype="multipart/form-data">
            @csrf

            <input type="text" name="titulo" placeholder="Título" required>

            <textarea name="descripción" placeholder="Descripción" rows="4" required></textarea>

            <input type="number" name="precio_por_noche" placeholder="Precio por noche" min="0" required>

            <input type="number" name="capacidad" placeholder="Capacidad" min="1" required>

            <select name="estado" required>
                <option value="">-- Seleccionar estado --</option>
                <option value="disponible">Disponible</option>
                <option value="no disponible">No Disponible</option>
            </select>

            <input type="file" name="imagen_url" accept="image/png" required>

            <button type="submit">Guardar propiedad</button>
        </form>
    </div>
</div>
@endsection
