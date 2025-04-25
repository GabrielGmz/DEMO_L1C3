<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Propietario;

class PropiedadController extends Controller
{
    public function index() {
        $user = session('user');

        if ($user && $user->rol === 'propietario') {
            $propiedades = Propietario::where('id_user', $user->id)->get();
        } else {
            $propiedades = Propietario::all();
        }

        return view('propiedades.index', compact('propiedades'));
    }

    public function create() {
        $user = session('user');

        if (!$user || $user->rol !== 'propietario') {
            return redirect()->route('propiedades.index')->withErrors('Acceso no autorizado.');
        }

        return view('propiedades.crear');
    }

    public function store(Request $request) {
        $user = session('user');

        if (!$user || $user->rol !== 'propietario') {
            return redirect()->route('propiedades.index')->withErrors('Acceso no autorizado.');
        }

        $request->validate([
            'titulo' => 'required',
            'descripción' => 'required',
            'precio_por_noche' => 'required|integer',
            'capacidad' => 'required|integer',
            'estado' => 'required'
        ]);

        Propietario::create([
            'id_user' => $user->id,
            'titulo' => $request->titulo,
            'descripción' => $request->descripción,
            'precio_por_noche' => $request->precio_por_noche,
            'capacidad' => $request->capacidad,
            'estado' => $request->estado
        ]);

        return redirect()->route('propiedades.index')->with('success', 'Propiedad agregada.');
    }

    public function destroy($id) {
        $user = session('user');
        $propiedad = Propietario::findOrFail($id);

        if (!$user || $user->rol !== 'propietario' || $user->id !== $propiedad->id_user) {
            return redirect()->route('propiedades.index')->withErrors('No tienes permiso para eliminar esta propiedad.');
        }

        $propiedad->delete();

        return redirect()->route('propiedades.index')->with('success', 'Propiedad eliminada correctamente.');
    }
}
