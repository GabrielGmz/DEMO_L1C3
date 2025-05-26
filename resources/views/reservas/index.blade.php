@extends('layouts.app')

@section('content')
    <h2 style="color: #fff; font-family: Arial, sans-serif; padding:10px;">Mis Reservas</h2>

    @if(session('success'))
        <div class="alert alert-success" style="background-color: #61ff86; color: #000000; padding: 10px; border-radius: 5px;">
            {{ session('success') }}
        </div>
    @endif

    @if($reservas->isEmpty())
        <p style="color: #e74c3c; font-style: italic;">No tienes reservas.</p>
    @else
        <ul style="list-style-type: none; padding: 10px; color:#fff;">
            @foreach($reservas as $reserva)
                <li style="margin-bottom: 20px; padding: 15px; border: 1px solid #ccc; border-radius: 5px; background-color: rgba(128, 128, 128, 0.1);">
                    <h4>Reserva de: {{ $reserva->propiedad->titulo }}</h4>
                    <p>Fecha de inicio: {{ $reserva->fecha_inicio }}</p>
                    <p>Fecha de fin: {{ $reserva->fecha_fin }}</p>
                    <p>Estado: <strong>{{ ucfirst($reserva->estado) }}</strong></p>

                    @if($user->rol === 'propietario')
                        <p>Reservado por: <strong>{{ $reserva->user->nombre ?? 'Usuario no disponible' }}</strong></p>
                    @endif

                    @if($user->rol === 'cliente' && $reserva->estado === 'pendiente')
                        <div style="margin-top: 10px;">
                            <a href="{{ route('reservas.edit', $reserva->id) }}"
                               style="margin-right: 10px; padding: 5px 10px; background-color: #3490dc; color: white; border-radius: 5px; text-decoration: none;">
                               Editar
                            </a>

                            <form action="{{ route('reservas.destroy', $reserva->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        onclick="return confirm('¿Estás seguro de cancelar esta reserva?')"
                                        style="padding: 5px 10px; background-color: #e3342f; color: white; border: none; border-radius: 5px;">
                                    Cancelar
                                </button>
                            </form>
                        </div>
                    @endif
                </li>
            @endforeach
        </ul>
    @endif
@endsection
