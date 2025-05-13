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
        background-color: #ffffff25;
        padding: 2rem;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
        width: 100%;
        max-width: 450px;
        text-align: center;
    }

    .crear-form-wrapper h1 {
        font-size: 1.8rem;
        margin-bottom: 1.5rem;
        color: #ffffff;
    }

    .crear-form-wrapper input,
    .crear-form-wrapper textarea,
    .crear-form-wrapper select {
        width: 100%;
        padding: 10px;
        margin-bottom: 1rem;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 1rem;
        background-color: #ffffff;
        color: #000000;
    }

    .crear-form-wrapper button {
        width: 100%;
        padding: 10px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .crear-form-wrapper button:hover {
        background-color: #0056b3;
    }
</style>

<div class="crear-container">
    <div class="crear-form-wrapper">
        <h1>Crear Propiedad</h1>
        <form method="POST" action="{{ route('propiedades.store') }}">
            @csrf
            <input name="titulo" placeholder="Título" required>
            <textarea name="descripción" placeholder="Descripción" rows="4" required></textarea>
            <input name="precio_por_noche" placeholder="Precio por noche" required>
            <input name="capacidad" placeholder="Capacidad" required>
            <select name="estado" required>
                <option value="disponible">Disponible</option>
                <option value="no disponible">No Disponible</option>
            </select>
            <button type="submit">Guardar propiedad</button>
        </form>
    </div>
</div>
@endsection

