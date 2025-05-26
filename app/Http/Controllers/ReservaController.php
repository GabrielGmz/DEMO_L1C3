<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserva;
use App\Models\Propietario;

class ReservaController extends Controller
{
    public function create($id_propiedad)
    {
        if (session('user')->rol !== 'cliente') {
            return redirect()->route('propiedades.index')->withErrors('Solo clientes pueden reservar.');
        }

        $propiedad = Propietario::findOrFail($id_propiedad);
        return view('reservas.crear', compact('propiedad'));
    }

    public function store(Request $request, $id_propiedad)
    {
        $request->validate([
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
            'estado' => 'required|in:pendiente'
        ]);

        Reserva::create([
            'id_use' => session('user')->id,
            'id_propiedad' => $id_propiedad,
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_fin' => $request->fecha_fin,
            'estado' => $request->estado
        ]);

        return redirect()->route('reservas.index')->with('success', 'Reserva realizada con éxito.');
    }

    public function index()
    {
        $user = session('user');
        if (!$user) return redirect()->route('login');

        if ($user->rol === 'cliente') {
            $reservas = Reserva::where('id_use', $user->id)
                ->with('propiedad')
                ->get();
            return view('reservas.index', compact('user', 'reservas'));
        }

        if ($user->rol === 'propietario') {
            $reservas = Reserva::whereIn('id_propiedad', $user->propiedades->pluck('id'))
                ->with(['propiedad', 'user'])
                ->get();
            return view('reservas.propietario', compact('user', 'reservas'));
        }

        return redirect()->route('home');
    }

    public function edit($id)
    {
        $reserva = Reserva::findOrFail($id);

        if (session('user')->rol !== 'cliente' || session('user')->id !== $reserva->id_use) {
            return redirect()->route('reservas.index')->withErrors('No autorizado.');
        }

        return view('reservas.editar', compact('reserva'));
    }

    public function update(Request $request, $id)
    {
        $reserva = Reserva::findOrFail($id);

        if (session('user')->rol !== 'cliente' || session('user')->id !== $reserva->id_use) {
            return redirect()->route('reservas.index')->withErrors('No autorizado.');
        }

        $request->validate([
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio'
        ]);

        $reserva->update([
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_fin' => $request->fecha_fin
        ]);

        return redirect()->route('reservas.index')->with('success', 'Reserva actualizada.');
    }

    public function destroy($id)
    {
        $reserva = Reserva::findOrFail($id);

        if (session('user')->rol !== 'cliente' || session('user')->id !== $reserva->id_use) {
            return redirect()->route('reservas.index')->withErrors('No autorizado.');
        }

        $reserva->update(['estado' => 'cancelada']);

        return redirect()->route('reservas.index')->with('success', 'Reserva cancelada.');
    }

    // NUEVOS MÉTODOS PARA ACEPTAR Y RECHAZAR

    public function aceptar($id)
    {
        $reserva = Reserva::findOrFail($id);
        $user = session('user');

        if ($user->rol !== 'propietario' || !$user->propiedades->pluck('id')->contains($reserva->id_propiedad)) {
            return redirect()->route('reservas.propietario')->withErrors('No autorizado.');
        }

        $reserva->update(['estado' => 'aceptada']);

        return redirect()->route('reservas.propietario')->with('success', 'Reserva aceptada.');
    }

    public function rechazar($id)
    {
        $reserva = Reserva::findOrFail($id);
        $user = session('user');

        if ($user->rol !== 'propietario' || !$user->propiedades->pluck('id')->contains($reserva->id_propiedad)) {
            return redirect()->route('reservas.propietario')->withErrors('No autorizado.');
        }

        $reserva->update(['estado' => 'rechazada']);

        return redirect()->route('reservas.propietario')->with('success', 'Reserva rechazada.');
    }
}

