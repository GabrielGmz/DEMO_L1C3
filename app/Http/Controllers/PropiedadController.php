<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Propietario;

class PropiedadController extends Controller
{
    public function index(Request $request) {
        $user = session('user');
        $query = Propietario::query();


        if ($user && $user->rol === 'propietario') {
            $query->where('id_user', $user->id);
        }


        if ($request->filled('busqueda')) {
            $busqueda = $request->input('busqueda');
            $query->where(function ($q) use ($busqueda) {
                $q->where('titulo', 'like', "%$busqueda%")
                  ->orWhere('descripción', 'like', "%$busqueda%");
            });
        }


        if ($request->filled('precio_min')) {
            $query->where('precio_por_noche', '>=', $request->input('precio_min'));
        }


        if ($request->filled('precio_max')) {
            $query->where('precio_por_noche', '<=', $request->input('precio_max'));
        }

        $propiedades = $query->get();

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
        'estado' => 'required',
        'imagen_url' => 'required|image|max:2048', // max 2MB
    ]);

    // Guardar imagen
    $rutaImagen = null;
    if ($request->hasFile('imagen_url')) {
        $ruta = $request->file('imagen_url')->store('imagenes', 'public');
        $rutaImagen = $request->file('imagen_url')->store('imagenes', 'public'); // guarda en storage/app/public/imagenes
$urlImagen = 'storage/' . $rutaImagen;
    }

    Propietario::create([
        'id_user' => $user->id,
        'titulo' => $request->titulo,
        'descripción' => $request->descripción,
        'precio_por_noche' => $request->precio_por_noche,
        'capacidad' => $request->capacidad,
        'estado' => $request->estado,
        'imagen_url' => $rutaImagen,
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
