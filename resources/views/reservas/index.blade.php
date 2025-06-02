@extends('layouts.app')

@section('content')
    <div style="max-width: 800px; margin: auto; padding: 2rem;">
        <h2 style="color: #fff; font-family: Arial, sans-serif; margin-bottom: 1.5rem; text-align: center;">Mis Reservas</h2>

        @if(session('success'))
            <div style="background-color: #61ff86; color: #000; padding: 12px; border-radius: 8px; margin-bottom: 20px; font-weight: bold;">
                {{ session('success') }}
            </div>
        @endif

        @if($reservas->isEmpty())
            <p style="color: #f87171; font-style: italic; text-align: center;">No tienes reservas registradas.</p>
        @else
            <ul style="list-style: none; padding: 0;">
                @foreach($reservas as $reserva)
                    <li style="background-color: rgba(255, 255, 255, 0.06); padding: 1.5rem; border-radius: 12px; margin-bottom: 1.5rem; color: #fff;">
                        <h3 style="margin-bottom: 10px; color: #ffffff;">{{ $reserva->propiedad->titulo }}</h3>
                        <p><strong>Inicio:</strong> {{ $reserva->fecha_inicio }}</p>
                        <p><strong>Fin:</strong> {{ $reserva->fecha_fin }}</p>
                        <p><strong>Estado:</strong> {{ ucfirst($reserva->estado) }}</p>

                        @if($user->rol === 'propietario')
                            <p><strong>Reservado por:</strong> {{ $reserva->user->nombre ?? 'Usuario no disponible' }}</p>
                        @endif

                        @if($user->rol === 'cliente' && $reserva->estado === 'pendiente')
                            <div style="margin-top: 1rem; display: flex; gap: 10px;">
                                <a href="{{ route('reservas.edit', $reserva->id) }}"
                                   style="flex: 1; padding: 10px; background-color: #3490dc; color: white; text-align: center; text-decoration: none; border-radius: 6px; font-weight: bold;">
                                   Editar
                                </a>

                                <form action="{{ route('reservas.destroy', $reserva->id) }}" method="POST" style="flex: 1;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            onclick="return confirm('¿Estás seguro de cancelar esta reserva?')"
                                            style="width: 100%; padding: 10px; background-color: #e3342f; color: white; border: none; border-radius: 6px; font-weight: bold; cursor: pointer;">
                                        Cancelar
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
