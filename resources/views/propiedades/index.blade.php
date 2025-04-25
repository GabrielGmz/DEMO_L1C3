@extends('layouts.app')

@section('content')
<h2 style="text-align: center; margin-bottom: 20px;">Propiedades disponibles</h2>
@foreach($propiedades as $p)
    <div style="border: 1px solid #ccc; padding: 15px; margin-bottom: 15px; border-radius: 5px;">
        <h3 style="margin: 0 0 10px;">{{ $p->titulo }}</h3>
        <p style="margin: 0 0 10px;">{{ $p->descripción }}</p>
        <p style="margin: 0 0 10px; font-weight: bold;">Precio por noche: ${{ $p->precio_por_noche }}</p>
        @if(session('user') && session('user')->rol == 'cliente')
            <a href="{{ route('reservas.create', $p->id) }}" style="color: white; background-color: #007bff; padding: 10px 15px; text-decoration: none; border-radius: 5px;">Reservar</a>
        @endif
    </div>
@endforeach
@endsection
