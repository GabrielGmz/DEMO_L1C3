<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserva;
use App\Models\Propietario;

class ReservaController extends Controller
{
    public function create($id_propiedad) {
        if (session('user')->rol !== 'cliente') {
            return redirect()->route('propiedades.index')->withErrors('Solo clientes pueden reservar.');
        }

        $propiedad = Propietario::findOrFail($id_propiedad);

        return view('reservas.crear', compact('propiedad'));
    }

    public function store(Request $request, $id_propiedad) {
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

    public function index() {
        $user = session('user');

        if (!$user) {
            return redirect()->route('login');
        }

        if ($user->rol === 'cliente') {
            $reservas = Reserva::where('id_use', $user->id)->get();
        } elseif ($user->rol === 'propietario') {
            $reservas = Reserva::whereIn('id_propiedad', $user->propiedades->pluck('id'))->get();
        } else {
            return redirect()->route('home');
        }

        return view('reservas.index', compact('user', 'reservas'));
    }
}
