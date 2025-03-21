<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use Illuminate\Http\Request;

class ServicioController extends Controller
{
    // Método para mostrar el formulario
    public function create()
    {
        return view('servicio.create');
    }

    // Método para procesar el formulario y guardar los datos
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre_servicio' => 'required|string|max:15',
        ]);

        // Crear un nuevo registro en la base de datos
        Servicio::create([
            'nombre_servicio' => $request->nombre_servicio,
        ]);

        // Redirigir al usuario con un mensaje de éxito
        return redirect()->route('servicio.create')->with('success', 'Servicio agregado correctamente.');
    }
}