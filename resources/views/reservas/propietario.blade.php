@extends('layouts.app')

@section('content')
    <div style="max-width: 800px; margin: auto; padding: 2rem;">
        <h2 style="font-family: Arial, sans-serif; color: #fff; margin-bottom: 1.5rem; text-align: center;">Reservas en tus Propiedades</h2>

        @if(session('success'))
            <div style="background-color: #61ff86; color: #000; padding: 12px; border-radius: 8px; margin-bottom: 20px; font-weight: bold;">
                {{ session('success') }}
            </div>
        @endif

        @if($reservas->isEmpty())
            <p style="color: #f87171; font-style: italic; text-align: center;">No hay reservas en tus propiedades aún.</p>
        @else
            <ul style="list-style: none; padding: 0;">
                @foreach($reservas as $reserva)
                    <li style="background-color: rgba(255, 255, 255, 0.06); padding: 1.5rem; border-radius: 12px; margin-bottom: 1.5rem; color: #fff;">

                        <h3 style="margin-bottom: 10px;">{{ $reserva->propiedad->titulo ?? 'Propiedad eliminada' }}</h3>
                        <p><strong>Reservado por:</strong> {{ $reserva->user->nombre ?? 'Usuario eliminado' }}</p>
                        <p><strong>Inicio:</strong> {{ $reserva->fecha_inicio }}</p>
                        <p><strong>Fin:</strong> {{ $reserva->fecha_fin }}</p>
                        <p><strong>Estado:</strong> {{ ucfirst($reserva->estado) }}</p>

                        @if($reserva->estado === 'pendiente')
                            <div style="margin-top: 1rem; display: flex; gap: 10px;">
                                <form action="{{ route('reservas.aceptar', $reserva->id) }}" method="POST" style="flex: 1;">
                                    @csrf
                                    <button type="submit"
                                            style="width: 100%; padding: 10px; background-color: #28a745; color: white; border: none; border-radius: 6px; font-weight: bold; cursor: pointer;">
                                        Aceptar
                                    </button>
                                </form>

                                <form action="{{ route('reservas.rechazar', $reserva->id) }}" method="POST" style="flex: 1;">
                                    @csrf
                                    <button type="submit"
                                            style="width: 100%; padding: 10px; background-color: #dc3545; color: white; border: none; border-radius: 6px; font-weight: bold; cursor: pointer;">
                                        Rechazar
                                    </button>
                                </form>
                            </div>
                        @endif
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection
