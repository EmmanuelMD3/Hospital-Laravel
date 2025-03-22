<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Paciente;
use App\Models\Empleado;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('usuario', 'contrasenia_hash');

        // Verificar si es un Paciente
        if (Auth::guard('paciente')->attempt($credentials)) {
            return redirect()->intended('/paciente/dashboard');
        }

        // Verificar si es un Empleado
        if (Auth::guard('empleado')->attempt($credentials)) {
            return redirect()->intended('/empleado/dashboard');
        }

        return back()->withErrors([
            'usuario' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
        ]);
    }
}