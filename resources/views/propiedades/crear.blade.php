@extends('layouts.app')

@section('content')
<div style="display: flex; justify-content: center; align-items: center; min-height: 100vh; background-color: #f9f9f9;">
    <div style="text-align: center; margin-bottom: 20px;">
        <h1 style="font-size: 2em; color: #333;">Crear Propiedad</h1>
    <form method="POST" action="{{ route('propiedades.store') }}" style="max-width: 500px; padding: 20px; border: 1px solid #ccc; border-radius: 10px; background-color: #fff; text-align: center;">
        @csrf
        <input name="titulo" placeholder="Título" style="width: 80%; padding: 10px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 5px;">
        <textarea name="descripción" placeholder="Descripción" style="width: 80%; padding: 10px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 5px;"></textarea>
        <input name="precio_por_noche" placeholder="Precio por noche" style="width: 80%; padding: 10px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 5px;">
        <input name="capacidad" placeholder="Capacidad" style="width: 80%; padding: 10px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 5px;">
        <select name="estado" style="width: 80%; padding: 10px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 5px;">
            <option value="disponible">Disponible</option>
            <option value="no disponible">No Disponible</option>
        </select>
        <button type="submit" style="width: 100%; padding: 10px; background-color: #007bff; color: white; border: none; border-radius: 5px; cursor: pointer;">Guardar propiedad</button>
    </form>
</div>
@endsection
