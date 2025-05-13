<?php

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

        $user = Login::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Session::put('user', $user);

            if ($user->rol === 'propietario') {
                return redirect()->route('propiedades.index');
            }

            return redirect()->route('propiedades.index');
        }

        return back()->withErrors(['email' => 'Credenciales incorrectas']);
    }

    public function logout() {
        Session::forget('user');
        return redirect()->route('login');
    }
}
