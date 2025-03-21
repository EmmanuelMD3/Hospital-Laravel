<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    // Método para mostrar el formulario
    public function create()
    {
        return view('paciente.create');
    }

    // Método para procesar el formulario y guardar los datos
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:20',
            'apellidoP' => 'required|string|max:20',
            'apellidoM' => 'required|string|max:20',
            'NSS' => 'required|integer|unique:Paciente',
            'telefono' => 'required|string|max:10',
            'correo' => 'required|email|max:30',
            'direccion' => 'required|string|max:50',
            'foto' => 'required', // Asegúrate de manejar la subida de archivos correctamente
        ]);

        // Crear un nuevo registro en la base de datos
        Paciente::create([
            'nombre' => $request->nombre,
            'apellidoP' => $request->apellidoP,
            'apellidoM' => $request->apellidoM,
            'NSS' => $request->NSS,
            'telefono' => $request->telefono,
            'correo' => $request->correo,
            'direccion' => $request->direccion,
            'foto' => $request->foto, // Asegúrate de manejar la subida de archivos correctamente
        ]);

        // Redirigir al usuario con un mensaje de éxito
        return redirect()->route('paciente.create')->with('success', 'Paciente agregado correctamente.');
    }
}