<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserva;
use App\Models\Propietario;

class ReservaController extends Controller
{
    public function create($id_propiedad) {
        if (session('user')->rol !== 'cliente') {
            return redirect()->route('dashboard')->withErrors('Solo clientes pueden reservar.');
        }

        $propiedad = Propietario::findOrFail($id_propiedad);
        return view('reservas.create', compact('propiedad'));
    }

    public function store(Request $request, $id_propiedad) {
        $request->validate([
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
            'estado' => 'required'
        ]);

        Reserva::create([
            'id_use' => session('user')->id,
            'id_propiedad' => $id_propiedad,
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_fin' => $request->fecha_fin,
            'estado' => $request->estado
        ]);

        return redirect()->route('dashboard')->with('success', 'Reserva realizada.');
    }
}

