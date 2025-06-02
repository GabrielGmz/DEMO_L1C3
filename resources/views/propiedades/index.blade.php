@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: #000;
        color: #fff;
        font-family: sans-serif;
    }

    h2 {
        text-align: center;
        margin-bottom: 2rem;
        font-size: 2rem;
        color: #fff;
    }

    .filtro-form {
        text-align: center;
        margin-bottom: 2.5rem;
    }

    .filtro-form input {
        padding: 0.6rem;
        border-radius: 0.5rem;
        border: 1px solid #ccc;
        margin: 0.3rem;
        width: 160px;
        background-color: #1e1e1e;
        color: #fff;
    }

    .filtro-form button {
        padding: 0.6rem 1.2rem;
        background-color: #28a745;
        color: #fff;
        border: none;
        border-radius: 0.5rem;
        cursor: pointer;
        font-weight: 600;
        transition: background-color 0.2s;
    }

    .filtro-form button:hover {
        background-color: #218838;
    }

    .prop-card {
        background-color: rgba(255, 255, 255, 0.05);
        border: 1px solid #444;
        border-radius: 0.75rem;
        padding: 1.5rem;
        margin: 1.5rem auto;
        max-width: 700px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
    }

    .prop-card h3 {
        font-size: 1.4rem;
        margin-bottom: 0.5rem;
    }

    .prop-card p {
        margin-bottom: 0.5rem;
        font-size: 0.95rem;
    }

    .prop-card a,
    .prop-card button {
        margin-top: 1rem;
        display: inline-block;
        padding: 0.6rem 1rem;
        border-radius: 0.5rem;
        text-decoration: none;
        font-weight: bold;
    }

    .btn-reservar {
        background-color: #007bff;
        color: white;
        transition: background-color 0.2s;
    }

    .btn-reservar:hover {
        background-color: #0056b3;
    }

    .btn-eliminar {
        background-color: #dc3545;
        color: white;
        border: none;
        transition: background-color 0.2s;
    }

    .btn-eliminar:hover {
        background-color: #b02a37;
    }

    .btn-nueva {
        display: inline-block;
        background-color: #62ff87;
        color: black;
        font-weight: bold;
        padding: 0.8rem 1.2rem;
        border-radius: 0.5rem;
        text-decoration: none;
        margin: 2rem auto;
        display: block;
        width: fit-content;
        text-align: center;
        transition: background-color 0.2s;
    }

    .btn-nueva:hover {
        background-color: #4cd65f;
    }
</style>

<h2>Propiedades disponibles</h2>

@if(session('user') && session('user')->rol === 'cliente')
    <form method="GET" action="{{ route('propiedades.index') }}" class="filtro-form">
        <input
            type="text"
            name="busqueda"
            placeholder="Buscar"
            value="{{ request('busqueda') }}"
        >

        <input
            type="number"
            name="precio_min"
            placeholder="Precio mínimo"
            value="{{ request('precio_min') }}"
        >

        <input
            type="number"
            name="precio_max"
            placeholder="Precio máximo"
            value="{{ request('precio_max') }}"
        >

        <button type="submit">Filtrar</button>
    </form>
@endif

@foreach ($propiedades as $p)
    <div class="prop-card">
        <h3>{{ $p->titulo }}</h3>
        <p>{{ $p->descripción }}</p>
        <p><strong>Precio por noche:</strong> ${{ $p->precio_por_noche }}</p>
        <p><strong>Estado:</strong> {{ $p->estado }}</p>

        @if (session('user'))
            @if (session('user')->rol == 'cliente')
                <a href="{{ route('reservas.create', $p->id) }}" class="btn-reservar">Reservar</a>
            @elseif(session('user')->rol == 'propietario' && session('user')->id == $p->id_user)
                <form action="{{ route('propiedades.destroy', $p->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-eliminar" onclick="return confirm('¿Estás seguro de eliminar esta propiedad?')">Eliminar</button>
                </form>
            @endif
        @endif
    </div>
@endforeach

@if (session('user') && session('user')->rol == 'propietario')
    <a href="{{ route('propiedades.create') }}" class="btn-nueva">+ Nueva Propiedad</a>
@endif
@endsection
