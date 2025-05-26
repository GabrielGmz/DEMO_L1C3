@extends('layouts.app')

@section('content')
    <h2 style="font-family: Arial, sans-serif; padding:10px;">Reservas</h2>

    @if(session('success'))
        <div class="alert alert-success" style="background-color: #61ff86; color: #00ff3c; padding: 10px; border-radius: 5px;">
            {{ session('success') }}
        </div>
    @endif

    @if($reservas->isEmpty())
        <p style="color: #ff1900; font-style: italic;">No hay reservas en tus propiedades aún.</p>
    @else
        <ul style="list-style-type: none; padding: 10px;">
            @foreach($reservas as $reserva)
                <li style="margin-bottom: 20px; padding: 15px; border: 1px solid #ccc; border-radius: 5px;">
                    <h4>{{ $reserva->propiedad->titulo ?? 'Propiedad eliminada' }}</h4>
                    <p>Reservado por: <strong>{{ $reserva->user->nombre ?? 'Usuario eliminado' }}</strong></p>
                    <p>Fecha de inicio: {{ $reserva->fecha_inicio }}</p>
                    <p>Fecha de fin: {{ $reserva->fecha_fin }}</p>
                    <p>Estado: <strong>{{ ucfirst($reserva->estado) }}</strong></p>

                    @if($reserva->estado === 'pendiente')
                        <form action="{{ route('reservas.aceptar', $reserva->id) }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" style="background-color: #28a745; color: white; padding: 5px 10px; border: none; border-radius: 5px;">Aceptar</button>
                        </form>

                        <form action="{{ route('reservas.rechazar', $reserva->id) }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" style="background-color: #dc3545; color: white; padding: 5px 10px; border: none; border-radius: 5px;">Rechazar</button>
                        </form>
                    @endif
                </li>
            @endforeach
        </ul>
    @endif
@endsection

