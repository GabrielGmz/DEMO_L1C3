<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserva;
use App\Models\Propietario;

class ReservaController extends Controller
{
    // Mostrar formulario para crear una reserva
    public function create($id_propiedad) {
        // Verificar si el usuario es un cliente
        if (session('user')->rol !== 'cliente') {
            return redirect()->route('dashboard')->withErrors('Solo clientes pueden reservar.');
        }

        // Obtener la propiedad seleccionada por su ID
        $propiedad = Propietario::findOrFail($id_propiedad);

        // Retornar la vista con la propiedad seleccionada
        return view('reservas.crear', compact('propiedad'));
    }

    // Guardar la reserva realizada por el cliente
    public function store(Request $request, $id_propiedad) {
        // Validación de los datos del formulario
        $request->validate([
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio', // Fecha de fin debe ser después o igual a la fecha de inicio
            'estado' => 'required|in:pendiente' // Solo estado "pendiente" para nuevas reservas
        ]);

        // Crear la nueva reserva
        Reserva::create([
            'id_use' => session('user')->id, // ID del usuario (cliente)
            'id_propiedad' => $id_propiedad, // ID de la propiedad seleccionada
            'fecha_inicio' => $request->fecha_inicio, // Fecha de inicio
            'fecha_fin' => $request->fecha_fin, // Fecha de fin
            'estado' => $request->estado // Estado de la reserva (pendiente)
        ]);

        // Redirigir al dashboard con un mensaje de éxito
        return redirect()->route('reservas.index')->with('success', 'Reserva realizada con éxito.');
    }

    // Ver las reservas del usuario (cliente o propietario)
    public function index() {
        $user = session('user');

        // Verificar si el usuario está logueado
        if (!$user) {
            return redirect()->route('login');
        }

        // Obtener las reservas según el rol del usuario
        if ($user->rol === 'cliente') {
            $reservas = Reserva::where('id_use', $user->id)->get();
        } elseif ($user->rol === 'propietario') {
            $reservas = Reserva::whereIn('id_propiedad', $user->propiedades->pluck('id'))->get();
        } else {
            return redirect()->route('home');
        }

        // Retornar la vista con las reservas
        return view('reservas.index', compact('user', 'reservas'));
    }
}

