@extends('layouts.app')

@section('content')
    <h2 style="text-align: center; margin-bottom: 20px;">Propiedades disponibles</h2>

    @foreach ($propiedades as $p)
        <div style="border: 1px solid #ffffff; padding: 15px; margin: 30px; border-radius: 5px;">
            <h3 style="margin: 0 0 10px;">{{ $p->titulo }}</h3>
            <p style="margin: 0 0 10px;">{{ $p->descripción }}</p>
            <p style="margin: 0 0 10px;"><strong>Precio por noche:</strong> ${{ $p->precio_por_noche }}</p>
            <p style="margin: 0 0 10px;"><strong>Estado:</strong> {{ $p->estado }}</p>

            @if (session('user'))
                @if (session('user')->rol == 'cliente')
                    <a href="{{ route('reservas.create', $p->id) }}"
                        style="color: white; background-color: #007bff; padding: 10px 15px; text-decoration: none; border-radius: 5px;">Reservar</a>
                @elseif(session('user')->rol == 'propietario' && session('user')->id == $p->id_user)
                    <form action="{{ route('propiedades.destroy', $p->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('¿Estás seguro de eliminar esta propiedad?')"
                            style="background-color: #dc3545; color: white; padding: 8px 12px; border: none; border-radius: 5px;">Eliminar</button>
                    </form>
                @endif
            @endif
        </div>
    @endforeach
    @if (session('user') && session('user')->rol == 'propietario')
        <a href="{{ route('propiedades.create') }}"
            style="color: white; background-color: #62ff87; padding: 12px; text-decoration: none; border-radius: 5px; margin: 20px; font-weight:bold; bottom: 0; position:absolute;">Nueva
            Propiedad</a>
    @endif
@endsection
