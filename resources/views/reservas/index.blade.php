@extends('layouts.app')

@section('content')
    <h2 style="color: #fffff; font-family: Arial, sans-serif; padding:10px;">Mis Reservas</h2>

    @if(session('success'))
        <div class="alert alert-success" style="background-color: #d4edda; color: #155724; padding: 10px; border-radius: 5px;">
            {{ session('success') }}
        </div>
    @endif

    @if($reservas->isEmpty())
        <p style="color: #e74c3c; font-style: italic;">No tienes reservas.</p>
    @else
        <ul style="list-style-type: none; padding: 10px; color:#fffff;">
            @foreach($reservas as $reserva)
                <li style="margin-bottom: 20px; padding: 15px; border: 1px solid #ccc; border-radius: 5px; background-color: gray;">

                    <h4 style="font-family: Arial, sans-serif;">Reserva de: {{ $reserva->propiedad->titulo }}</h4>
                    <p style="margin: 5px 0;">Fecha de inicio: {{ $reserva->fecha_inicio }}</p>
                    <p style="margin: 5px 0;">Fecha de fin: {{ $reserva->fecha_fin }}</p>
                    <p style="margin: 5px 0;">Estado: <span style="font-weight: bold;">{{ ucfirst($reserva->estado) }}</span></p>

                    @if($user->rol === 'propietario')
                        <p style="margin: 5px 0;">Reservado por: <span style="font-weight: bold;">{{ $reserva->user->nombre }}</span></p>
                    @endif
                </li>
            @endforeach
        </ul>
    @endif
@endsection
