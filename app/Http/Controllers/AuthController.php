<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\Login;

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\Login;

class AuthController extends Controller
{
    public function showLogin() {
        return view('auth.login');
    }

    public function showRegister() {
        return view('auth.register');
    }

    public function register(Request $request) {
        $request->validate([
            'nombre' => 'required',
            'email' => 'required|email|unique:login',
            'password' => 'required|min:6',
            'rol' => 'required|in:cliente,propietario'
        ]);

        Login::create([
            'nombre' => $request->nombre,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'rol' => $request->rol
        ]);

        return redirect()->route('login')->with('success', 'Registro exitoso. Inicia sesión.');
    }

    public function login(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Buscar al usuario por el correo
        $user = Login::where('email', $request->email)->first();

        // Verificar si el usuario existe y la contraseña es correcta
        if ($user && Hash::check($request->password, $user->password)) {
            // Almacenar al usuario en la sesión
            Session::put('user', $user);

            // Redirigir según el rol del usuario
            if ($user->rol === 'propietario') {
                return redirect()->route('propiedades.create'); // Redirige a la creación de propiedades si es propietario
            }

            return redirect()->route('propiedades.index'); // Redirige a la lista de propiedades si es cliente
        }

        // Si las credenciales son incorrectas
        return back()->withErrors(['email' => 'Credenciales incorrectas']);
    }

    public function logout() {
        // Eliminar al usuario de la sesión
        Session::forget('user');
        return redirect()->route('login');
    }
}
