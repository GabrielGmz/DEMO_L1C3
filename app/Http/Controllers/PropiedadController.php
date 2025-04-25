<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Propietario;

class PropiedadController extends Controller
{
    public function index() {
        $propiedades = Propietario::all();
        return view('propiedades.index', compact('propiedades'));
    }

    public function create() {
        if (session('user')->rol !== 'propietario') {
            return redirect()->route('dashboard')->withErrors('Acceso no autorizado.');
        }
        return view('propiedades.crear');
    }

    public function store(Request $request) {
        $request->validate([
            'titulo' => 'required',
            'descripción' => 'required',
            'precio_por_noche' => 'required|integer',
            'capacidad' => 'required|integer',
            'estado' => 'required'
        ]);

        Propietario::create([
            'id_user' => session('user')->id,
            'titulo' => $request->titulo,
            'descripción' => $request->descripción,
            'precio_por_noche' => $request->precio_por_noche,
            'capacidad' => $request->capacidad,
            'estado' => $request->estado
        ]);

        return redirect()->route('propiedades.index')->with('success', 'Propiedad agregada.');
    }
}

