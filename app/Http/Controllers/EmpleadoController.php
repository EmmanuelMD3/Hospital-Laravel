<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    // Método para mostrar el formulario
    public function create()
    {
        return view('empleado.create');
    }

    // Método para procesar el formulario y guardar los datos
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'matricula' => 'required|integer|unique:Empleados',
            'nombre' => 'required|string|max:20',
            'apellidoP' => 'required|string|max:20',
            'apellidoM' => 'required|string|max:20',
            'IDServicio' => 'required|integer',
            'sueldo' => 'required|numeric',
            'correo' => 'required|email|max:30',
            'usuario' => 'required|string|max:10',
            'contrasenia_hash' => 'required|string|max:30',
            'roles' => 'required|integer',
            'foto' => 'required', // Asegúrate de manejar la subida de archivos correctamente
        ]);

        // Crear un nuevo registro en la base de datos
        Empleado::create([
            'matricula' => $request->matricula,
            'nombre' => $request->nombre,
            'apellidoP' => $request->apellidoP,
            'apellidoM' => $request->apellidoM,
            'IDServicio' => $request->IDServicio,
            'sueldo' => $request->sueldo,
            'correo' => $request->correo,
            'usuario' => $request->usuario,
            'contrasenia_hash' => $request->contrasenia_hash,
            'roles' => $request->roles,
            'foto' => $request->foto, // Asegúrate de manejar la subida de archivos correctamente
        ]);

        // Redirigir al usuario con un mensaje de éxito
        return redirect()->route('empleado.create')->with('success', 'Empleado agregado correctamente.');
    }
}